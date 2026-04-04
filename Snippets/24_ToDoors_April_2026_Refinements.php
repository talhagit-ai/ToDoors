<?php
/**
 * Snippet #24: ToDoors April 2026 Refinements
 * Status: inactive
 * Scope: global
 */

add_filter("template_include", function($template) {
    ob_start();
    return $template;
}, -9999);

add_action("wp_footer", function() {
    $content = ob_get_clean();
    
    if (is_page(157)) {
        $content = str_replace("<p><strong>Uurtarief:</strong> €73/uur (kantoor)</p>", "", $content);
        $content = str_replace("<p><strong>Uurtarief:</strong> €69/uur (kantoor)</p>", "", $content);
        $content = str_replace("<p><strong>Uurtarief:</strong> €65/uur (kantoor)</p>", "", $content);
    }
    
    echo $content;
}, 9999);
