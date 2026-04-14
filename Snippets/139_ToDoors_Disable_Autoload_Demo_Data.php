<?php
/**
 * Snippet #139: ToDoors Disable Autoload Demo Data
 * Status: ACTIVE
 * Scope: global
 *
 * Zet autoload=no voor RealFactory demo-data en oude theme-opties. Bespaarde 1.28 MB per request (van 1585 KB naar 303 KB).
 */

add_action('init', function() {
    if (get_option('tdoors_autoload_disabled_done')) return;

    global $wpdb;

    // Veilige kandidaten om autoload=no te zetten
    // gdlr_core_demo_processed_*: demo-content van RealFactory thema (niet nodig na install)
    // halstein/liquid/salient/the7: opties van oude themes die niet meer actief zijn
    // brainstrom_bundled_products: Astra Starter Sites, niet runtime nodig
    $options_to_disable = [
        'gdlr_core_demo_processed_upci1_realfactory',
        'gdlr_core_demo_processed_upci2_realfactory',
        'the7',
        'halstein_core_options',
        'liquid_one_opt',
        'salient_redux',
        'brainstrom_bundled_products',
    ];

    $log = [];
    foreach ($options_to_disable as $opt) {
        $result = $wpdb->update(
            $wpdb->options,
            ['autoload' => 'no'],
            ['option_name' => $opt, 'autoload' => 'yes']
        );
        $log[$opt] = ($result === false) ? 'error' : (($result > 0) ? 'updated' : 'not_found_or_already_no');
    }

    update_option('tdoors_autoload_disabled_done', json_encode([
        'date' => date('Y-m-d H:i:s'),
        'log' => $log
    ]), false);

    // Cache leegmaken zodat WP de nieuwe autoload-staat oppikt
    wp_cache_delete('alloptions', 'options');

    error_log('ToDoors autoload disabled: ' . json_encode($log));
}, 5);
