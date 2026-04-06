<?php
/**
 * Snippet #52: Remove Stats Counters from Over-Ons
 * Status: ACTIVE
 * Scope: global
 *
 * Verwijdert de "0+" tellersectie van de Over-Ons pagina (ID 1852).
 */

add_action('init', function() {
    if (get_option('tdoors_remove_counters_done')) return;

    $page_id = 1852;
    $data = get_post_meta($page_id, 'gdlr-core-page-builder', true);

    if (!is_array($data)) {
        update_option('tdoors_remove_counters_done', 'failed_no_data');
        return;
    }

    $original_count = count($data);
    $removed = 0;

    // Verwijder secties die counter-elementen bevatten
    foreach ($data as $key => $section) {
        $json = json_encode($section);
        if (
            strpos($json, 'gdlr-core-counter') !== false ||
            strpos($json, 'About Counter') !== false ||
            strpos($json, 'counter-item') !== false ||
            (strpos($json, 'Klanten') !== false && strpos($json, 'Projecten') !== false)
        ) {
            unset($data[$key]);
            $removed++;
        }
    }

    $data = array_values($data);

    update_post_meta($page_id, 'gdlr-core-page-builder', $data);
    do_action('litespeed_purge_post', $page_id);

    update_option('tdoors_remove_counters_done', date('Y-m-d H:i:s'));
    error_log('ToDoors: STAP 3 klaar — ' . $removed . ' tellersectie(s) verwijderd van Over-Ons (was ' . $original_count . ' secties)');
}, 99);
