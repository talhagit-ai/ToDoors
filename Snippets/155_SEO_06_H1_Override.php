<?php
/**
 * Snippet ID: 155
 * Name: SEO_06_H1_Override
 * Active: True
 * Saved: 15 april 2026
 */

/**
 * SEO_06: H1 + Title overrides voor /service/, /over-ons/, /nieuws/
 * Vervangt generieke titels door keyword-rijke versies via output buffer.
 */

add_action('template_redirect', function() {
    if (is_admin()) return;

    $replacements = [];

    if (is_page(157)) {
        // Service pagina
        $replacements = [
            ['Service', 'Service & Onderhoud Automatische Deuren'],
        ];
    } elseif (is_page(1852)) {
        // Over Ons pagina
        $replacements = [
            ['Over ons', 'Over Ons'],
        ];
    } elseif (is_page(2717)) {
        // Nieuws pagina
        $replacements = [
            ['Nieuws', 'Nieuws & Tips Automatische Deuren'],
        ];
    }

    if (empty($replacements)) return;

    ob_start(function($html) use ($replacements) {
        foreach ($replacements as $pair) {
            // H1 met realfactory-page-title class
            $html = preg_replace(
                '/(<h1[^>]*realfactory-page-title[^>]*>)' . preg_quote($pair[0], '/') . '(<\/h1>)/i',
                '$1' . $pair[1] . '$2',
                $html
            );
            // Generic h1 (fallback)
            $html = preg_replace(
                '/(<h1[^>]*class="[^"]*page-title[^"]*"[^>]*>)' . preg_quote($pair[0], '/') . '(<\/h1>)/i',
                '$1' . $pair[1] . '$2',
                $html
            );
        }
        return $html;
    });
});