<?php
// Snippet ID: 191
// Name: SEO_21_Person_Organization_Schema
// Active: True


// SEO_21_Person_Organization_Schema — Person + Organization schema op /over-ons/
add_action('wp_head', function() {
    if (!is_page(1852)) return;

    $schema = [
        '@context' => 'https://schema.org',
        '@graph'   => [
            [
                '@type'       => 'Organization',
                '@id'         => 'https://www.todoors.nl/#organization',
                'name'        => 'ToDoors',
                'url'         => 'https://www.todoors.nl',
                'logo'        => 'https://www.todoors.nl/wp-content/uploads/logo-todoors.png',
                'telephone'   => '+31684305663',
                'email'       => 'info@todoors.nl',
                'address'     => [
                    '@type'           => 'PostalAddress',
                    'streetAddress'   => 'Artemisweg 115I',
                    'addressLocality' => 'Lelystad',
                    'postalCode'      => '8239 DD',
                    'addressCountry'  => 'NL',
                ],
                'areaServed'  => 'NL',
                'hasCredential' => [
                    ['@type' => 'EducationalOccupationalCredential', 'name' => 'EN 16005 certificering'],
                    ['@type' => 'EducationalOccupationalCredential', 'name' => 'NEN 3140 certificering'],
                    ['@type' => 'EducationalOccupationalCredential', 'name' => 'VCA certificering'],
                ],
            ],
            [
                '@type'       => 'Person',
                '@id'         => 'https://www.todoors.nl/#founder',
                'name'        => 'Oprichter ToDoors',
                'jobTitle'    => 'Eigenaar & specialist automatische deuren',
                'worksFor'    => ['@id' => 'https://www.todoors.nl/#organization'],
                'knowsAbout'  => ['Automatische deuren', 'EN16005', 'NEN3140', 'Toegangscontrole', 'Deurinstallatie'],
                // sameAs LinkedIn wordt later toegevoegd door eigenaar
            ],
        ],
    ];

    echo '<script type="application/ld+json">' . json_encode($schema, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT) . '</script>' . "\n";
}, 5);
