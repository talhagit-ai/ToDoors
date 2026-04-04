<?php
/**
 * Snippet #43: snippet_43
 * Status: ACTIVE
 * Scope: global
 */

add_action('rest_api_init', function() {
    // Return full raw data for a page
    register_rest_route('todoors/v1', '/full-raw/(?P<id>[0-9]+)', [
        'methods' => 'GET',
        'permission_callback' => function() { return current_user_can('manage_options'); },
        'callback' => function($req) {
            global $wpdb;
            $id = $req['id'];
            $row = $wpdb->get_row($wpdb->prepare(
                "SELECT meta_value FROM {$wpdb->postmeta} 
                 WHERE post_id = %d AND meta_key = 'gdlr-core-page-builder' 
                 ORDER BY meta_id DESC LIMIT 1",
                $id
            ));
            if (!$row) return ['error' => 'no data'];
            return ['raw' => $row->meta_value, 'len' => strlen($row->meta_value)];
        }
    ]);
    
    // Advanced repair: try multiple strategies
    register_rest_route('todoors/v1', '/advanced-repair', [
        'methods' => 'POST',
        'permission_callback' => function() { return current_user_can('manage_options'); },
        'callback' => function($req) {
            global $wpdb;
            $id = intval($req->get_param('id'));
            
            $row = $wpdb->get_row($wpdb->prepare(
                "SELECT meta_id, meta_value FROM {$wpdb->postmeta} 
                 WHERE post_id = %d AND meta_key = 'gdlr-core-page-builder' 
                 ORDER BY meta_id DESC LIMIT 1",
                $id
            ));
            
            if (!$row || strlen($row->meta_value) < 10) {
                return ['error' => 'no data'];
            }
            
            $raw = $row->meta_value;
            
            // Strategy 1: Fix string lengths using mb-aware replacement
            $strategy1 = preg_replace_callback(
                '/s:(\d+):"(.*?)";/us',
                function($m) {
                    $len = strlen($m[2]); // byte length
                    return 's:' . $len . ':"' . $m[2] . '";';
                },
                $raw
            );
            
            if ($strategy1 && @unserialize($strategy1) !== false) {
                $wpdb->update($wpdb->postmeta, ['meta_value' => $strategy1], ['meta_id' => $row->meta_id], ['%s'], ['%d']);
                clean_post_cache($id);
                do_action('litespeed_purge_post', $id);
                return ['status' => 'fixed_strategy1', 'id' => $id];
            }
            
            // Strategy 2: Convert encoding and try again
            $raw_utf8 = mb_convert_encoding($raw, 'UTF-8', 'UTF-8');
            $strategy2 = preg_replace_callback(
                '/s:(\d+):"(.*?)";/us',
                function($m) {
                    return 's:' . strlen($m[2]) . ':"' . $m[2] . '";';
                },
                $raw_utf8
            );
            
            if ($strategy2 && @unserialize($strategy2) !== false) {
                $wpdb->update($wpdb->postmeta, ['meta_value' => $strategy2], ['meta_id' => $row->meta_id], ['%s'], ['%d']);
                clean_post_cache($id);
                do_action('litespeed_purge_post', $id);
                return ['status' => 'fixed_strategy2', 'id' => $id];
            }
            
            // Strategy 3: Check if it's actually a JSON-encoded value stored as serialized
            $json_test = json_decode($raw, true);
            if ($json_test !== null) {
                update_post_meta($id, 'gdlr-core-page-builder', $json_test);
                clean_post_cache($id);
                do_action('litespeed_purge_post', $id);
                return ['status' => 'fixed_was_json', 'id' => $id];
            }
            
            return ['status' => 'all_strategies_failed', 'id' => $id, 'raw_start' => substr($raw, 0, 200)];
        }
    ]);
});
