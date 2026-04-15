<?php
/**
 * Snippet ID: 162
 * Name: SEO_12_Location_Schema
 * Active: True
 * Saved: 15 april 2026
 */


/**
 * SEO_12_Location_Schema - Service + LocalBusiness schema for location pages
 * Target: page IDs 18476-18483 (city landing pages)
 */
add_action('wp_head', function() {
    if (!is_page()) return;

    $location_data = [
        18476 => [
            'city'    => 'Almere',
            'area'    => ['Almere', 'Almere Stad', 'Almere Buiten', 'Almere Haven', 'Flevoland'],
            'lat'     => 52.3702,
            'lon'     => 5.2190,
            'geo_rad' => '25000',
        ],
        18477 => [
            'city'    => 'Amsterdam',
            'area'    => ['Amsterdam', 'Amsterdam-Noord', 'Amsterdam-West', 'Zuidas', 'Diemen', 'Amstelveen'],
            'lat'     => 52.3676,
            'lon'     => 4.9041,
            'geo_rad' => '15000',
        ],
        18478 => [
            'city'    => 'Utrecht',
            'area'    => ['Utrecht', 'Nieuwegein', 'Houten', 'Zeist', 'De Bilt', 'Bunnik'],
            'lat'     => 52.0907,
            'lon'     => 5.1214,
            'geo_rad' => '20000',
        ],
        18479 => [
            'city'    => 'Zwolle',
            'area'    => ['Zwolle', 'Kampen', 'Hattem', 'Dalfsen', 'Raalte'],
            'lat'     => 52.5168,
            'lon'     => 6.0830,
            'geo_rad' => '25000',
        ],
        18480 => [
            'city'    => 'Harderwijk',
            'area'    => ['Harderwijk', 'Ermelo', 'Putten', 'Nunspeet', 'Zeewolde'],
            'lat'     => 52.3429,
            'lon'     => 5.6189,
            'geo_rad' => '20000',
        ],
        18481 => [
            'city'    => 'Hilversum',
            'area'    => ['Hilversum', 'Bussum', 'Naarden', 'Huizen', 'Blaricum', 'Laren'],
            'lat'     => 52.2291,
            'lon'     => 5.1669,
            'geo_rad' => '15000',
        ],
        18482 => [
            'city'    => 'Zeewolde',
            'area'    => ['Zeewolde', 'Harderwijk', 'Ermelo', 'Flevoland'],
            'lat'     => 52.3298,
            'lon'     => 5.5419,
            'geo_rad' => '20000',
        ],
        18483 => [
            'city'    => 'Dronten',
            'area'    => ['Dronten', 'Biddinghuizen', 'Swifterbant', 'Lelystad', 'Flevoland'],
            'lat'     => 52.5241,
            'lon'     => 5.7179,
            'geo_rad' => '20000',
        ],
    ];

    $page_id = get_the_ID();
    if (!isset($location_data[$page_id])) return;

    $d    = $location_data[$page_id];
    $city = $d['city'];
    $url  = get_permalink($page_id);

    $schemas = [
        [
            '@context'    => 'https://schema.org',
            '@type'       => 'Service',
            'name'        => "Automatische Deuren {$city}",
            'description' => "ToDoors levert en installeert automatische schuifdeuren, draaideuren en toegangssystemen in {$city} en omgeving. EN16005 gecertificeerd, snel en professioneel.",
            'provider'    => [
                '@type'  => 'LocalBusiness',
                'name'   => 'ToDoors',
                'url'    => 'https://www.todoors.nl/',
                'telephone' => '+31684305663',
                'address' => [
                    '@type'           => 'PostalAddress',
                    'streetAddress'   => 'Artemisweg 115I',
                    'addressLocality' => 'Lelystad',
                    'postalCode'      => '8239 DD',
                    'addressCountry'  => 'NL',
                ],
            ],
            'areaServed'  => array_map(fn($a) => ['@type' => 'City', 'name' => $a], $d['area']),
            'serviceType' => 'Automatische deuren installatie en onderhoud',
            'url'         => $url,
            'offers'      => [
                '@type'         => 'Offer',
                'priceCurrency' => 'EUR',
                'availability'  => 'https://schema.org/InStock',
                'description'   => 'Op maat offerte - gratis locatiebezoek',
            ],
        ],
        [
            '@context' => 'https://schema.org',
            '@type'    => 'LocalBusiness',
            'name'     => "ToDoors – Automatische Deuren {$city}",
            'url'      => 'https://www.todoors.nl/',
            'telephone' => '+31684305663',
            'email'    => 'info@todoors.nl',
            'address'  => [
                '@type'           => 'PostalAddress',
                'streetAddress'   => 'Artemisweg 115I',
                'addressLocality' => 'Lelystad',
                'postalCode'      => '8239 DD',
                'addressCountry'  => 'NL',
            ],
            'geo' => [
                '@type'     => 'GeoCoordinates',
                'latitude'  => $d['lat'],
                'longitude' => $d['lon'],
            ],
            'areaServed' => $d['area'],
            'priceRange' => '€€',
            'openingHoursSpecification' => [
                [
                    '@type'     => 'OpeningHoursSpecification',
                    'dayOfWeek' => ['Monday','Tuesday','Wednesday','Thursday','Friday'],
                    'opens'     => '08:00',
                    'closes'    => '17:30',
                ]
            ],
        ],
    ];

    foreach ($schemas as $schema) {
        echo '<script type="application/ld+json">' . wp_json_encode($schema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) . '</script>' . "\n";
    }
}, 15);

