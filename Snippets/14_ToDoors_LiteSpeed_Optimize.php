<?php
/**
 * Snippet #14: ToDoors LiteSpeed Optimize
 * Status: inactive
 * Scope: global
 */

add_action('init', function() {
    if (get_option('tdoors_litespeed_done')) return;

    // LiteSpeed Cache options use '_litespeed_cfg' prefix
    $cfg = get_option('litespeed_cfg', []);
    
    if (!is_array($cfg)) {
        error_log('ToDoors: litespeed_cfg not array, skipping');
        update_option('tdoors_litespeed_done', 'skipped');
        return;
    }

    // CSS/JS Minification
    $cfg['optm-css'] = true;           // Minify CSS
    $cfg['optm-css_min'] = true;       // Combine CSS
    $cfg['optm-js'] = true;            // Minify JS
    $cfg['optm-js_min'] = true;        // Combine JS
    $cfg['optm-js_defer'] = true;      // Defer JS loading
    $cfg['optm-js_defer_exc'] = [];    // No exceptions
    
    // Image optimization
    $cfg['optm-qs_rm'] = true;         // Remove query strings
    $cfg['optm-emoji_rm'] = true;      // Remove emoji scripts
    
    // Caching
    $cfg['cache'] = true;
    $cfg['cache-browser'] = true;
    $cfg['cache-browser_ttl'] = 2592000; // 30 days
    $cfg['cache-ttl'] = 604800;          // 7 days for pages
    
    // QUIC.cloud CDN improvements
    $cfg['cdn'] = false; // Keep disabled unless CDN is configured
    
    update_option('litespeed_cfg', $cfg);
    update_option('tdoors_litespeed_done', date('Y-m-d H:i:s'));
    
    // Flush cache after config change
    do_action('litespeed_purge_all');
    
    error_log('ToDoors: LiteSpeed optimization applied');
}, 99);
