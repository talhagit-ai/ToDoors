<?php
/**
 * Snippet #46: snippet_46
 * Status: ACTIVE
 * Scope: global
 */

add_action('init', function() {
    if (get_option('tdoors_prijzen_schuif_draai_deur_done')) return;

    $pages = [
        2804 => [
            'name'   => 'Automatische Schuifdeuren',
            'vanaf'  => '€3.800',
            'range'  => '€4.300 – €11.500',
        ],
        2820 => [
            'name'   => 'Automatische Draaideuren',
            'vanaf'  => '€1.900',
            'range'  => '€2.400 – €5.000',
        ],
        2828 => [
            'name'   => 'Deurdrangers',
            'vanaf'  => '€350',
            'range'  => '€450 – €750',
        ],
    ];

    foreach ($pages as $id => $info) {
        $data = get_post_meta($id, 'gdlr-core-page-builder', true);
        if (!is_array($data)) continue;

        $pricing_section = [
            'template' => 'wrapper',
            'type'     => 'background',
            'value'    => [
                'id'                       => '',
                'class'                    => '',
                'privacy'                  => '',
                'content-layout'           => 'boxed',
                'background-type'          => 'color',
                'background-color'         => '#f7f7f7',
                'background-color-opacity' => '1',
                'padding'                  => [
                    'top'      => '70px',
                    'right'    => '0px',
                    'bottom'   => '70px',
                    'left'     => '0px',
                    'settings' => 'unlink',
                ],
            ],
            'items' => [
                [
                    'template' => 'element',
                    'type'     => 'title',
                    'value'    => [
                        'title'             => 'Offerte',
                        'caption'           => '',
                        'text-align'        => 'center',
                        'title-font-size'   => '33px',
                        'title-font-weight' => '800',
                    ],
                ],
                [
                    'template' => 'element',
                    'type'     => 'text-box',
                    'value'    => [
                        'id'         => '',
                        'class'      => '',
                        'content'    =>
                            '<div style="background: white; padding: 30px; border-radius: 8px; border-left: 4px solid #B99D7C; margin: 30px 0;">'
                            . '<h4>Prijsinformatie</h4>'
                            . '<p>De prijs van <strong>' . $info['name'] . '</strong> hangt af van:</p>'
                            . '<ul style="line-height: 2;">'
                            . '<li>✓ Specifiek model en afmetingen</li>'
                            . '<li>✓ Installatiemoeilijkheid</li>'
                            . '<li>✓ Kabelwerk en stroomvoorziening</li>'
                            . '<li>✓ Eventuele aanpassingen ter plaatse</li>'
                            . '</ul>'
                            . '<p style="background: #e8f5e9; padding: 20px; border-radius: 8px; margin-top: 20px;">'
                            . '<strong>💰 Basismodel: Vanaf ' . $info['vanaf'] . ' (exclusief installatie)</strong><br>'
                            . '<em>Volledige installatie: ' . $info['range'] . '</em>'
                            . '</p>'
                            . '<p style="margin-top: 20px; text-align: center;">'
                            . '<strong>Wilt u exact weten wat het voor uw situatie kost?</strong><br>'
                            . '<a href="/contact/" style="display: inline-block; margin-top: 10px; padding: 12px 24px; background: #B99D7C; color: white; text-decoration: none; border-radius: 4px; font-weight: 600;">Gratis offerte aanvragen</a>'
                            . '</p>'
                            . '</div>',
                        'text-align' => 'left',
                    ],
                ],
            ],
        ];

        $data[] = $pricing_section;
        update_post_meta($id, 'gdlr-core-page-builder', $data);
        clean_post_cache($id);
        do_action('litespeed_purge_post', $id);
    }

    update_option('tdoors_prijzen_schuif_draai_deur_done', 1);
}, 20);
