<?php
/**
 * Snippet #133: ToDoors WordPress Bloat Killer
 * Status: ACTIVE
 * Scope: global
 *
 * Verwijdert overbodige WordPress core assets: emoji-script, jQuery Migrate, Dashicons frontend, wp-embed, generator/RSD/wlwmanifest meta tags.
 */

// WP head opruimen
remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('wp_print_styles', 'print_emoji_styles');
remove_action('admin_print_scripts', 'print_emoji_detection_script');
remove_action('admin_print_styles', 'print_emoji_styles');
remove_filter('the_content_feed', 'wp_staticize_emoji');
remove_filter('comment_text_rss', 'wp_staticize_emoji');
remove_filter('wp_mail', 'wp_staticize_emoji_for_email');

remove_action('wp_head', 'wp_generator');
remove_action('wp_head', 'rsd_link');
remove_action('wp_head', 'wlwmanifest_link');
remove_action('wp_head', 'wp_shortlink_wp_head');
remove_action('wp_head', 'feed_links_extra', 3);

// jQuery Migrate alleen in admin
add_filter('wp_default_scripts', function($scripts) {
    if (is_admin()) return $scripts;
    if (isset($scripts->registered['jquery'])) {
        $jquery_dependencies = $scripts->registered['jquery']->deps;
        $scripts->registered['jquery']->deps = array_diff($jquery_dependencies, array('jquery-migrate'));
    }
    return $scripts;
});

// Dashicons alleen voor ingelogde users
add_action('wp_print_styles', function() {
    if (!is_user_logged_in()) {
        wp_dequeue_style('dashicons');
        wp_deregister_style('dashicons');
    }
}, 100);

// wp-embed weg op frontend
add_action('wp_enqueue_scripts', function() {
    wp_deregister_script('wp-embed');
}, 100);
