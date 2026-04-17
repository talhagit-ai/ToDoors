<?php
/**
 * SEO_24_Premium_Content_Styles
 * Gecentraliseerd CSS design system voor alle premium content op todoors.nl
 * Eén snippet aanpassen → alle posts/pagina's updaten direct
 *
 * Snippet ID op site: 193
 * Scope: front-end
 *
 * Gebruik: wrap content in <div class="td-premium">...</div>
 *
 * Beschikbare CSS-klassen:
 *   .td-lead          — openingsalinea (featured snippet target)
 *   .td-intro-box     — groen snel-antwoord blok
 *   .td-facts         — 4-koloms feiten strip (donkerblauw)
 *   .td-fact          — individueel feit
 *   .td-fact-icon     — icoon van feit
 *   .td-fact-text     — tekst van feit
 *   .td-table         — vergelijkingstabel (donkerblauw header)
 *   .td-tip           — oranje expert-tip callout
 *   .td-info          — blauw info-blok
 *   .td-highlight     — donkerblauw highlight-box met groot getal
 *   .td-highlight-number — het grote getal
 *   .td-checklist     — lijst met groene vinkjes
 *   .td-steps         — genummerde stappen
 *   .td-card-grid     — 3-koloms kaartjesgrid
 *   .td-card          — individueel kaartje
 *   .td-card-icon     — icoon in kaartje
 *   .td-faq-section   — FAQ sectie wrapper
 *   .td-faq-item      — individuele vraag/antwoord
 *   .td-cta-block     — donkerblauw CTA blok
 *   .td-cta-btn       — groene knop
 *   .td-cta-btn-outline — outline knop
 */
