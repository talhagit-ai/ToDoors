<?php
/**
 * Snippet #23: ToDoors Mobile UX Improvements
 * Status: ACTIVE
 * Scope: global
 */

// Add mobile click-to-call and sticky CTA bar
add_action('wp_footer', function() {
    if (is_admin()) return;
    ?>
    <style>
        .tdoors-mobile-cta-bar {
            display: none;
            position: fixed;
            bottom: 0;
            left: 0;
            right: 0;
            background: linear-gradient(to right, #0a0a0a, #1a1a1a);
            padding: 12px;
            z-index: 999;
            gap: 10px;
            box-shadow: 0 -2px 8px rgba(0,0,0,0.15);
            animation: slideUp 0.3s ease-in-out;
        }
        
        @keyframes slideUp {
            from { transform: translateY(100%); }
            to { transform: translateY(0); }
        }
        
        .tdoors-mobile-cta-bar.active {
            display: flex;
        }
        
        .tdoors-mobile-cta-bar a {
            flex: 1;
            padding: 14px 12px;
            text-align: center;
            text-decoration: none;
            border-radius: 6px;
            font-weight: 600;
            font-size: 14px;
            transition: all 0.2s;
            color: white;
        }
        
        .tdoors-mobile-cta-bar .btn-call {
            background: #059669;
            border: 1px solid #059669;
        }
        
        .tdoors-mobile-cta-bar .btn-call:active {
            background: #047857;
            transform: scale(0.98);
        }
        
        .tdoors-mobile-cta-bar .btn-quote {
            background: #B99D7C;
            border: 1px solid #B99D7C;
        }
        
        .tdoors-mobile-cta-bar .btn-quote:active {
            background: #a68969;
            transform: scale(0.98);
        }
        
        .tdoors-mobile-cta-bar .close-btn {
            position: absolute;
            top: 8px;
            right: 8px;
            background: none;
            border: none;
            color: #999;
            cursor: pointer;
            font-size: 18px;
            padding: 4px 8px;
        }
        
        /* Adjust body padding when bar is visible */
        body.tdoors-cta-active {
            padding-bottom: 80px;
        }
        
        @media (min-width: 768px) {
            .tdoors-mobile-cta-bar {
                display: none !important;
            }
        }
        
        /* Inline tel links */
        a[href^="tel:"] {
            color: #059669;
            text-decoration: none;
            font-weight: 600;
        }
    </style>

    <div class="tdoors-mobile-cta-bar" id="tdoors-mobile-cta">
        <button class="close-btn" onclick="this.parentElement.classList.remove('active'); document.body.classList.remove('tdoors-cta-active');">✕</button>
        <a href="tel:+31684305663" class="btn-call">📞 Bel Nu</a>
        <a href="/contact/" class="btn-quote">✉️ Offerte</a>
    </div>

    <script>
    document.addEventListener('DOMContentLoaded', function() {
        // Show CTA bar on mobile after 5 seconds
        if (window.innerWidth < 768) {
            setTimeout(() => {
                const cta = document.getElementById('tdoors-mobile-cta');
                if (cta) {
                    cta.classList.add('active');
                    document.body.classList.add('tdoors-cta-active');
                }
            }, 5000);
        }
        
        // Convert phone numbers to tel: links
        const phoneRegex = /(\+31|0031|06)([\s\-\.])?([\d]{1,2})([\s\-\.])?([\d]{1,3})([\s\-\.])?([\d]{1,4})/g;
        document.querySelectorAll('p, div, span, li').forEach(el => {
            if (el.children.length === 0) {
                el.innerHTML = el.innerHTML.replace(phoneRegex, '<a href="tel:+31$3$5$7">$&</a>');
            }
        });
    });
    </script>
    <?php
}, 999);
