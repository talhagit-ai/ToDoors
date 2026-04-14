<?php
/**
 * Snippet #141: ToDoors Disable Autoload Orphaned Plugin Data
 * Status: ACTIVE
 * Scope: global
 *
 * Zet autoload=no voor opties van niet-actieve plugins (Hummingbird, AIOSEO). Bespaarde nog 122 KB (van 303 KB naar 180 KB).
 */

add_action('init', function() {
    if (get_option('tdoors_autoload_orphaned_done')) return;

    global $wpdb;

    // Opties van niet-actieve plugins (Hummingbird en AIOSEO niet in active plugins)
    $options_to_disable = [
        'wphb_styles_collection',
        'wphb_scripts_collection',
        'wphb_minify_files',
        'wphb_settings',
        'wphb_post_status',
        'aioseo_options',
        'aioseo_options_internal',
        'aioseo_options_dynamic',
        'aioseo_notifications_internal',
    ];

    $log = [];
    foreach ($options_to_disable as $opt) {
        $current = $wpdb->get_var($wpdb->prepare(
            "SELECT autoload FROM {$wpdb->options} WHERE option_name = %s",
            $opt
        ));
        if ($current === null) {
            $log[$opt] = 'NOT_FOUND';
            continue;
        }
        if ($current === 'no') {
            $log[$opt] = 'ALREADY_NO';
            continue;
        }
        $wpdb->update(
            $wpdb->options,
            ['autoload' => 'no'],
            ['option_name' => $opt]
        );
        $log[$opt] = 'updated';
    }

    update_option('tdoors_autoload_orphaned_done', json_encode([
        'date' => date('Y-m-d H:i:s'),
        'log' => $log
    ]), false);

    wp_cache_delete('alloptions', 'options');
    wp_cache_flush();
}, 5);
