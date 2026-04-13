<?php
/**
 * Snippet #104: Maak/update Zorg Landingspagina
 * Status: ACTIVE
 * Scope: global
 *
 * Maakt de pagina /automatische-deuren-zorg/ aan met GDLR Core
 * Page Builder secties. Gebruikt een versie-flag: bump CURRENT_VERSION
 * om de pagina-inhoud opnieuw op te bouwen op een bestaande pagina.
 */

add_action('init', function() {
    $current_version = '6';
    $saved_version = get_option('tdoors_zorg_page_version', '0');
    $existing_id = get_option('tdoors_zorg_page_id');

    // Al aangemaakt én up-to-date? Niets doen.
    if ($existing_id && get_post($existing_id) && $saved_version === $current_version) return;

    // === 1. Pagina aanmaken of hergebruiken ===
    if ($existing_id && get_post($existing_id)) {
        $page_id = $existing_id;
    } else {
        $page_id = wp_insert_post([
            'post_type'    => 'page',
            'post_title'   => 'Automatische Deuren voor Zorg & Ouderenzorg',
            'post_name'    => 'automatische-deuren-zorg',
            'post_content' => '',
            'post_status'  => 'publish',
            'post_author'  => 1,
        ]);

        if (is_wp_error($page_id)) {
            error_log('ToDoors Zorg page creation failed: ' . $page_id->get_error_message());
            return;
        }
    }

    // === 2. Helper functies ===
    $make_wrapper = function($bg_color, $padding_top, $padding_bottom, $items) {
        return [
            'template' => 'wrapper',
            'type' => 'background',
            'value' => [
                'id' => '', 'class' => '', 'privacy' => '',
                'content-layout' => 'boxed',
                'background-type' => 'color',
                'background-color' => $bg_color,
                'background-color-opacity' => '1',
                'enable-space' => 'disable',
                'animation' => 'none',
                'padding' => ['top' => $padding_top, 'right' => '0px', 'bottom' => $padding_bottom, 'left' => '0px', 'settings' => 'unlink'],
                'margin' => ['top' => '0px', 'right' => '0px', 'bottom' => '0px', 'left' => '0px', 'settings' => 'link']
            ],
            'items' => $items
        ];
    };

    $make_title = function($title, $caption = '', $tag = 'h2') {
        return [
            'template' => 'element',
            'type' => 'title',
            'value' => [
                'id' => '', 'class' => '',
                'title' => $title,
                'caption' => $caption,
                'text-align' => 'center',
                'title-font-size' => '33px',
                'title-font-weight' => '800',
                'heading-tag' => $tag
            ]
        ];
    };

    $make_textbox = function($content, $align = 'left') {
        return [
            'template' => 'element',
            'type' => 'text-box',
            'value' => [
                'id' => '', 'class' => '',
                'content' => $content,
                'text-align' => $align
            ]
        ];
    };

    $make_column = function($size, $items, $first = false) {
        $col = [
            'template' => 'wrapper',
            'type' => 'column',
            'column' => (string)$size,
            'value' => ['padding' => ['top' => '0px', 'right' => '30px', 'bottom' => '0px', 'left' => '30px', 'settings' => 'unlink']],
            'items' => $items
        ];
        return $col;
    };

    $make_service_card = function($icon, $title, $content, $link = '/contact/') {
        return [
            'template' => 'element',
            'type' => 'column-service',
            'value' => [
                'media-type' => 'icon',
                'icon' => $icon,
                'title' => $title,
                'content' => $content,
                'read-more-text' => 'Offerte aanvragen',
                'read-more-link' => 'https://www.todoors.nl' . $link,
                'style' => 'center_icon-top',
                'icon-color' => '#B99D7C'
            ]
        ];
    };

    // === 3. Secties bouwen ===
    $sections = [];

    // --- SECTIE 1: Intro + bullet list (wit, 60/40 kolom) ---
    $sections[] = $make_wrapper('#ffffff', '60px', '40px', [
        $make_title('Waarom automatische deuren in de zorg?'),
        $make_column(60, [
            $make_textbox('<div style="font-size:16px; line-height:1.8;">
<p>Zorginstellingen stellen hogere eisen aan deuren dan andere gebouwen. Rolstoelgebruikers, mensen met rollators, verpleegkundigen met bedden of medicatiewagens &mdash; iedereen moet soepel en veilig naar binnen kunnen.</p>
<p>Automatische deuren zijn in de zorg geen luxe, maar een noodzaak. ToDoors levert, installeert en onderhoudt automatische deuren speciaal voor zorginstellingen door heel Nederland. Van verpleeghuizen en ziekenhuizen tot huisartsenpraktijken en revalidatiecentra.</p>
</div>')
        ]),
        $make_column(40, [
            $make_textbox('<ul style="list-style:none; padding:0; margin:0; line-height:2.4; font-size:15px;">
<li><i class="fa fa-check" style="color:#B99D7C; margin-right:10px;"></i>Toegankelijk voor rolstoelen en rollators</li>
<li><i class="fa fa-check" style="color:#B99D7C; margin-right:10px;"></i>Contactloos: beter voor hygi&euml;ne</li>
<li><i class="fa fa-check" style="color:#B99D7C; margin-right:10px;"></i>Veilig conform EN16005</li>
<li><i class="fa fa-check" style="color:#B99D7C; margin-right:10px;"></i>Energiezuinig door snelle sluiting</li>
<li><i class="fa fa-check" style="color:#B99D7C; margin-right:10px;"></i>24/7 storingsdienst beschikbaar</li>
</ul>')
        ])
    ]);

    // --- SECTIE 2: 3 USP cards (lichtgrijs) ---
    $sections[] = $make_wrapper('#f7f7f7', '70px', '70px', [
        $make_title('Voordelen voor zorginstellingen', 'Waarom automatische deuren onmisbaar zijn'),
        $make_column(33, [
            $make_service_card('fa fa-wheelchair', 'Toegankelijkheid',
                '<p>Een automatische deur opent zonder fysieke inspanning. Essentieel voor rolstoelgebruikers, pati&euml;nten met rollators en verpleegkundigen die bedden verrijden. Verplicht conform NEN 1814.</p>')
        ]),
        $make_column(33, [
            $make_service_card('fa fa-shield', 'Hygi&euml;ne',
                '<p>Automatische deuren worden niet aangeraakt. Minder contactmomenten betekent minder verspreiding van bacteri&euml;n en virussen. Cruciaal bij operatiekamers, IC-afdelingen en isolatiekamers.</p>')
        ]),
        $make_column(33, [
            $make_service_card('fa fa-check-circle', 'Veiligheid',
                '<p>Alle automatische deuren die ToDoors installeert voldoen aan EN16005. De deur slaat nooit onverwacht dicht en biedt altijd een veilige doorgang voor pati&euml;nten en personeel.</p>')
        ])
    ]);

    // --- SECTIE 3: 4 Deurtype kaarten (wit) ---
    $sections[] = $make_wrapper('#ffffff', '70px', '70px', [
        $make_title('Onze oplossingen voor de zorgsector', 'Voor elke situatie de juiste deur'),
        $make_column(25, [
            $make_service_card('fa fa-arrows-h', 'Schuifdeuren',
                '<p style="text-align:center;">Breed, stil en energiezuinig. Geschikt voor hoofdingangen, afdelingsingangen en behandelruimtes. Breedte van 90 cm tot 400 cm.</p>',
                '/automatische-schuifdeuren/')
        ]),
        $make_column(25, [
            $make_service_card('fa fa-refresh', 'Draaideuren',
                '<p style="text-align:center;">Ideaal waar een schuifdeur niet past. Goede luchtdichting voor isolatieafdelingen. Automatisering van bestaande deuren mogelijk.</p>',
                '/automatische-draaideuren/')
        ]),
        $make_column(25, [
            $make_service_card('fa fa-circle-o-notch', 'Karusseldeuren',
                '<p style="text-align:center;">Representatieve hoofdingangen. Uitstekende winddichting en energiebesparing door luchtsluis werking. Altijd doorgang bij storing.</p>',
                '/automatische-draaideuren/')
        ]),
        $make_column(25, [
            $make_service_card('fa fa-fire-extinguisher', 'Brandwerende deuren',
                '<p style="text-align:center;">Gecertificeerde brandwerende automatische deuren die automatisch sluiten bij rookdetectie. Verplicht op specifieke locaties in zorginstellingen.</p>',
                '/contact/')
        ])
    ]);

    // --- SECTIE 4: Normen tabel (donker) ---
    $sections[] = $make_wrapper('#262626', '60px', '60px', [
        [
            'template' => 'element',
            'type' => 'title',
            'value' => [
                'id' => '', 'class' => '',
                'title' => 'Normen en certificering',
                'caption' => 'Wij werken altijd conform de geldende normen',
                'text-align' => 'center',
                'title-font-size' => '33px',
                'title-font-weight' => '800',
                'heading-tag' => 'h2',
                'title-color' => '#ffffff',
                'caption-color' => '#cccccc'
            ]
        ],
        $make_textbox('<table style="width:100%; border-collapse:collapse; color:#ffffff; font-size:16px;">
<tr style="border-bottom:1px solid #444;">
<td style="padding:18px 15px; border-left:4px solid #B99D7C; font-weight:700; width:25%;">EN16005</td>
<td style="padding:18px 15px;">Europese veiligheidsnorm voor aangedreven deuren &mdash; verplicht voor alle automatische deuren</td>
</tr>
<tr style="border-bottom:1px solid #444;">
<td style="padding:18px 15px; border-left:4px solid #B99D7C; font-weight:700;">NEN 1814</td>
<td style="padding:18px 15px;">Toegankelijkheidsnorm voor gebouwen &mdash; geldt voor publiek toegankelijke zorginstellingen</td>
</tr>
<tr style="border-bottom:1px solid #444;">
<td style="padding:18px 15px; border-left:4px solid #B99D7C; font-weight:700;">NEN 3140</td>
<td style="padding:18px 15px;">Veilig werken aan elektrische installaties</td>
</tr>
<tr>
<td style="padding:18px 15px; border-left:4px solid #B99D7C; font-weight:700;">ARBO</td>
<td style="padding:18px 15px;">Veilige werkomgeving voor personeel</td>
</tr>
</table>')
    ]);

    // --- SECTIE 5: CTA banner (geel) ---
    $sections[] = $make_wrapper('rgba(248,193,44,1)', '40px', '40px', [
        $make_column(60, [
            $make_textbox('<p style="font-size:22px; font-weight:700; color:#0a0a0a; margin:0; line-height:1.4;">Wilt u weten wat automatische deuren voor uw zorginstelling kosten?</p>')
        ]),
        $make_column(40, [
            $make_textbox('<div style="text-align:right; padding-top:5px;">
<a href="https://www.todoors.nl/contact/" style="display:inline-block; padding:17px 34px; background:#262626; color:#ffffff; font-size:14px; font-weight:600; text-decoration:none; border-radius:3px;">Ontvang een vrijblijvende offerte</a>
</div>')
        ])
    ]);

    // --- SECTIE 6: Onderhoud & Storingsdienst (wit) ---
    $sections[] = $make_wrapper('#ffffff', '70px', '70px', [
        $make_title('Onderhoud en 24/7 storingsdienst'),
        $make_column(50, [
            [
                'template' => 'element',
                'type' => 'column-service',
                'value' => [
                    'media-type' => 'icon',
                    'icon' => 'fa fa-clock-o',
                    'title' => '24/7 storingsdienst',
                    'content' => '<p>Automatische deuren in de zorg moeten altijd functioneren. ToDoors is 24 uur per dag, 7 dagen per week bereikbaar voor storingen &mdash; ook in het weekend en op feestdagen.</p>',
                    'style' => 'icon-left',
                    'icon-color' => '#B99D7C'
                ]
            ],
            [
                'template' => 'element',
                'type' => 'column-service',
                'value' => [
                    'media-type' => 'icon',
                    'icon' => 'fa fa-wrench',
                    'title' => 'Onderhoudscontracten',
                    'content' => '<p>Jaarlijkse inspectie conform EN16005 voorkomt onverwachte storingen en hogere reparatiekosten. U hoeft er niet meer aan te denken &mdash; wij plannen het in.</p>',
                    'style' => 'icon-left',
                    'icon-color' => '#B99D7C'
                ]
            ]
        ]),
        $make_column(50, [
            [
                'template' => 'element',
                'type' => 'column-service',
                'value' => [
                    'media-type' => 'icon',
                    'icon' => 'fa fa-ambulance',
                    'title' => 'Prioriteit zorginstellingen',
                    'content' => '<p>Storingen bij zorginstellingen worden als spoed behandeld. Een defecte deur bij een ziekenhuisingang of afdelingsgang is geen optie.</p>',
                    'style' => 'icon-left',
                    'icon-color' => '#B99D7C'
                ]
            ],
            [
                'template' => 'element',
                'type' => 'column-service',
                'value' => [
                    'media-type' => 'icon',
                    'icon' => 'fa fa-bolt',
                    'title' => 'Snelle respons',
                    'content' => '<p>Wij streven ernaar storingen dezelfde dag op te lossen. Bel direct: <a href="tel:+31684305663" style="color:#B99D7C; font-weight:700;">+31 6 84 30 56 63</a></p>',
                    'style' => 'icon-left',
                    'icon-color' => '#B99D7C'
                ]
            ]
        ])
    ]);

    // --- SECTIE 7: Projecten/referenties (lichtgrijs) ---
    $sections[] = $make_wrapper('#f7f7f7', '60px', '60px', [
        $make_title('Projecten in de zorgsector'),
        $make_textbox('<div style="font-size:16px; line-height:1.8; max-width:800px; margin:0 auto; text-align:center;">
<p style="text-align:center;">ToDoors heeft automatische deuren ge&iuml;nstalleerd bij diverse zorginstellingen in Nederland. Vanuit ons kantoor in Lelystad bedienen wij klanten door heel Nederland.</p>

<div style="display:flex; justify-content:center; gap:80px; margin-top:30px; flex-wrap:wrap; text-align:left;">
<ul style="list-style:none; padding:0; margin:0; line-height:2.6; font-size:16px;">
<li><i class="fa fa-check" style="color:#B99D7C; margin-right:12px;"></i>Verpleeghuizen en woonzorgcentra</li>
<li><i class="fa fa-check" style="color:#B99D7C; margin-right:12px;"></i>Ziekenhuizen</li>
<li><i class="fa fa-check" style="color:#B99D7C; margin-right:12px;"></i>Huisartsenpraktijken</li>
</ul>
<ul style="list-style:none; padding:0; margin:0; line-height:2.6; font-size:16px;">
<li><i class="fa fa-check" style="color:#B99D7C; margin-right:12px;"></i>Revalidatiecentra</li>
<li><i class="fa fa-check" style="color:#B99D7C; margin-right:12px;"></i>Fysiotherapiepraktijken</li>
<li><i class="fa fa-check" style="color:#B99D7C; margin-right:12px;"></i>Tandartspraktijken</li>
</ul>
</div>

<div style="text-align:center; font-size:16px; line-height:2.6; margin-top:4px;">
<i class="fa fa-check" style="color:#B99D7C; margin-right:12px;"></i>Gezondheidscentra
</div>

<p style="margin-top:30px; font-style:italic; color:#666; text-align:center; font-size:15px;">Heeft u interesse in referenties? <a href="https://www.todoors.nl/contact/" style="color:#B99D7C;">Neem contact op</a> &mdash; wij delen graag onze ervaringen.</p>
</div>')
    ]);

    // --- SECTIE 9: Waarom ToDoors (donker) ---
    $sections[] = $make_wrapper('#262626', '70px', '70px', [
        [
            'template' => 'element',
            'type' => 'title',
            'value' => [
                'id' => '', 'class' => '',
                'title' => 'Waarom ToDoors?',
                'caption' => 'Uw specialist in automatische deuren voor de zorg',
                'text-align' => 'center',
                'title-font-size' => '33px',
                'title-font-weight' => '800',
                'heading-tag' => 'h2',
                'title-color' => '#ffffff',
                'caption-color' => '#cccccc'
            ]
        ],
        $make_column(50, [
            [
                'template' => 'element',
                'type' => 'column-service',
                'value' => [
                    'media-type' => 'icon',
                    'icon' => 'fa fa-medkit',
                    'title' => 'Zorgspecialist',
                    'content' => '<p style="color:#ccc;">Wij kennen de specifieke eisen van zorginstellingen en denken met u mee.</p>',
                    'style' => 'icon-left',
                    'icon-color' => '#B99D7C',
                    'title-color' => '#ffffff'
                ]
            ],
            [
                'template' => 'element',
                'type' => 'column-service',
                'value' => [
                    'media-type' => 'icon',
                    'icon' => 'fa fa-certificate',
                    'title' => 'Gecertificeerd',
                    'content' => '<p style="color:#ccc;">EN16005 en NEN3140 gecertificeerde technici voor aantoonbaar veilige installaties.</p>',
                    'style' => 'icon-left',
                    'icon-color' => '#B99D7C',
                    'title-color' => '#ffffff'
                ]
            ],
            [
                'template' => 'element',
                'type' => 'column-service',
                'value' => [
                    'media-type' => 'icon',
                    'icon' => 'fa fa-phone',
                    'title' => '24/7 bereikbaar',
                    'content' => '<p style="color:#ccc;">Ook buiten kantooruren bereikbaar voor storingen aan uw automatische deuren.</p>',
                    'style' => 'icon-left',
                    'icon-color' => '#B99D7C',
                    'title-color' => '#ffffff'
                ]
            ]
        ]),
        $make_column(50, [
            [
                'template' => 'element',
                'type' => 'column-service',
                'value' => [
                    'media-type' => 'icon',
                    'icon' => 'fa fa-map',
                    'title' => 'Landelijke dekking',
                    'content' => '<p style="color:#ccc;">Vanuit Lelystad bedienen wij zorginstellingen door heel Nederland.</p>',
                    'style' => 'icon-left',
                    'icon-color' => '#B99D7C',
                    'title-color' => '#ffffff'
                ]
            ],
            [
                'template' => 'element',
                'type' => 'column-service',
                'value' => [
                    'media-type' => 'icon',
                    'icon' => 'fa fa-file-text',
                    'title' => 'Transparante offertes',
                    'content' => '<p style="color:#ccc;">Geen verborgen kosten. Eerlijk advies en een duidelijke offerte op maat.</p>',
                    'style' => 'icon-left',
                    'icon-color' => '#B99D7C',
                    'title-color' => '#ffffff'
                ]
            ],
            [
                'template' => 'element',
                'type' => 'column-service',
                'value' => [
                    'media-type' => 'icon',
                    'icon' => 'fa fa-clock-o',
                    'title' => 'Snelle service',
                    'content' => '<p style="color:#ccc;">Reactie binnen 1 uur. Afspraak binnen 2 werkdagen.</p>',
                    'style' => 'icon-left',
                    'icon-color' => '#B99D7C',
                    'title-color' => '#ffffff'
                ]
            ]
        ])
    ]);

    // --- SECTIE 10: FAQ (lichtgrijs) ---
    $sections[] = $make_wrapper('#f7f7f7', '60px', '60px', [
        $make_title('Veelgestelde vragen'),
        $make_textbox('<div style="max-width:800px; margin:0 auto;">

<div style="background:#ffffff; padding:25px 30px; border-left:3px solid #B99D7C; margin-bottom:20px; border-radius:4px;">
<h3 style="margin-top:0; font-size:18px;">Zijn automatische deuren verplicht in een zorginstelling?</h3>
<p style="font-size:15px; line-height:1.7; margin-bottom:0;">Voor publiek toegankelijke zorginstellingen geldt NEN 1814, die toegankelijkheid verplicht stelt. In de praktijk betekent dit dat automatische deuren bij hoofd- en afdelingsingangen sterk aanbevolen &mdash; en vaak verplicht &mdash; zijn.</p>
</div>

<div style="background:#ffffff; padding:25px 30px; border-left:3px solid #B99D7C; margin-bottom:20px; border-radius:4px;">
<h3 style="margin-top:0; font-size:18px;">Kunnen bestaande deuren worden geautomatiseerd?</h3>
<p style="font-size:15px; line-height:1.7; margin-bottom:0;">Ja. In veel gevallen is het mogelijk om bestaande draai- of schuifdeuren te automatiseren zonder grote bouwkundige aanpassingen. Dit is kosteneffici&euml;nter dan een volledig nieuwe deur.</p>
</div>

<div style="background:#ffffff; padding:25px 30px; border-left:3px solid #B99D7C; margin-bottom:20px; border-radius:4px;">
<h3 style="margin-top:0; font-size:18px;">Hoe lang duurt de installatie?</h3>
<p style="font-size:15px; line-height:1.7; margin-bottom:0;">Een standaard automatische schuifdeur wordt in &eacute;&eacute;n dag ge&iuml;nstalleerd. Wij plannen de installatie zo dat er minimale hinder is voor pati&euml;nten en personeel.</p>
</div>

<div style="background:#ffffff; padding:25px 30px; border-left:3px solid #B99D7C; border-radius:4px;">
<h3 style="margin-top:0; font-size:18px;">Wat als de stroom uitvalt?</h3>
<p style="font-size:15px; line-height:1.7; margin-bottom:0;">Alle automatische deuren die ToDoors levert, hebben een noodstroombatterij of manuele noodopening. Zelfs bij stroomuitval kunt u de deur altijd openen.</p>
</div>

</div>', 'center')
    ]);

    // --- SECTIE 11: Eind-CTA (wit) ---
    $sections[] = $make_wrapper('#ffffff', '70px', '70px', [
        $make_title('Vraag een offerte aan', 'Wij denken graag met u mee'),
        $make_textbox('<div style="text-align:center; max-width:600px; margin:0 auto; font-size:16px; line-height:1.8;">
<p>Wilt u automatische deuren voor uw zorginstelling? Wij denken graag met u mee over de beste oplossing &mdash; van &eacute;&eacute;n deur tot een complete renovatie van alle ingangen.</p>

<p style="margin:30px 0;">
<a href="https://www.todoors.nl/contact/" style="display:inline-block; padding:17px 40px; background:rgba(248,193,44,1); color:#0a0a0a; font-size:16px; font-weight:600; text-decoration:none; border-radius:3px;">Offerte aanvragen</a>
</p>

<p style="font-size:15px; color:#666;">
<i class="fa fa-phone" style="color:#B99D7C; margin-right:8px;"></i><a href="tel:+31684305663" style="color:#333; text-decoration:none;">+31 6 84 30 56 63</a><br>
<i class="fa fa-envelope" style="color:#B99D7C; margin-right:8px;"></i><a href="mailto:info@todoors.nl" style="color:#333; text-decoration:none;">info@todoors.nl</a>
</p>

<div style="margin-top:25px; padding:20px; background:#f7f7f7; border-radius:8px; font-size:14px; text-align:left; display:inline-block;">
<div style="padding:4px 0;"><i class="fa fa-check" style="color:#B99D7C; margin-right:10px;"></i>Reactie binnen 1 uur</div>
<div style="padding:4px 0;"><i class="fa fa-check" style="color:#B99D7C; margin-right:10px;"></i>Vrijblijvende offerte</div>
<div style="padding:4px 0;"><i class="fa fa-check" style="color:#B99D7C; margin-right:10px;"></i>Gecertificeerde installatie</div>
</div>
</div>', 'center')
    ]);

    // === 4. GDLR data opslaan ===
    update_post_meta($page_id, 'gdlr-core-page-builder', $sections);

    // === 5. Navigatiemenu toevoegen (alleen eerste keer) ===
    if (!$existing_id) {
        wp_update_nav_menu_item(45, 0, [
            'menu-item-title'     => 'Zorgsector',
            'menu-item-url'       => home_url('/automatische-deuren-zorg/'),
            'menu-item-status'    => 'publish',
            'menu-item-type'      => 'custom',
            'menu-item-object-id' => $page_id,
        ]);
    }

    // === 6. Cache purgen ===
    do_action('litespeed_purge_post', $page_id);
    do_action('litespeed_purge_all');

    // === 7. Pagina-ID + versie opslaan ===
    update_option('tdoors_zorg_page_id', $page_id);
    update_option('tdoors_zorg_page_version', $current_version);
    update_option('tdoors_zorg_page_updated', date('Y-m-d H:i:s'));
    error_log('ToDoors: Zorg landing page saved (v' . $current_version . ') ID ' . $page_id);
}, 99);
