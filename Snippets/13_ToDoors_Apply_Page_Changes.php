<?php
/**
 * Snippet #13: ToDoors Apply Page Changes
 * Status: inactive
 * Scope: global
 */

add_action('init', function() {
    if (get_option('tdoors_changes_applied')) return;

    $dump = get_option('tdoors_page_dump', '');
    if (!$dump) return;

    $dump_data = json_decode($dump, true);
    if (!$dump_data || !isset($dump_data['mods'])) return;

    $mods = json_decode($dump_data['mods'], true);
    if (!$mods) return;

    // === SERVICE PAGE: Add pakketten section ===
    $service_id = $mods['service_page_id'];
    $service_data = get_post_meta($service_id, 'gdlr-core-page-builder', true);
    if (is_array($service_data)) {
        $service_data[] = $mods['service_new_section'];
        update_post_meta($service_id, 'gdlr-core-page-builder', $service_data);
        do_action('litespeed_purge_post', $service_id);
    }

    // === SCHUIFDEUREN PAGE: Add specs section ===
    $schuif_id = $mods['schuifdeuren_page_id'];
    $schuif_data = get_post_meta($schuif_id, 'gdlr-core-page-builder', true);
    if (is_array($schuif_data)) {
        $schuif_data[] = $mods['schuifdeuren_specs_section'];
        update_post_meta($schuif_id, 'gdlr-core-page-builder', $schuif_data);
        do_action('litespeed_purge_post', $schuif_id);
    }

    // === OVER ONS PAGE: Add testimonials section ===
    $overons_id = $mods['over_ons_page_id'];
    $overons_data = get_post_meta($overons_id, 'gdlr-core-page-builder', true);
    if (is_array($overons_data)) {
        $overons_data[] = $mods['over_ons_testimonials_section'];
        update_post_meta($overons_id, 'gdlr-core-page-builder', $overons_data);
        do_action('litespeed_purge_post', $overons_id);
    }

    update_option('tdoors_changes_applied', date('Y-m-d H:i:s'));
    error_log('ToDoors: All page changes applied successfully');
}, 99);
