<?php
/**
 * Snippet #85: Add Lelystad/Flevoland to Main Copy
 * Status: ACTIVE
 * Scope: frontend
 *
 * Voegt Lelystad en Flevoland toe aan de leesbare tekst voor lokale SEO.
 * Gebruikt output buffer — raakt geen serialized data aan.
 */

add_action('template_redirect', function() {
    ob_start(function($buffer) {

        // Homepage: intro paragraph (UTF-8)
        $buffer = str_replace(
            "voor alle gebouwen, van woningen tot commerci\xc3\xable ruimtes.",
            "voor alle gebouwen, van woningen tot commerci\xc3\xable ruimtes. Vanuit Lelystad, Flevoland, bedienen wij klanten door heel Nederland.",
            $buffer
        );

        // Over Ons: expertise paragraph
        $buffer = str_replace(
            'ToDoors is een vooraanstaande leverancier van hoogwaardige automatische deuren en toegangscontroles.',
            'ToDoors is een vooraanstaande leverancier van hoogwaardige automatische deuren en toegangscontroles, gevestigd in Lelystad (Flevoland).',
            $buffer
        );

        return $buffer;
    });
}, 1);
