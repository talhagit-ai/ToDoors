<?php
/**
 * Snippet #88: Remove Prijzen & Offerte Section from Elektronische Toegang
 * Status: ACTIVE
 * Scope: frontend
 *
 * Verwijdert de "Prijzen & Offerte" sectie van pagina 2520.
 * Gebruikt output buffer — raakt geen serialized data aan.
 */

add_action('template_redirect', function() {
    ob_start(function($buffer) {
        global $post;
        if (!$post || $post->ID != 2520) return $buffer;

        // Verwijder alles van de Prijzen wrapper tot aan de footer
        $buffer = preg_replace(
            '/<div class="gdlr-core-pbf-wrapper[^"]*"\s+style="padding: 70px[^>]*>.*?(Prijzen[^\w]|Prijzen &amp;).*?(?=<footer>)/s',
            '',
            $buffer
        );

        return $buffer;
    });
}, 1);
