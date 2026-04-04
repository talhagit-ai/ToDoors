<?php
/**
 * Snippet #19: ToDoors Contact Form Fallback Direct
 * Status: inactive
 * Scope: global
 */

add_action('init', function() {
    if (get_option('tdoors_contact_form_fallback_added')) return;
    
    // Add HTML contact form to informatieverzoek page content
    $page_id = 2715; // informatieverzoek page
    $current_content = get_post_field('post_content', $page_id);
    
    $fallback_html = '

<!-- CONTACT FORM FALLBACK (No JavaScript Required) -->
<div style="background: #f7f7f7; padding: 40px; margin: 40px auto; max-width: 600px; border-radius: 8px; border-left: 4px solid #B99D7C;">
    <h3 style="margin-top: 0; color: #0a0a0a; font-size: 24px;">📞 Offerte aanvragen - Geen JavaScript nodig</h3>
    <p style="color: #666; margin-bottom: 20px;">Dit formulier werkt ook zonder JavaScript ingeschakeld</p>
    
    <form method="POST" action="' . admin_url('admin-ajax.php') . '">
        <input type="hidden" name="action" value="tdoors_contact_submit">
        
        <input type="text" name="naam" placeholder="Uw naam *" required style="padding: 12px; margin-bottom: 15px; border: 1px solid #ddd; border-radius: 4px; font-size: 14px; width: 100%; box-sizing: border-box;">
        <input type="email" name="email" placeholder="E-mailadres *" required style="padding: 12px; margin-bottom: 15px; border: 1px solid #ddd; border-radius: 4px; font-size: 14px; width: 100%; box-sizing: border-box;">
        <input type="tel" name="telefoon" placeholder="Telefoonnummer" style="padding: 12px; margin-bottom: 15px; border: 1px solid #ddd; border-radius: 4px; font-size: 14px; width: 100%; box-sizing: border-box;">
        <input type="text" name="bedrijf" placeholder="Bedrijfsnaam" style="padding: 12px; margin-bottom: 15px; border: 1px solid #ddd; border-radius: 4px; font-size: 14px; width: 100%; box-sizing: border-box;">
        <input type="text" name="onderwerp" placeholder="Onderwerp (bijv: Schuifdeur, Onderhoud)" style="padding: 12px; margin-bottom: 15px; border: 1px solid #ddd; border-radius: 4px; font-size: 14px; width: 100%; box-sizing: border-box;">
        <textarea name="bericht" placeholder="Uw vraag of informatie..." required style="padding: 12px; margin-bottom: 15px; border: 1px solid #ddd; border-radius: 4px; font-size: 14px; min-height: 120px; width: 100%; box-sizing: border-box; font-family: inherit;"></textarea>
        
        <button type="submit" style="padding: 14px 24px; background: #B99D7C; color: white; border: none; border-radius: 4px; font-size: 16px; font-weight: 600; cursor: pointer;">Offerte aanvragen →</button>
    </form>
    
    <p style="font-size: 12px; color: #999; margin-top: 20px; text-align: center;">
        🔒 Uw gegevens zijn vertrouwelijk | Reactie binnen 2 uur
    </p>
</div>
<!-- END CONTACT FORM FALLBACK -->

';
    
    if (strpos($current_content, 'CONTACT FORM FALLBACK') === false) {
        $new_content = $current_content . $fallback_html;
        wp_update_post([
            'ID' => $page_id,
            'post_content' => $new_content
        ]);
        do_action('litespeed_purge_post', $page_id);
    }
    
    update_option('tdoors_contact_form_fallback_added', date('Y-m-d H:i:s'));
    error_log('ToDoors: Contact form fallback added to page content');
}, 99);

// Handle form submission
add_action('wp_ajax_nopriv_tdoors_contact_submit', 'tdoors_contact_submit_handler');
add_action('wp_ajax_tdoors_contact_submit', 'tdoors_contact_submit_handler');

function tdoors_contact_submit_handler() {
    $naam = sanitize_text_field($_POST['naam'] ?? '');
    $email = sanitize_email($_POST['email'] ?? '');
    $telefoon = sanitize_text_field($_POST['telefoon'] ?? '');
    $bedrijf = sanitize_text_field($_POST['bedrijf'] ?? '');
    $onderwerp = sanitize_text_field($_POST['onderwerp'] ?? '');
    $bericht = sanitize_textarea_field($_POST['bericht'] ?? '');

    if (empty($naam) || empty($email) || empty($bericht)) {
        wp_redirect('/informatieverzoek/?error=incomplete');
        exit;
    }

    $to = 'info@todoors.nl';
    $subject = 'Offerteverzoek: ' . ($onderwerp ?: 'Geen onderwerp opgegeven');
    $message = "Offerteverzoek van website:\n\n";
    $message .= "Naam: $naam\n";
    $message .= "Email: $email\n";
    $message .= "Telefoon: $telefoon\n";
    $message .= "Bedrijf: $bedrijf\n";
    $message .= "Onderwerp: $onderwerp\n\n";
    $message .= "Bericht:\n$bericht\n\n";
    $message .= "---\nVerstuurd via website contactformulier";

    $headers = ["From: $email", "Reply-To: $email", "Content-Type: text/plain; charset=UTF-8"];
    
    if (wp_mail($to, $subject, $message, $headers)) {
        wp_mail($email, 'Offerteverzoek ontvangen - ToDoors', "Dank u wel voor uw bericht. Wij nemen contact met u op binnen 2 uur.\n\nMet vriendelijke groeten,\nToDoors team");
        wp_redirect('/informatieverzoek/?success=1');
    } else {
        wp_redirect('/informatieverzoek/?error=failed');
    }
    exit;
}
