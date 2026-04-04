<?php
/**
 * Snippet #9: ToDoors Site Fixes
 * Status: inactive
 * Scope: global
 */

add_action('init', function() {
    if (get_option('tdoors_fixes_done')) return;

    // Fix 1: Contact page - KLIK HIER button
    $contact_raw = get_post_meta(1964, 'gdlr-core-page-builder', true);
    $contact_data = maybe_unserialize($contact_raw);

    function tdoors_recursive_replace(&$data, $search, $replace) {
        if (is_array($data)) {
            foreach ($data as $key => &$val) {
                tdoors_recursive_replace($val, $search, $replace);
            }
        } elseif (is_string($data) && strpos($data, $search) !== false) {
            $data = str_replace($search, $replace, $data);
        }
    }

    tdoors_recursive_replace($contact_data, 'KLIK HIER', 'Vraag offerte aan');
    update_post_meta(1964, 'gdlr-core-page-builder', $contact_data);
    do_action('litespeed_purge_post', 1964);

    update_option('tdoors_fixes_done', 1);
    error_log('ToDoors: fixes applied successfully');
}, 99);
