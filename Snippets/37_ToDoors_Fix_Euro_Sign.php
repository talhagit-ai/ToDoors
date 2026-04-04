<?php
/**
 * Snippet #37: ToDoors Fix Euro Sign
 * Status: inactive
 * Scope: single-use
 */

add_action("init", function() {
    global $wpdb;
    $fixes = [
        2804 => ["oud" => "€4.300 – 12.000",   "nieuw" => "€4.300 – €12.000"],
        2820 => ["oud" => "€2.700 – 4.700",     "nieuw" => "€2.700 – €4.700"],
        2828 => ["oud" => "€370 – 1.070",       "nieuw" => "€370 – €1.070"],
        2832 => ["oud" => "€5.500 – 15.500",    "nieuw" => "€5.500 – €15.500"],
        2823 => ["oud" => "€6.500 – 10.500",    "nieuw" => "€6.500 – €10.500"],
        2520 => ["oud" => "€2.700 – 4.700",     "nieuw" => "€2.700 – €4.700"],
    ];
    foreach ($fixes as $page_id => $f) {
        $raw = $wpdb->get_var($wpdb->prepare("SELECT meta_value FROM {$wpdb->postmeta} WHERE post_id=%d AND meta_key=%s", $page_id, "gdlr-core-page-builder"));
        if (!$raw) continue;
        $new_raw = str_replace($f["oud"], $f["nieuw"], $raw);
        if ($new_raw !== $raw) {
            $wpdb->update($wpdb->postmeta, ["meta_value" => $new_raw], ["post_id" => $page_id, "meta_key" => "gdlr-core-page-builder"]);
            do_action("litespeed_purge_post", $page_id);
        }
    }
}, 1);
