<?php
/**
 * Snippet #26: ToDoors Direct HTML Replacements
 * Status: ACTIVE
 * Scope: global
 */

add_filter("the_content", function($content) {
    // PHP: Remove uurtarief - dit werkt perfect
    if (strpos($content, "Uurtarief") !== false) {
        $content = str_replace("<p><strong>Uurtarief:</strong> €73/uur (kantoor)</p>", "", $content);
        $content = str_replace("<p><strong>Uurtarief:</strong> €69/uur (kantoor)</p>", "", $content);
        $content = str_replace("<p><strong>Uurtarief:</strong> €65/uur (kantoor)</p>", "", $content);
    }
    
    return $content;
});

// JavaScript: Remove Full Service on page load
add_action("wp_footer", function() {
    if (is_page(157)) { // Service page only
        ?>
        <script>
        document.addEventListener("DOMContentLoaded", function() {
            var fullServiceText = document.evaluate(
                "//h3[contains(text(), \"Full Service\")]",
                document,
                null,
                XPathResult.FIRST_ORDERED_NODE_TYPE,
                null
            ).singleNodeValue;
            
            if (fullServiceText) {
                // Go up to the closest .gdlr-core-pbf-column
                var col = fullServiceText.closest(".gdlr-core-pbf-column");
                if (col) {
                    col.style.display = "none";
                }
            }
        });
        </script>
        <?php
    }
}, 999);
