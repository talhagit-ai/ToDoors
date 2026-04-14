<?php
/**
 * Snippet #134: ToDoors Heartbeat Tempering
 * Status: ACTIVE
 * Scope: global
 *
 * Verlaagt WP Heartbeat frequentie naar 60s en deregistreert op frontend.
 */

// Heartbeat interval verhogen (60 sec ipv 15 sec) overal
add_filter('heartbeat_settings', function($settings) {
    $settings['interval'] = 60;
    return $settings;
});

// Heartbeat compleet uitschakelen op frontend (admin blijft werken)
add_action('init', function() {
    if (!is_admin()) {
        wp_deregister_script('heartbeat');
    }
}, 1);
