<?php
/**
 * ToDoors_Pillar_Reorder_GDLR_First
 * Verplaats GDLR content naar boven op /automatische-deuren/
 * Snippet ID: 196
 * Active: False
 */

add_action('wp_head', function() {
    if (!is_singular()) return;
    $post = get_queried_object();
    if (!$post || $post->ID != 16248) return;
    echo '<!-- td-reorder-snippet-active -->' . "\n";
    echo '<style>.gdlr-core-page-builder-body{order:-1;}</style>' . "\n";
}, 100);

add_action('wp_footer', function() {
    if (!is_singular()) return;
    $post = get_queried_object();
    if (!$post || $post->ID != 16248) return;
    ?>
    <script>
    (function(){
        function doReorder() {
            var gdlr = document.querySelector('.gdlr-core-page-builder-body');
            var contentArea = document.querySelector('.realfactory-content-area');
            if (gdlr && contentArea && contentArea.parentNode) {
                contentArea.parentNode.insertBefore(gdlr, contentArea);
                console.log('TD reorder done');
            } else {
                console.log('TD reorder: missing', !!gdlr, !!contentArea);
            }
        }
        if (document.readyState !== 'loading') {
            doReorder();
        } else {
            document.addEventListener('DOMContentLoaded', doReorder);
        }
    })();
    </script>
    <?php
}, 999);
