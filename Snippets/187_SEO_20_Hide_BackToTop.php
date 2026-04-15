<?php
/**
 * Snippet ID: 187
 * Name: SEO_20_Hide_BackToTop
 * Active: True
 * Saved: 15 april 2026
 */


// Hide RealFactory back-to-top button sitewide
add_action('wp_head', function() {
    echo '<style>#realfactory-footer-back-to-top-button, .realfactory-footer-back-to-top-button { display: none !important; visibility: hidden !important; opacity: 0 !important; pointer-events: none !important; }</style>';
}, 1);
