<?php
/**
 * Snippet #3: Smilies toestaan
 * Status: inactive
 * Scope: global
 */

add_filter( 'widget_text', 'convert_smilies' );
add_filter( 'the_title', 'convert_smilies' );
add_filter( 'wp_title', 'convert_smilies' );
add_filter( 'get_bloginfo', 'convert_smilies' );