<?php
/**
 * Snippet ID: 149
 * Name: SEO_03_Service_Schema_Products
 * Active: True
 * Saved: 15 april 2026
 */

/**
 * SEO_03: Service JSON-LD schema voor alle productpagina's
 * Beschrijft elke product/service met provider, areaServed en serviceType.
 */

add_action('wp_head', function() {
    if (!is_page()) return;

    $page_id = get_queried_object_id();

    $services = [
        2804 => ['name' => 'Automatische Schuifdeuren', 'serviceType' => 'Levering en installatie automatische schuifdeuren', 'description' => 'Enkelvleugelige, dubbelvleugelige en telescopische automatische schuifdeuren voor bedrijven, retail en zorginstellingen. Inclusief montage, EN16005-keuring en onderhoud.'],
        2820 => ['name' => 'Automatische Draaideuren', 'serviceType' => 'Levering en installatie automatische draaideuren', 'description' => 'Glijarm en knikarm draaideuren, enkelvleugelig of dubbelvleugelig. Voor kantoren, ziekenhuizen en zorginstellingen door heel Nederland.'],
        2828 => ['name' => 'Deurdrangers', 'serviceType' => 'Levering en montage deurdrangers', 'description' => 'Glijarm en knikarm deurdrangers conform geldende veiligheids- en toegankelijkheidsnormen. Voor commercieel en zakelijk gebruik.'],
        2832 => ['name' => 'Harmonica Deuren', 'serviceType' => 'Levering harmonica deuren', 'description' => 'Op maat gemaakte harmonica deuren in aluminium of staal. Ruimtebesparend voor industrie, retail en bedrijfspanden.'],
        2823 => ['name' => 'Guillotine Ramen', 'serviceType' => 'Levering guillotine ramen', 'description' => 'Elektrische of handmatig bedienbare guillotine ramen op maat voor loketten en doorgeefluiken. Voor kantoren, ziekenhuizen en instellingen.'],
        2520 => ['name' => 'Elektronische Toegangssystemen', 'serviceType' => 'Levering en installatie toegangscontrole', 'description' => 'Tag-readers, kaartlezers, biometrie en RFID toegangscontrole voor kantoren, magazijnen en zorginstellingen.'],
        15218 => ['name' => 'Automatische Enkelvleugelige Schuifdeuren', 'serviceType' => 'Levering enkelvleugelige schuifdeuren', 'description' => 'Compacte schuifdeur voor entrees met beperkte ruimte. Inclusief installatie en onderhoud.'],
        15244 => ['name' => 'Automatische Dubbelvleugelige Schuifdeuren', 'serviceType' => 'Levering dubbelvleugelige schuifdeuren', 'description' => 'Brede doorgang voor winkels, ziekenhuizen en bedrijfspanden.'],
        15261 => ['name' => 'Automatische Telescopische Schuifdeuren', 'serviceType' => 'Levering telescopische schuifdeuren', 'description' => 'Maximale doorgangsbreedte bij minimale opening, ideaal voor smalle entrees.'],
        15280 => ['name' => 'Automatische Draaideuren Knikarm', 'serviceType' => 'Levering draaideuren knikarm', 'description' => 'Robuuste knikarm-aandrijving voor bestaande deuren in kantoren en zorginstellingen.'],
        15286 => ['name' => 'Automatische Draaideuren Glijarm', 'serviceType' => 'Levering draaideuren glijarm', 'description' => 'Strakke uitstraling, betrouwbaar en stil. Voor moderne entrees.'],
        15295 => ['name' => 'Dubbelvleugelige Automatische Draaideuren', 'serviceType' => 'Levering dubbelvleugelige draaideuren', 'description' => 'Synchroon openende draaideuren voor brede entrees, EN16005-conform.'],
        18369 => ['name' => 'Draaideurautomaten', 'serviceType' => 'Levering draaideurautomaten', 'description' => 'Aandrijvingen voor het automatiseren van bestaande draaideuren. GEZE, Record en Tormax.'],
    ];

    if (!isset($services[$page_id])) return;
    $s = $services[$page_id];

    $schema = [
        '@context' => 'https://schema.org',
        '@type' => 'Service',
        'name' => $s['name'],
        'serviceType' => $s['serviceType'],
        'description' => $s['description'],
        'provider' => [
            '@type' => 'LocalBusiness',
            'name' => 'ToDoors',
            'url' => 'https://www.todoors.nl',
            'telephone' => '+31684305663',
            'address' => [
                '@type' => 'PostalAddress',
                'streetAddress' => 'Artemisweg 115I',
                'postalCode' => '8239 DD',
                'addressLocality' => 'Lelystad',
                'addressCountry' => 'NL'
            ]
        ],
        'areaServed' => [
            '@type' => 'Country',
            'name' => 'Netherlands'
        ],
        'url' => get_permalink($page_id)
    ];

    echo "\n" . '<script type="application/ld+json">' . wp_json_encode($schema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) . '</script>' . "\n";
}, 6);