<?php
/**
 * Snippet #28: ToDoors Google Reviews - Over Ons
 * Status: ACTIVE
 * Scope: global
 */

add_action("wp_footer", function() {
    global $post;
    if (!$post || $post->ID != 1852) return;
    ?>
    <script>
    document.addEventListener("DOMContentLoaded", function() {
        // Find the existing review section (contains M. Hendriksen / placeholder reviews)
        var oldReviewSection = null;
        document.querySelectorAll(".gdlr-core-pbf-wrapper").forEach(function(wrapper) {
            if (wrapper.querySelector && wrapper.textContent.includes("M. Hendriksen") || 
                (wrapper.textContent && wrapper.textContent.includes("Stadspoort"))) {
                oldReviewSection = wrapper;
            }
        });
        
        // Real Google reviews HTML
        var realReviews = `
        <div style="max-width:1100px;margin:0 auto;padding:0 30px;">
          <div style="text-align:center;margin-bottom:40px;">
            <span style="color:#B99D7C;font-size:14px;letter-spacing:2px;text-transform:uppercase;">Klantervaringen</span>
            <h3 style="font-size:33px;margin-top:10px;">Wat onze klanten zeggen</h3>
          </div>
          <div style="display:flex;gap:30px;flex-wrap:wrap;justify-content:center;">
            
            <div style="background:#fff;border-radius:12px;padding:35px;flex:1;min-width:280px;max-width:360px;box-shadow:0 3px 20px rgba(0,0,0,0.08);position:relative;">
              <div style="display:flex;align-items:center;gap:12px;margin-bottom:16px;">
                <div style="width:46px;height:46px;background:#B99D7C;border-radius:50%;display:flex;align-items:center;justify-content:center;color:#fff;font-weight:700;font-size:18px;">J</div>
                <div>
                  <strong style="display:block;color:#222;font-size:15px;">Jordy Weel</strong>
                  <span style="color:#888;font-size:13px;">HVO Meat</span>
                </div>
                <div style="margin-left:auto;display:flex;gap:2px;">
                  <svg width="16" height="16" viewBox="0 0 24 24"><path fill="#4285F4" d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z"/><path fill="#34A853" d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z"/><path fill="#FBBC05" d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.07H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.93l2.85-2.22.81-.62z"/><path fill="#EA4335" d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.07l3.66 2.84c.87-2.6 3.3-4.53 6.16-4.53z"/></svg>
                </div>
              </div>
              <div style="color:#f7c02e;font-size:16px;margin-bottom:14px;">★★★★★</div>
              <p style="color:#555;font-size:14px;line-height:1.8;margin:0;">&ldquo;Wij hebben bij ToDoors een zeer positieve ervaring gehad. Vanaf het eerste contact was de communicatie duidelijk en professioneel. De levering en plaatsing verliepen vlot en volgens afspraak. De kwaliteit van de deuren en de afwerking zijn uitstekend. Ook bij eventuele storingen staan zij in de avond voor je klaar en denken meteen mee voor oplossing. Wij waarderen vooral het meedenken, de service en de nette manier van werken.&rdquo;</p>
            </div>
            
            <div style="background:#fff;border-radius:12px;padding:35px;flex:1;min-width:280px;max-width:360px;box-shadow:0 3px 20px rgba(0,0,0,0.08);">
              <div style="display:flex;align-items:center;gap:12px;margin-bottom:16px;">
                <div style="width:46px;height:46px;background:#2d9bea;border-radius:50%;display:flex;align-items:center;justify-content:center;color:#fff;font-weight:700;font-size:18px;">V</div>
                <div>
                  <strong style="display:block;color:#222;font-size:15px;">Voordeelfiets Algemeen</strong>
                  <span style="color:#888;font-size:13px;">Voordeelfiets</span>
                </div>
                <div style="margin-left:auto;">
                  <svg width="16" height="16" viewBox="0 0 24 24"><path fill="#4285F4" d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z"/><path fill="#34A853" d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z"/><path fill="#FBBC05" d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.07H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.93l2.85-2.22.81-.62z"/><path fill="#EA4335" d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.07l3.66 2.84c.87-2.6 3.3-4.53 6.16-4.53z"/></svg>
                </div>
              </div>
              <div style="color:#f7c02e;font-size:16px;margin-bottom:14px;">★★★★★</div>
              <p style="color:#555;font-size:14px;line-height:1.8;margin:0;">&ldquo;Via Google bij dit bedrijf gekomen. Ze waren telefonisch goed bereikbaar, en komen hun afspraken na. Elektrisch deur was stuk, maar het moest snel opgelost worden. Dit hebben ze direct voor ons gedaan. Top bedrijf!&rdquo;</p>
            </div>
            
            <div style="background:#fff;border-radius:12px;padding:35px;flex:1;min-width:280px;max-width:360px;box-shadow:0 3px 20px rgba(0,0,0,0.08);">
              <div style="display:flex;align-items:center;gap:12px;margin-bottom:16px;">
                <div style="width:46px;height:46px;background:#34a853;border-radius:50%;display:flex;align-items:center;justify-content:center;color:#fff;font-weight:700;font-size:18px;">M</div>
                <div>
                  <strong style="display:block;color:#222;font-size:15px;">Mark Butterman</strong>
                  <span style="color:#888;font-size:13px;">Google Review</span>
                </div>
                <div style="margin-left:auto;">
                  <svg width="16" height="16" viewBox="0 0 24 24"><path fill="#4285F4" d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z"/><path fill="#34A853" d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z"/><path fill="#FBBC05" d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.07H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.93l2.85-2.22.81-.62z"/><path fill="#EA4335" d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.07l3.66 2.84c.87-2.6 3.3-4.53 6.16-4.53z"/></svg>
                </div>
              </div>
              <div style="color:#f7c02e;font-size:16px;margin-bottom:14px;">★★★★★</div>
              <p style="color:#555;font-size:14px;line-height:1.8;margin:0;">&ldquo;Goede partij om mee samen te werken, komt afspraken na!&rdquo;</p>
            </div>
          </div>
          
          <div style="text-align:center;margin-top:35px;">
            <a href="https://www.google.com/maps/search/ToDoors+Intelligente+toegang+en+automatisering" target="_blank" style="display:inline-flex;align-items:center;gap:8px;background:#fff;border:2px solid #ddd;padding:10px 24px;border-radius:25px;color:#555;text-decoration:none;font-size:14px;">
              <svg width="16" height="16" viewBox="0 0 24 24"><path fill="#4285F4" d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z"/><path fill="#34A853" d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z"/><path fill="#FBBC05" d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.07H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.93l2.85-2.22.81-.62z"/><path fill="#EA4335" d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.07l3.66 2.84c.87-2.6 3.3-4.53 6.16-4.53z"/></svg>
              Bekijk alle reviews op Google
            </a>
          </div>
        </div>`;
        
        // Find and REPLACE the old review section
        document.querySelectorAll(".gdlr-core-pbf-wrapper").forEach(function(wrapper) {
            if (wrapper.textContent.includes("M. Hendriksen") || wrapper.textContent.includes("Stadspoort") || wrapper.textContent.includes("Medisch Centrum Flevo")) {
                wrapper.innerHTML = "<div style=\"padding: 70px 0; background: #f7f7f7;\">" + realReviews + "</div>";
            }
        });
        
        // Also remove the appended reviews section from snippet 28 (if it exists at bottom)
        document.querySelectorAll("div[style*=\"background: #f9f9f9\"]").forEach(function(el) {
            if (el.textContent.includes("Jordy Weel")) {
                el.remove();
            }
        });
    });
    </script>
    <?php
});
