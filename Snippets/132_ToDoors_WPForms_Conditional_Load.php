<?php
/**
 * Snippet #132: ToDoors WPForms Conditional Load
 * Status: ACTIVE
 * Scope: global
 *
 * Laadt WPForms en reCAPTCHA scripts alleen op contact/informatieverzoek pagina's. Voorkomt onnodige JS-last op alle andere pagina's.
 */

// Laad WPForms assets alleen op paginas die een formulier-shortcode bevatten
add_action('wp', function() {
    if (is_admin()) return;

    global $post;
    if (!$post) return;

    $has_form = (
        has_shortcode($post->post_content, 'wpforms') ||
        is_page([1964, 2715]) // /contact/ en /informatieverzoek/
    );

    if (!$has_form) {
        // Dequeue WPForms frontend assets
        add_action('wp_enqueue_scripts', function() {
            wp_dequeue_style('wpforms-full');
            wp_dequeue_style('wpforms-gutenberg-full');
            wp_dequeue_script('wpforms');
            wp_dequeue_script('wpforms-recaptcha');
            // reCAPTCHA v3
            wp_dequeue_script('google-recaptcha');
            wp_deregister_script('google-recaptcha');
        }, 99);
    }
}, 1);
