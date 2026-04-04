# Gesprek: Webshop v4 — Rebuild op Basis van ToDoors Site Voorbeeld
**Datum:** 3 april 2026

---

## Samenvatting
Volledige herbouw van de Webshop pagina. De v3 (gele branding, Dormakaba/Tedee, cart/checkout) is verwijderd en vervangen door het professionele design uit het ToDoors site voorbeeld.

---

## Wat is veranderd

### Design System
| Aspect | v3 (oud) | v4 (nieuw) |
|--------|----------|------------|
| Kleuren | Geel #f8c12c | Koper #C45D2C + Navy #1B2A4A |
| Fonts | Outfit + Inter | Fraunces (serif) + Outfit |
| Sfeer | Tech/modern | Warm/premium B2B |
| Bestelmodel | Winkelwagen + checkout | Offerte-aanvraag |

### Producten
- **Oud:** Dormakaba, Tedee, GEZE, Intratone, BEA
- **Nieuw:** Record, Chopin, ToDoors, Agile, BEA, Optex

### Categorieën (nieuw)
1. Automatische Schuifdeuren (Enkel, Dubbel, Telescopisch)
2. Automatische Draaideuren (Glijarm, Knikarm, Dubbel)
3. Deurdrangers
4. Harmonica Deuren
5. Guillotine Ramen
6. Elektronische Toegang

### Secties
Topbar → Sticky header met dropdown → Hero met deur-animatie → Trust bar → 6 Categorieën → 8 Producten (tabbed) → 6 Accessoires → CTA Banner → Merken → Contactformulier → Footer

## WordPress
- **Pagina ID:** 18393
- **Status:** Concept (draft)
- **Slug:** webshop
- **URL:** https://www.todoors.nl/webshop/
- **Bewerk:** https://www.todoors.nl/wp-admin/post.php?post=18393&action=edit

## Technische aanpassingen (v4 fix — 4 april 2026)
De eerste v4 upload zag er slecht uit doordat fonts niet laadden en CSS conflicteerde met het WordPress-thema. Oplossing:

| Probleem | Oplossing |
|----------|-----------|
| Fonts laden niet (geen `<head>` toegang) | `@import url(...)` bovenaan `<style>` block |
| CSS conflict met WordPress-thema | Alle selectors geschoopt onder `.td-ws` wrapper class |
| `body` styles niet toepasbaar | Body-level styles toegepast op `.td-ws` wrapper element |
| Full-bleed secties | `width:100vw; margin-left:-50vw; left:50%` op `.td-ws` |
| JavaScript ID-conflicten | Alle IDs geprefixed met `tdws` (bijv. `tdwsHeader`, `tdwsMobileNav`) |
| Keyframe-conflicten | Animaties hernoemd naar `tdwsPulse`, `tdwsFloat` |

**Geüpload:** 4 april 2026, 00:17 UTC — Status: draft — 79.850 chars

## Bestanden
- **Bron:** `/Users/todoors/Documents/claude/ToDoors site/todoors-webshop.html`
- **WP-versie:** `/Users/todoors/Documents/claude/ToDoors/Activiteiten/webshop-pagina-v4.html`
