<?php
/**
 * Snippet #40: snippet_40
 * Status: ACTIVE
 * Scope: global
 */

add_action('init', function() {
    if (get_option('tdoors_gdlr_fix_v3_done')) return;
    
    global $wpdb;
    
    $page_ids = [2804, 2820, 2828, 2832, 2823, 2520];
    $results = [];
    
    foreach ($page_ids as $id) {
        // Read raw meta_value directly from DB (bypass object cache)
        $row = $wpdb->get_row($wpdb->prepare(
            "SELECT meta_id, meta_value FROM {$wpdb->postmeta} 
             WHERE post_id = %d AND meta_key = 'gdlr-core-page-builder' 
             ORDER BY meta_id DESC LIMIT 1",
            $id
        ));
        
        if ($row && strlen($row->meta_value) > 10) {
            // The data is in the DB - rewrite it to fix any cache/unserialize issues
            $raw = $row->meta_value;
            
            // Try to unserialize
            $unserialized = @unserialize($raw);
            
            if ($unserialized !== false) {
                // Valid serialized data - re-save it properly
                $wpdb->update(
                    $wpdb->postmeta,
                    ['meta_value' => $raw], // Keep exact same raw value
                    ['meta_id' => $row->meta_id],
                    ['%s'],
                    ['%d']
                );
                
                // Clear WordPress object cache for this post
                wp_cache_delete($id, 'post_meta');
                clean_post_cache($id);
                
                $results[$id] = [
                    'status' => 'fixed',
                    'raw_len' => strlen($raw),
                    'sections' => is_array($unserialized) ? count($unserialized) : 0
                ];
            } else {
                $results[$id] = ['status' => 'unserialize_failed', 'raw_len' => strlen($raw)];
            }
        } else {
            $results[$id] = ['status' => 'no_data', 'raw_len' => $row ? strlen($row->meta_value) : 0];
        }
        
        // Purge LiteSpeed cache for this page
        do_action('litespeed_purge_post', $id);
    }
    
    update_option('tdoors_gdlr_fix_v3_result', $results);
    update_option('tdoors_gdlr_fix_v3_done', 1);
    error_log('ToDoors GDLR Fix v3: ' . json_encode($results));
});

// Also expose result via REST
add_action('rest_api_init', function() {
    register_rest_route('todoors/v1', '/gdlr-fix-result', [
        'methods' => 'GET',
        'permission_callback' => function() { return current_user_can('manage_options'); },
        'callback' => function() {
            return get_option('tdoors_gdlr_fix_v3_result', ['not_run_yet' => true]);
        }
    ]);
});
