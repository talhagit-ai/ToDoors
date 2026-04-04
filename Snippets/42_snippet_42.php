<?php
/**
 * Snippet #42: snippet_42
 * Status: ACTIVE
 * Scope: global
 */

add_action('rest_api_init', function() {
    // Check the product dump saved by snippet 20
    register_rest_route('todoors/v1', '/check-dumps', [
        'methods' => 'GET',
        'permission_callback' => function() { return current_user_can('manage_options'); },
        'callback' => function() {
            $dump = get_option('tdoors_product_dump', null);
            $dump_done = get_option('tdoors_product_dump_done', false);
            
            // Also check UpdraftPlus backup history
            $backup_history = get_option('updraft_backup_history', []);
            $backups = [];
            foreach ($backup_history as $ts => $backup) {
                $backups[] = [
                    'timestamp' => $ts,
                    'date' => date('Y-m-d H:i:s', $ts),
                    'type' => isset($backup['nonce']) ? 'full' : 'partial',
                    'has_db' => isset($backup['db']),
                    'files' => array_keys($backup),
                ];
            }
            usort($backups, fn($a,$b) => $b['timestamp'] - $a['timestamp']);
            
            return [
                'dump_done' => $dump_done,
                'dump_data' => $dump ? substr($dump, 0, 2000) : null,
                'backups' => array_slice($backups, 0, 10),
            ];
        }
    ]);
    
    // Restore from the saved dump (snippet 20 data)
    register_rest_route('todoors/v1', '/restore-from-dump', [
        'methods' => 'POST',
        'permission_callback' => function() { return current_user_can('manage_options'); },
        'callback' => function() {
            $dump_json = get_option('tdoors_product_dump', null);
            if (!$dump_json) {
                return ['error' => 'No dump found'];
            }
            
            $dump = json_decode($dump_json, true);
            if (!$dump) {
                return ['error' => 'Invalid JSON in dump'];
            }
            
            $results = [];
            foreach ($dump as $name => $page_data) {
                $id = $page_data['id'];
                $gdlr_json = $page_data['json'];
                $gdlr_array = json_decode($gdlr_json, true);
                
                if ($gdlr_array) {
                    update_post_meta($id, 'gdlr-core-page-builder', $gdlr_array);
                    clean_post_cache($id);
                    do_action('litespeed_purge_post', $id);
                    $results[$id] = ['status' => 'restored', 'name' => $name];
                } else {
                    $results[$id] = ['status' => 'json_parse_failed', 'name' => $name];
                }
            }
            return $results;
        }
    ]);
});
