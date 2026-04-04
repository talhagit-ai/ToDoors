<?php
/**
 * Snippet #49: snippet_49
 * Status: ACTIVE
 * Scope: global
 */

add_action('init', function() {
    if (get_option('tdoors_onderhoud_fix_done')) return;

    $data = get_post_meta(157, 'gdlr-core-page-builder', true);
    if (!is_array($data)) return;

    $updated = false;
    array_walk_recursive($data, function(&$val) use (&$updated) {
        if (!is_string($val)) return;

        // Basic+ Contract: 1x per jaar onderhoud
        if (strpos($val, '2x per jaar inspectie') !== false && strpos($val, '10% korting') !== false) {
            $val = str_replace('2x per jaar inspectie', '1x per jaar onderhoud', $val);
            $updated = true;
        }

        // Basic+ 2x: 2x per jaar onderhoud
        if (strpos($val, '4x per jaar inspectie') !== false) {
            $val = str_replace('4x per jaar inspectie', '2x per jaar onderhoud', $val);
            $updated = true;
        }
    });

    if ($updated) {
        update_post_meta(157, 'gdlr-core-page-builder', $data);
        clean_post_cache(157);
        do_action('litespeed_purge_post', 157);
    }

    update_option('tdoors_onderhoud_fix_done', 1);
}, 20);
