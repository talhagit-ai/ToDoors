<?php
/**
 * Snippet #90: Showroom Appointment → Mailto Link
 * Status: ACTIVE
 * Scope: frontend
 *
 * Maakt van de kale showroom-tekst in de footer een klikbare mailto link.
 */

add_action('template_redirect', function() {
    ob_start(function($buffer) {
        return str_replace(
            '<p>Bezoek adres/showroom alleen op afspraak</p>',
            '<p><a href="mailto:info@todoors.nl?subject=Afspraak%20showroom" style="color:#b9b9b9; text-decoration:underline;">Bezoek adres/showroom alleen op afspraak</a></p>',
            $buffer
        );
    });
}, 1);
