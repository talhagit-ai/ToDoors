<?php
/**
 * Snippet #81: Verbeter styling footer "Waarom ToDoors?" sectie
 * Status: ACTIVE
 * Scope: global
 *
 * Vervangt het blok-widget met nette HTML die aansluit op het thema.
 */

add_action('init', function() {
    if (get_option('tdoors_style_footer_done')) return;

    $widget_block = get_option('widget_block', ['_multiwidget' => 1]);

    // Custom HTML die aansluit op realfactory thema stijl
    $content = '<!-- wp:html -->'
        . '<h3 class="realfactory-widget-title">Waarom ToDoors?</h3>'
        . '<ul style="margin:0; padding:0; list-style:none; line-height:2;">'
        . '<li style="font-size:14px; color:#b9b9b9;"><i class="fa fa-check" style="color:#f7c02e; margin-right:8px;"></i>Landelijke dekking, kwalitatieve service</li>'
        . '<li style="font-size:14px; color:#b9b9b9;"><i class="fa fa-check" style="color:#f7c02e; margin-right:8px;"></i>Oplossingen voor elk probleem beschikbaar</li>'
        . '<li style="font-size:14px; color:#b9b9b9;"><i class="fa fa-check" style="color:#f7c02e; margin-right:8px;"></i>24/7 beschikbaar met snelle reactietijden</li>'
        . '<li style="font-size:14px; color:#b9b9b9;"><i class="fa fa-check" style="color:#f7c02e; margin-right:8px;"></i>Klantvriendelijkheid heeft de hoogste prioriteit</li>'
        . '</ul>'
        . '<!-- /wp:html -->';

    $widget_block[19] = ['content' => $content];
    update_option('widget_block', $widget_block);

    wp_cache_flush();
    do_action('litespeed_purge_all');

    update_option('tdoors_style_footer_done', date('Y-m-d H:i:s'));
    error_log('ToDoors: Footer Waarom ToDoors styling verbeterd');
}, 5);
