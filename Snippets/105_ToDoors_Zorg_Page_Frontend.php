<?php
/**
 * Snippet #105: Zorg Pagina Frontend (Hero + SEO + Schema)
 * Status: ACTIVE
 * Scope: frontend
 *
 * Voegt hero sectie, meta description en schema markup toe
 * aan de pagina /automatische-deuren-zorg/.
 */

// === Hero sectie injectie ===
add_action('template_redirect', function() {
    $zorg_id = get_option('tdoors_zorg_page_id');
    if (!$zorg_id || !is_page($zorg_id)) return;

    ob_start(function($buffer) use ($zorg_id) {

        $hero = '
<div class="gdlr-core-pbf-wrapper" id="tdh-zorg" style="padding:0; margin:0;">
<style>
#tdh-zorg{position:relative;width:100%;min-height:420px;background-color:#1a3040;background-image:url(https://www.todoors.nl/wp-content/uploads/2026/04/zorg-hero-vrolijke-mensen.jpg);background-size:cover;background-position:center center;overflow:hidden;}
#tdh-zorg::before{content:"";position:absolute;top:0;left:0;right:0;bottom:0;background:rgba(10,20,28,0.58);z-index:1;}
#tdh-zorg .tz-wrap{position:relative;z-index:2;max-width:1180px;margin:0 auto;padding:100px 30px 80px;}
#tdh-zorg .tz-cap{font-family:Roboto,sans-serif;font-size:18px;font-weight:400;color:rgba(255,255,255,0.7);letter-spacing:2px;text-transform:uppercase;margin-bottom:10px;}
#tdh-zorg .tz-t1{font-family:Roboto,sans-serif;font-size:48px;font-weight:700;color:#ffcc00;line-height:1.15;margin-bottom:20px;}
#tdh-zorg .tz-t2{font-family:Roboto,sans-serif;font-size:18px;font-weight:400;color:rgba(255,255,255,0.9);line-height:1.6;max-width:650px;margin-bottom:30px;}
#tdh-zorg .tz-btn{display:inline-block;padding:17px 34px;background:rgba(248,193,44,1);color:#0a0a0a;font-family:Roboto,sans-serif;font-size:14px;font-weight:600;text-decoration:none;border-radius:3px;line-height:17px;}
#tdh-zorg .tz-btn:hover{background:#f7cc56;}
@media(max-width:768px){
#tdh-zorg .tz-wrap{padding:70px 20px 60px;}
#tdh-zorg .tz-t1{font-size:32px;}
#tdh-zorg .tz-t2{font-size:16px;}
}
</style>
<div class="tz-wrap">
<div class="tz-cap">Specialist in</div>
<h1 class="tz-t1">Automatische Deuren<br>voor Zorginstellingen</h1>
<p class="tz-t2">ToDoors levert, installeert en onderhoudt automatische deuren voor verpleeghuizen, ziekenhuizen, huisartsenpraktijken en revalidatiecentra door heel Nederland.</p>
<a href="https://www.todoors.nl/contact/" class="tz-btn">Vraag offerte aan</a>
</div>
</div>';

        $buffer = str_replace(
            '<div class="gdlr-core-page-builder-body clearfix">',
            '<div class="gdlr-core-page-builder-body clearfix">' . $hero,
            $buffer
        );

        return $buffer;
    });
}, 1);

// === Meta description ===
add_action('wp_head', function() {
    $zorg_id = get_option('tdoors_zorg_page_id');
    if (!$zorg_id) return;
    global $post;
    if (!$post || $post->ID != $zorg_id) return;

    echo '<meta name="description" content="Automatische deuren voor ziekenhuizen, verpleeghuizen en zorginstellingen. EN16005 gecertificeerd. 24/7 storingsdienst. Vraag een vrijblijvende offerte aan bij ToDoors.">' . "\n";
}, 1);

// === Open Graph tags ===
add_action('wp_head', function() {
    $zorg_id = get_option('tdoors_zorg_page_id');
    if (!$zorg_id) return;
    global $post;
    if (!$post || $post->ID != $zorg_id) return;

    echo '<meta property="og:type" content="article">' . "\n";
    echo '<meta property="og:title" content="Automatische Deuren voor Zorginstellingen - ToDoors">' . "\n";
    echo '<meta property="og:description" content="Automatische deuren voor ziekenhuizen, verpleeghuizen en zorginstellingen. EN16005 gecertificeerd. 24/7 storingsdienst.">' . "\n";
    echo '<meta property="og:url" content="https://www.todoors.nl/automatische-deuren-zorg/">' . "\n";
    echo '<meta property="og:site_name" content="ToDoors">' . "\n";
    echo '<meta property="og:locale" content="nl_NL">' . "\n";
}, 2);

