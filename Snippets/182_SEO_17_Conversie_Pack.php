<?php
/**
 * Snippet ID: 182
 * Name: SEO_17_Conversie_Pack
 * Active: True
 * Saved: 15 april 2026
 */


/**
 * SEO_17_Conversie_Pack: Trust badges footer + Sticky CTA + WhatsApp button
 * All-in-one conversie bundle for maximum impact
 */

// 1. TRUST BADGES in footer (before closing </body>)
add_action('wp_footer', function() {
    ?>
    <style>

    /* Hide theme scroll-to-top button */
    .gdlr-core-scroll-top,
    .realfactory-scroll-top-right,
    .realfactory-footer-back-to-top-button,
    #realfactory-footer-back-to-top-button,
    [id*="scroll-top"],
    [class*="scroll-top"],
    [class*="back-to-top"] {
        display: none !important;
    }
    /* Trust Badges in Footer */
    .todoors-trust-footer {
        background: #1a1a2e;
        padding: 32px 20px;
        text-align: center;
    }
    .todoors-trust-footer .trust-title {
        color: #a8d5b5;
        font-size: 13px;
        text-transform: uppercase;
        letter-spacing: 2px;
        margin-bottom: 20px;
        font-weight: 600;
    }
    .trust-badges-row {
        display: flex;
        justify-content: center;
        align-items: center;
        gap: 32px;
        flex-wrap: wrap;
        max-width: 800px;
        margin: 0 auto;
    }
    .trust-badge-item {
        display: flex;
        align-items: center;
        gap: 10px;
        color: #fff;
        font-size: 14px;
    }
    .trust-badge-item .badge-icon {
        font-size: 24px;
        flex-shrink: 0;
    }
    .trust-badge-item .badge-text {
        text-align: left;
        line-height: 1.3;
    }
    .trust-badge-item .badge-text strong {
        display: block;
        font-size: 14px;
        color: #fff;
    }
    .trust-badge-item .badge-text span {
        font-size: 12px;
        color: #a8d5b5;
    }

    /* Sticky CTA Bar */
    #todoors-sticky-cta {
        position: fixed;
        bottom: 0;
        left: 0;
        right: 0;
        background: #2d6a4f;
        color: #fff;
        z-index: 9998;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 10px 16px;
        gap: 16px;
        box-shadow: 0 -2px 12px rgba(0,0,0,.25);
        transform: translateY(100%);
        transition: transform .4s ease;
    }
    #todoors-sticky-cta.visible {
        transform: translateY(0);
    }
    #todoors-sticky-cta .cta-text {
        font-size: 14px;
        font-weight: 600;
    }
    #todoors-sticky-cta .cta-text span {
        font-weight: 400;
        opacity: .85;
        font-size: 12px;
        display: block;
    }
    #todoors-sticky-cta .cta-btn {
        background: #fff;
        color: #2d6a4f;
        padding: 8px 20px;
        border-radius: 4px;
        text-decoration: none;
        font-weight: 700;
        font-size: 14px;
        white-space: nowrap;
        flex-shrink: 0;
    }
    #todoors-sticky-cta .cta-phone {
        color: #a8d5b5;
        text-decoration: none;
        font-weight: 700;
        white-space: nowrap;
        flex-shrink: 0;
        font-size: 14px;
    }
    #todoors-sticky-cta .cta-close {
        background: none;
        border: none;
        color: rgba(255,255,255,.6);
        cursor: pointer;
        font-size: 18px;
        padding: 4px 8px;
        flex-shrink: 0;
    }
    #todoors-sticky-cta .cta-close:hover {
        color: #fff;
    }

    /* WhatsApp Button */
    #todoors-whatsapp {
        position: fixed;
        right: 20px;
        bottom: 70px;
        width: 56px;
        height: 56px;
        background: #25d366;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        text-decoration: none;
        box-shadow: 0 4px 16px rgba(37,211,102,.4);
        z-index: 9997;
        transition: transform .2s, box-shadow .2s;
    }
    #todoors-whatsapp:hover {
        transform: scale(1.1);
        box-shadow: 0 6px 24px rgba(37,211,102,.5);
    }
    #todoors-whatsapp svg {
        width: 30px;
        height: 30px;
        fill: #fff;
    }

    /* Body padding for sticky bar */
    body.has-sticky-cta {
        padding-bottom: 56px;
    }
    @media (max-width: 600px) {
        .trust-badges-row { gap: 20px; }
        #todoors-sticky-cta .cta-text span { display: none; }
        #todoors-whatsapp { bottom: 72px; right: 12px; }
    }
    </style>

    <!-- Trust Badges Footer -->
    <div class="todoors-trust-footer">
        <div class="trust-title">Gecertificeerd en betrouwbaar</div>
        <div class="trust-badges-row">
            <div class="trust-badge-item">
                <span class="badge-icon">🛡️</span>
                <div class="badge-text">
                    <strong>EN16005</strong>
                    <span>Veiligheidsnorm</span>
                </div>
            </div>
            <div class="trust-badge-item">
                <span class="badge-icon">⚡</span>
                <div class="badge-text">
                    <strong>NEN3140</strong>
                    <span>Elektrische keuring</span>
                </div>
            </div>
            <div class="trust-badge-item">
                <span class="badge-icon">📅</span>
                <div class="badge-text">
                    <strong>2 werkdagen</strong>
                    <span>Afspraak-SLA</span>
                </div>
            </div>
            <div class="trust-badge-item">
                <span class="badge-icon">🇳🇱</span>
                <div class="badge-text">
                    <strong>Heel Nederland</strong>
                    <span>Landelijke service</span>
                </div>
            </div>
        </div>
    </div>

    <!-- Sticky CTA Bar -->
    <div id="todoors-sticky-cta">
        <div class="cta-text">
            Automatische deuren nodig?
            <span>Vrijblijvend en gratis</span>
        </div>
        <a href="tel:+31684305663" class="cta-phone">📞 06 84 30 56 63</a>
        <a href="/contact/" class="cta-btn">Offerte aanvragen</a>
        <button class="cta-close" id="todoors-cta-close" aria-label="Sluiten">✕</button>
    </div>

    <!-- WhatsApp Button -->
    <a id="todoors-whatsapp" href="https://wa.me/31684305663?text=Hallo%20ToDoors%2C%20ik%20heb%20een%20vraag%20over%20automatische%20deuren."
       target="_blank" rel="noopener" aria-label="WhatsApp ToDoors">
        <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/>
        </svg>
    </a>

    <script>
    (function() {
        // Show sticky CTA after scroll
        var cta = document.getElementById('todoors-sticky-cta');
        var closed = sessionStorage.getItem('todoors_cta_closed');
        if (cta && !closed) {
            var showCta = function() {
                if (window.scrollY > 400) {
                    cta.classList.add('visible');
                    document.body.classList.add('has-sticky-cta');
                    window.removeEventListener('scroll', showCta);
                }
            };
            window.addEventListener('scroll', showCta, {passive: true});
        }
        var closeBtn = document.getElementById('todoors-cta-close');
        if (closeBtn) {
            closeBtn.addEventListener('click', function() {
                cta.classList.remove('visible');
                document.body.classList.remove('has-sticky-cta');
                sessionStorage.setItem('todoors_cta_closed', '1');
            });
        }
    })();
    </script>
    <?php
}, 95);
