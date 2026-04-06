<?php
/**
 * Snippet #79: Reconstruct Footer Kortom/Waarom ToDoors Sectie
 * Status: ACTIVE
 * Scope: global
 *
 * Herstelt de verdwenen footer sectie met bullet points in footer-2.
 * Gebruikt "Waarom ToDoors?" als nieuwe titel.
 */

add_action('init', function() {
    if (get_option('tdoors_reconstruct_footer_done')) return;

    // Lees huidige widget_block via WordPress (veilig — geen raw SQL)
    $widget_block = get_option('widget_block', ['_multiwidget' => 1]);

    // Inhoud: "Waarom ToDoors?" + 4 bullet points (Gutenberg HTML blokken)
    $content = '<!-- wp:heading {"level":3,"style":{"color":{"text":"#ffffff"}}} -->' . "\n"
        . '<h3 class="has-text-color" style="color:#ffffff">Waarom ToDoors?</h3>' . "\n"
        . '<!-- /wp:heading -->' . "\n\n"
        . '<!-- wp:list {"style":{"color":{"text":"#ffffff"}}} -->' . "\n"
        . '<ul class="has-text-color" style="color:#ffffff">'
        . '<li>Landelijke dekking, kwalitatieve service</li>'
        . '<li>Oplossingen voor elk probleem beschikbaar</li>'
        . '<li>24/7 beschikbaar met snelle reactietijden</li>'
        . '<li>Klantvriendelijkheid heeft de hoogste prioriteit</li>'
        . '</ul>' . "\n"
        . '<!-- /wp:list -->';

    // Voeg block-19 toe via PHP array — WordPress serialiseert automatisch correct
    $widget_block[19] = ['content' => $content];

    // Sla op via WordPress native functie
    update_option('widget_block', $widget_block);

    // Zorg dat block-19 in footer-2 zit
    $sidebars = get_option('sidebars_widgets', []);
    $footer2 = isset($sidebars['footer-2']) ? (array) $sidebars['footer-2'] : [];
    if (!in_array('block-19', $footer2, true)) {
        array_unshift($footer2, 'block-19');
        $sidebars['footer-2'] = $footer2;
        update_option('sidebars_widgets', $sidebars);
    }

    wp_cache_flush();
    do_action('litespeed_purge_all');

    update_option('tdoors_reconstruct_footer_done', date('Y-m-d H:i:s'));
    error_log('ToDoors: Footer "Waarom ToDoors?" sectie gereconstrueerd');
}, 5);
