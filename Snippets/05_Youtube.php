<?php
/**
 * Snippet #5: Youtube
 * Status: ACTIVE
 * Scope: global
 */

function yt_video_shortcode() {
    $myfield = get_field('faqvideo');
    return $myfield;
}
add_shortcode('ytvideo', 'yt_video_shortcode');
