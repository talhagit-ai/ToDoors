<?php
/**
 * Snippet ID: 147
 * Name: SEO_02_Article_Schema_Blog
 * Active: True
 * Saved: 15 april 2026
 */

/**
 * SEO_02: Article JSON-LD schema voor alle blogposts in /nieuws/
 * Levert rich snippets in Google SERP voor 857+ posts.
 */

add_action('wp_head', function() {
    if (!is_singular('post')) return;

    global $post;

    $title = get_the_title();
    $excerpt = get_the_excerpt();
    if (!$excerpt) {
        $excerpt = wp_trim_words(strip_tags($post->post_content), 30);
    }

    $image = get_the_post_thumbnail_url($post->ID, 'large');
    if (!$image) {
        $image = 'https://www.todoors.nl/wp-content/uploads/2024/10/IMG_7175-scaled.jpeg';
    }

    $schema = [
        '@context' => 'https://schema.org',
        '@type'    => 'Article',
        'headline' => $title,
        'description' => $excerpt,
        'image'    => [
            '@type'  => 'ImageObject',
            'url'    => $image,
            'width'  => 1200,
            'height' => 675
        ],
        'datePublished' => get_the_date('c'),
        'dateModified'  => get_the_modified_date('c'),
        'author' => [
            '@type' => 'Organization',
            'name'  => 'ToDoors',
            'url'   => 'https://www.todoors.nl/over-ons/'
        ],
        'publisher' => [
            '@type' => 'Organization',
            'name'  => 'ToDoors',
            'logo'  => [
                '@type'  => 'ImageObject',
                'url'    => 'https://www.todoors.nl/wp-content/uploads/2021/09/logo-dark.png',
                'width'  => 300,
                'height' => 80
            ]
        ],
        'mainEntityOfPage' => [
            '@type' => 'WebPage',
            '@id'   => get_permalink($post->ID)
        ],
        'inLanguage' => 'nl-NL'
    ];

    echo "\n" . '<script type="application/ld+json">' . wp_json_encode($schema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) . '</script>' . "\n";
}, 5);