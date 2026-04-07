<?php
/**
 * Snippet #97: Blokkeer REST API User Enumeration
 * Status: ACTIVE
 * Scope: global
 *
 * Blokkeert /wp-json/wp/v2/users voor niet-ingelogde gebruikers.
 * Blokkeert ?author=N en /author/ pagina's.
 */

// Blokkeer REST API users endpoint
add_filter('rest_endpoints', function($endpoints) {
    if (!is_user_logged_in()) {
        if (isset($endpoints['/wp/v2/users'])) {
            unset($endpoints['/wp/v2/users']);
        }
        if (isset($endpoints['/wp/v2/users/(?P<id>[\d]+)'])) {
            unset($endpoints['/wp/v2/users/(?P<id>[\d]+)']);
        }
    }
    return $endpoints;
});

// Blokkeer ?author=N en /author/ pagina's
add_action('template_redirect', function() {
    if (!is_user_logged_in() && (isset($_GET['author']) || is_author())) {
        wp_redirect(home_url(), 301);
        exit;
    }
});
