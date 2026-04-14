<?php
/**
 * Snippet #137: ToDoors Autoload Analysis
 * Status: ACTIVE
 * Scope: global
 *
 * REST endpoint /wp-json/todoors/v1/autoload-top - toont top 20 grootste autoloaded options. Read-only analyse tool.
 */

add_action('rest_api_init', function() {
    register_rest_route('todoors/v1', '/autoload-top', [
        'methods' => 'GET',
        'callback' => function() {
            global $wpdb;
            $rows = $wpdb->get_results(
                "SELECT option_name, LENGTH(option_value) AS size_bytes
                 FROM {$wpdb->options}
                 WHERE autoload = 'yes'
                 ORDER BY size_bytes DESC
                 LIMIT 20"
            );
            $total = $wpdb->get_var(
                "SELECT SUM(LENGTH(option_value)) FROM {$wpdb->options} WHERE autoload='yes'"
            );
            return [
                'total_autoload_size_kb' => round($total / 1024, 2),
                'top_20' => $rows
            ];
        },
        'permission_callback' => function() { return current_user_can('manage_options'); }
    ]);
});
