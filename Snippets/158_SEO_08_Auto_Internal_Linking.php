<?php
/**
 * Snippet ID: 158
 * Name: SEO_08_Auto_Internal_Linking
 * Active: True
 * Saved: 15 april 2026
 */

/**
 * SEO_08: Auto-internal linking
 * Linkt keywords in blogpost content automatisch naar pillar/product pagina's.
 * Max 1 link per keyword per post om over-optimization te voorkomen.
 */

add_filter('the_content', function($content) {
    if (!is_singular('post')) return $content;
    if (is_admin() || is_feed()) return $content;

    $links = [
        // Phrase => target URL
        'automatische deuren'         => 'https://www.todoors.nl/automatische-deuren/',
        'kosten automatische deur'     => 'https://www.todoors.nl/prijzen-automatische-deuren/',
        'prijs automatische deur'      => 'https://www.todoors.nl/prijzen-automatische-deuren/',
        'automatische deuren prijs'    => 'https://www.todoors.nl/prijzen-automatische-deuren/',
        'automatische schuifdeuren' => 'https://www.todoors.nl/automatische-schuifdeuren/',
        'automatische schuifdeur'   => 'https://www.todoors.nl/automatische-schuifdeuren/',
        'automatische draaideuren'  => 'https://www.todoors.nl/automatische-draaideuren/',
        'automatische draaideur'    => 'https://www.todoors.nl/automatische-draaideuren/',
        'deurdrangers'              => 'https://www.todoors.nl/deurdrangers/',
        'deurdranger'               => 'https://www.todoors.nl/deurdrangers/',
        'harmonica deuren'          => 'https://www.todoors.nl/harmonica-deuren/',
        'guillotine ramen'          => 'https://www.todoors.nl/guillotine-ramen/',
        'toegangscontrole'          => 'https://www.todoors.nl/elektronische-toegang/',
        'toegangssysteem'           => 'https://www.todoors.nl/elektronische-toegang/',
        'toegangssystemen'          => 'https://www.todoors.nl/elektronische-toegang/',
        'service en onderhoud'      => 'https://www.todoors.nl/service/',
        'onderhoudscontract'        => 'https://www.todoors.nl/service/',
        'EN16005'                   => 'https://www.todoors.nl/service/',
        'NEN3140'                   => 'https://www.todoors.nl/service/',
    ];

    // Trek de huidige permalink eruit zodat we niet naar onszelf linken
    $current_url = get_permalink();

    $linked_phrases = [];

    foreach ($links as $phrase => $url) {
        if ($url === $current_url) continue;
        if (count($linked_phrases) >= 4) break; // max 4 internal links per post

        // Lookbehind/ahead: vermijd matching binnen <a>, <h>, <script>, <style>, attribuut-waarden
        $pattern = '/(?<!["\'>=])\b(' . preg_quote($phrase, '/') . ')\b(?![^<]*<\/(?:a|h[1-6]|script|style)>)(?![^<>]*>)/i';

        // Vervang alleen eerste match (count=1)
        $count = 0;
        $content = preg_replace_callback($pattern, function($m) use ($url, &$count) {
            if ($count > 0) return $m[0];
            $count++;
            return '<a href="' . esc_url($url) . '" class="seo-internal-link">' . $m[1] . '</a>';
        }, $content, 1);

        if ($count > 0) {
            $linked_phrases[] = $phrase;
        }
    }

    return $content;
}, 20);