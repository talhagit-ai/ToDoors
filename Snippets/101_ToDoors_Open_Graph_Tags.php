<?php
/**
 * Snippet #101: Open Graph Tags
 * Status: ACTIVE
 * Scope: frontend
 *
 * Voegt og:title, og:description, og:image, og:url en og:type toe.
 * Zorgt voor correcte previews bij delen via WhatsApp, LinkedIn, Facebook.
 */

add_action('wp_head', function() {
    $site_name = 'ToDoors';
    $logo      = 'https://www.todoors.nl/wp-content/uploads/2024/01/ToDoors-logo-e1705172432714-scaled.png';

    // Bepaal titel, beschrijving en afbeelding per pagina
    if (is_front_page()) {
        $title = 'ToDoors – Automatische Deuren & Toegangssystemen';
        $desc  = 'ToDoors levert en installeert automatische deuren, schuifdeuren, draaideuren en toegangssystemen voor bedrijven door heel Nederland. Vraag vrijblijvend offerte aan.';
        $image = 'https://www.todoors.nl/wp-content/uploads/2024/10/IMG_7175-scaled.jpeg';
        $type  = 'website';
    } elseif (is_page(2804)) {
        $title = 'Automatische Schuifdeuren – ToDoors';
        $desc  = 'Automatische schuifdeuren voor uw bedrijf of instelling. Enkelvleugelig, dubbelvleugelig of telescopisch. Inclusief montage en onderhoud door heel Nederland.';
        $image = 'https://www.todoors.nl/wp-content/uploads/2024/10/IMG_7175-scaled.jpeg';
        $type  = 'article';
    } elseif (is_page(2820)) {
        $title = 'Automatische Draaideuren – ToDoors';
        $desc  = 'Professionele automatische draaideuren van ToDoors. Glijarm of knikarm, enkel of dubbel — inclusief installatie en onderhoudscontract door heel Nederland.';
        $image = 'https://www.todoors.nl/wp-content/uploads/2024/10/IMG_7175-scaled.jpeg';
        $type  = 'article';
    } elseif (is_page(2520)) {
        $title = 'Elektronische Toegang – ToDoors';
        $desc  = 'Elektronische toegangssystemen voor bedrijven. Tag-readers, kaartlezers en toegangscontrole voor kantoren, magazijnen en zorginstellingen.';
        $image = 'https://www.todoors.nl/wp-content/uploads/2024/10/IMG_7175-scaled.jpeg';
        $type  = 'article';
    } elseif (is_page(2828)) {
        $title = 'Deurdrangers – ToDoors';
        $desc  = 'Deurdrangers voor commercieel en zakelijk gebruik. Glijarm en knikarm, voldoet aan veiligheidsnormen. Levering en montage door heel Nederland.';
        $image = 'https://www.todoors.nl/wp-content/uploads/2024/10/IMG_7175-scaled.jpeg';
        $type  = 'article';
    } elseif (is_page(2832)) {
        $title = 'Harmonica Deuren – ToDoors';
        $desc  = 'Harmonica deuren op maat voor bedrijven. Ruimtebesparend en duurzaam in aluminium of staal. Levering en installatie door heel Nederland.';
        $image = 'https://www.todoors.nl/wp-content/uploads/2024/10/IMG_7175-scaled.jpeg';
        $type  = 'article';
    } elseif (is_page(2823)) {
        $title = 'Guillotine Ramen – ToDoors';
        $desc  = 'Guillotine ramen voor loketbalie of doorgeefluik. Elektrisch of handmatig, op maat gemaakt. Geschikt voor kantoren, ziekenhuizen en instellingen.';
        $image = 'https://www.todoors.nl/wp-content/uploads/2024/10/IMG_7175-scaled.jpeg';
        $type  = 'article';
    } elseif (is_page(157)) {
        $title = 'Service & Onderhoud – ToDoors';
        $desc  = 'Uitgebreide servicecontracten voor automatische deuren. 24/7 storingsdienst, onderhoud en reparatie door gecertificeerde technici door heel Nederland.';
        $image = 'https://www.todoors.nl/wp-content/uploads/2016/09/service-11.jpg';
        $type  = 'article';
    } elseif (is_page(1852)) {
        $title = 'Over Ons – ToDoors';
        $desc  = 'ToDoors is specialist in automatische deuren en toegangssystemen vanuit Lelystad. Ontdek ons team en waarom bedrijven door heel Nederland voor ons kiezen.';
        $image = 'https://www.todoors.nl/wp-content/uploads/2023/10/Over-ons-e1718125153379.jpeg';
        $type  = 'article';
    } elseif (is_page(1964)) {
        $title = 'Contact – ToDoors';
        $desc  = 'Neem contact op met ToDoors voor een vrijblijvende offerte of advies. Bereikbaar via telefoon, e-mail of ons contactformulier.';
        $image = $logo;
        $type  = 'article';
    } elseif (is_home()) {
        $title = 'FAQ\'s – Veelgestelde Vragen – ToDoors';
        $desc  = 'Veelgestelde vragen over automatische deuren, schuifdeuren, draaideuren en toegangssystemen. ToDoors beantwoordt al uw vragen.';
        $image = $logo;
        $type  = 'article';
    } elseif (is_singular('post')) {
        global $post;
        $title = get_the_title() . ' – ' . $site_name;
        $desc  = get_the_excerpt();
        $image = has_post_thumbnail() ? get_the_post_thumbnail_url($post, 'large') : $logo;
        $type  = 'article';
    } else {
        return;
    }

    $url = get_permalink() ?: home_url(add_query_arg(null, null));

    echo '<meta property="og:type" content="' . esc_attr($type) . '">' . "\n";
    echo '<meta property="og:site_name" content="' . esc_attr($site_name) . '">' . "\n";
    echo '<meta property="og:url" content="' . esc_url($url) . '">' . "\n";
    echo '<meta property="og:title" content="' . esc_attr($title) . '">' . "\n";
    echo '<meta property="og:description" content="' . esc_attr($desc) . '">' . "\n";
    echo '<meta property="og:image" content="' . esc_url($image) . '">' . "\n";
    echo '<meta property="og:locale" content="nl_NL">' . "\n";
}, 3);
