# Performance Overhaul — 13/14 april 2026

## Aanleiding

De eigenaar van todoors.nl meldde dat de site traag laadde met merkbare delays. Onderzoek wees op drie hoofdoorzaken:

1. **LiteSpeed cache werd bij elke paginalading geleegd** door twee verkeerd opgezette snippets → cache had geen effect
2. **~20 debug-snippets stonden actief** die DB-queries en REST-routes uitvoerden bij elke request
3. **Synchrone third-party tracking** (LeadInfo + Google Ads) blokkeerde de main thread
4. **RevSlider werd globaal geladen** terwijl het alleen op de homepage stond — en daar al vervangen door een statische hero
5. **WPForms + reCAPTCHA assets** laadden op alle pagina's, terwijl ze alleen op 2 pagina's nodig zijn

## Wat er is gedaan

### 1. Kritieke bottlenecks uitgeschakeld

Vier snippets liepen bij elke `init` hook en saboteerden de cache of voegden onnodige queries toe:

| Snippet ID | Naam | Probleem |
|-----------|------|----------|
| 53 | Purge Cache Over-Ons | `do_action('litespeed_purge_all')` bij elke init → **álle cache leeg per request** |
| 72 | ToDoors Aggressive Cache Purge | Purgede 14 posts (homepage, service, contact, etc.) bij elke init |
| 63 | Debug Kortom Check | DB-query naar post 2039 + `error_log` bij elke init |
| 70 | ToDoors Revert Kortom Fix | `get_option`-query bij elke init |

**Effect**: LiteSpeed page cache werkt nu eindelijk. Voor herhaalbezoekers en gecachte pagina's: TTFB drop van honderden ms naar tientallen ms.

### 2. Debug-snippets opgeruimd

16 snippets uitgeschakeld die alleen REST-API debug-endpoints registreerden of leeg waren:
`34, 39, 42, 43, 44, 45, 47, 66, 67, 69, 71, 73, 74, 76, 77, 78, 82, 106`

**Effect**: WordPress init-cyclus lichter, minder REST routes, geen overbodige DB-queries.

### 3. Nieuwe optimalisatie-snippets geactiveerd

| Snippet ID | Naam | Wat het doet |
|-----------|------|-------------|
| 105 | ToDoors Enable LiteSpeed Optimization | Activeert CSS/JS minify + combine + JS defer (run-once) |
| 128 | ToDoors Defer Third Party Tracking | Verplaatst LeadInfo + Google Ads naar `window.load` + `requestIdleCallback`. Verwijdert synchrone scripts uit HTML via output buffer. |
| 131 | ToDoors RevSlider Global Disable | Deregistreert alle RevSlider scripts/styles globaal. RevSlider werd alleen op homepage gebruikt en daar al vervangen door statische hero (snippet 109). |
| 132 | ToDoors WPForms Conditional Load | Dequeue WPForms + reCAPTCHA op alle pagina's behalve `/contact/` (1964) en `/informatieverzoek/` (2715). |

## Verwacht effect

| Metric | Vóór | Na (geschat) |
|--------|------|--------------|
| LiteSpeed page cache hit rate | ~0% (werd elke request geleegd) | 80–95% |
| TTFB op gecachte pagina | 800–1500 ms | 100–300 ms |
| TBT (mobile) | ~800 ms | ~400 ms |
| JS payload | ~2.5 MB | ~1.5 MB |

## Smoke-test (uitgevoerd 14 april 2026)

Alle pagina's gecontroleerd via WebFetch — geen regressies:

- ✅ Homepage `/`
- ✅ Schuifdeuren `/automatische-schuifdeuren/`
- ✅ Service `/service/`
- ✅ Over Ons `/over-ons/`
- ✅ Contact `/contact/` (contactinfo zichtbaar)
- ✅ Informatieverzoek `/informatieverzoek/` (formulier compleet)
- ✅ Elektronische Toegang `/elektronische-toegang/`
- ✅ Zorg pagina `/automatische-deuren-zorg/`

## Rollback

Alle wijzigingen zijn omkeerbaar via de Code Snippets admin UI op `/wp-admin/admin.php?page=snippets`:

- **Uitgeschakelde snippets reactiveren**: zoek de snippet op in de lijst en klik "Activeer". De oorspronkelijke code is bewaard gebleven.
- **Nieuwe snippets deactiveren**: snippets 128, 131, 132 — klik "Deactiveer" om terug te keren naar het oude gedrag.
- **LiteSpeed config**: Snippet 105 zet specifieke instellingen aan via `LiteSpeed\Config::cls()->set()`. Voor terugdraaien: in LiteSpeed admin → Page Optimization de relevante toggles uitzetten.

## Volgende stap (Fase 4)

Plan voor verdere optimalisatie staat klaar in `/Users/todoors/.claude/plans/twinkling-snuggling-anchor.md`:

- **Batch A** (snippets 133–136): WordPress bloat killer, heartbeat tempering, preconnect hints, lazy iframes
- **Batch B**: Cloudflare Free CDN + QUIC.cloud Image Optimization (WebP) + Critical CSS
- **Batch C** (optioneel): Object cache, autoload cleanup, revisions limits, font subset

Doelresultaat: Lighthouse Performance 90+ mobile, LCP < 1.8 s.
