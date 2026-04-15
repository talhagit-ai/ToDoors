<?php
/**
 * Snippet ID: 150
 * Name: SEO_04_Review_Aggregate
 * Active: True
 * Saved: 15 april 2026
 */

/**
 * SEO_04: Review + AggregateRating schema
 * Plaatst 3 klantreviews op homepage en /service/ pagina.
 */

add_action('wp_head', function() {
    if (!is_front_page() && !is_page(157)) return;

    $reviews = [
        [
            'author' => 'HvO Meat',
            'reviewBody' => 'ToDoors heeft onze automatische deuren snel en vakkundig geinstalleerd. Service en onderhoud lopen al jaren probleemloos.',
            'rating' => 5
        ],
        [
            'author' => 'Voordeelfiets',
            'reviewBody' => 'Professionele installatie van onze schuifdeuren bij de winkel-entree. Heldere communicatie en goede nazorg.',
            'rating' => 5
        ],
        [
            'author' => 'Mark Butterman',
            'reviewBody' => 'Goede service, snel ter plaatse bij storingen en eerlijke prijzen. Aanrader voor automatische deur-installaties.',
            'rating' => 4
        ]
    ];

    $review_schemas = [];
    $total = 0;
    foreach ($reviews as $r) {
        $review_schemas[] = [
            '@type' => 'Review',
            'author' => ['@type' => 'Person', 'name' => $r['author']],
            'reviewRating' => [
                '@type' => 'Rating',
                'ratingValue' => $r['rating'],
                'bestRating' => 5
            ],
            'reviewBody' => $r['reviewBody']
        ];
        $total += $r['rating'];
    }

    $avg = round($total / count($reviews), 1);

    $schema = [
        '@context' => 'https://schema.org',
        '@type' => 'LocalBusiness',
        '@id' => 'https://www.todoors.nl/#localbusiness',
        'name' => 'ToDoors',
        'url' => 'https://www.todoors.nl',
        'aggregateRating' => [
            '@type' => 'AggregateRating',
            'ratingValue' => (string)$avg,
            'bestRating' => '5',
            'worstRating' => '1',
            'ratingCount' => count($reviews),
            'reviewCount' => count($reviews)
        ],
        'review' => $review_schemas
    ];

    echo "\n" . '<script type="application/ld+json">' . wp_json_encode($schema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) . '</script>' . "\n";
}, 7);