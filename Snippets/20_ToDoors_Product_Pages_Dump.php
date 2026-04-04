<?php
/**
 * Snippet #20: ToDoors Product Pages Dump
 * Status: ACTIVE
 * Scope: global
 */

add_action("init", function() {
    if (get_option("tdoors_product_dump_done")) return;
    
    $pages = [2804 => "schuifdeuren", 2820 => "draaideuren", 2828 => "deurdrangers"];
    $result = [];
    foreach ($pages as $id => $name) {
        $data = get_post_meta($id, "gdlr-core-page-builder", true);
        $sections = is_array($data) ? count($data) : 0;
        $result[$name] = ["id" => $id, "sections" => $sections, "json" => json_encode($data)];
    }
    
    update_option("tdoors_product_dump", wp_json_encode($result), false);
    update_option("tdoors_product_dump_done", 1);
    error_log("ToDoors: Product pages dumped");
}, 99);