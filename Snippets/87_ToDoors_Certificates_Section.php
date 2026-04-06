<?php
/**
 * Snippet #87: Certificates Section on Service Page
 * Status: ACTIVE
 * Scope: frontend
 *
 * Voegt een uitlegblok toe voor EN16005 en NEN3140 certificeringen
 * op de servicepagina. Injectie vóór <footer> — correct wrapper niveau.
 * Horizontale icon-links layout (zelfde als "Onderhoud" sectie).
 */

add_action('template_redirect', function() {
    ob_start(function($buffer) {
        global $post;
        if (!$post || $post->ID != 157) return $buffer;

        $certificates_section = '
<div class="gdlr-core-pbf-wrapper" style="padding: 60px 0px 60px 0px;">
  <div class="gdlr-core-pbf-wrapper-container clearfix gdlr-core-container">

    <div class="gdlr-core-pbf-element">
      <div class="gdlr-core-title-item gdlr-core-item-pdb clearfix gdlr-core-center-align gdlr-core-title-item-caption-top gdlr-core-item-pdlr" style="padding-bottom: 50px;">
        <span class="gdlr-core-title-item-caption gdlr-core-info-font gdlr-core-skin-caption">Kwaliteit &amp; Veiligheid</span>
        <div class="gdlr-core-title-item-title-wrap">
          <h3 class="gdlr-core-title-item-title gdlr-core-skin-title" style="font-size: 33px; font-weight: 1000;">Gecertificeerd voor uw veiligheid<span class="gdlr-core-title-item-title-divider gdlr-core-skin-divider"></span></h3>
        </div>
      </div>
    </div>

    <div class="gdlr-core-pbf-column gdlr-core-column-30 gdlr-core-column-first">
      <div class="gdlr-core-pbf-column-content-margin gdlr-core-js" style="padding: 0px 30px 0px 30px;">
        <div class="gdlr-core-pbf-column-content clearfix gdlr-core-js">
          <div class="gdlr-core-pbf-element">
            <div class="gdlr-core-column-service-item gdlr-core-item-pdb gdlr-core-left-align gdlr-core-column-service-icon-left gdlr-core-no-caption gdlr-core-item-pdlr">
              <div class="gdlr-core-column-service-media gdlr-core-media-icon">
                <i class="fa fa-certificate" style="font-size: 28px; line-height: 28px; width: 28px; color: #B99D7C;"></i>
              </div>
              <div class="gdlr-core-column-service-content-wrapper">
                <div class="gdlr-core-column-service-title-wrap">
                  <h3 class="gdlr-core-column-service-title gdlr-core-skin-title" style="font-size: 15px;">EN16005</h3>
                </div>
                <div class="gdlr-core-column-service-content" style="text-transform: none;">
                  <p>Wij voldoen aan de Europese veiligheidsnorm voor automatische deuren. Dit garandeert dat elke installatie veilig is voor voetgangers, ook bij stroomuitval of een technische storing.</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="gdlr-core-pbf-column gdlr-core-column-30">
      <div class="gdlr-core-pbf-column-content-margin gdlr-core-js" style="padding: 0px 30px 0px 30px;">
        <div class="gdlr-core-pbf-column-content clearfix gdlr-core-js">
          <div class="gdlr-core-pbf-element">
            <div class="gdlr-core-column-service-item gdlr-core-item-pdb gdlr-core-left-align gdlr-core-column-service-icon-left gdlr-core-no-caption gdlr-core-item-pdlr">
              <div class="gdlr-core-column-service-media gdlr-core-media-icon">
                <i class="fa fa-bolt" style="font-size: 28px; line-height: 28px; width: 28px; color: #B99D7C;"></i>
              </div>
              <div class="gdlr-core-column-service-content-wrapper">
                <div class="gdlr-core-column-service-title-wrap">
                  <h3 class="gdlr-core-column-service-title gdlr-core-skin-title" style="font-size: 15px;">NEN3140</h3>
                </div>
                <div class="gdlr-core-column-service-content" style="text-transform: none;">
                  <p>Onze technici werken conform de Nederlandse norm voor elektrotechnische installaties. Dit omvat periodieke keuringen van alle elektrische componenten voor maximale betrouwbaarheid en veiligheid.</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>
</div>';

        // Inject at wrapper level, just before the footer tag
        $buffer = str_replace('<footer>', $certificates_section . '<footer>', $buffer);

        return $buffer;
    });
}, 1);
