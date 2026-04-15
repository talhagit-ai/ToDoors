<?php
/**
 * Snippet ID: 165
 * Name: SEO_14_Location_Meta_Direct
 * Active: True
 * Saved: 15 april 2026
 */


/**
 * SEO_14_Location_Meta_Direct - Direct meta/OG injection for location pages
 * Does NOT rely on Yoast filters - outputs directly to wp_head
 */

$location_seo = [
    16248 => [
        'title'    => 'Automatische Deuren | Typen, Kosten & Installatie | ToDoors',
        'desc'     => 'Alles over automatische deuren: typen, kosten, EN16005 norm, NEN3140 keuring en leverancierskeuze. Specialist in Lelystad en heel Nederland.',
        'url'      => 'https://www.todoors.nl/automatische-deuren/',
        'og_image' => 'https://www.todoors.nl/wp-content/uploads/2024/10/IMG_7175-scaled.jpeg',
    ],
    18504 => [
        'title'    => 'Automatische Deuren Kosten 2026 | Prijzengids | ToDoors',
        'desc'     => 'Wat kost een automatische deur in 2026? Schuifdeuren €3.500-€7.000, draaideuren €4.000-€8.000. Eerlijk prijsoverzicht incl. installatie en onderhoud.',
        'url'      => 'https://www.todoors.nl/prijzen-automatische-deuren/',
        'og_image' => 'https://www.todoors.nl/wp-content/uploads/2024/10/IMG_7175-scaled.jpeg',
    ],
    18476 => [
        'title'    => 'Automatische Deuren Almere | Levering & Installatie | ToDoors',
        'desc'     => 'Automatische schuif- en draaideuren in Almere? ToDoors installeert snel en vakkundig. EN16005 gecertificeerd. Bel +31 6 84 30 56 63 voor een gratis offerte.',
        'url'      => 'https://www.todoors.nl/automatische-deuren-almere/',
        'og_image' => 'https://www.todoors.nl/wp-content/uploads/2024/10/IMG_7175-scaled.jpeg',
    ],
    18477 => [
        'title'    => 'Automatische Deuren Amsterdam | Levering & Installatie | ToDoors',
        'desc'     => 'Automatische deuren in Amsterdam laten installeren? ToDoors levert schuif- en draaideuren voor hotels, kantoren en zorg. Bel voor een gratis offerte.',
        'url'      => 'https://www.todoors.nl/automatische-deuren-amsterdam/',
        'og_image' => 'https://www.todoors.nl/wp-content/uploads/2024/10/IMG_7175-scaled.jpeg',
    ],
    18478 => [
        'title'    => 'Automatische Deuren Utrecht | Levering & Installatie | ToDoors',
        'desc'     => 'Automatische deuren in Utrecht? ToDoors installeert schuif- en draaideuren voor zorginstellingen, kantoren en retail. EN16005 gecertificeerd. Vraag gratis offerte.',
        'url'      => 'https://www.todoors.nl/automatische-deuren-utrecht/',
        'og_image' => 'https://www.todoors.nl/wp-content/uploads/2024/10/IMG_7175-scaled.jpeg',
    ],
    18479 => [
        'title'    => 'Automatische Deuren Zwolle | Levering & Installatie | ToDoors',
        'desc'     => 'Automatische deuren in Zwolle? ToDoors levert en installeert schuif- en draaideuren voor logistiek, zorg en retail. Bel +31 6 84 30 56 63.',
        'url'      => 'https://www.todoors.nl/automatische-deuren-zwolle/',
        'og_image' => 'https://www.todoors.nl/wp-content/uploads/2024/10/IMG_7175-scaled.jpeg',
    ],
    18480 => [
        'title'    => 'Automatische Deuren Harderwijk | Levering & Installatie | ToDoors',
        'desc'     => 'Automatische deuren in Harderwijk? ToDoors installeert schuif- en draaideuren voor winkeliers, zorg en bedrijven. Gratis offerte – EN16005 gecertificeerd.',
        'url'      => 'https://www.todoors.nl/automatische-deuren-harderwijk/',
        'og_image' => 'https://www.todoors.nl/wp-content/uploads/2024/10/IMG_7175-scaled.jpeg',
    ],
    18481 => [
        'title'    => 'Automatische Deuren Hilversum | Levering & Installatie | ToDoors',
        'desc'     => 'Automatische deuren in Hilversum? ToDoors levert representatieve schuif- en draaideuren voor media, kantoren en horeca. Bel voor een gratis offerte.',
        'url'      => 'https://www.todoors.nl/automatische-deuren-hilversum/',
        'og_image' => 'https://www.todoors.nl/wp-content/uploads/2024/10/IMG_7175-scaled.jpeg',
    ],
    18482 => [
        'title'    => 'Automatische Deuren Zeewolde | Levering & Installatie | ToDoors',
        'desc'     => 'Automatische deuren in Zeewolde? Als lokale Flevolandse specialist is ToDoors razendsnel ter plaatse. EN16005 gecertificeerd. Gratis offerte aanvragen.',
        'url'      => 'https://www.todoors.nl/automatische-deuren-zeewolde/',
        'og_image' => 'https://www.todoors.nl/wp-content/uploads/2024/10/IMG_7175-scaled.jpeg',
    ],
    18483 => [
        'title'    => 'Automatische Deuren Dronten | Levering & Installatie | ToDoors',
        'desc'     => 'Automatische deuren in Dronten? ToDoors is uw lokale specialist – binnen 20 minuten ter plaatse. Gratis offerte voor schuifdeuren, draaideuren en onderhoud.',
        'url'      => 'https://www.todoors.nl/automatische-deuren-dronten/',
        'og_image' => 'https://www.todoors.nl/wp-content/uploads/2024/10/IMG_7175-scaled.jpeg',
    ],
];

