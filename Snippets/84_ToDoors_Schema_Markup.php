<?php
/**
 * Snippet #84: Schema Markup – LocalBusiness JSON-LD
 * Status: ACTIVE
 * Scope: frontend
 *
 * Voegt LocalBusiness schema toe aan alle pagina's via JSON-LD in de <head>.
 * Helpt Google het bedrijf correct te herkennen in zoekresultaten.
 */

add_action('wp_head', function() {
    $schema = [
        '@context'        => 'https://schema.org',
        '@type'           => ['LocalBusiness', 'HomeAndConstructionBusiness'],
        'name'            => 'ToDoors',
        'url'             => 'https://www.todoors.nl',
        'telephone'       => '+31684305663',
        'email'           => 'info@todoors.nl',
        'address'         => [
            '@type'           => 'PostalAddress',
            'streetAddress'   => 'Artemisweg 115I',
            'postalCode'      => '8239 DD',
            'addressLocality' => 'Lelystad',
            'addressCountry'  => 'NL',
        ],
        'areaServed'      => [
            '@type' => 'Country',
            'name'  => 'Nederland',
        ],
        'description'     => 'ToDoors levert en onderhoudt automatische deuren, schuifdeuren en toegangssystemen door heel Nederland. Snelle service, 24/7 bereikbaar.',
        'openingHours'    => ['Mo-Fr 08:00-17:00'],
        'priceRange'      => '€€',
        'logo'            => 'https://www.todoors.nl/wp-content/uploads/2021/09/logo-dark.png',
        'sameAs'          => [
            'https://www.facebook.com/todoors',
        ],
    ];

    echo '<script type="application/ld+json">' . "\n";
    echo wp_json_encode($schema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
    echo "\n" . '</script>' . "\n";
}, 5);
