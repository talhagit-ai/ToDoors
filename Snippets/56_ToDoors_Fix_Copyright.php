<?php
/**
 * Snippet #56: Fix Copyright Typo Sitewide
 * Status: ACTIVE
 * Scope: global
 *
 * Vervangt "All Right Reserved" door "All Rights Reserved" in de footer.
 */

add_action('init', function() {
    if (get_option('tdoors_fix_copyright_done')) return;

    $fixed = 0;

    // Zoek in bekende RealFactory/GoodLayers theme option keys
    $option_keys = [
        'realfactory_option',
        'goodlayers_option',
        'realfactory-option',
        'theme_options',
        'realfactory_theme_option',
    ];

    foreach ($option_keys as $key) {
        $val = get_option($key);
        if (!$val) continue;

        $encoded = is_array($val) ? json_encode($val) : $val;

        if (strpos($encoded, 'All Right Reserved') !== false) {
            if (is_array($val)) {
                array_walk_recursive($val, function(&$v) use (&$fixed) {
                    if (is_string($v) && strpos($v, 'All Right Reserved') !== false) {
                        $v = str_replace('All Right Reserved', 'All Rights Reserved', $v);
                        $fixed++;
                    }
                });
                update_option($key, $val);
            } else {
                $val = str_replace('All Right Reserved', 'All Rights Reserved', $val);
                update_option($key, $val);
                $fixed++;
            }
            error_log('ToDoors: Copyright fix toegepast in option: ' . $key);
        }
    }

    // Fallback: filter de output direct
    if ($fixed === 0) {
        // Sla op dat we de filter nodig hebben
        update_option('tdoors_copyright_use_filter', 1);
    }

    do_action('litespeed_purge_all');
    update_option('tdoors_fix_copyright_done', date('Y-m-d H:i:s'));
    error_log('ToDoors: STAP 6 klaar — copyright fix: ' . $fixed . ' aanpassingen');
}, 99);

// Fallback filter voor als het niet in theme options staat
add_filter('the_content', function($c) { return $c; }); // placeholder
add_action('wp_footer', function() {
    if (!get_option('tdoors_copyright_use_filter')) return;
    ?>
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        document.querySelectorAll('.realfactory-copyright-text, .copyright-text, [class*="copyright"]').forEach(function(el) {
            if (el.innerHTML.includes('All Right Reserved')) {
                el.innerHTML = el.innerHTML.replace(/All Right Reserved/g, 'All Rights Reserved');
            }
        });
    });
    </script>
    <?php
}, 999);
