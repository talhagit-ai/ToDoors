<?php
/**
 * Snippet #143: ToDoors LiteSpeed Advanced Optimization v2
 * Status: ACTIVE
 * Scope: admin
 *
 * Activeert geavanceerde LiteSpeed via correcte LiteSpeed\Conf class. Snippet 105 was kapot (verkeerde class). Zet aan: lazy load images, CSS combine, JS combine, query string removal.
 */

add_action('admin_init', function() {
    if (get_option('tdoors_ls_optm_v2_done')) return;
    if (!class_exists('LiteSpeed\\Conf')) return;

    $conf = LiteSpeed\Conf::cls();

    $settings = [
        // Veilige settings (lage risico, hoge impact)
        'media-lazy'              => true,   // lazy load images
        'media-lazy_iframe'       => true,   // lazy load iframes (extra naast snippet 136)
        'img_optm-webp_replace'   => true,   // serveer WebP aan ondersteunende browsers
        'optm-qs_rm'              => true,   // remove query strings van static resources
        'optm-emoji_rm'           => true,   // remove emoji script (extra naast snippet 133)
        // Medium risico: CSS/JS combine + JS delay
        'optm-css_comb'           => true,   // CSS combine
        'optm-js_comb'            => true,   // JS combine
        'optm-js_defer'           => 1,      // JS defer (1 = defer non-jquery)
        'optm-js_inline_defer'    => 1,      // inline JS ook defer
    ];

    $changes = [];
    foreach ($settings as $key => $val) {
        $before = $conf->conf($key);
        if ($before === $val) {
            $changes[$key] = 'unchanged';
            continue;
        }
        $conf->update($key, $val);
        $after = $conf->conf($key);
        $changes[$key] = "before=" . var_export($before,true) . " after=" . var_export($after,true);
    }

    update_option('tdoors_ls_optm_v2_done', json_encode([
        'date' => date('Y-m-d H:i:s'),
        'changes' => $changes
    ]), false);

    // Purge alle cache
    do_action('litespeed_purge_all');
});
