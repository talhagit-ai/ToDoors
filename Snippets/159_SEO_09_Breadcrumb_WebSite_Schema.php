<?php
/**
 * Snippet ID: 159
 * Name: SEO_09_Breadcrumb_WebSite_Schema
 * Active: True
 * Saved: 15 april 2026
 */

/**
 * SEO_09: BreadcrumbList + WebSite SearchAction schema
 * Levert kruimelpad in SERP en sitelinks search-box voor brand searches.
 */

// WebSite + SearchAction op homepage
add_action('wp_head', function() {
    if (!is_front_page()) return;

    $schema = [
        '@context' => 'https://schema.org',
        '@type'    => 'WebSite',
        'url'      => 'https://www.todoors.nl/',
        'name'     => 'ToDoors',
        'alternateName' => 'ToDoors Automatische Deuren',
        'inLanguage' => 'nl-NL',
        'potentialAction' => [
            '@type'  => 'SearchAction',
            'target' => [
                '@type' => 'EntryPoint',
                'urlTemplate' => 'https://www.todoors.nl/?s={search_term_string}'
            ],
            'query-input' => 'required name=search_term_string'
        ]
    ];

    echo "\n" . '<script type="application/ld+json">' . wp_json_encode($schema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) . '</script>' . "\n";
}, 8);

// BreadcrumbList op alle non-home pagina's
add_action('wp_head', function() {
    if (is_front_page() || is_admin()) return;

    $items = [
        [
            '@type'    => 'ListItem',
            'position' => 1,
            'name'     => 'Home',
            'item'     => 'https://www.todoors.nl/'
        ]
    ];

    $position = 2;

    if (is_singular('post')) {
        $items[] = [
            '@type'    => 'ListItem',
            'position' => $position++,
            'name'     => 'Nieuws',
            'item'     => 'https://www.todoors.nl/nieuws/'
        ];
        $items[] = [
            '@type'    => 'ListItem',
            'position' => $position++,
            'name'     => get_the_title()
        ];
    } elseif (is_page()) {
        $page = get_queried_object();
        // Parent crumbs
        $parents = [];
        $parent_id = $page->post_parent;
        while ($parent_id) {
            $parent = get_post($parent_id);
            if (!$parent) break;
            array_unshift($parents, $parent);
            $parent_id = $parent->post_parent;
        }
        foreach ($parents as $p) {
            $items[] = [
                '@type'    => 'ListItem',
                'position' => $position++,
                'name'     => get_the_title($p->ID),
                'item'     => get_permalink($p->ID)
            ];
        }
        $items[] = [
            '@type'    => 'ListItem',
            'position' => $position++,
            'name'     => get_the_title()
        ];
    } else {
        return;
    }

    $schema = [
        '@context' => 'https://schema.org',
        '@type'    => 'BreadcrumbList',
        'itemListElement' => $items
    ];

    echo "\n" . '<script type="application/ld+json">' . wp_json_encode($schema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) . '</script>' . "\n";
}, 9);