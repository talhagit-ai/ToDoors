<?php
/**
 * Snippet ID: 178
 * Name: SEO_16_Yoast_Post_MetaDesc_Template
 * Active: True
 * Saved: 15 april 2026
 */


// One-time: set Yoast meta description template for posts
add_action('init', function() {
    if (get_option('seo_metadesc_post_template_set')) return;
    
    $titles = get_option('wpseo_titles', []);
    
    // Set metadesc template for post type 'post' to use excerpt
    $titles['metadesc-post'] = '%%excerpt%%';
    
    // Also set social description for posts
    $titles['social-description-post'] = '%%excerpt%%';
    
    update_option('wpseo_titles', $titles);
    update_option('seo_metadesc_post_template_set', time());
});
