<?php
// Snippet ID: 189
// Name: SEO_13_Review_Schema_Case
// Active: True


// SEO_13_Review_Schema_Case — Review schema op case-pagina's + FAQPage op certificeringen
add_action('wp_head', function() {
    $pid = get_the_ID();

    // --- Review schema per case ---
    $cases = [
        18538 => [
            'author'      => 'Bedrijfsleider HvO Meat',
            'reviewBody'  => 'ToDoors heeft de installatie in één weekend uitgevoerd zonder enige verstoring van onze productie. De deuren werken vlekkeloos en voldoen aan al onze HACCP-eisen.',
            'ratingValue' => 5,
            'itemName'    => 'Automatische deuren installatie – HvO Meat',
        ],
        18539 => [
            'author'      => 'Eigenaar Voordeelfiets',
            'reviewBody'  => 'Klanten reageren positief en de winkel voelt meteen professioneler. De installatie was razendsnel en het team van ToDoors werkte netjes en efficient.',
            'ratingValue' => 5,
            'itemName'    => 'Automatische schuifdeuren – Voordeelfiets',
        ],
        18540 => [
            'author'      => 'Mark Butterman',
            'reviewBody'  => 'We zochten één partij die alles kon leveren: de deuren, de toegangscontrole en de software. ToDoors heeft dit perfect uitgevoerd — van advies tot oplevering.',
            'ratingValue' => 5,
            'itemName'    => 'Automatische deuren + toegangscontrole – Butterman Groep',
        ],
    ];

    if (isset($cases[$pid])) {
        $c = $cases[$pid];
        $schema = [
            '@context'    => 'https://schema.org',
            '@type'       => 'Review',
            'itemReviewed' => [
                '@type' => 'Service',
                'name'  => $c['itemName'],
                'provider' => [
                    '@type' => 'LocalBusiness',
                    'name'  => 'ToDoors',
                    'url'   => 'https://www.todoors.nl',
                ],
            ],
            'author'      => ['@type' => 'Person', 'name' => $c['author']],
            'reviewBody'  => $c['reviewBody'],
            'reviewRating' => [
                '@type'       => 'Rating',
                'ratingValue' => $c['ratingValue'],
                'bestRating'  => 5,
            ],
        ];
        echo '<script type="application/ld+json">' . json_encode($schema, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES) . '</script>' . "\n";
    }

    // --- FAQPage schema op certificeringen pagina ---
    if ($pid === 18541) {
        $faq = [
            '@context'   => 'https://schema.org',
            '@type'      => 'FAQPage',
            'mainEntity' => [
                [
                    '@type'          => 'Question',
                    'name'           => 'Is een EN16005-keuring wettelijk verplicht?',
                    'acceptedAnswer' => ['@type' => 'Answer', 'text' => 'Ja, voor aangedreven deuren in publiek toegankelijke ruimtes is de EN 16005 in Nederland de geldende veiligheidsnorm. Bij een incident zonder geldig certificaat kunt u als gebouweigenaar aansprakelijk gesteld worden. ToDoors levert bij elke installatie een keuringsrapport mee.'],
                ],
                [
                    '@type'          => 'Question',
                    'name'           => 'Hoe vaak moet een automatische deur gekeurd worden?',
                    'acceptedAnswer' => ['@type' => 'Answer', 'text' => 'De aanbeveling is jaarlijks. Bij een onderhoudscontract van ToDoors is de jaarlijkse inspectie en hercertificering inbegrepen. U ontvangt na elke keuring een actueel rapport.'],
                ],
                [
                    '@type'          => 'Question',
                    'name'           => 'Kan ToDoors ook bestaande deuren van andere leveranciers keuren?',
                    'acceptedAnswer' => ['@type' => 'Answer', 'text' => 'Ja. ToDoors voert keuringen uit conform EN 16005 ongeacht het merk of de leverancier. Neem contact op voor een inspectieafspraak.'],
                ],
            ],
        ];
        echo '<script type="application/ld+json">' . json_encode($faq, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES) . '</script>' . "\n";
    }
}, 5);