add_action('wp_head', function() {
    if (!is_singular()) return;
    ?>
    <style id="td-premium-styles">
    .td-premium{max-width:820px;margin:0 auto;font-family:-apple-system,BlinkMacSystemFont,'Segoe UI',Roboto,sans-serif;color:#333;line-height:1.7}
    .td-premium .td-lead{font-size:18px;color:#444;line-height:1.8;margin-bottom:24px;border-left:4px solid #2d6a4f;padding-left:20px}
    .td-premium .td-intro-box{background:linear-gradient(135deg,#f0faf4 0%,#e8f5e9 100%);border:1px solid #c8e6c9;border-radius:12px;padding:24px 28px;margin:28px 0}
    .td-premium .td-intro-box p{margin:0;font-size:15px;color:#2d6a4f}
    .td-premium .td-intro-box strong{color:#1b5e20}
    .td-premium h2{font-size:22px;color:#1a1a2e;margin:40px 0 16px;padding-bottom:8px;border-bottom:2px solid #e8f5e9}
    .td-premium h3{font-size:18px;color:#1a1a2e;margin:28px 0 12px}
    .td-premium .td-table{width:100%;border-collapse:collapse;margin:24px 0;border-radius:10px;overflow:hidden;box-shadow:0 2px 12px rgba(0,0,0,0.06)}
    .td-premium .td-table thead th{background:#1a1a2e;color:#fff;padding:14px 18px;text-align:left;font-size:14px;font-weight:600;letter-spacing:0.3px}
    .td-premium .td-table tbody td{padding:12px 18px;border-bottom:1px solid #eee;font-size:14px}
    .td-premium .td-table tbody tr:nth-child(even){background:#fafafa}
    .td-premium .td-table tbody tr:hover{background:#f0faf4}
    .td-premium .td-table tbody td:first-child{font-weight:600;color:#1a1a2e}
    .td-premium .td-tip{background:#fff8e1;border-left:4px solid #ff9800;border-radius:0 10px 10px 0;padding:20px 24px;margin:28px 0}
    .td-premium .td-tip p{margin:0;font-size:14px;color:#5d4037}
    .td-premium .td-tip strong{color:#e65100}
    .td-premium .td-info{background:#e3f2fd;border-left:4px solid #1976d2;border-radius:0 10px 10px 0;padding:20px 24px;margin:28px 0}
    .td-premium .td-info p{margin:0;font-size:14px;color:#1a237e}
    .td-premium .td-highlight{background:linear-gradient(135deg,#1a1a2e 0%,#2d3a6e 100%);border-radius:12px;padding:32px;margin:32px 0;text-align:center;color:#fff}
    .td-premium .td-highlight .td-highlight-number{font-size:48px;font-weight:800;color:#4caf50;display:block;margin-bottom:8px}
    .td-premium .td-highlight p{margin:0;font-size:16px;color:rgba(255,255,255,0.85)}
    .td-premium .td-checklist{list-style:none;padding:0;margin:20px 0}
    .td-premium .td-checklist li{padding:8px 0 8px 32px;position:relative;font-size:15px}
    .td-premium .td-checklist li::before{content:'\2713';position:absolute;left:0;color:#2d6a4f;font-weight:700;font-size:16px}
    .td-premium .td-steps{counter-reset:step-counter;list-style:none;padding:0;margin:24px 0}
    .td-premium .td-steps li{counter-increment:step-counter;padding:16px 16px 16px 60px;position:relative;margin-bottom:12px;background:#fafafa;border-radius:10px;border:1px solid #eee}
    .td-premium .td-steps li::before{content:counter(step-counter);position:absolute;left:16px;top:14px;width:32px;height:32px;background:#2d6a4f;color:#fff;border-radius:50%;text-align:center;line-height:32px;font-weight:700;font-size:14px}
    .td-premium .td-card-grid{display:grid;grid-template-columns:repeat(3,1fr);gap:20px;margin:28px 0}
    .td-premium .td-card{background:#fff;border:1px solid #e0e0e0;border-radius:12px;padding:24px;transition:box-shadow 0.2s,transform 0.2s}
    .td-premium .td-card:hover{box-shadow:0 4px 20px rgba(0,0,0,0.08);transform:translateY(-2px)}
    .td-premium .td-card h4{margin:0 0 8px;font-size:16px;color:#1a1a2e}
    .td-premium .td-card p{margin:0;font-size:13px;color:#666;line-height:1.5}
    .td-premium .td-card-icon{font-size:28px;margin-bottom:12px;display:block}
    .td-premium .td-faq-section{margin:32px 0}
    .td-premium .td-faq-item{border:1px solid #e0e0e0;border-radius:10px;margin-bottom:12px;overflow:hidden}
    .td-premium .td-faq-item strong{display:block;padding:16px 20px;background:#f5f5f5;color:#1a1a2e;font-size:15px;cursor:default}
    .td-premium .td-faq-item p{padding:0 20px 16px;margin:0;font-size:14px;color:#555;line-height:1.7}
    .td-premium .td-cta-block{background:linear-gradient(135deg,#1a1a2e 0%,#2d3a6e 100%);border-radius:16px;padding:40px;text-align:center;margin:40px 0}
    .td-premium .td-cta-block h2{color:#fff;border:none;margin:0 0 12px;font-size:24px}
    .td-premium .td-cta-block p{color:rgba(255,255,255,0.8);margin:0 0 24px;font-size:16px}
    .td-premium .td-cta-btn{display:inline-block;background:#4caf50;color:#fff !important;padding:14px 32px;border-radius:8px;text-decoration:none;font-weight:600;font-size:15px;margin:0 8px 8px;transition:background 0.2s}
    .td-premium .td-cta-btn:hover{background:#388e3c}
    .td-premium .td-cta-btn-outline{display:inline-block;border:2px solid rgba(255,255,255,0.5);color:#fff !important;padding:12px 30px;border-radius:8px;text-decoration:none;font-weight:600;font-size:15px;margin:0 8px 8px;transition:border-color 0.2s}
    .td-premium .td-cta-btn-outline:hover{border-color:#fff}
    .td-premium .td-facts{display:grid;grid-template-columns:repeat(4,1fr);background:linear-gradient(135deg,#1a1a2e 0%,#2d3a6e 100%);border-radius:12px;padding:20px;margin:28px 0;gap:16px}
    .td-premium .td-fact{text-align:center;color:#fff}
    .td-premium .td-fact-icon{font-size:24px;margin-bottom:6px;display:block}
    .td-premium .td-fact-text{font-size:12px;color:rgba(255,255,255,0.85);line-height:1.4}
    @media(max-width:900px){.td-premium .td-card-grid{grid-template-columns:repeat(2,1fr)}.td-premium .td-facts{grid-template-columns:repeat(2,1fr)}.td-premium .td-table{font-size:13px}.td-premium .td-table thead th,.td-premium .td-table tbody td{padding:10px 12px}}
    @media(max-width:500px){.td-premium .td-card-grid{grid-template-columns:1fr}.td-premium .td-facts{grid-template-columns:1fr 1fr}.td-premium .td-cta-block{padding:28px 20px}.td-premium .td-highlight .td-highlight-number{font-size:36px}.td-premium h2{font-size:19px}}
    </style>
    <?php
}, 99);
