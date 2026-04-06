<?php
/**
 * Snippet #54: Restore 3 Service Packages
 * Status: ACTIVE
 * Scope: global
 *
 * Herstelt de 3 onderhoudscontracten op de servicepagina (ID 157):
 * Basic Contract, Basic+ Contract, Basic+ 2x Onderhoud.
 */

add_action('init', function() {
    if (get_option('tdoors_restore_packages_done')) return;

    $page_id = 157;
    $data = get_post_meta($page_id, 'gdlr-core-page-builder', true);
    if (!is_array($data)) $data = [];

    // Controleer of pakketten al aanwezig zijn
    $json = json_encode($data);
    if (strpos($json, 'Basic Contract') !== false) {
        update_option('tdoors_restore_packages_done', 'already_present');
        return;
    }

    $packages_section = [
        "template" => "wrapper",
        "type"     => "background",
        "value"    => [
            "id" => "", "class" => "", "privacy" => "",
            "content-layout"           => "boxed",
            "background-type"          => "color",
            "background-color"         => "#f7f7f7",
            "background-color-opacity" => "1",
            "enable-space"             => "disable",
            "animation"                => "none",
            "padding" => ["top" => "70px", "right" => "0px", "bottom" => "70px", "left" => "0px", "settings" => "unlink"],
            "margin"  => ["top" => "0px", "right" => "0px", "bottom" => "0px", "left" => "0px", "settings" => "link"],
        ],
        "items" => [
            // Sectietitel
            [
                "template" => "element",
                "type"     => "title",
                "value"    => [
                    "id" => "", "class" => "",
                    "title"              => "Onderhoudscontracten",
                    "caption"            => "Kies het pakket dat bij uw bedrijf past",
                    "caption-position"   => "top",
                    "text-align"         => "center",
                    "title-font-size"    => "33px",
                    "title-font-weight"  => "800",
                    "heading-tag"        => "h3",
                ],
            ],
            // BASIC CONTRACT
            [
                "template" => "wrapper",
                "type"     => "column",
                "column"   => "20",
                "value"    => [
                    "padding"         => ["top" => "0px", "right" => "30px", "bottom" => "0px", "left" => "30px", "settings" => "unlink"],
                    "margin"          => ["top" => "0px", "right" => "0px", "bottom" => "0px", "left" => "0px", "settings" => "link"],
                    "background-type" => "color",
                ],
                "items" => [[
                    "template" => "element",
                    "type"     => "column-service",
                    "value"    => [
                        "id" => "", "class" => "",
                        "media-type"           => "icon",
                        "icon"                 => "fa fa-cog",
                        "title"                => "Basic Contract",
                        "caption"              => "€120/jaar",
                        "content"              => "<ul style=\"text-align:left; line-height:2; margin:20px 0;\"><li>✓ Jaarlijkse inspectie</li><li>✓ 24/7 toegang servicepool</li><li>✓ Voorrang bij storingen</li><li>✓ Gereduceerd voorrijstarief</li><li>✗ Korting onderdelen</li><li>✗ Verlengde garantie</li></ul>",
                        "read-more-text"       => "Meer informatie",
                        "read-more-link"       => "https://www.todoors.nl/contact/",
                        "style"                => "center_icon-top",
                        "icon-color"           => "#B99D7C",
                        "title-text-transform" => "none",
                    ],
                ]],
            ],
            // BASIC+ CONTRACT
            [
                "template" => "wrapper",
                "type"     => "column",
                "column"   => "20",
                "value"    => [
                    "padding"         => ["top" => "0px", "right" => "30px", "bottom" => "0px", "left" => "30px", "settings" => "unlink"],
                    "margin"          => ["top" => "0px", "right" => "0px", "bottom" => "0px", "left" => "0px", "settings" => "link"],
                    "background-type" => "color",
                ],
                "items" => [[
                    "template" => "element",
                    "type"     => "column-service",
                    "value"    => [
                        "id" => "", "class" => "",
                        "media-type"           => "icon",
                        "icon"                 => "fa fa-star",
                        "title"                => "Basic+ Contract",
                        "caption"              => "€190/jaar",
                        "content"              => "<ul style=\"text-align:left; line-height:2; margin:20px 0;\"><li>✓ 1x per jaar onderhoud</li><li>✓ 24/7 toegang servicepool</li><li>✓ Voorrang bij storingen</li><li>✓ Gereduceerd voorrijstarief</li><li>✓ 10% korting onderdelen</li><li>✓ Verlengde garantie</li></ul>",
                        "read-more-text"       => "Meer informatie",
                        "read-more-link"       => "https://www.todoors.nl/contact/",
                        "style"                => "center_icon-top",
                        "icon-color"           => "#B99D7C",
                        "title-text-transform" => "none",
                    ],
                ]],
            ],
            // BASIC+ 2X ONDERHOUD
            [
                "template" => "wrapper",
                "type"     => "column",
                "column"   => "20",
                "value"    => [
                    "padding"         => ["top" => "0px", "right" => "30px", "bottom" => "0px", "left" => "30px", "settings" => "unlink"],
                    "margin"          => ["top" => "0px", "right" => "0px", "bottom" => "0px", "left" => "0px", "settings" => "link"],
                    "background-type" => "color",
                ],
                "items" => [[
                    "template" => "element",
                    "type"     => "column-service",
                    "value"    => [
                        "id" => "", "class" => "",
                        "media-type"           => "icon",
                        "icon"                 => "fa fa-check-circle",
                        "title"                => "Basic+ 2x Onderhoud",
                        "caption"              => "€320/jaar",
                        "content"              => "<ul style=\"text-align:left; line-height:2; margin:20px 0;\"><li>✓ 2x per jaar onderhoud</li><li>✓ 24/7 toegang servicepool</li><li>✓ Voorrang bij storingen</li><li>✓ Geen voorrijkosten op route</li><li>✓ 15% korting onderdelen</li><li>✓ Verlengde garantie</li></ul>",
                        "read-more-text"       => "Meer informatie",
                        "read-more-link"       => "https://www.todoors.nl/contact/",
                        "style"                => "center_icon-top",
                        "icon-color"           => "#B99D7C",
                        "title-text-transform" => "none",
                    ],
                ]],
            ],
        ],
    ];

    $data[] = $packages_section;

    update_post_meta($page_id, 'gdlr-core-page-builder', $data);
    do_action('litespeed_purge_post', $page_id);
    do_action('litespeed_purge_all');

    update_option('tdoors_restore_packages_done', date('Y-m-d H:i:s'));
    error_log('ToDoors: STAP herstel — 3 servicepakketten hersteld op pagina ' . $page_id);
}, 99);
