<?php
/**
 * Snippet #29: ToDoors Benefits Layout Fix
 * Status: ACTIVE
 * Scope: global
 */

add_action("wp_head", function() {
    global $post;
    
    if (!$post || !in_array($post->ID, [2804, 2820])) return;
    
    ?>
    <style>
    /* Fix voordelen 4-column grid - zorgt voor juiste 2x2 layout */
    .gdlr-core-pbf-column.gdlr-core-column-25 {
        float: left !important;
        width: 25% !important;
        box-sizing: border-box;
    }
    
    /* Override the "first" column class that breaks the row */
    .gdlr-core-pbf-column.gdlr-core-column-25.gdlr-core-column-first {
        clear: none !important;
    }
    
    /* Ensure equal height cards in the voordelen section */
    .gdlr-core-pbf-column.gdlr-core-column-25 .gdlr-core-column-service-item {
        height: 100%;
        display: flex;
        flex-direction: column;
    }
    
    /* Mobile: 2 columns */
    @media (max-width: 768px) {
        .gdlr-core-pbf-column.gdlr-core-column-25 {
            width: 50% !important;
        }
    }
    
    /* Extra small: 1 column */
    @media (max-width: 480px) {
        .gdlr-core-pbf-column.gdlr-core-column-25 {
            width: 100% !important;
        }
    }
    </style>
    <?php
});
