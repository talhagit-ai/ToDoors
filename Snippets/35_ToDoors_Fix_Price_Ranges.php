<?php
/**
 * Snippet #35: ToDoors Fix Price Ranges
 * Status: inactive
 * Scope: single-use
 */

add_action("init", function() {
    global $wpdb;

    // Juiste ranges per pagina — basis is al correct
    $ranges = [
        2804 => "4.300 – 12.000",   // Schuifdeuren
        2820 => "2.700 – 4.700",    // Draaideuren
        2828 => "370 – 1.070",      // Deurdrangers
        2832 => "5.500 – 15.500",   // Harmonica
        2823 => "6.500 – 10.500",   // Guillotine
        2520 => "2.700 – 4.700",    // Elektronisch
    ];

    foreach ($ranges as $page_id => $range) {
        $raw = $wpdb->get_var($wpdb->prepare(
            "SELECT meta_value FROM {$wpdb->postmeta} WHERE post_id=%d AND meta_key=%s",
            $page_id, "gdlr-core-page-builder"
        ));
        if (!$raw) continue;

        // Vervang de oude range (3.500 - 6.000) met de correcte range
        $new_raw = preg_replace(
            "/Volledige installatie \+ onderhoud contract: €[0-9\.]+ - €[0-9\.]+/",
            "Volledige installatie + onderhoudscontract: €" . $range,
            $raw
        );

        if ($new_raw && $new_raw !== $raw) {
            $wpdb->update(
                $wpdb->postmeta,
                ["meta_value" => $new_raw],
                ["post_id" => $page_id, "meta_key" => "gdlr-core-page-builder"]
            );
            do_action("litespeed_purge_post", $page_id);
            error_log("Range updated for $page_id");
        }
    }
}, 1);
