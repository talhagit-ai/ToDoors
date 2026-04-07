<?php
/**
 * Snippet #94: Google Fonts lokaal serveren
 * Status: ACTIVE
 * Scope: frontend
 *
 * Verwijdert de externe Google Fonts aanroep en vervangt deze
 * door een lokaal gehost Roboto font bestand.
 * Voorkomt DNS-lookup naar fonts.googleapis.com + fonts.gstatic.com.
 */

// Verwijder de externe Google Fonts stylesheet
add_action('wp_enqueue_scripts', function() {
    // Dequeue externe Roboto van Google
    wp_dequeue_style('realfactory-google-fonts');
    wp_deregister_style('realfactory-google-fonts');
}, 100);

// Voeg lokale versie toe
add_action('wp_head', function() {
    echo '<style>
@font-face {
    font-family: "Roboto";
    font-style: normal;
    font-weight: 400;
    font-display: swap;
    src: url("https://www.todoors.nl/wp-content/uploads/2026/04/roboto-400-latin.woff2") format("woff2");
    unicode-range: U+0000-00FF, U+0131, U+0152-0153, U+02BB-02BC, U+02C6, U+02DA, U+02DC, U+0304, U+0308, U+0329, U+2000-206F, U+20AC, U+2122, U+2191, U+2193, U+2212, U+2215, U+FEFF, U+FFFD;
}
</style>' . "\n";
}, 1);

// Verwijder ook via output buffer als de dequeue niet werkt
// Verwijdert tevens de dns-prefetch voor fonts.googleapis.com
add_action('template_redirect', function() {
    ob_start(function($buffer) {
        $buffer = str_replace(
            "<link rel='stylesheet' id='realfactory-google-fonts-css' href='//fonts.googleapis.com/css?family=Roboto:400&amp;display=swap' type='text/css' media='all' />",
            '',
            $buffer
        );
        $buffer = str_replace("<link rel='dns-prefetch' href='//fonts.googleapis.com' />\n", '', $buffer);
        $buffer = str_replace("<link rel='dns-prefetch' href='//fonts.googleapis.com' />", '', $buffer);
        return $buffer;
    });
}, 1);
