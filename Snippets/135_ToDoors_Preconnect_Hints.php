<?php
/**
 * Snippet #135: ToDoors Preconnect Hints
 * Status: ACTIVE
 * Scope: global
 *
 * Voegt preconnect en dns-prefetch hints toe voor Google Tag Manager, LeadInfo, Google Analytics.
 */

add_action('wp_head', function() {
    if (is_admin()) return;
    ?>
    <link rel="preconnect" href="https://www.googletagmanager.com" crossorigin>
    <link rel="dns-prefetch" href="https://www.googletagmanager.com">
    <link rel="preconnect" href="https://cdn.leadinfo.net" crossorigin>
    <link rel="dns-prefetch" href="https://cdn.leadinfo.net">
    <link rel="preconnect" href="https://www.google-analytics.com" crossorigin>
    <link rel="dns-prefetch" href="https://www.google-analytics.com">
    <?php
}, 1);
