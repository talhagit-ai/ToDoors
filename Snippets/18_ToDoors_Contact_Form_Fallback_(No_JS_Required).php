<?php
/**
 * Snippet #18: ToDoors Contact Form Fallback (No JS Required)
 * Status: inactive
 * Scope: global
 */

// Add a server-side HTML contact form fallback
add_action('wp_footer', function() {
    if (is_page('informatieverzoek')) {
        ?>
        <style>
            .tdoors-contact-fallback {
                background: #f7f7f7;
                padding: 40px;
                margin: 40px auto;
                max-width: 600px;
                border-radius: 8px;
                border-left: 4px solid #B99D7C;
            }
            .tdoors-contact-fallback h3 {
                margin-top: 0;
                color: #0a0a0a;
                font-size: 24px;
            }
            .tdoors-contact-fallback form {
                display: flex;
                flex-direction: column;
            }
            .tdoors-contact-fallback input,
            .tdoors-contact-fallback textarea,
            .tdoors-contact-fallback select {
                padding: 12px;
                margin-bottom: 15px;
                border: 1px solid #ddd;
                border-radius: 4px;
                font-family: inherit;
                font-size: 14px;
            }
            .tdoors-contact-fallback textarea {
                min-height: 120px;
                resize: vertical;
            }
            .tdoors-contact-fallback button {
                padding: 14px 24px;
                background: #B99D7C;
                color: white;
                border: none;
                border-radius: 4px;
                font-size: 16px;
                font-weight: 600;
                cursor: pointer;
                transition: background 0.3s;
            }
            .tdoors-contact-fallback button:hover {
                background: #a68969;
            }
            .tdoors-contact-fallback .success-message {
                display: none;
                background: #059669;
                color: white;
                padding: 15px;
                border-radius: 4px;
                margin-bottom: 15px;
            }
        </style>

        <div class="tdoors-contact-fallback">
            <h3>📞 Offerte aanvragen (Geen JavaScript nodig)</h3>
            <p style="color: #666; margin-bottom: 20px;">Deze vorm werkt ook zonder JavaScript ingeschakeld</p>
            
            <div class="success-message" style="display: none;">
                <strong>✓ Bedankt!</strong> Uw bericht is verstuurd. We nemen contact op binnen 2 uur.
            </div>

            <form method="POST" action="https://www.todoors.nl/wp-admin/admin-ajax.php?action=tdoors_contact_submit" style="display:none;">
                <noscript>
                    <p><strong>JavaScript is uitgeschakeld.</strong> Dit formulier werkt zonder JavaScript!</p>
                </noscript>
                <input type="hidden" name="action" value="tdoors_contact_submit">
                <input type="hidden" name="nonce" value="">
                
                <input type="text" name="naam" placeholder="Uw naam *" required>
                <input type="email" name="email" placeholder="E-mailadres *" required>
                <input type="tel" name="telefoon" placeholder="Telefoonnummer" />
                <input type="text" name="bedrijf" placeholder="Bedrijfsnaam">
                <input type="text" name="onderwerp" placeholder="Onderwerp (bijv: Schuifdeur, Onderhoud)" value="">
                <textarea name="bericht" placeholder="Uw vraag of informatie..." required></textarea>
                
                <button type="submit">Offerte aanvragen →</button>
            </form>

            <p style="font-size: 12px; color: #999; margin-top: 20px; text-align: center;">
                🔒 Uw gegevens zijn vertrouwelijk | Reactie binnen 2 uur
            </p>
        </div>

        <script>
        // Handle form submission without requiring the form plugin
        document.addEventListener('DOMContentLoaded', function() {
            var form = document.querySelector('.tdoors-contact-fallback form');
            if (!form) return;
            form.style.display = 'block';
            
            form.addEventListener('submit', function(e) {
                e.preventDefault();
                var formData = new FormData(form);
                formData.append('action', 'tdoors_contact_submit');
                
                fetch('https://www.todoors.nl/wp-admin/admin-ajax.php', {
                    method: 'POST',
                    body: formData
                })
                .then(r => r.json())
                .then(data => {
                    if (data.success) {
                        form.style.display = 'none';
                        document.querySelector('.success-message').style.display = 'block';
                        setTimeout(() => {
                            window.location.href = '/contact/';
                        }, 3000);
                    }
                })
                .catch(err => {
                    // Submit via traditional method if fetch fails
                    form.submit();
                });
            });
        });
        </script>
        <?php
    }
}, 99);

// Handle form submission via AJAX
add_action('wp_ajax_tdoors_contact_submit', 'tdoors_handle_contact_submit');
add_action('wp_ajax_nopriv_tdoors_contact_submit', 'tdoors_handle_contact_submit');

function tdoors_handle_contact_submit() {
    $naam = sanitize_text_field($_POST['naam'] ?? '');
    $email = sanitize_email($_POST['email'] ?? '');
    $telefoon = sanitize_text_field($_POST['telefoon'] ?? '');
    $bedrijf = sanitize_text_field($_POST['bedrijf'] ?? '');
    $onderwerp = sanitize_text_field($_POST['onderwerp'] ?? '');
    $bericht = sanitize_textarea_field($_POST['bericht'] ?? '');

    if (!$naam || !$email || !$bericht) {
        wp_send_json_error(['message' => 'Vul alstublieft alle vereiste velden in']);
    }

    $to = 'info@todoors.nl';
    $subject = 'Nieuwe offerteverzoek: ' . $onderwerp;
    $message = "Nieuwe offerteverzoek via website:\n\n";
    $message .= "Naam: $naam\n";
    $message .= "Email: $email\n";
    $message .= "Telefoon: $telefoon\n";
    $message .= "Bedrijf: $bedrijf\n";
    $message .= "Onderwerp: $onderwerp\n\n";
    $message .= "Bericht:\n$bericht\n";

    $headers = "From: $email\r\n";
    $headers .= "Reply-To: $email\r\n";
    $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

    if (wp_mail($to, $subject, $message, $headers)) {
        // Also send auto-reply to customer
        $reply = "Bedankt voor uw offerteverzoek!\n\n";
        $reply .= "Wij zullen u binnen 2 uur contacteren.\n\n";
        $reply .= "Met vriendelijke groeten,\nToDoors team";
        wp_mail($email, 'Offerteverzoek ontvangen - ToDoors', $reply);
        
        wp_send_json_success(['message' => 'Uw bericht is verstuurd']);
    } else {
        wp_send_json_error(['message' => 'Er is een fout opgetreden']);
    }
}
