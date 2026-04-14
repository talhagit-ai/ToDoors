<?php
/**
 * Snippet #128: ToDoors Defer Third Party Tracking
 * Status: ACTIVE
 * Scope: global
 *
 * Verplaatst LeadInfo en Google Ads/Analytics naar na window.load via requestIdleCallback. Vermindert TBT en main-thread blocking.
 */

add_action("wp_footer", function() {
    if (is_admin()) return;
    ?>
    <script>
    (function() {
        function loadTracking() {
            if (!window._tdLeadinfoLoaded) {
                window._tdLeadinfoLoaded = true;
                var li = document.createElement("script");
                li.async = true;
                li.src = "https://cdn.leadinfo.net/ping.js";
                document.head.appendChild(li);
            }
            if (!window._tdGtagLoaded) {
                window._tdGtagLoaded = true;
                var ga = document.createElement("script");
                ga.async = true;
                ga.src = "https://www.googletagmanager.com/gtag/js?id=AW-11086343175";
                document.head.appendChild(ga);
                window.dataLayer = window.dataLayer || [];
                window.gtag = function(){ dataLayer.push(arguments); };
                gtag("js", new Date());
                gtag("config", "AW-11086343175");
            }
        }

        function schedule() {
            if ("requestIdleCallback" in window) {
                requestIdleCallback(loadTracking, { timeout: 3000 });
            } else {
                setTimeout(loadTracking, 2000);
            }
        }

        if (document.readyState === "complete") {
            schedule();
        } else {
            window.addEventListener("load", schedule);
        }
    })();
    </script>
    <?php
}, 99);

// Verwijder de bestaande synchronous LeadInfo en gtag tags via output buffer
add_action("template_redirect", function() {
    if (is_admin()) return;
    ob_start(function($buf) {
        $buf = preg_replace(
            "#<script[^>]*src=[\"']https?://cdn\.leadinfo\.net/ping\.js[\"'][^>]*></script>#i",
            "",
            $buf
        );
        $buf = preg_replace(
            "#<script[^>]*src=[\"']https?://www\.googletagmanager\.com/gtag/js[^\"']*[\"'][^>]*></script>#i",
            "",
            $buf
        );
        return $buf;
    });
}, 1);
