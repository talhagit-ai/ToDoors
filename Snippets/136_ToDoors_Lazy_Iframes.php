<?php
/**
 * Snippet #136: ToDoors Lazy Iframes
 * Status: ACTIVE
 * Scope: global
 *
 * Voegt loading=lazy toe aan alle iframes (Google Maps, YouTube, oEmbeds).
 */

// Lazy load alle iframes in content
add_filter('the_content', function($content) {
    if (is_admin() || is_feed()) return $content;
    return preg_replace('/<iframe(?![^>]*loading=)/i', '<iframe loading="lazy"', $content);
}, 99);

// Lazy load alle oEmbed iframes (YouTube, Vimeo, etc)
add_filter('embed_oembed_html', function($html, $url, $args) {
    if (strpos($html, 'loading=') === false) {
        $html = str_replace('<iframe', '<iframe loading="lazy"', $html);
    }
    return $html;
}, 10, 3);
