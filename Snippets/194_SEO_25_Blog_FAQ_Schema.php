<?php
/**
 * SEO_25_Blog_FAQ_Schema
 * Auto-detecteert td-faq-item divs in posts/pages en genereert FAQPage JSON-LD
 * Voor Google rich results op alle blogposts met FAQ-sectie
 *
 * Snippet ID op site: 194
 * Scope: front-end
 */
add_action('wp_head', function() {
    if (!is_singular(['post', 'page'])) return;
    global $post;
    if (!$post) return;
    
    $content = $post->post_content;
    if (strpos($content, 'td-faq-item') === false) return;
    
    // Extract FAQ items from td-faq-item divs
    preg_match_all(
        '#<div\s+class=["\']td-faq-item["\'][^>]*>\s*<strong[^>]*>(.*?)</strong>\s*<p[^>]*>(.*?)</p>\s*</div>#s',
        $content,
        $matches,
        PREG_SET_ORDER
    );
    
    if (empty($matches)) return;
    
    $faqs = [];
    foreach ($matches as $m) {
        $q = trim(wp_strip_all_tags($m[1]));
        $a = trim(wp_strip_all_tags($m[2]));
        if ($q && $a) {
            $faqs[] = [
                '@type' => 'Question',
                'name' => $q,
                'acceptedAnswer' => [
                    '@type' => 'Answer',
                    'text' => $a
                ]
            ];
        }
    }
    
    if (empty($faqs)) return;
    
    $schema = [
        '@context' => 'https://schema.org',
        '@type' => 'FAQPage',
        'mainEntity' => $faqs
    ];
    
    echo '<script type="application/ld+json">' . wp_json_encode($schema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) . '</script>' . "\n";
}, 100);
