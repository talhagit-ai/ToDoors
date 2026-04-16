<?php
// Snippet ID: 190
// Name: SEO_19_Testimonial_Carrousel
// Active: True


// SEO_19_Testimonial_Carrousel — 3 klantreviews carousel + trust row boven de vouw op homepage
add_action('wp_head', function() {
    if (!is_front_page()) return;
    echo <<<'CSS'
<style>
/* Trust strip */
#td-trust-strip{background:#1a1a2e;padding:10px 0;text-align:center;font-size:13px;color:#c8e6c9;letter-spacing:.4px;}
#td-trust-strip span{margin:0 18px;white-space:nowrap;}
#td-trust-strip span::before{content:"✓ ";color:#4caf50;font-weight:700;}

/* Testimonial section */
#td-testimonials{background:#f8fffe;padding:60px 20px;text-align:center;}
#td-testimonials h2{font-size:22px;color:#1a1a2e;margin:0 0 8px;}
#td-testimonials .td-sub{font-size:15px;color:#666;margin:0 0 40px;}
.td-reviews-grid{display:grid;grid-template-columns:repeat(3,1fr);gap:24px;max-width:1050px;margin:0 auto;}
@media(max-width:800px){.td-reviews-grid{grid-template-columns:1fr;}}
.td-review-card{background:#fff;border:1px solid #e0e0e0;border-top:3px solid #2d6a4f;border-radius:10px;padding:28px 24px;text-align:left;box-shadow:0 2px 8px rgba(0,0,0,0.05);}
.td-stars{color:#f4b400;font-size:18px;margin-bottom:14px;}
.td-review-text{font-size:14px;color:#444;line-height:1.7;font-style:italic;margin-bottom:16px;}
.td-reviewer{font-size:13px;font-weight:700;color:#1a1a2e;}
.td-reviewer-role{font-size:12px;color:#888;}
.td-reviews-cta{margin-top:36px;}
.td-reviews-cta a{display:inline-block;background:#2d6a4f;color:#fff;padding:13px 30px;border-radius:8px;font-size:15px;font-weight:700;text-decoration:none;}
</style>
CSS;
}, 1);

add_action('wp_footer', function() {
    if (!is_front_page()) return;
    echo <<<'HTML'
<div id="td-trust-strip">
  <span>EN16005 gecertificeerd</span>
  <span>NEN3140 gecertificeerd</span>
  <span>Installatie binnen 2 werkdagen</span>
  <span>Landelijke dekking</span>
  <span>24/7 storingsdienst</span>
</div>

<section id="td-testimonials">
  <h2>Wat klanten zeggen over ToDoors</h2>
  <p class="td-sub">Meer dan 500 installaties in heel Nederland</p>
  <div class="td-reviews-grid">

    <div class="td-review-card">
      <div class="td-stars">★★★★★</div>
      <p class="td-review-text">"ToDoors heeft de installatie in één weekend uitgevoerd zonder enige verstoring van onze productie. De deuren werken vlekkeloos en voldoen aan al onze HACCP-eisen."</p>
      <div class="td-reviewer">Bedrijfsleider</div>
      <div class="td-reviewer-role">HvO Meat, Flevoland</div>
    </div>

    <div class="td-review-card">
      <div class="td-stars">★★★★★</div>
      <p class="td-review-text">"Klanten reageren positief en de winkel voelt meteen professioneler. De installatie was razendsnel en het team van ToDoors werkte netjes en efficiënt."</p>
      <div class="td-reviewer">Eigenaar</div>
      <div class="td-reviewer-role">Voordeelfiets</div>
    </div>

    <div class="td-review-card">
      <div class="td-stars">★★★★★</div>
      <p class="td-review-text">"We zochten één partij die alles kon leveren: de deuren, de toegangscontrole en de software. ToDoors heeft dit perfect uitgevoerd — van advies tot oplevering."</p>
      <div class="td-reviewer">Mark Butterman</div>
      <div class="td-reviewer-role">Butterman Groep</div>
    </div>

  </div>
  <div class="td-reviews-cta">
    <a href="/cases/">Bekijk alle projecten →</a>
  </div>
</section>
HTML;
}, 20);
