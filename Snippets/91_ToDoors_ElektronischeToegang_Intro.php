<?php
/**
 * Snippet #91: Elektronische Toegang – Intro Sectie
 * Status: ACTIVE
 * Scope: frontend
 *
 * Voegt een introductieparagraaf toe boven de productgrid op de
 * Elektronische Toegang pagina (ID 2520).
 */

add_action('template_redirect', function() {
    ob_start(function($buffer) {
        global $post;
        if (!$post || $post->ID != 2520) return $buffer;

        $intro = '
<div class="gdlr-core-pbf-wrapper" style="padding: 60px 0px 30px 0px; background-color: #ffffff;">
  <div class="gdlr-core-pbf-wrapper-container clearfix gdlr-core-container">

    <div class="gdlr-core-pbf-element">
      <div class="gdlr-core-title-item gdlr-core-item-pdb clearfix gdlr-core-center-align gdlr-core-title-item-caption-top gdlr-core-item-pdlr" style="padding-bottom: 30px;">
        <span class="gdlr-core-title-item-caption gdlr-core-info-font gdlr-core-skin-caption">Slimme Beveiliging</span>
        <div class="gdlr-core-title-item-title-wrap">
          <h3 class="gdlr-core-title-item-title gdlr-core-skin-title" style="font-size: 33px; font-weight: 1000;">Wat is elektronische toegang?<span class="gdlr-core-title-item-title-divider gdlr-core-skin-divider"></span></h3>
        </div>
      </div>
    </div>

    <div class="gdlr-core-pbf-column gdlr-core-column-40 gdlr-core-column-first">
      <div class="gdlr-core-pbf-column-content-margin gdlr-core-js" style="padding: 0px 40px 0px 0px;">
        <div class="gdlr-core-pbf-column-content clearfix gdlr-core-js">
          <div class="gdlr-core-pbf-element">
            <div class="gdlr-core-text-box-item gdlr-core-item-pdlr gdlr-core-item-pdb">
              <div class="gdlr-core-text-box-item-content" style="font-size: 16px; text-transform: none; line-height: 1.8;">
                <p>Elektronische toegangssystemen vervangen traditionele sleutels door slimme technologie. Via een tag, kaart, telefoon of code bepaalt u precies wie toegang heeft — en wanneer. Ideaal voor kantoren, bedrijfspanden, magazijnen en zorginstellingen.</p>
                <p>ToDoors levert en installeert complete elektronische toegangsoplossingen voor bedrijven door heel Nederland, inclusief montage, programmering en onderhoud.</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="gdlr-core-pbf-column gdlr-core-column-20">
      <div class="gdlr-core-pbf-column-content-margin gdlr-core-js" style="padding: 0px 0px 0px 20px;">
        <div class="gdlr-core-pbf-column-content clearfix gdlr-core-js">
          <div class="gdlr-core-pbf-element">
            <div class="gdlr-core-text-box-item gdlr-core-item-pdlr gdlr-core-item-pdb">
              <div class="gdlr-core-text-box-item-content" style="font-size: 15px; text-transform: none;">
                <ul style="list-style: none; padding: 0; margin: 0; line-height: 2.2;">
                  <li><i class="fa fa-check" style="color: #B99D7C; margin-right: 10px;"></i>Geen sleutels meer kwijtraken</li>
                  <li><i class="fa fa-check" style="color: #B99D7C; margin-right: 10px;"></i>Toegangslog — wie ging wanneer</li>
                  <li><i class="fa fa-check" style="color: #B99D7C; margin-right: 10px;"></i>Op afstand in- en uitschakelen</li>
                  <li><i class="fa fa-check" style="color: #B99D7C; margin-right: 10px;"></i>Koppelbaar aan alarmsystemen</li>
                  <li><i class="fa fa-check" style="color: #B99D7C; margin-right: 10px;"></i>Geschikt voor meerdere deuren</li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>
</div>';

        $buffer = str_replace(
            '<div class="gdlr-core-page-builder-body clearfix">',
            '<div class="gdlr-core-page-builder-body clearfix">' . $intro,
            $buffer
        );

        return $buffer;
    });
}, 1);
