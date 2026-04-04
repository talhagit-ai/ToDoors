<?php
/**
 * Snippet #17: ToDoors Real Service Packages
 * Status: ACTIVE
 * Scope: global
 */

add_action("init", function() {
    if (get_option("tdoors_real_packages_applied")) return;

    $service_id = 157;
    $service_data = get_post_meta($service_id, "gdlr-core-page-builder", true);
    
    if (!is_array($service_data) || empty($service_data)) {
        update_option("tdoors_real_packages_applied", "failed");
        return;
    }

    if (isset($service_data[2])) {
        unset($service_data[2]);
        $service_data = array_values($service_data);
    }

    $packages_section = [
        "template" => "wrapper",
        "type" => "background",
        "value" => [
            "id" => "", "class" => "", "privacy" => "",
            "content-layout" => "boxed",
            "background-type" => "color",
            "background-color" => "#f7f7f7",
            "background-color-opacity" => "1",
            "enable-space" => "disable",
            "animation" => "none",
            "padding" => ["top" => "70px", "right" => "0px", "bottom" => "70px", "left" => "0px", "settings" => "unlink"],
            "margin" => ["top" => "0px", "right" => "0px", "bottom" => "0px", "left" => "0px", "settings" => "link"]
        ],
        "items" => [
            [
                "template" => "element",
                "type" => "title",
                "value" => [
                    "id" => "", "class" => "",
                    "title" => "Onderhoudscontracten",
                    "caption" => "Kies het pakket dat bij uw bedrijf past",
                    "caption-position" => "top",
                    "text-align" => "center",
                    "title-font-size" => "33px",
                    "title-font-weight" => "800",
                    "heading-tag" => "h3"
                ]
            ],
            // BASIC CONTRACT - NO UURTARIEF
            [
                "template" => "wrapper",
                "type" => "column",
                "column" => "20",
                "value" => [
                    "padding" => ["top" => "0px", "right" => "30px", "bottom" => "0px", "left" => "30px", "settings" => "unlink"],
                    "margin" => ["top" => "0px", "right" => "0px", "bottom" => "0px", "left" => "0px", "settings" => "link"],
                    "background-type" => "color"
                ],
                "items" => [
                    [
                        "template" => "element",
                        "type" => "column-service",
                        "value" => [
                            "id" => "", "class" => "",
                            "media-type" => "icon",
                            "icon" => "fa fa-cog",
                            "title" => "Basic Contract",
                            "caption" => "€120/jaar",
                            "content" => "<ul style=\"text-align:left; line-height:2; margin:20px 0;\"><li>✓ Jaarlijkse inspectie</li><li>✓ 24/7 toegang servicepool</li><li>✓ Voorrang bij storingen</li><li>✓ Gereduceerd voorrijstarief</li><li>✗ Korting onderdelen</li><li>✗ Verlengde garantie</li></ul>",
                            "read-more-text" => "Meer informatie",
                            "read-more-link" => "https://www.todoors.nl/contact/",
                            "style" => "center_icon-top",
                            "icon-color" => "#B99D7C",
                            "title-text-transform" => "none"
                        ]
                    ]
                ]
            ],
            // BASIC+ CONTRACT - NO UURTARIEF
            [
                "template" => "wrapper",
                "type" => "column",
                "column" => "20",
                "value" => [
                    "padding" => ["top" => "0px", "right" => "30px", "bottom" => "0px", "left" => "30px", "settings" => "unlink"],
                    "margin" => ["top" => "0px", "right" => "0px", "bottom" => "0px", "left" => "0px", "settings" => "link"],
                    "background-type" => "color"
                ],
                "items" => [
                    [
                        "template" => "element",
                        "type" => "column-service",
                        "value" => [
                            "id" => "", "class" => "",
                            "media-type" => "icon",
                            "icon" => "fa fa-star",
                            "title" => "Basic+ Contract",
                            "caption" => "€190/jaar",
                            "content" => "<ul style=\"text-align:left; line-height:2; margin:20px 0;\"><li>✓ 2x per jaar inspectie</li><li>✓ 24/7 toegang servicepool</li><li>✓ Voorrang bij storingen</li><li>✓ Gereduceerd voorrijstarief</li><li>✓ 10% korting onderdelen</li><li>✓ Verlengde garantie</li></ul>",
                            "read-more-text" => "Meer informatie",
                            "read-more-link" => "https://www.todoors.nl/contact/",
                            "style" => "center_icon-top",
                            "icon-color" => "#B99D7C",
                            "title-text-transform" => "none"
                        ]
                    ]
                ]
            ],
            // BASIC+ 2X ONDERHOUD - NO UURTARIEF
            [
                "template" => "wrapper",
                "type" => "column",
                "column" => "20",
                "value" => [
                    "padding" => ["top" => "0px", "right" => "30px", "bottom" => "0px", "left" => "30px", "settings" => "unlink"],
                    "margin" => ["top" => "0px", "right" => "0px", "bottom" => "0px", "left" => "0px", "settings" => "link"],
                    "background-type" => "color"
                ],
                "items" => [
                    [
                        "template" => "element",
                        "type" => "column-service",
                        "value" => [
                            "id" => "", "class" => "",
                            "media-type" => "icon",
                            "icon" => "fa fa-check-circle",
                            "title" => "Basic+ 2x Onderhoud",
                            "caption" => "€320/jaar",
                            "content" => "<ul style=\"text-align:left; line-height:2; margin:20px 0;\"><li>✓ 4x per jaar inspectie</li><li>✓ 24/7 toegang servicepool</li><li>✓ Voorrang bij storingen</li><li>✓ Geen voorrijkosten op route</li><li>✓ 15% korting onderdelen</li><li>✓ Verlengde garantie</li></ul>",
                            "read-more-text" => "Meer informatie",
                            "read-more-link" => "https://www.todoors.nl/contact/",
                            "style" => "center_icon-top",
                            "icon-color" => "#B99D7C",
                            "title-text-transform" => "none"
                        ]
                    ]
                ]
            ]
        ]
    ];

    $service_data[] = $packages_section;
    
    update_post_meta($service_id, "gdlr-core-page-builder", $service_data);
    do_action("litespeed_purge_post", $service_id);

    update_option("tdoors_real_packages_applied", date("Y-m-d H:i:s"));
    error_log("ToDoors: Service packages updated - uurtarief removed, Full Service removed");
}, 99);
