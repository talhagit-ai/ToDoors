<?php
/**
 * Snippet #50: Remove Dead 404 Pages & Nav Links
 * Status: ACTIVE
 * Scope: global
 *
 * Verwijdert /diensten, /faq, /blog nav-items en pagina's.
 * Laat /projecten ongemoeid.
 */

add_action('init', function() {
    if (get_option('tdoors_remove_dead_pages_done')) return;

    $slugs_to_remove = ['diensten', 'faq', 'blog'];

    // 1. Verplaats WordPress-pagina's met deze slugs naar de prullenbak
    foreach ($slugs_to_remove as $slug) {
        $page = get_page_by_path($slug, OBJECT, 'page');
        if ($page) {
            wp_trash_post($page->ID);
            error_log('ToDoors: Pagina naar prullenbak verplaatst: ' . $slug . ' (ID: ' . $page->ID . ')');
        }
    }

    // 2. Verwijder nav-menu-items die naar deze URLs linken (menu ID 45)
    $menu_items = wp_get_nav_menu_items(45, ['update_post_term_cache' => false]);
    if (is_array($menu_items)) {
        foreach ($menu_items as $item) {
            $path = rtrim(parse_url($item->url, PHP_URL_PATH), '/');
            $paths_to_remove = ['/diensten', '/faq', '/blog'];
            if (in_array($path, $paths_to_remove, true)) {
                wp_delete_post($item->ID, true);
                error_log('ToDoors: Nav-menu-item verwijderd: ' . $item->url);
            }
        }
    }

    // 3. Cache leegmaken
    do_action('litespeed_purge_all');

    update_option('tdoors_remove_dead_pages_done', date('Y-m-d H:i:s'));
    error_log('ToDoors: STAP 1 klaar — dode 404-pagina\'s en nav-items verwijderd');
}, 99);
