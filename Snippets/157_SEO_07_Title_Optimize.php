<?php
/**
 * Snippet ID: 157
 * Name: SEO_07_Title_Optimize
 * Active: True
 * Saved: 15 april 2026
 */

/**
 * SEO_07: Title tag optimalisatie voor pagina's met generieke titel
 * Format: [Keyword] | Lelystad & heel NL | ToDoors (max 60 chars waar mogelijk)
 */

add_filter('pre_get_document_title', function($title) {
    if (is_admin()) return $title;

    $page_id = get_queried_object_id();

    $titles = [
        2039 => 'Automatische Deuren | Levering & Installatie | ToDoors',
        157  => 'Service & Onderhoud Automatische Deuren | ToDoors',
        1852 => 'Over ToDoors – Specialist Automatische Deuren Lelystad',
        1964 => 'Contact ToDoors | Automatische Deuren Lelystad',
        2717 => 'Nieuws & Tips Automatische Deuren | ToDoors',
        2804 => 'Automatische Schuifdeuren | Levering NL | ToDoors',
        2820 => 'Automatische Draaideuren | Levering NL | ToDoors',
        2828 => 'Deurdrangers | Levering & Montage | ToDoors',
        2832 => 'Harmonica Deuren op Maat | ToDoors',
        2823 => 'Guillotine Ramen voor Loketten | ToDoors',
        2520 => 'Elektronische Toegang & Toegangscontrole | ToDoors',
        16248 => 'Automatische Deuren – Schuif, Draai & Toegang | ToDoors',
        15218 => 'Automatische Enkelvleugelige Schuifdeuren | ToDoors',
        15244 => 'Automatische Dubbelvleugelige Schuifdeuren | ToDoors',
        15261 => 'Telescopische Automatische Schuifdeuren | ToDoors',
        15280 => 'Automatische Draaideuren Knikarm | ToDoors',
        15286 => 'Automatische Draaideuren Glijarm | ToDoors',
        15295 => 'Dubbelvleugelige Automatische Draaideuren | ToDoors',
        18369 => 'Draaideurautomaten | GEZE, Record, Tormax | ToDoors',
        18445 => 'FAQ Automatische Deuren | Veelgestelde Vragen | ToDoors',
    ];

    if (isset($titles[$page_id])) {
        return $titles[$page_id];
    }

    return $title;
}, 99);

// Ook voor blogposts: format met 'ToDoors' aan het eind
add_filter('pre_get_document_title', function($title) {
    if (!is_singular('post')) return $title;

    $post_title = get_the_title();
    // Als titel al ToDoors bevat, niet wijzigen
    if (stripos($post_title, 'todoors') !== false) {
        return $post_title;
    }
    // Anders: 'Post Title | ToDoors'
    return $post_title . ' | ToDoors';
}, 100);