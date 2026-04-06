<?php
/**
 * Snippet #83: Set Meta Descriptions via Yoast SEO
 * Status: ACTIVE
 * Scope: global
 *
 * Voegt meta descriptions toe aan alle hoofdpagina's via Yoast SEO postmeta.
 * Eenmalig — slaat vlag op na uitvoering.
 */

add_action('init', function() {
    if (get_option('tdoors_meta_descriptions_done')) return;

    $descriptions = [
        2039 => 'ToDoors levert en onderhoudt automatische deuren, schuifdeuren en toegangssystemen door heel Nederland. Snelle service, 24/7 bereikbaar.',
        2804 => 'Automatische schuifdeuren laten plaatsen of onderhouden? ToDoors biedt professionele installatie en service voor bedrijven door heel Nederland.',
        2820 => 'Automatische draaideuren voor uw bedrijf? ToDoors installeert en onderhoudt draaideurensystemen met 24/7 service en landelijke dekking.',
        2828 => 'Deurdrangers laten installeren of vervangen? ToDoors plaatst en onderhoudt professionele deurdrangers voor kantoren, winkels en utiliteitsgebouwen.',
        2832 => 'Harmonica deuren laten plaatsen? ToDoors levert en installeert harmonicadeuren voor bedrijven door heel Nederland.',
        2823 => 'Guillotine ramen voor uw pand? ToDoors levert en plaatst guillotineramen voor zakelijke toepassingen met vakkundige montage en service.',
        2520 => 'Elektronische toegangssystemen voor bedrijven. ToDoors installeert toegangscontrole, intercom en beveiligingsoplossingen door heel Nederland.',
         157 => 'Onderhoudscontract voor uw automatische deuren? ToDoors biedt servicepakketten met preventief onderhoud en 24/7 storingsdienst.',
        1852 => 'Leer meer over ToDoors – uw specialist in automatische deuren. Landelijke dekking, klantvriendelijke service en jarenlange ervaring.',
    ];

    foreach ($descriptions as $page_id => $desc) {
        update_post_meta($page_id, '_yoast_wpseo_metadesc', $desc);
    }

    wp_cache_flush();
    do_action('litespeed_purge_all');

    update_option('tdoors_meta_descriptions_done', date('Y-m-d H:i:s'));
    error_log('ToDoors: Meta descriptions ingesteld voor ' . count($descriptions) . ' paginas');
}, 5);
