<?php
/**
 * Snippet #100: Meta Descriptions alle pagina's
 * Status: ACTIVE
 * Scope: frontend
 *
 * Voegt <meta name="description"> toe aan alle belangrijke pagina's.
 * Gebruikt is_page() en is_front_page() checks.
 */

add_action('wp_head', function() {
    $desc = '';

    if (is_front_page()) {
        $desc = 'ToDoors levert en installeert automatische deuren, schuifdeuren, draaideuren en toegangssystemen voor bedrijven door heel Nederland. Vraag vrijblijvend offerte aan.';
    } elseif (is_page(2804)) { // Automatische Schuifdeuren
        $desc = 'Automatische schuifdeuren voor uw bedrijf of instelling. ToDoors levert enkelvleugelige, dubbelvleugelige en telescopische schuifdeuren inclusief montage en onderhoud.';
    } elseif (is_page(2820)) { // Automatische Draaideuren
        $desc = 'Professionele automatische draaideuren van ToDoors. Glijarm of knikarm, enkel of dubbel — inclusief installatie, programmering en onderhoudscontract door heel Nederland.';
    } elseif (is_page(2520)) { // Elektronische Toegang
        $desc = 'Elektronische toegangssystemen voor bedrijven. ToDoors levert tag-readers, kaartlezers en toegangscontrole voor kantoren, magazijnen en zorginstellingen. Vraag offerte aan.';
    } elseif (is_page(2828)) { // Deurdrangers
        $desc = 'Deurdrangers voor commercieel en zakelijk gebruik. ToDoors levert en monteert glijarm en knikarm deurdrangers die voldoen aan de geldende veiligheids- en toegankelijkheidsnormen.';
    } elseif (is_page(2832)) { // Harmonica Deuren
        $desc = 'Harmonica deuren op maat voor bedrijven en instellingen. Ruimtebesparend, duurzaam en leverbaar in aluminium of staal. ToDoors verzorgt levering en installatie door heel Nederland.';
    } elseif (is_page(2823)) { // Guillotine Ramen
        $desc = 'Guillotine ramen voor loketbalie of doorgeefluik. Elektrisch of handmatig bedienbaar, op maat gemaakt door ToDoors. Geschikt voor kantoren, ziekenhuizen en instellingen.';
    } elseif (is_page(16248)) { // Automatische Deuren (overzicht)
        $desc = 'Overzicht van alle automatische deuren van ToDoors: schuifdeuren, draaideuren, harmonica deuren en meer. Professionele installatie en onderhoud door heel Nederland.';
    } elseif (is_page(157)) { // Service
        $desc = 'ToDoors biedt uitgebreide servicecontracten voor automatische deuren en toegangssystemen. 24/7 storingsdienst, onderhoud en reparatie door gecertificeerde technici.';
    } elseif (is_page(1852)) { // Over ons
        $desc = 'ToDoors is specialist in automatische deuren en toegangssystemen, gevestigd in Lelystad. Ontdek ons team, onze werkwijze en waarom bedrijven door heel Nederland voor ons kiezen.';
    } elseif (is_page(1964)) { // Contact
        $desc = 'Neem contact op met ToDoors voor een vrijblijvende offerte of advies over automatische deuren en toegangssystemen. Bereikbaar via telefoon, e-mail of ons contactformulier.';
    } elseif (is_home()) { // FAQ's pagina
        $desc = 'Veelgestelde vragen over automatische deuren, schuifdeuren, draaideuren en toegangssystemen. ToDoors beantwoordt al uw vragen over installatie, onderhoud en kosten.';
    }

    if ($desc) {
        echo '<meta name="description" content="' . esc_attr($desc) . '">' . "\n";
    }
}, 2);
