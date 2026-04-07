<?php
/**
 * Snippet #98: Beveiligingsheaders
 * Status: ACTIVE
 * Scope: global
 *
 * Voegt ontbrekende HTTP beveiligingsheaders toe.
 * Beschermt tegen clickjacking, MIME-sniffing en onveilige verbindingen.
 */

add_action('send_headers', function() {
    // Voorkomt dat de site in een iframe geladen wordt (clickjacking)
    header('X-Frame-Options: SAMEORIGIN');

    // Voorkomt MIME-type sniffing
    header('X-Content-Type-Options: nosniff');

    // Dwingt HTTPS voor 1 jaar af (inclusief subdomains)
    header('Strict-Transport-Security: max-age=31536000; includeSubDomains');

    // Beperkt welke referrer informatie meegestuurd wordt
    header('Referrer-Policy: no-referrer-when-downgrade');

    // Beperkt toegang tot browser-features
    header('Permissions-Policy: camera=(), microphone=(), geolocation=()');
});
