<?php
/**
 * Snippet #51: Remove Full Service Package Permanently
 * Status: ACTIVE
 * Scope: global
 *
 * Verwijdert het "Full Service" pakket definitief uit de HTML
 * van de servicepagina (ID 157) en de JavaScript die het verbergt.
 */

add_action('init', function() {
    if (get_option('tdoors_remove_fullservice_done')) return;

    $page_id = 157;
    $data = get_post_meta($page_id, 'gdlr-core-page-builder', true);

    if (!is_array($data)) {
        update_option('tdoors_remove_fullservice_done', 'failed_no_data');
        return;
    }

    // Verwijder recursief alle elementen/kolommen met "Full Service" in title of content
    function tdoors_remove_full_service_elements(&$items) {
        if (!is_array($items)) return;

        foreach ($items as $key => &$item) {
            if (!is_array($item)) continue;

            // Controleer of dit element "Full Service" bevat in title of content
            $json = json_encode($item);
            if (stripos($json, 'Full Service') !== false) {
                // Als de hele wrapper/kolom over Full Service gaat, verwijder hem
                if (
                    isset($item['template']) &&
                    in_array($item['template'], ['wrapper', 'element'], true)
                ) {
                    unset($items[$key]);
                    continue;
                }
            }

            // Ga dieper in sub-items
            if (isset($item['items'])) {
                tdoors_remove_full_service_elements($item['items']);
                $item['items'] = array_values($item['items']);
            }
        }

        $items = array_values($items);
    }

    tdoors_remove_full_service_elements($data);

    // Verwijder ook de JavaScript hiding code als die als custom_css/js is opgeslagen
    array_walk_recursive($data, function(&$val) {
        if (is_string($val) && stripos($val, 'Full Service') !== false) {
            // Verwijder JS-blokken die Full Service verbergen
            $val = preg_replace(
                '/document\.addEventListener\(["\']DOMContentLoaded["\'].*?Full Service.*?\}\);/s',
                '',
                $val
            );
            // Verwijder ook losse mentions van Full Service in HTML
            $val = preg_replace('/<[^>]*Full Service[^>]*>.*?<\/[^>]+>/si', '', $val);
        }
    });

    update_post_meta($page_id, 'gdlr-core-page-builder', $data);
    do_action('litespeed_purge_post', $page_id);
    do_action('litespeed_purge_all');

    update_option('tdoors_remove_fullservice_done', date('Y-m-d H:i:s'));
    error_log('ToDoors: STAP 2 klaar — Full Service definitief verwijderd uit pagina ' . $page_id);
}, 99);
