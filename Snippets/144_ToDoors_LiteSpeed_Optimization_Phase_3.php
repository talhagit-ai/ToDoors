<?php
/**
 * Snippet #144: ToDoors LiteSpeed Optimization Phase 3
 * Status: ACTIVE
 * Scope: admin
 *
 * Phase 3: JS defer, iframe lazy via LiteSpeed, WebP srcset, auto image optimization queue.
 */

add_action('admin_init', function() {
    if (get_option('tdoors_ls_optm_v3_done')) return;
    if (!class_exists('LiteSpeed\\Conf')) return;

    $conf = LiteSpeed\Conf::cls();

    $settings = [
        // JS defer (non-jQuery scripts deferred)
        'optm-js_defer'                     => 1,    // 1 = defer, 2 = delay
        // Iframe lazy load via LiteSpeed (extra naast snippet 136)
        'media-iframe_lazy'                 => true,
        // WebP voor srcset elements (img_optm-webp staat al aan)
        'img_optm-webp_replace_srcset'      => true,
        // Auto image optimization queue
        'img_optm-auto'                     => true,
        // Lazy load placeholder transparant gif (voorkomt CLS)
        'media-lazy_placeholder'            => 'data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHZpZXdCb3g9IjAgMCAxIDEiPjwvc3ZnPg==',
    ];

    $changes = [];
    foreach ($settings as $key => $val) {
        $before = $conf->conf($key);
        $conf->update($key, $val);
        $after = $conf->conf($key);
        $changes[$key] = "before=" . var_export($before,true) . " after=" . var_export($after,true);
    }

    update_option('tdoors_ls_optm_v3_done', json_encode([
        'date' => date('Y-m-d H:i:s'),
        'changes' => $changes
    ]), false);

    do_action('litespeed_purge_all');
});
