<?php
/**
 * Snippet #93: Google Maps alleen op contactpagina laden
 * Status: ACTIVE
 * Scope: frontend
 *
 * De WP Google Map plugin laadt de Maps API op elke pagina.
 * Dit snippet verwijdert het Maps script via output buffer
 * op alle pagina's behalve /contact/ (ID 1964).
 */

add_action('template_redirect', function() {
    if (is_page(1964)) return;

    ob_start(function($buffer) {
        // Verwijder Google Maps API script tag
        $buffer = preg_replace(
            '/<script[^>]*id="wpgmp-google-api-js"[^>]*><\/script>/',
            '',
            $buffer
        );
        // Verwijder dns-prefetch voor maps.google.com
        $buffer = str_replace(
            "<link rel='dns-prefetch' href='//maps.google.com' />",
            '',
            $buffer
        );
        return $buffer;
    });
}, 1);
