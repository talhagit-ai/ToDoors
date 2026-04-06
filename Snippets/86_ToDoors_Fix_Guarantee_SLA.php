<?php
/**
 * Snippet #86: Fix Guarantee Section with SLA
 * Status: ACTIVE
 * Scope: frontend
 *
 * Vervangt vage garantietekst door concrete SLA beloftes.
 * Gebruikt output buffer — raakt geen serialized data aan.
 */

add_action('template_redirect', function() {
    ob_start(function($buffer) {
        $buffer = str_replace(
            'Wij garanderen onze klanten snelle en betrouwbare ondersteuning bij elke storing. Om de best mogelijke service te bieden, proberen onze ervaren collega&#8217;s eerst het probleem telefonisch op te lossen. Lukt dit niet, dan plannen we pas een afspraak in. Zo besparen we onze klanten onnodige kosten!',
            'Wij garanderen onze klanten snelle en betrouwbare ondersteuning bij elke storing. Onze ervaren collega&#8217;s bellen u terug binnen 1 uur. Kunnen we het probleem niet telefonisch oplossen, dan plannen we een afspraak in binnen 2 werkdagen. Zo besparen we onze klanten onnodige kosten!',
            $buffer
        );
        return $buffer;
    });
}, 1);
