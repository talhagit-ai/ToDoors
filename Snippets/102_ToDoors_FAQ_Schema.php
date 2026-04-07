<?php
/**
 * Snippet #102: FAQ Schema Markup (FAQPage)
 * Status: ACTIVE
 * Scope: frontend
 *
 * Voegt FAQPage JSON-LD schema toe op de FAQ's pagina.
 * Laadt de laatste 10 berichten als Question/Answer paren.
 * Zorgt voor rich snippets (uitklapbare vragen) in Google zoekresultaten.
 */

add_action('wp_head', function() {
    if (!is_home()) return;

    $posts = get_posts([
        'post_type'      => 'post',
        'post_status'    => 'publish',
        'posts_per_page' => 10,
        'orderby'        => 'date',
        'order'          => 'DESC',
    ]);

    if (empty($posts)) return;

    $items = [];
    foreach ($posts as $post) {
        $answer = wp_strip_all_tags(get_the_excerpt($post));
        if (!$answer) {
            $answer = wp_strip_all_tags(wp_trim_words(get_post_field('post_content', $post->ID), 50));
        }
        $items[] = [
            '@type'          => 'Question',
            'name'           => get_the_title($post),
            'acceptedAnswer' => [
                '@type' => 'Answer',
                'text'  => $answer,
            ],
        ];
    }

    $schema = [
        '@context'   => 'https://schema.org',
        '@type'      => 'FAQPage',
        'mainEntity' => $items,
    ];

    echo '<script type="application/ld+json">' . "\n";
    echo json_encode($schema, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
    echo "\n" . '</script>' . "\n";
}, 5);
