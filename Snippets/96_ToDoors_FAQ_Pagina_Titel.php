<?php
add_action("template_redirect", function() {
    if (!is_home()) return;
    ob_start(function($buffer) {
        return preg_replace(
            '/(<h1[^>]*realfactory-page-title[^>]*>)Home Page(<\/h1>)/',
            "$1FAQ's$2",
            $buffer
        );
    });
}, 1);
