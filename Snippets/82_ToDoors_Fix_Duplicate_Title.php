<?php
/**
 * Snippet #82: Fix Duplicate Title Tag
 * Status: ACTIVE
 * Scope: frontend
 *
 * Het RealFactory thema en Yoast SEO produceren elk een <title> tag.
 * Dit snippet verwijdert de eerste (thema) en behoudt alleen de Yoast versie.
 */

add_action('template_redirect', function() {
    ob_start(function($buffer) {
        // Zoek alle <title> tags
        preg_match_all('/<title>[^<]*<\/title>/i', $buffer, $matches);
        if (count($matches[0]) <= 1) {
            return $buffer; // Niets te doen
        }
        // Verwijder alle title tags behalve de laatste (Yoast)
        $total = count($matches[0]);
        $count = 0;
        $buffer = preg_replace_callback('/<title>[^<]*<\/title>/i', function($m) use (&$count, $total) {
            $count++;
            return ($count < $total) ? '' : $m[0];
        }, $buffer);
        return $buffer;
    });
}, 1);
