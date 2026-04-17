<?php
/**
 * ToDoors_Fix_White_Button_Text
 * Force white text op Bekijk alle projecten knop homepage
 * Snippet ID: 197
 * Active: True
 */

add_action('wp_footer', function() {
    if (!is_front_page()) return;
    ?>
    <style>
    #td-testimonials .td-reviews-cta a,
    #td-testimonials .td-reviews-cta a:link,
    #td-testimonials .td-reviews-cta a:visited,
    #td-testimonials .td-reviews-cta a:hover,
    #td-testimonials .td-reviews-cta a:active,
    body #td-testimonials .td-reviews-cta a,
    .realfactory-body #td-testimonials .td-reviews-cta a {
        color: #ffffff !important;
        background: #2d6a4f !important;
        text-decoration: none !important;
        -webkit-text-fill-color: #ffffff !important;
    }
    </style>
    <?php
}, 9999);
