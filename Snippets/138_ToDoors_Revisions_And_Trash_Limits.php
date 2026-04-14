<?php
/**
 * Snippet #138: ToDoors Revisions and Trash Limits
 * Status: ACTIVE
 * Scope: global
 *
 * Beperkt post revisions tot 3, trash bewaartijd tot 7 dagen, autosave interval naar 120s.
 */

// Maximaal 3 revisies per post bewaren
add_filter('wp_revisions_to_keep', function($num, $post) {
    return 3;
}, 10, 2);

// Trash automatisch leegmaken na 7 dagen (was 30)
if (!defined('EMPTY_TRASH_DAYS')) {
    define('EMPTY_TRASH_DAYS', 7);
}

// Autosave interval naar 120 seconden (was 60)
if (!defined('AUTOSAVE_INTERVAL')) {
    define('AUTOSAVE_INTERVAL', 120);
}
