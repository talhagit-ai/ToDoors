<?php
/**
 * Snippet #27: ToDoors Product Pages - Rename Sections
 * Status: inactive
 * Scope: global
 */

add_action("wp_footer", function() {
    global $post;
    if (!$post) return;
    
    $prijzen = [
        2804  => ["basis" => "4.000", "van" => "4.300",  "tot" => "12.000"],  // Schuifdeuren
        2820  => ["basis" => "2.500", "van" => "2.700",  "tot" => "4.700"],   // Draaideuren
        2828  => ["basis" => "250",   "van" => "370",    "tot" => "1.070"],   // Deurdrangers
        2832  => ["basis" => "5.000", "van" => "5.500",  "tot" => "15.500"],  // Harmonica
        2823  => ["basis" => "6.000", "van" => "6.500",  "tot" => "10.500"],  // Guillotine
        2520  => ["basis" => "2.500", "van" => "2.700",  "tot" => "4.700"],   // Elektronische
        15218 => ["basis" => "4.000", "van" => "4.300",  "tot" => "12.000"],  // Enkelvleugelig
    ];
    
    if (!isset($prijzen[$post->ID])) return;
    $p = $prijzen[$post->ID];
    ?>
    <script>
    document.addEventListener("DOMContentLoaded", function() {
        var basis = "<?php echo esc_js($p["basis"]); ?>";
        var vanP  = "<?php echo esc_js($p["van"]); ?>";
        var totP  = "<?php echo esc_js($p["tot"]); ?>";
        
        // Verwijder oude prijsteksten
        document.querySelectorAll("*").forEach(function(el) {
            if (el.children.length === 0 && el.textContent) {
                if (el.textContent.includes("Neem contact op voor prijsinformatie") ||
                    el.textContent.includes("Basismodel: Neem contact")) {
                    el.textContent = "";
                }
            }
        });
        
        // Voeg prijsblok toe aan Offerte sectie
        var toegevoegd = false;
        document.querySelectorAll("h3").forEach(function(h3) {
            if (toegevoegd) return;
            var tekst = h3.textContent.trim();
            if (tekst === "Offerte" || tekst === "Prijzen & Offerte") {
                var el = h3.closest(".gdlr-core-pbf-element");
                if (!el) return;
                
                var priceDiv = document.createElement("div");
                priceDiv.style.cssText = "padding: 0 30px 30px;";
                priceDiv.innerHTML = `
                  <div style="display:flex;gap:20px;flex-wrap:wrap;margin:20px 0 15px;">
                    <div style="background:#fff;border:2px solid #e8e8e8;border-radius:10px;padding:22px 28px;flex:1;min-width:180px;">
                      <div style="font-size:11px;color:#999;text-transform:uppercase;letter-spacing:1.5px;margin-bottom:6px;">Basismodel</div>
                      <div style="font-size:26px;font-weight:700;color:#B99D7C;">vanaf €${basis}</div>
                      <div style="font-size:12px;color:#bbb;margin-top:3px;">exclusief installatie</div>
                    </div>
                    <div style="background:#B99D7C;border-radius:10px;padding:22px 28px;flex:1;min-width:180px;">
                      <div style="font-size:11px;color:rgba(255,255,255,0.75);text-transform:uppercase;letter-spacing:1.5px;margin-bottom:6px;">Incl. installatie + onderhoudscontract</div>
                      <div style="font-size:26px;font-weight:700;color:#fff;">€${vanP} – €${totP}</div>
                      <div style="font-size:12px;color:rgba(255,255,255,0.65);margin-top:3px;">compleet pakket</div>
                    </div>
                  </div>
                  <p style="font-size:13px;color:#aaa;margin:0;">Exacte prijs afhankelijk van afmetingen & omstandigheden. <a href="/informatieverzoek/" style="color:#B99D7C;">Vraag gratis offerte aan →</a></p>
                `;
                el.insertAdjacentElement("afterend", priceDiv);
                toegevoegd = true;
            }
        });
    });
    </script>
    <?php
});
