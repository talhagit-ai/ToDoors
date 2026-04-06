<?php
/**
 * Snippet #58: Fix Copyright via Output Buffer
 * Status: ACTIVE
 * Scope: frontend
 *
 * Vervangt "All Right Reserved" door "All Rights Reserved" in de HTML output.
 */

add_action('template_redirect', function() {
    ob_start(function($buffer) {
        return str_replace('All Right Reserved', 'All Rights Reserved', $buffer);
    });
});
