<?php
/**
 * Snippet ID: 161
 * Name: SEO_11_Image_Alt_Filter
 * Active: True
 * Saved: 15 april 2026
 */


/**
 * SEO_11 - Add alt text to images missing it in rendered content
 * Uses attachment meta as source
 */

// Filter: when WP renders attachment images via wp_get_attachment_image()
add_filter('wp_get_attachment_image_attributes', function($attr, $attachment, $size) {
    if (empty($attr['alt']) || $attr['alt'] === '') {
        $alt = get_post_meta($attachment->ID, '_wp_attachment_image_alt', true);
        if (!empty($alt)) {
            $attr['alt'] = $alt;
        } else {
            // Fallback: generate from attachment title
            $title = get_the_title($attachment->ID);
            if ($title) {
                $attr['alt'] = 'ToDoors - ' . $title;
            }
        }
    }
    return $attr;
}, 10, 3);

// Filter: post content - add alt to img tags that have empty alt
add_filter('the_content', function($content) {
    if (empty($content)) return $content;

    // Replace <img ... alt="" ...> with alt text from attachment if available
    $content = preg_replace_callback(
        '/<img([^>]*?)alt=(["\'])\2([^>]*?)>/i',
        function($matches) {
            $before = $matches[1];
            $after = $matches[3];
            $tag = '<img' . $before . 'alt=""' . $after . '>';

            // Try to find src and get attachment ID
            if (preg_match('/src=["\']([^"\']+)[\'"]/i', $before . $after, $src_match)) {
                $url = $src_match[1];
                // Remove size suffix like -300x200
                $clean_url = preg_replace('/-\d+x\d+(\.[a-z]+)$/i', '$1', $url);
                $id = attachment_url_to_postid($clean_url);
                if (!$id) $id = attachment_url_to_postid($url);
                if ($id) {
                    $alt = get_post_meta($id, '_wp_attachment_image_alt', true);
                    if (!empty($alt)) {
                        $tag = '<img' . $before . 'alt="' . esc_attr($alt) . '"' . $after . '>';
                    }
                }
            }
            return $tag;
        },
        $content
    );

    return $content;
}, 20);
