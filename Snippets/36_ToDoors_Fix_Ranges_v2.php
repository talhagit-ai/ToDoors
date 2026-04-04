<?php
/**
 * Snippet #36: ToDoors Fix Ranges v2
 * Status: inactive
 * Scope: single-use
 */

add_action("init", function() {
    global $wpdb;

    $ranges = [
        2804 => ["van" => "4.300", "tot" => "12.000"],
        2820 => ["van" => "2.700", "tot" => "4.700"],
        2828 => ["van" => "370",   "tot" => "1.070"],
        2832 => ["van" => "5.500", "tot" => "15.500"],
        2823 => ["van" => "6.500", "tot" => "10.500"],
        2520 => ["van" => "2.700", "tot" => "4.700"],
    ];

    foreach ($ranges as $page_id => $r) {
        $raw = $wpdb->get_var($wpdb->prepare(
            "SELECT meta_value FROM {$wpdb->postmeta} WHERE post_id=%d AND meta_key=%s",
            $page_id, "gdlr-core-page-builder"
        ));
        if (!$raw) continue;

        // Exact match: "Volledige installatie + onderhoud contract: €3.500 - €6.000"
        $new_raw = preg_replace(
            "/Volledige installatie \+ onderhoud contract: €[0-9\.]+ - €[0-9\.]+/u",
            "Volledige installatie + onderhoudscontract: €{$r[\"van\"]} – €{$r[\"tot\"]}",
            $raw
        );

        if ($new_raw && $new_raw !== $raw) {
            $wpdb->update($wpdb->postmeta, ["meta_value" => $new_raw],
                ["post_id" => $page_id, "meta_key" => "gdlr-core-page-builder"]);
            do_action("litespeed_purge_post", $page_id);
        }
    }
}, 1);
