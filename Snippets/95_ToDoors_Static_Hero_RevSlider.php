<?php
/**
 * Snippet #95: Statische Hero ter vervanging van RevSlider
 * Status: ACTIVE
 * Scope: frontend
 *
 * Vervangt de RevSlider op de homepage door een statische hero sectie.
 * Schakelt alle RevSlider scripts/styles uit.
 */

// Verwijder RevSlider scripts en styles alleen op de homepage
add_action('wp_enqueue_scripts', function() {
    if (!is_front_page()) return;
    wp_dequeue_script('revslider');
    wp_dequeue_script('revslider-front');
    wp_dequeue_style('revslider-front');
}, 100);

// Vervang de slider via output buffer op de homepage
add_action('template_redirect', function() {
    if (!is_front_page()) return;

    ob_start(function($buffer) {
        $hero = '<div id="todoors-static-hero" style="position:relative;width:100%;min-height:100vh;background:url(\'https://www.todoors.nl/wp-content/uploads/2024/10/IMG_7175-scaled.jpeg\') center center/cover no-repeat;display:flex;align-items:center;justify-content:flex-start;">'
            . '<div style="position:absolute;inset:0;background:rgba(0,0,0,0.50);"></div>'
            . '<div style="position:relative;z-index:2;max-width:1180px;margin:0 auto;padding:0 40px;width:100%;">'
            . '<p style="font-family:Roboto,sans-serif;font-size:clamp(28px,4vw,50px);font-weight:300;color:rgba(247,247,247,1);margin:0 0 8px 0;text-shadow:2px 2px 0 rgba(0,0,0,0.6);">Ontdek</p>'
            . '<h1 style="font-family:Roboto,sans-serif;font-size:clamp(40px,6vw,80px);font-weight:700;color:#ffcc00;margin:0 0 24px 0;text-transform:uppercase;text-shadow:2px 2px 0 rgba(0,0,0,0.6);line-height:1.1;">Automatisering</h1>'
            . '<p style="font-family:Roboto,sans-serif;font-size:clamp(15px,1.5vw,20px);font-weight:400;color:rgba(255,255,255,1);max-width:700px;line-height:1.7;margin:0 0 36px 0;text-shadow:1px 1px 0 rgba(0,0,0,0.5);">Professionele oplossingen voor automatische schuifdeuren, draaideuren en toegangssystemen voor bedrijven en instellingen.</p>'
            . '<a href="https://www.todoors.nl/over-ons/" style="display:inline-block;padding:14px 34px;background:#ffffff;color:#0a0a0a;font-family:Roboto,sans-serif;font-size:14px;font-weight:600;text-decoration:none;border-radius:3px;letter-spacing:0.5px;">MEER WETEN</a>'
            . '</div>'
            . '</div>';

        return preg_replace(
            '/<rs-module-wrap[^>]*>[\s\S]*?<\/rs-module-wrap>/',
            $hero,
            $buffer
        );
    });
}, 1);
