<?php
/**
 * Snippet #131: ToDoors RevSlider Global Disable
 * Status: ACTIVE
 * Scope: global
 *
 * Deregistreert alle RevSlider scripts en styles globaal. Homepage gebruikt al statische hero (snippet 109). Bespaart ~150KB JS/CSS.
 */

add_action('wp_enqueue_scripts', function() {
    wp_dequeue_style('rs-plugin-settings');
    wp_deregister_style('rs-plugin-settings');
    wp_dequeue_style('revolution-icons');
    wp_deregister_style('revolution-icons');
    wp_dequeue_script('tp-tools');
    wp_deregister_script('tp-tools');
    wp_dequeue_script('revmin');
    wp_deregister_script('revmin');
    wp_dequeue_script('revolution');
    wp_deregister_script('revolution');
    wp_dequeue_script('extensions_revolution');
    wp_deregister_script('extensions_revolution');
}, 100);

add_action('template_redirect', function() {
    ob_start(function($buf) {
        $buf = preg_replace("/<style[^>]*id=['\"]rs6-[^'\"]*['\"][^>]*>.*?<\/style>/is", '', $buf);
        return $buf;
    });
});
