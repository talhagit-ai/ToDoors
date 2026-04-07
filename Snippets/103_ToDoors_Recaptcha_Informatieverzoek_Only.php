<?php
/**
 * Snippet #103: reCAPTCHA alleen op informatieverzoek pagina
 * Status: ACTIVE
 * Scope: frontend
 *
 * WPForms laadt reCAPTCHA v3 op alle pagina's.
 * Dit snippet verwijdert het op alle pagina's behalve /informatieverzoek/ (ID 2715).
 */

add_action('wp_enqueue_scripts', function() {
    if (is_page(2715)) return;

    // Dequeue WPForms reCAPTCHA scripts
    wp_dequeue_script('wpforms-recaptcha');
    wp_dequeue_script('wpforms-recaptcha-v3');
    wp_dequeue_script('google-recaptcha');
    wp_dequeue_script('recaptcha');
}, 100);

// Verwijder ook via output buffer als dequeue niet werkt
add_action('template_redirect', function() {
    if (is_page(2715)) return;

    ob_start(function($buffer) {
        // Verwijder Google reCAPTCHA script tag
        $buffer = preg_replace('/<script[^>]*recaptcha[^>]*><\/script>/i', '', $buffer);
        // Verwijder grecaptcha inline scripts
        $buffer = preg_replace('/<script[^>]*>.*?grecaptcha.*?<\/script>/is', '', $buffer);
        return $buffer;
    });
}, 1);
