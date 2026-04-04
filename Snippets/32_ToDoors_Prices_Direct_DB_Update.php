<?php
/**
 * Snippet #32: ToDoors Prices Direct DB Update
 * Status: inactive
 * Scope: single-use
 */

add_action("init", function() {
    $prijzen = [
        2804 => ["naam" => "Automatische Schuifdeuren", "basis" => "4.000", "van" => "4.300",  "tot" => "12.000"],
        2820 => ["naam" => "Automatische Draaideuren",  "basis" => "2.500", "van" => "2.700",  "tot" => "4.700"],
        2828 => ["naam" => "Deurdrangers",              "basis" => "250",   "van" => "370",    "tot" => "1.070"],
        2832 => ["naam" => "Harmonica Deuren",          "basis" => "5.000", "van" => "5.500",  "tot" => "15.500"],
        2823 => ["naam" => "Guillotine Ramen",          "basis" => "6.000", "van" => "6.500",  "tot" => "10.500"],
        2520 => ["naam" => "Elektronische Toegang",     "basis" => "2.500", "van" => "2.700",  "tot" => "4.700"],
    ];

    global $wpdb;

    foreach ($prijzen as $page_id => $p) {
        // Haal de geserialiseerde meta op als raw string
        $raw = $wpdb->get_var($wpdb->prepare(
            "SELECT meta_value FROM {$wpdb->postmeta} WHERE post_id = %d AND meta_key = %s",
            $page_id, "gdlr-core-page-builder"
        ));

        if (!$raw || strpos($raw, "Basismodel") === false) continue;

        $new_content = "<div style=\\"background: white; padding: 30px; border-radius: 8px; border-left: 4px solid #B99D7C; margin: 30px 0;\\"><h4>Prijsinformatie</h4><p>De prijs van <strong>{$p[\"naam\"]}</strong> hangt af van:</p><ul style=\\"line-height: 2;\\"><li>✓ Specifieke model en afmetingen</li><li>✓ Installatiemoeilijkheid</li><li>✓ Kabelwerk en stroomvoorziening</li><li>✓ Eventuele aanpassingen nodig</li></ul><p style=\\"background: #e8f5e9; padding: 20px; border-radius: 8px; margin-top: 20px;\\"><strong>💰 Basismodel: Vanaf €{$p[\"basis\"]} (exclusief installatie)</strong><br><em>Volledige installatie + onderhoudscontract: €{$p[\"van\"]} – €{$p[\"tot\"]}</em></p><p style=\\"margin-top: 20px; text-align: center;\\"><strong>Wilt u exact weten wat het voor uw situatie kost?</strong><br><a href=\\"/contact/\\" style=\\"display: inline-block; margin-top: 10px; padding: 12px 24px; background: #B99D7C; color: white; text-decoration: none; border-radius: 4px; font-weight: 600;\\">Gratis offerte aanvragen</a></p></div>";

        // Deserialize, update, re-serialize
        $data = unserialize($raw);
        if (!is_array($data)) continue;

        $updated = false;
        foreach ($data as &$section) {
            if (!isset($section["items"])) continue;
            foreach ($section["items"] as &$item) {
                if (isset($item["value"]["content"]) && strpos($item["value"]["content"], "Basismodel") !== false) {
                    $item["value"]["content"] = $new_content;
                    $updated = true;
                }
                // Check nested items
                if (isset($item["items"])) {
                    foreach ($item["items"] as &$sub) {
                        if (isset($sub["value"]["content"]) && strpos($sub["value"]["content"], "Basismodel") !== false) {
                            $sub["value"]["content"] = $new_content;
                            $updated = true;
                        }
                    }
                }
            }
        }

        if ($updated) {
            update_post_meta($page_id, "gdlr-core-page-builder", $data);
            do_action("litespeed_purge_post", $page_id);
            error_log("ToDoors: prices updated for page $page_id");
        }
    }
}, 1);
