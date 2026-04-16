<?php
// Snippet ID: 192
// Name: SEO_22_Meta_Cases_Cert


// SEO_22_Meta_Cases_Cert — Direct meta injectie voor cases + certificeringen pagina's
add_action('wp_head', function() {
    $pid = get_the_ID();
    $metas = [
        18537 => ['Cases – Projecten van ToDoors | Automatische Deuren',
                  'Bekijk hoe ToDoors bedrijven helpt met automatische deuren: cases bij HvO Meat, Voordeelfiets en Butterman Groep. Van industrie tot retail.'],
        18538 => ['HvO Meat: automatische deuren in vleesverwerking | ToDoors',
                  'ToDoors installeerde 4 hygiënische snel-loop deuren bij HvO Meat in één weekend — zonder productiestop. EN16005 gecertificeerd, HACCP-conform.'],
        18539 => ['Voordeelfiets: automatische schuifdeuren retail | ToDoors',
                  'ToDoors plaatste automatische schuifdeuren bij Voordeelfiets — klantvriendelijker, energiezuiniger en geïnstalleerd in één dag. Lees de case.'],
        18540 => ['Butterman Groep: deuren + toegangscontrole kantoor | ToDoors',
                  'ToDoors leverde 6 automatische deuren met RFID-toegangscontrole voor Butterman Groep — turnkey oplevering, één aanspreekpunt.'],
        18541 => ['Certificeringen ToDoors – EN16005, NEN3140 &amp; VCA',
                  'ToDoors is gecertificeerd conform EN16005, NEN3140 en VCA. Lees wat onze certificeringen betekenen voor uw project en uw aansprakelijkheid.'],
    ];
    if (!isset($metas[$pid])) return;
    [$title, $desc] = $metas[$pid];
    $url = get_permalink($pid);
    echo '<meta name="description" content="' . esc_attr($desc) . '">' . "\n";
    echo '<meta property="og:title" content="' . esc_attr($title) . '">' . "\n";
    echo '<meta property="og:description" content="' . esc_attr($desc) . '">' . "\n";
    echo '<meta property="og:url" content="' . esc_url($url) . '">' . "\n";
    echo '<meta property="og:type" content="website">' . "\n";
    echo '<link rel="canonical" href="' . esc_url($url) . '">' . "\n";
}, 5);
