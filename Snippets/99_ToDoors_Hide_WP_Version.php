<?php

/**
 * Snippet #99: Verberg WP versie + Blokkeer XML-RPC
 * Status: ACTIVE
 * Scope: global
 *
 * Verwijdert generator meta tags (WordPress + plugin versies).
 * Verwijdert versienummers uit script/style URLs.
 * Blokkeert XML-RPC volledig (aanvalsvector voor brute-force).
 * Verwijdert pingback link uit head.
 */

// Verwijder WordPress generator meta tag
remove_action('wp_head', 'wp_generator');

// Verwijder Elementor generator meta tag
add_filter('elementor/frontend/the_content', function($content) { return $content; });
add_action('wp_head', function() {
    ob_start(function($buffer) {
        return preg_replace('/<meta name="generator" content="[^"]*"[^>]*>\s*/i', '', $buffer);
    });
}, 0);

// Verwijder versienummers uit script/style URLs
add_filter('style_loader_src', function($src) {
    return $src ? remove_query_arg('ver', $src) : $src;
});
add_filter('script_loader_src', function($src) {
    return $src ? remove_query_arg('ver', $src) : $src;
});

// Verwijder pingback link uit head
remove_action('wp_head', 'rsd_link');
remove_action('wp_head', 'wlwmanifest_link');

// Blokkeer XML-RPC volledig
add_filter('xmlrpc_enabled', '__return_false');

// Blokkeer xmlrpc.php direct (403)
add_action('init', function() {
    if (defined('XMLRPC_REQUEST') && XMLRPC_REQUEST) {
        http_response_code(403);
        exit('Forbidden');
    }
});
// Verwijder pingback link tag uit HTML
add_filter('wp_head', function() {}, 0);
remove_action('wp_head', 'wp_shortlink_wp_head', 10);
add_action('template_redirect', function() {
    ob_start(function($b) {
        return preg_replace('/<link rel=.pingback.[^>]*>\n?/i', '', $b);
    });
}, 1);

