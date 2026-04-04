<?php
/**
 * Snippet #41: snippet_41
 * Status: ACTIVE
 * Scope: global
 */

// Function to repair corrupted PHP serialized strings
function tdoors_repair_serialized($data) {
    // Fix string length counts in serialized data
    // This handles the most common corruption: wrong s:N values
    $fixed = preg_replace_callback(
        '/s:(\d+):"(.*?)(?<!\\\\)";/',
        function($matches) {
            $expected_len = (int)$matches[1];
            $actual_string = $matches[2];
            $actual_len = strlen($actual_string);
            if ($actual_len !== $expected_len) {
                return 's:' . $actual_len . ':"' . $actual_string . '";';
            }
            return $matches[0];
        },
        $data
    );
    return $fixed;
}

add_action('init', function() {
    if (get_option('tdoors_gdlr_repair_done')) return;
    
    global $wpdb;
    
    $page_ids = [2804, 2820, 2828, 2832, 2823, 2520];
    $results = [];
    
    foreach ($page_ids as $id) {
        // Read raw from DB
        $row = $wpdb->get_row($wpdb->prepare(
            "SELECT meta_id, meta_value FROM {$wpdb->postmeta} 
             WHERE post_id = %d AND meta_key = 'gdlr-core-page-builder' 
             ORDER BY meta_id DESC LIMIT 1",
            $id
        ));
        
        if (!$row || strlen($row->meta_value) < 10) {
            $results[$id] = ['status' => 'no_data'];
            continue;
        }
        
        $raw = $row->meta_value;
        
        // First try direct unserialize
        $test = @unserialize($raw);
        if ($test !== false) {
            $results[$id] = ['status' => 'already_valid', 'raw_len' => strlen($raw)];
            continue;
        }
        
        // Try to repair
        $repaired = tdoors_repair_serialized($raw);
        $test2 = @unserialize($repaired);
        
        if ($test2 !== false) {
            // Save repaired version
            $wpdb->update(
                $wpdb->postmeta,
                ['meta_value' => $repaired],
                ['meta_id' => $row->meta_id],
                ['%s'], ['%d']
            );
            wp_cache_delete($id, 'post_meta');
            clean_post_cache($id);
            do_action('litespeed_purge_post', $id);
            $results[$id] = ['status' => 'repaired', 'original_len' => strlen($raw), 'repaired_len' => strlen($repaired)];
        } else {
            // Store first 500 chars of raw for debugging
            $results[$id] = ['status' => 'repair_failed', 'raw_len' => strlen($raw), 'raw_preview' => substr($raw, 0, 500)];
        }
    }
    
    update_option('tdoors_gdlr_repair_result', $results);
    update_option('tdoors_gdlr_repair_done', 1);
    error_log('ToDoors GDLR Repair: ' . json_encode($results));
    
}, 10);

add_action('rest_api_init', function() {
    register_rest_route('todoors/v1', '/gdlr-repair-result', [
        'methods' => 'GET',
        'permission_callback' => function() { return current_user_can('manage_options'); },
        'callback' => function() {
            return get_option('tdoors_gdlr_repair_result', ['not_run' => true]);
        }
    ]);
});
