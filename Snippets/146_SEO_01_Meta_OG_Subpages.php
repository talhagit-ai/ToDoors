<?php
/**
 * Snippet ID: 146
 * Name: SEO_01_Meta_OG_Subpages
 * Active: True
 * Saved: 15 april 2026
 */

/**
 * SEO_01: Meta descriptions + Open Graph tags voor sub-pagina's en /nieuws/
 * Vult gaten die snippet 122 niet afdekt.
 */

add_action('wp_head', function() {
    if (is_admin()) return;

    $page_id = get_queried_object_id();
    $url = home_url($_SERVER['REQUEST_URI']);

    $data = [
        // Sub-pagina's productcategorieen
        15218 => [
            'desc' => 'Automatische enkelvleugelige schuifdeuren van ToDoors. Compacte oplossing voor entrees met beperkte ruimte. Inclusief installatie, EN16005-keuring en onderhoud door heel Nederland.',
            'title' => 'Automatische Enkelvleugelige Schuifdeuren | ToDoors',
            'image' => 'https://www.todoors.nl/wp-content/uploads/2024/10/IMG_7175-scaled.jpeg'
        ],
        15244 => [
            'desc' => 'Automatische dubbelvleugelige schuifdeuren — brede doorgang voor winkels, ziekenhuizen en bedrijfspanden. ToDoors levert, installeert en onderhoudt door heel Nederland.',
            'title' => 'Automatische Dubbelvleugelige Schuifdeuren | ToDoors',
            'image' => 'https://www.todoors.nl/wp-content/uploads/2024/10/IMG_7175-scaled.jpeg'
        ],
        15261 => [
            'desc' => 'Telescopische automatische schuifdeuren van ToDoors. Maximale doorgangsbreedte bij minimale opening — ideaal voor smalle entrees in retail en zorg. Vraag offerte aan.',
            'title' => 'Automatische Telescopische Schuifdeuren | ToDoors',
            'image' => 'https://www.todoors.nl/wp-content/uploads/2024/10/IMG_7175-scaled.jpeg'
        ],
        15280 => [
            'desc' => 'Automatische draaideuren met knikarm-aandrijving van ToDoors. Robuuste oplossing voor bestaande deuren in kantoren en zorginstellingen. Inclusief montage en onderhoud.',
            'title' => 'Automatische Draaideuren Knikarm | ToDoors',
            'image' => 'https://www.todoors.nl/wp-content/uploads/2024/10/IMG_7175-scaled.jpeg'
        ],
        15286 => [
            'desc' => 'Automatische draaideuren met glijarm-aandrijving — strakke uitstraling, betrouwbaar en stil. ToDoors verzorgt installatie, programmering en onderhoud door heel Nederland.',
            'title' => 'Automatische Draaideuren Glijarm | ToDoors',
            'image' => 'https://www.todoors.nl/wp-content/uploads/2024/10/IMG_7175-scaled.jpeg'
        ],
        15295 => [
            'desc' => 'Dubbelvleugelige automatische draaideuren van ToDoors voor brede entrees in bedrijven en zorginstellingen. Synchroon openend, EN16005-conform. Vraag vrijblijvend offerte aan.',
            'title' => 'Dubbelvleugelige Automatische Draaideuren | ToDoors',
            'image' => 'https://www.todoors.nl/wp-content/uploads/2024/10/IMG_7175-scaled.jpeg'
        ],
        18369 => [
            'desc' => 'Draaideurautomaten voor het automatiseren van bestaande draaideuren. ToDoors levert merken als GEZE, Record en Tormax met vakkundige installatie door heel Nederland.',
            'title' => 'Draaideurautomaten | Automatische Draaideuren | ToDoors',
            'image' => 'https://www.todoors.nl/wp-content/uploads/2024/10/IMG_7175-scaled.jpeg'
        ],
        // /nieuws/ overzichtspagina
        2717 => [
            'desc' => 'Nieuws en tips over automatische deuren, schuifdeuren, draaideuren en toegangssystemen. Praktische gidsen voor zorginstellingen, retail en kantoren door ToDoors.',
            'title' => 'Nieuws & Tips Automatische Deuren | ToDoors',
            'image' => 'https://www.todoors.nl/wp-content/uploads/2024/10/IMG_7175-scaled.jpeg'
        ],
        // /faqs/ - alleen canonical (heeft al desc)
        18445 => [
            'image' => 'https://www.todoors.nl/wp-content/uploads/2024/10/IMG_7175-scaled.jpeg'
        ],
        // /automatische-deuren/ overzicht - alleen OG (heeft al desc)
        16248 => [
            'desc' => 'Overzicht van alle automatische deuren bij ToDoors: schuifdeuren, draaideuren, harmonica, deurdrangers en toegangssystemen. EN16005-gecertificeerd, levering door heel Nederland.',
            'title' => 'Automatische Deuren | Schuif, Draai & Toegang | ToDoors',
            'image' => 'https://www.todoors.nl/wp-content/uploads/2024/10/IMG_7175-scaled.jpeg'
        ],
    ];

    if (!isset($data[$page_id])) return;
    $d = $data[$page_id];

    // Meta description (alleen toevoegen als nog niet aanwezig in <head>)
    if (isset($d['desc'])) {
        echo '<meta name="description" content="' . esc_attr($d['desc']) . '">' . "\n";
    }

    // Open Graph tags
    if (isset($d['title'])) {
        echo '<meta property="og:type" content="website">' . "\n";
        echo '<meta property="og:site_name" content="ToDoors">' . "\n";
        echo '<meta property="og:url" content="' . esc_url($url) . '">' . "\n";
        echo '<meta property="og:title" content="' . esc_attr($d['title']) . '">' . "\n";
        if (isset($d['desc'])) {
            echo '<meta property="og:description" content="' . esc_attr($d['desc']) . '">' . "\n";
        }
        echo '<meta property="og:image" content="' . esc_url($d['image']) . '">' . "\n";
        echo '<meta property="og:locale" content="nl_NL">' . "\n";
    }

    // Canonical fallback voor /faqs/
    if ($page_id === 18445) {
        echo '<link rel="canonical" href="' . esc_url(get_permalink($page_id)) . '">' . "\n";
    }
}, 2);