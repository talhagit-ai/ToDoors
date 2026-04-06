<?php
/**
 * Snippet #59: Repair Broken Copyright Serialization
 * Status: ACTIVE
 * Scope: global
 *
 * Herstelt de geserialiseerde theme option die beschadigd is door
 * snippet 57's SQL REPLACE (lengte in serialisatie klopte niet meer).
 */

add_action('init', function() {
    if (get_option('tdoors_repair_copyright_done')) return;

    global $wpdb;

    // Haal alle options op die "copyright" of "All Right" bevatten (ook beschadigde)
    $rows = $wpdb->get_results(
        "SELECT option_name, option_value FROM {$wpdb->options}
         WHERE option_value LIKE '%opyright ToDoors%'
            OR option_value LIKE '%All Right%'
            OR option_value LIKE '%All Rights%'
         LIMIT 20"
    );

    $repaired = [];

    foreach ($rows as $row) {
        $raw = $row->option_value;
        $name = $row->option_name;

        // Herstel beschadigde serialisatie door lengtes te herberekenen
        $fixed = preg_replace_callback(
            '/s:(\d+):"([^"]*(?:All Rights Reserved|All Right Reserved)[^"]*)"/U',
            function($m) {
                // Zet terug naar origineel met typfout (revert)
                $str = str_replace('All Rights Reserved', 'All Right Reserved', $m[2]);
                $len = strlen($str);
                return 's:' . $len . ':"' . $str . '"';
            },
            $raw
        );

        if ($fixed !== $raw) {
            $wpdb->update(
                $wpdb->options,
                ['option_value' => $fixed],
                ['option_name' => $name]
            );
            $repaired[] = $name;
            error_log('ToDoors: Hersteld option: ' . $name);
        }
    }

    // Verwijder cache van alle opties
    wp_cache_flush();
    do_action('litespeed_purge_all');

    update_option('tdoors_repair_copyright_done', implode(', ', $repaired) ?: 'niets_gevonden');
    error_log('ToDoors: Copyright repair klaar. Hersteld: ' . implode(', ', $repaired));
}, 1);