add_action('wp_head', function() use ($location_seo) {
    if (!is_page()) return;
    $pid = get_the_ID();
    if (!isset($location_seo[$pid])) return;

    $s   = $location_seo[$pid];
    $desc = esc_attr($s['desc']);
    $title = esc_attr($s['title']);
    $url   = esc_url($s['url']);
    $img   = esc_url($s['og_image']);

    // Meta description
    echo '<meta name="description" content="' . $desc . '" />' . "\n";
    // Canonical
    echo '<link rel="canonical" href="' . $url . '" />' . "\n";
    // Open Graph
    echo '<meta property="og:type" content="website" />' . "\n";
    echo '<meta property="og:title" content="' . $title . '" />' . "\n";
    echo '<meta property="og:description" content="' . $desc . '" />' . "\n";
    echo '<meta property="og:url" content="' . $url . '" />' . "\n";
    echo '<meta property="og:image" content="' . $img . '" />' . "\n";
    echo '<meta property="og:site_name" content="ToDoors" />' . "\n";
    // Twitter
    echo '<meta name="twitter:card" content="summary_large_image" />' . "\n";
    echo '<meta name="twitter:title" content="' . $title . '" />' . "\n";
    echo '<meta name="twitter:description" content="' . $desc . '" />' . "\n";
}, 5); // priority 5 = before Yoast (priority 1-10)

// Also override title tag
add_filter('pre_get_document_title', function($title) use ($location_seo) {
    if (!is_page()) return $title;
    $pid = get_the_ID();
    if (isset($location_seo[$pid])) {
        return $location_seo[$pid]['title'];
    }
    return $title;
}, 20);

// Blog post meta description via Yoast filter
add_filter('wpseo_metadesc', function($metadesc) {
    if (!empty($metadesc)) return $metadesc;
    if (!is_singular('post')) return $metadesc;
    $post = get_queried_object();
    if (!$post) return $metadesc;
    if (!empty($post->post_excerpt)) {
        $text = wp_strip_all_tags($post->post_excerpt);
    } else {
        $content = wp_strip_all_tags(do_shortcode($post->post_content));
        $content = preg_replace('/\s+/', ' ', $content);
        $text = trim(substr($content, 0, 500));
    }
    if (empty($text)) return $metadesc;
    if (strlen($text) > 155) {
        $text = substr($text, 0, 152);
        $last = strrpos($text, ' ');
        if ($last) $text = substr($text, 0, $last);
        $text .= '...';
    }
    return $text;
}, 10, 1);
