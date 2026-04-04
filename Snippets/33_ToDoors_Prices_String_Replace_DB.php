<?php
/**
 * Snippet #33: ToDoors Prices String Replace DB
 * Status: inactive
 * Scope: single-use
 */

add_action("init", function() {
    global $wpdb;

    $updates = [
        2804 => ["oud_basis" => "2.500", "nieuw_basis" => "4.000", "oud_range" => "3.500 - 6.000", "nieuw_range" => "4.300 – 12.000"],
        2820 => ["oud_basis" => "2.500", "nieuw_basis" => "2.500", "oud_range" => "3.500 - 6.000", "nieuw_range" => "2.700 – 4.700"],
        2828 => ["oud_basis" => "2.500", "nieuw_basis" => "250",   "oud_range" => "3.500 - 6.000", "nieuw_range" => "370 – 1.070"],
        2832 => ["oud_basis" => "2.500", "nieuw_basis" => "5.000", "oud_range" => "3.500 - 6.000", "nieuw_range" => "5.500 – 15.500"],
        2823 => ["oud_basis" => "2.500", "nieuw_basis" => "6.000", "oud_range" => "3.500 - 6.000", "nieuw_range" => "6.500 – 10.500"],
        2520 => ["oud_basis" => "2.500", "nieuw_basis" => "2.500", "oud_range" => "3.500 - 6.000", "nieuw_range" => "2.700 – 4.700"],
    ];

    foreach ($updates as $page_id => $u) {
        $raw = $wpdb->get_var($wpdb->prepare(
            "SELECT meta_value FROM {$wpdb->postmeta} WHERE post_id = %d AND meta_key = %s",
            $page_id, "gdlr-core-page-builder"
        ));
        if (!$raw) continue;

        $new_raw = str_replace(
            "Basismodel: Vanaf £" . $u["oud_basis"],
            "Basismodel: Vanaf £" . $u["nieuw_basis"],
            $raw
        );
        // Try different encodings
        $new_raw = str_replace(
            "Basismodel: Vanaf \\u20ac" . $u["oud_basis"],
            "Basismodel: Vanaf \\u20ac" . $u["nieuw_basis"],
            $new_raw
        );

        // Match and replace the actual UTF8 euro sign
        $new_raw = preg_replace(
            "/Basismodel: Vanaf [^0-9]*" . preg_quote($u["oud_basis"], "/") . " \(exclusief installatie\)/",
            "Basismodel: Vanaf €" . $u["nieuw_basis"] . " (exclusief installatie)",
            $new_raw
        );
        $new_raw = preg_replace(
            "/" . preg_quote($u["oud_range"], "/") . "/",
            $u["nieuw_range"],
            $new_raw
        );

        if ($new_raw !== $raw) {
            $wpdb->update(
                $wpdb->postmeta,
                ["meta_value" => $new_raw],
                ["post_id" => $page_id, "meta_key" => "gdlr-core-page-builder"]
            );
            do_action("litespeed_purge_post", $page_id);
            error_log("Updated prices for page $page_id");
        } else {
            error_log("No change for page $page_id");
        }
    }
}, 1);
