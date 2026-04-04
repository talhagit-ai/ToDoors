<?php
/**
 * Snippet #22: ToDoors Add Pricing Sections
 * Status: ACTIVE
 * Scope: global
 */

add_action('init', function() {
    if (get_option('tdoors_pricing_sections_added')) return;

    // Pages to add pricing to
    $pages_pricing = [
        2804 => 'Automatische Schuifdeuren',
        2820 => 'Automatische Draaideuren',
        2828 => 'Deurdrangers',
        2832 => 'Harmonica Deuren',
        2823 => 'Guillotine Ramen',
        2520 => 'Elektronische Toegang'
    ];

    foreach ($pages_pricing as $page_id => $page_name) {
        $page_data = get_post_meta($page_id, 'gdlr-core-page-builder', true);
        
        if (is_array($page_data)) {
            // Create pricing section
            $pricing_section = [
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
                            'title' => 'Prijzen & Offerte',
                            'caption' => '',
                            'text-align' => 'center',
                            'title-font-size' => '33px',
                            'title-font-weight' => '800'
                        ]
                    ],
                    [
                        'template' => 'element',
                        'type' => 'text-box',
                        'value' => [
                            'id' => '', 'class' => '',
                            'content' => '<div style="background: white; padding: 30px; border-radius: 8px; border-left: 4px solid #B99D7C; margin: 30px 0;">
<h4>Prijsinformatie</h4>
<p>De prijs van <strong>' . $page_name . '</strong> hangt af van:</p>
<ul style="line-height: 2;">
<li>✓ Specifieke model en afmetingen</li>
<li>✓ Installatiemoeilijkheid</li>
<li>✓ Kabelwerk en stroomvoorziening</li>
<li>✓ Eventuele aanpassingen nodig</li>
</ul>

<p style="background: #e8f5e9; padding: 20px; border-radius: 8px; margin-top: 20px;">
<strong>💰 Basismodel: Vanaf €2.500 (exclusief installatie)</strong><br>
<em>Volledige installatie + onderhoud contract: €3.500 - €6.000</em>
</p>

<p style="margin-top: 20px; text-align: center;">
<strong>Wilt u exact weten wat het voor uw situatie kost?</strong><br>
<a href="/contact/" style="display: inline-block; margin-top: 10px; padding: 12px 24px; background: #B99D7C; color: white; text-decoration: none; border-radius: 4px; font-weight: 600;">Gratis offerte aanvragen</a>
</p>
</div>',
                            'text-align' => 'left'
                        ]
                    ]
                ]
            ];

            $page_data[] = $pricing_section;
            update_post_meta($page_id, 'gdlr-core-page-builder', $page_data);
            do_action('litespeed_purge_post', $page_id);
            error_log('Pricing added to page ' . $page_id);
        }
    }

    update_option('tdoors_pricing_sections_added', date('Y-m-d H:i:s'));
    error_log('ToDoors: Pricing sections added to all product pages');
}, 99);
