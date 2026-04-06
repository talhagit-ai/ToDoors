<?php
/**
 * Snippet #92: LCP Hero Image Preload
 * Status: ACTIVE
 * Scope: frontend
 *
 * Voegt <link rel="preload"> toe voor de hero achtergrondafbeelding
 * zodat de browser hem direct laadt zonder te wachten op JavaScript.
 * Verbetert de LCP (Largest Contentful Paint) score.
 */

add_action('wp_head', function() {
    // Homepage hero achtergrond
    if (is_front_page()) {
        echo '<link rel="preload" as="image" href="https://www.todoors.nl/wp-content/uploads/2023/10/Site-background.jpeg" fetchpriority="high">' . "\n";
    }

    // Service pagina hero
    if (is_page(157)) {
        echo '<link rel="preload" as="image" href="https://www.todoors.nl/wp-content/uploads/2016/09/service-11.jpg" fetchpriority="high">' . "\n";
    }

    // Over Ons pagina hero
    if (is_page(1852)) {
        echo '<link rel="preload" as="image" href="https://www.todoors.nl/wp-content/uploads/2023/10/Over-ons-e1718125153379.jpeg" fetchpriority="high">' . "\n";
    }
}, 1);
