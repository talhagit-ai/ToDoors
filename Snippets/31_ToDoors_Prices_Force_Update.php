<?php
/**
 * Snippet #31: ToDoors Prices Force Update
 * Status: inactive
 * Scope: single-use
 */

add_action("init", function() {
    delete_option("tdoors_prices_updated_v2");
    
    $prijzen = [
        2804 => ["naam" => "Automatische Schuifdeuren", "basis" => "4.000", "van" => "4.300",  "tot" => "12.000"],
        2820 => ["naam" => "Automatische Draaideuren",  "basis" => "2.500", "van" => "2.700",  "tot" => "4.700"],
        2828 => ["naam" => "Deurdrangers",              "basis" => "250",   "van" => "370",    "tot" => "1.070"],
        2832 => ["naam" => "Harmonica Deuren",          "basis" => "5.000", "van" => "5.500",  "tot" => "15.500"],
        2823 => ["naam" => "Guillotine Ramen",          "basis" => "6.000", "van" => "6.500",  "tot" => "10.500"],
        2520 => ["naam" => "Elektronische Toegang",     "basis" => "2.500", "van" => "2.700",  "tot" => "4.700"],
    ];

    foreach ($prijzen as $page_id => $p) {
        $data = get_post_meta($page_id, "gdlr-core-page-builder", true);
        if (!is_array($data)) continue;

        $new_content = "<div style=\"background: white; padding: 30px; border-radius: 8px; border-left: 4px solid #B99D7C; margin: 30px 0;\">
<h4>Prijsinformatie</h4>
<p>De prijs van <strong>{$p[\"naam\"]}</strong> hangt af van:</p>
<ul style=\"line-height: 2;\">
<li>✓ Specifieke model en afmetingen</li>
<li>✓ Installatiemoeilijkheid</li>
<li>✓ Kabelwerk en stroomvoorziening</li>
<li>✓ Eventuele aanpassingen nodig</li>
</ul>
<p style=\"background: #e8f5e9; padding: 20px; border-radius: 8px; margin-top: 20px;\">
<strong>💰 Basismodel: Vanaf €{$p[\"basis\"]} (exclusief installatie)</strong><br>
<em>Volledige installatie + onderhoudscontract: €{$p[\"van\"]} – €{$p[\"tot\"]}</em>
</p>
<p style=\"margin-top: 20px; text-align: center;\">
<strong>Wilt u exact weten wat het voor uw situatie kost?</strong><br>
<a href=\"/contact/\" style=\"display: inline-block; margin-top: 10px; padding: 12px 24px; background: #B99D7C; color: white; text-decoration: none; border-radius: 4px; font-weight: 600;\">Gratis offerte aanvragen</a>
</p>
</div>";

        array_walk_recursive($data, function(&$val, $key) use ($new_content) {
            if ($key === "content" && is_string($val) && strpos($val, "Basismodel") !== false) {
                $val = $new_content;
            }
        });

        update_post_meta($page_id, "gdlr-core-page-builder", $data);
        do_action("litespeed_purge_post", $page_id);
    }

    update_option("tdoors_prices_updated_v2", date("Y-m-d H:i:s"));
    error_log("ToDoors: prices updated v2");
}, 1);