// === FAQPage Schema ===
add_action('wp_head', function() {
    $zorg_id = get_option('tdoors_zorg_page_id');
    if (!$zorg_id) return;
    global $post;
    if (!$post || $post->ID != $zorg_id) return;

    $faq = [
        '@context' => 'https://schema.org',
        '@type' => 'FAQPage',
        'mainEntity' => [
            [
                '@type' => 'Question',
                'name' => 'Zijn automatische deuren verplicht in een zorginstelling?',
                'acceptedAnswer' => [
                    '@type' => 'Answer',
                    'text' => 'Voor publiek toegankelijke zorginstellingen geldt NEN 1814, die toegankelijkheid verplicht stelt. In de praktijk betekent dit dat automatische deuren bij hoofd- en afdelingsingangen sterk aanbevolen en vaak verplicht zijn.'
                ]
            ],
            [
                '@type' => 'Question',
                'name' => 'Kunnen bestaande deuren worden geautomatiseerd?',
                'acceptedAnswer' => [
                    '@type' => 'Answer',
                    'text' => 'Ja. In veel gevallen is het mogelijk om bestaande draai- of schuifdeuren te automatiseren zonder grote bouwkundige aanpassingen. Dit is kostenefficienter dan een volledig nieuwe deur.'
                ]
            ],
            [
                '@type' => 'Question',
                'name' => 'Hoe lang duurt de installatie?',
                'acceptedAnswer' => [
                    '@type' => 'Answer',
                    'text' => 'Een standaard automatische schuifdeur wordt in een dag geinstalleerd. Wij plannen de installatie zo dat er minimale hinder is voor patienten en personeel.'
                ]
            ],
            [
                '@type' => 'Question',
                'name' => 'Wat als de stroom uitvalt?',
                'acceptedAnswer' => [
                    '@type' => 'Answer',
                    'text' => 'Alle automatische deuren die ToDoors levert, hebben een noodstroombatterij of manuele noodopening. Zelfs bij stroomuitval kunt u de deur altijd openen.'
                ]
            ]
        ]
    ];

    echo '<script type="application/ld+json">' . wp_json_encode($faq, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT) . '</script>' . "\n";
}, 5);

// === Page alignment CSS ===
add_action('wp_head', function() {
    $zorg_id = get_option('tdoors_zorg_page_id');
    if (!$zorg_id) return;
    global $post;
    if (!$post || $post->ID != $zorg_id) return;
    ?>
<style>
/* Verberg standaard paginatitel header */
body.page-id-<?php echo (int) $zorg_id; ?> .realfactory-page-title-wrap { display: none !important; }
/* Sectie 3 – 4 deurtype-kaarten: altijd gecentreerd gestapeld */
body.page-id-<?php echo (int) $zorg_id; ?> .gdlr-core-column-25 {
    float: none !important;
    clear: none !important;
    width: 100% !important;
    max-width: 620px !important;
    margin-left: auto !important;
    margin-right: auto !important;
    display: block !important;
    box-sizing: border-box !important;
}
/* Binnenste padding resetten zodat content écht gecentreerd zit */
body.page-id-<?php echo (int) $zorg_id; ?> .gdlr-core-column-25 .gdlr-core-pbf-column-content-margin,
body.page-id-<?php echo (int) $zorg_id; ?> .gdlr-core-column-25 .gdlr-core-pbf-column-content {
    padding-left: 0 !important;
    padding-right: 0 !important;
}
/* Zorg dat alles binnen de kaart gecentreerd staat */
body.page-id-<?php echo (int) $zorg_id; ?> .gdlr-core-column-25 .gdlr-core-column-service-item {
    text-align: center !important;
}
body.page-id-<?php echo (int) $zorg_id; ?> .gdlr-core-column-service-content p {
    margin-bottom: 0;
}
/* Waarom ToDoors titels iets lichter maken */
body.page-id-<?php echo (int) $zorg_id; ?> .gdlr-core-column-50 .gdlr-core-column-service-title {
    color: #d8d8d8 !important;
}
</style>
    <?php
}, 3);

// === Service Schema ===
add_action('wp_head', function() {
    $zorg_id = get_option('tdoors_zorg_page_id');
    if (!$zorg_id) return;
    global $post;
    if (!$post || $post->ID != $zorg_id) return;

    $service = [
        '@context' => 'https://schema.org',
        '@type' => 'Service',
        'name' => 'Automatische Deuren voor Zorginstellingen',
        'description' => 'Levering, installatie en onderhoud van automatische deuren voor ziekenhuizen, verpleeghuizen en zorginstellingen door heel Nederland.',
        'provider' => [
            '@type' => 'LocalBusiness',
            'name' => 'ToDoors',
            'telephone' => '+31684305663',
            'address' => [
                '@type' => 'PostalAddress',
                'streetAddress' => 'Artemisweg 115I',
                'addressLocality' => 'Lelystad',
                'postalCode' => '8239 DD',
                'addressCountry' => 'NL'
            ]
        ],
        'areaServed' => [
            '@type' => 'Country',
            'name' => 'Nederland'
        ],
        'serviceType' => 'Installatie en onderhoud automatische deuren',
        'audience' => [
            '@type' => 'Audience',
            'audienceType' => 'Zorginstellingen'
        ]
    ];

    echo '<script type="application/ld+json">' . wp_json_encode($service, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT) . '</script>' . "\n";
}, 5);
