<?php
/**
 * Snippet #89: Fix Contact Links – informatieverzoek → contact
 * Status: ACTIVE
 * Scope: frontend
 *
 * Vervangt alle links naar /informatieverzoek/ door /contact/
 * op alle pagina's via output buffer.
 */

add_action('template_redirect', function() {
    ob_start(function($buffer) {
        return str_replace(
            [
                'href="https://www.todoors.nl/informatieverzoek/"',
                'href="https://www.todoors.nl/informatieverzoek"',
                'href="/informatieverzoek/"',
                'href="/informatieverzoek"',
            ],
            [
                'href="https://www.todoors.nl/contact/"',
                'href="https://www.todoors.nl/contact/"',
                'href="/contact/"',
                'href="/contact/"',
            ],
            $buffer
        );
    });
}, 1);
