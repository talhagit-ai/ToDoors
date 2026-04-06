<?php
/**
 * Snippet #55: Fix Copy-Paste Fout Glijarm Pagina
 * Status: ACTIVE
 * Scope: global
 *
 * Vervangt "Automatische schuifdeuren" door "Automatische draaideuren met glijarm"
 * in de samenvatting op de Glijarm pagina (ID 15286).
 */

add_action('init', function() {
    if (get_option('tdoors_fix_glijarm_done')) return;

    $page_id = 15286;
    $data = get_post_meta($page_id, 'gdlr-core-page-builder', true);

    if (!is_array($data)) {
        update_option('tdoors_fix_glijarm_done', 'failed_no_data');
        return;
    }

    $updated = false;

    array_walk_recursive($data, function(&$val) use (&$updated) {
        if (!is_string($val)) return;

        // Vervang de copy-paste fout in de samenvatting
        if (strpos($val, 'Automatische schuifdeuren bieden een breed scala') !== false) {
            $val = str_replace(
                'Automatische schuifdeuren bieden een breed scala aan voordelen voor moderne gebouwen.',
                'Automatische draaideuren met glijarm bieden een breed scala aan voordelen voor moderne gebouwen.',
                $val
            );
            $updated = true;
        }

        // Vang ook lowercase variant op
        if (strpos($val, 'automatische schuifdeuren bieden een breed scala') !== false) {
            $val = str_replace(
                'automatische schuifdeuren bieden een breed scala aan voordelen voor moderne gebouwen.',
                'Automatische draaideuren met glijarm bieden een breed scala aan voordelen voor moderne gebouwen.',
                $val
            );
            $updated = true;
        }
    });

    if ($updated) {
        update_post_meta($page_id, 'gdlr-core-page-builder', $data);
        do_action('litespeed_purge_post', $page_id);
    }

    update_option('tdoors_fix_glijarm_done', date('Y-m-d H:i:s'));
    error_log('ToDoors: STAP 5 klaar — Glijarm copy-paste fout gecorrigeerd. Updated: ' . ($updated ? 'ja' : 'niet gevonden in page builder, mogelijk in post_content'));
}, 99);
