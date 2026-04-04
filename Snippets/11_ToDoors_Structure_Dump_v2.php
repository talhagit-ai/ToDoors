<?php
/**
 * Snippet #11: ToDoors Structure Dump v2
 * Status: inactive
 * Scope: global
 */

add_action('init', function() {
    if (get_option('tdoors_dump_done_v2')) return;

    $pages = [157 => 'service', 1964 => 'contact', 1852 => 'over-ons', 2804 => 'schuifdeuren'];
    $result = [];
    foreach ($pages as $id => $name) {
        $data = get_post_meta($id, 'gdlr-core-page-builder', true);
        // data is already an array
        $sections = is_array($data) ? count($data) : 0;
        $result[$name] = [
            'id' => $id,
            'is_array' => is_array($data),
            'sections' => $sections,
            'json' => json_encode($data)
        ];
    }

    update_option('tdoors_page_dump', wp_json_encode($result), false);
    update_option('tdoors_dump_done_v2', 1);
    error_log('ToDoors: v2 structure dump complete');
}, 99);
