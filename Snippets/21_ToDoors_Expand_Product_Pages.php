<?php
/**
 * Snippet #21: ToDoors Expand Product Pages
 * Status: ACTIVE
 * Scope: global
 */

add_action('init', function() {
    if (get_option('tdoors_product_pages_expanded')) return;

    // ============= SCHUIFDEUREN PAGE (ID 2804) =============
    $schuif_id = 2804;
    $schuif_data = get_post_meta($schuif_id, 'gdlr-core-page-builder', true);
    
    if (is_array($schuif_data)) {
        // Add benefits section
        $benefits_section = [
            'template' => 'wrapper',
            'type' => 'background',
            'value' => [
                'id' => '', 'class' => '', 'privacy' => '',
                'content-layout' => 'boxed',
                'background-type' => 'color',
                'background-color' => '#ffffff',
                'background-color-opacity' => '1',
                'enable-space' => 'disable',
                'animation' => 'none',
                'padding' => ['top' => '70px', 'right' => '0px', 'bottom' => '70px', 'left' => '0px', 'settings' => 'unlink'],
                'margin' => ['top' => '0px', 'right' => '0px', 'bottom' => '0px', 'left' => '0px', 'settings' => 'link']
            ],
            'items' => [
                [
                    'template' => 'element',
                    'type' => 'title',
                    'value' => [
                        'id' => '', 'class' => '',
                        'title' => 'Voordelen Schuifdeuren',
                        'caption' => '',
                        'text-align' => 'center',
                        'title-font-size' => '33px',
                        'title-font-weight' => '800',
                        'heading-tag' => 'h3'
                    ]
                ],
                [
                    'template' => 'wrapper',
                    'type' => 'column',
                    'column' => '25',
                    'value' => ['padding' => ['top' => '0px', 'right' => '30px', 'bottom' => '0px', 'left' => '30px', 'settings' => 'unlink']],
                    'items' => [[
                        'template' => 'element',
                        'type' => 'column-service',
                        'value' => [
                            'media-type' => 'icon',
                            'icon' => 'fa fa-leaf',
                            'title' => 'Energie Efficient',
                            'content' => '<p>Automatische schuifdeuren reduceren warmteverlies door snelle sluiting. Bespaar tot 20% op energiekosten.</p>',
                            'read-more-text' => 'Contact',
                            'read-more-link' => 'https://www.todoors.nl/contact/',
                            'style' => 'center_icon-top',
                            'icon-color' => '#B99D7C'
                        ]
                    ]]
                ],
                [
                    'template' => 'wrapper',
                    'type' => 'column',
                    'column' => '25',
                    'value' => ['padding' => ['top' => '0px', 'right' => '30px', 'bottom' => '0px', 'left' => '30px', 'settings' => 'unlink']],
                    'items' => [[
                        'template' => 'element',
                        'type' => 'column-service',
                        'value' => [
                            'media-type' => 'icon',
                            'icon' => 'fa fa-shield',
                            'title' => 'Veilig & Betrouwbaar',
                            'content' => '<p>Voldoet aan EN16005 en NEN3140 normen. Sensoren voorkomen letsel. Volle garantie op onderdelen.</p>',
                            'read-more-text' => 'Contact',
                            'read-more-link' => 'https://www.todoors.nl/contact/',
                            'style' => 'center_icon-top',
                            'icon-color' => '#B99D7C'
                        ]
                    ]]
                ],
                [
                    'template' => 'wrapper',
                    'type' => 'column',
                    'column' => '25',
                    'value' => ['padding' => ['top' => '0px', 'right' => '30px', 'bottom' => '0px', 'left' => '30px', 'settings' => 'unlink']],
                    'items' => [[
                        'template' => 'element',
                        'type' => 'column-service',
                        'value' => [
                            'media-type' => 'icon',
                            'icon' => 'fa fa-euro',
                            'title' => 'Lage Kosten',
                            'content' => '<p>Minimale slijtage door gemotoriseerd systeem. Onderhoudscontracten vanaf €120/jaar beschikbaar.</p>',
                            'read-more-text' => 'Contact',
                            'read-more-link' => 'https://www.todoors.nl/contact/',
                            'style' => 'center_icon-top',
                            'icon-color' => '#B99D7C'
                        ]
                    ]]
                ],
                [
                    'template' => 'wrapper',
                    'type' => 'column',
                    'column' => '25',
                    'value' => ['padding' => ['top' => '0px', 'right' => '30px', 'bottom' => '0px', 'left' => '30px', 'settings' => 'unlink']],
                    'items' => [[
                        'template' => 'element',
                        'type' => 'column-service',
                        'value' => [
                            'media-type' => 'icon',
                            'icon' => 'fa fa-star',
                            'title' => 'Modern Design',
                            'content' => '<p>Aluminium constructie. Iedere ruimte - kantoor, winkel, ziekenhuis of horeca.</p>',
                            'read-more-text' => 'Contact',
                            'read-more-link' => 'https://www.todoors.nl/contact/',
                            'style' => 'center_icon-top',
                            'icon-color' => '#B99D7C'
                        ]
                    ]]
                ]
            ]
        ];
        
        $schuif_data[] = $benefits_section;
        
        // Add maintenance section
        $maintenance_section = [
            'template' => 'element',
            'type' => 'text-box',
            'value' => [
                'id' => '', 'class' => '',
                'content' => '<h3>Onderhoud & Reparatie</h3>
<ul style="line-height: 2; margin: 20px 0;">
<li><strong>Maandelijks:</strong> Controleer sensoren op vuil</li>
<li><strong>3x per jaar:</strong> Smeer bewegende onderdelen met silicone spray</li>
<li><strong>Halfjaarlijks:</strong> Controleer stroomtoevoer en bedrading</li>
<li><strong>Jaarlijks:</strong> Professionele inspectie door technicus</li>
</ul>
<p style="background: #f7f7f7; padding: 15px; border-left: 4px solid #B99D7C; margin-top: 20px;">
<strong>Storing? Bel direct:</strong> +31 6 84 30 5663 (24/7 beschikbaar)
</p>',
                'text-align' => 'left'
            ]
        ];
        
        $schuif_data[] = $maintenance_section;
        
        update_post_meta($schuif_id, 'gdlr-core-page-builder', $schuif_data);
        do_action('litespeed_purge_post', $schuif_id);
    }

    // ============= DRAAIDEUREN PAGE (ID 2820) =============
    $draai_id = 2820;
    $draai_data = get_post_meta($draai_id, 'gdlr-core-page-builder', true);
    
    if (is_array($draai_data)) {
        // Add benefits section
        $draai_benefits = [
            'template' => 'wrapper',
            'type' => 'background',
            'value' => [
                'id' => '', 'class' => '', 'privacy' => '',
                'content-layout' => 'boxed',
                'background-type' => 'color',
                'background-color' => '#f7f7f7',
                'background-color-opacity' => '1',
                'padding' => ['top' => '70px', 'right' => '0px', 'bottom' => '70px', 'left' => '0px', 'settings' => 'unlink']
            ],
            'items' => [
                [
                    'template' => 'element',
                    'type' => 'title',
                    'value' => [
                        'title' => 'Voordelen Draaideuren',
                        'text-align' => 'center',
                        'title-font-size' => '33px',
                        'title-font-weight' => '800'
                    ]
                ],
                [
                    'template' => 'wrapper',
                    'type' => 'column',
                    'column' => '25',
                    'value' => ['padding' => ['top' => '0px', 'right' => '30px', 'bottom' => '0px', 'left' => '30px', 'settings' => 'unlink']],
                    'items' => [[
                        'template' => 'element',
                        'type' => 'column-service',
                        'value' => [
                            'media-type' => 'icon',
                            'icon' => 'fa fa-gem',
                            'title' => 'Prestige',
                            'content' => '<p>Draaideuren geven prestige aan ingang. Perfecte eerste indruk voor klanten.</p>',
                            'read-more-text' => 'Contact',
                            'read-more-link' => 'https://www.todoors.nl/contact/',
                            'style' => 'center_icon-top',
                            'icon-color' => '#B99D7C'
                        ]
                    ]]
                ],
                [
                    'template' => 'wrapper',
                    'type' => 'column',
                    'column' => '25',
                    'value' => ['padding' => ['top' => '0px', 'right' => '30px', 'bottom' => '0px', 'left' => '30px', 'settings' => 'unlink']],
                    'items' => [[
                        'template' => 'element',
                        'type' => 'column-service',
                        'value' => [
                            'media-type' => 'icon',
                            'icon' => 'fa fa-arrows',
                            'title' => 'Capaciteit',
                            'content' => '<p>Meer mensen per minuut dan schuifdeuren. Ideaal voor drukke ingang.</p>',
                            'read-more-text' => 'Contact',
                            'read-more-link' => 'https://www.todoors.nl/contact/',
                            'style' => 'center_icon-top',
                            'icon-color' => '#B99D7C'
                        ]
                    ]]
                ],
                [
                    'template' => 'wrapper',
                    'type' => 'column',
                    'column' => '25',
                    'value' => ['padding' => ['top' => '0px', 'right' => '30px', 'bottom' => '0px', 'left' => '30px', 'settings' => 'unlink']],
                    'items' => [[
                        'template' => 'element',
                        'type' => 'column-service',
                        'value' => [
                            'media-type' => 'icon',
                            'icon' => 'fa fa-check-circle',
                            'title' => 'Veilig',
                            'content' => '<p>Afzonderlijke deelsectoren voorkomen tocht. Sensoren voorkomen letsel. Nooduitgang voorzien.</p>',
                            'read-more-text' => 'Contact',
                            'read-more-link' => 'https://www.todoors.nl/contact/',
                            'style' => 'center_icon-top',
                            'icon-color' => '#B99D7C'
                        ]
                    ]]
                ],
                [
                    'template' => 'wrapper',
                    'type' => 'column',
                    'column' => '25',
                    'value' => ['padding' => ['top' => '0px', 'right' => '30px', 'bottom' => '0px', 'left' => '30px', 'settings' => 'unlink']],
                    'items' => [[
                        'template' => 'element',
                        'type' => 'column-service',
                        'value' => [
                            'media-type' => 'icon',
                            'icon' => 'fa fa-water',
                            'title' => 'Hygienisch',
                            'content' => '<p>Minder naden dan schuifdeuren. Makkelijker schoon. Ideaal voor medische omgevingen.</p>',
                            'read-more-text' => 'Contact',
                            'read-more-link' => 'https://www.todoors.nl/contact/',
                            'style' => 'center_icon-top',
                            'icon-color' => '#B99D7C'
                        ]
                    ]]
                ]
            ]
        ];
        
        $draai_data[] = $draai_benefits;
        
        // Add applications section
        $applications = [
            'template' => 'element',
            'type' => 'text-box',
            'value' => [
                'id' => '', 'class' => '',
                'content' => '<h3>Perfecte Toepassing Voor:</h3>
<div style="columns: 2; gap: 40px; margin-top: 20px;">
<p>🏥 Ziekenhuizen & klinieken<br>
🏢 Kantoorgebouwen<br>
🛒 Winkelcentra & winkels<br>
🏨 Hotels & restaurants<br>
🏦 Banken<br>
✈️ Luchthavens<br>
🏭 Industriële panden<br>
🏪 Supermarkten</p>
</div>',
                'text-align' => 'left'
            ]
        ];
        
        $draai_data[] = $applications;
        
        update_post_meta($draai_id, 'gdlr-core-page-builder', $draai_data);
        do_action('litespeed_purge_post', $draai_id);
    }

    update_option('tdoors_product_pages_expanded', date('Y-m-d H:i:s'));
    error_log('ToDoors: Product pages expanded with benefits and details');
}, 99);
