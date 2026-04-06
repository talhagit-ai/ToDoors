<?php
/**
 * Snippet #57: Find & Fix Copyright Option Key
 * Status: ACTIVE
 * Scope: global
 */

add_action('init', function() {
    if (get_option('tdoors_find_copyright_done')) return;

    global $wpdb;

    // Zoek de exacte option die "All Right Reserved" bevat
    $results = $wpdb->get_results(
        "SELECT option_name, LEFT(option_value, 200) as preview
         FROM {$wpdb->options}
         WHERE option_value LIKE '%All Right Reserved%'
         LIMIT 10"
    );

    $found = [];
    foreach ($results as $row) {
        $found[] = $row->option_name . ': ' . substr($row->preview, 0, 100);

        // Fix direct in de database
        $wpdb->query($wpdb->prepare(
            "UPDATE {$wpdb->options} SET option_value = REPLACE(option_value, 'All Right Reserved', 'All Rights Reserved') WHERE option_name = %s",
            $row->option_name
        ));
    }

    do_action('litespeed_purge_all');

    update_option('tdoors_find_copyright_done', implode(' | ', $found) ?: 'not_found');
    error_log('ToDoors: Copyright keys gevonden en gefixed: ' . implode(', ', array_column($results, 'option_name')));
}, 5);
