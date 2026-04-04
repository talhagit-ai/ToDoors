<?php
/**
 * Snippet #48: snippet_48
 * Status: ACTIVE
 * Scope: global
 */

add_action('wp_head', function() {
    ?>
    <style>
    /* Verberg pijl-indicator bij Automatische Schuifdeuren en Draaideuren in hamburgermenu */
    .menu-item-2855 > a::after,
    .menu-item-2854 > a::after,
    .menu-item-2855 > a::before,
    .menu-item-2854 > a::before,
    .menu-item-2855 .sf-sub-indicator,
    .menu-item-2854 .sf-sub-indicator,
    .menu-item-2855 > a > span.sf-sub-indicator,
    .menu-item-2854 > a > span.sf-sub-indicator {
        display: none !important;
        content: none !important;
    }
    </style>
    <?php
});
