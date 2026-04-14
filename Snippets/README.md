# ToDoors WordPress Code Snippets

Exportdatum: 4 april 2026

Alle actieve PHP-snippets die draaien op todoors.nl via de Code Snippets plugin.

## Actieve snippets

| # | Naam | Omschrijving |
|---|------|-------------|
| 05 | Youtube | YouTube embed ondersteuning |
| 07 | ToDoors REST Tools v2 | REST API endpoints voor pagina-data lezen/schrijven |
| 17 | ToDoors Real Service Packages | Service packages op de servicepagina |
| 20 | ToDoors Product Pages Dump | Backup van GDLR page builder data |
| 21 | ToDoors Expand Product Pages | Voegt voordelen-secties toe aan productpagina's |
| 22 | ToDoors Add Pricing Sections | Voegt prijssecties toe aan productpagina's |
| 23 | ToDoors Mobile UX Improvements | Mobiele verbeteringen |
| 26 | ToDoors Direct HTML Replacements | Verwijdert uurtarieven uit servicepagina |
| 28 | ToDoors Google Reviews - Over Ons | Google reviews op de Over Ons pagina |
| 29 | ToDoors Benefits Layout Fix | Fix voor voordelen-grid layout |
| 34-47 | Hulp-snippets | Tijdelijke API-endpoints voor beheer |
| 50 | ToDoors Remove Dead 404 Pages | Verwijdert /diensten, /faq, /blog nav-items |
| 51 | ToDoors Remove Full Service | Verwijdert Full Service pakket uit servicepagina |
| 52 | ToDoors Remove Stats Counters | Verwijdert 0+ tellers van Over-Ons pagina |
| 54 | ToDoors Restore Service Packages | Herstelt 3 onderhoudscontracten op servicepagina |
| 55 | ToDoors Fix Glijarm Copy-Paste | Corrigeert "schuifdeuren" → "draaideuren met glijarm" |
| 59 | ToDoors Repair Copyright Serialization | Herstelt geserialiseerde copyright optie |
| 60 | ToDoors Fix Verbeterde Typo | Corrigeert "Verbeterede" → "Verbeterde" op Deurdrangers |
| 61 | ToDoors Fix Onmogelijke Belofte | Vervangt juridisch riskante belofte op Over-Ons |
| 62-68 | Kortom fixes | Vervangen van "Kortom" door "Waarom ToDoors?" (zie snippet 81) |
| 79 | ToDoors Reconstruct Footer Kortom | Herstelt verdwenen footer sectie |
| 81 | ToDoors Style Footer Waarom ToDoors | Gestyled footer blok met vinkjes en thema-stijl |
| 82 | ToDoors Fix Duplicate Title | Verwijdert dubbele &lt;title&gt; tag van thema, behoudt Yoast versie |
| 83 | ToDoors Set Meta Descriptions | Voegt meta descriptions toe aan alle hoofdpagina's via Yoast SEO |
| 84 | ToDoors Schema Markup | LocalBusiness JSON-LD schema voor Google rich snippets |
| 85 | ToDoors Add Lelystad Copy | Voegt Lelystad/Flevoland toe aan homepage en Over Ons tekst |
| 86 | ToDoors Fix Guarantee SLA | Vervangt vage garantietekst door concrete SLA: 1 uur terugbellen, 2 werkdagen afspraak |
| 87 | ToDoors Certificates Section | Uitlegblok voor EN16005 en NEN3140 op de servicepagina |
| 88 | ToDoors Remove Pricing Elektronische Toegang | Verwijdert Prijzen & Offerte sectie van Elektronische Toegang |
| 89 | ToDoors Fix Contact Links | Vervangt alle /informatieverzoek/ links door /contact/ |
| 105 | ToDoors Enable LiteSpeed Optimization | Activeert CSS/JS minify + combine + JS defer in LiteSpeed (eenmalig, run-once) |
| 128 | ToDoors Defer Third Party Tracking | Verplaatst LeadInfo + Google Ads naar na window.load via requestIdleCallback |
| 131 | ToDoors RevSlider Global Disable | Deregistreert alle RevSlider scripts/styles globaal (~150 KB JS/CSS bespaard) |
| 132 | ToDoors WPForms Conditional Load | Laadt WPForms + reCAPTCHA alleen op /contact/ en /informatieverzoek/ |
| 133 | ToDoors WordPress Bloat Killer | Verwijdert emoji-script, jQuery Migrate, Dashicons frontend, wp-embed, generator/RSD meta tags |
| 134 | ToDoors Heartbeat Tempering | Heartbeat interval naar 60s + deregister op frontend |
| 135 | ToDoors Preconnect Hints | Preconnect + dns-prefetch voor Google Tag Manager, LeadInfo, GA |
| 136 | ToDoors Lazy Iframes | loading=lazy op alle iframes (Maps, YouTube, oEmbeds) |
| 137 | ToDoors Autoload Analysis | REST endpoint `/wp-json/todoors/v1/autoload-top` - toont top 20 autoloaded options |
| 138 | ToDoors Revisions and Trash Limits | Max 3 revisies/post, trash 7 dagen, autosave 120s |
| 139 | ToDoors Disable Autoload Demo Data | autoload=no voor RealFactory demo + oude theme opties (1.28 MB bespaard) |
| 141 | ToDoors Disable Autoload Orphaned Plugin Data | autoload=no voor Hummingbird/AIOSEO orphaned data (122 KB bespaard) |

## Performance overhaul (2026-04-13/14)

**Uitgeschakeld** — debug- en cache-purge-snippets die LiteSpeed-cache effectief uitschakelden + onnodige DB-queries deden bij elke paginalading:

| ID | Naam | Reden |
|----|------|-------|
| 53 | Purge Cache Over-Ons | `litespeed_purge_all` bij elke `init` → cache werkte nooit |
| 72 | ToDoors Aggressive Cache Purge | Purgede 14 posts cache bij elke `init` |
| 63 | Debug Kortom Check | DB-query + error_log bij elke init |
| 70 | ToDoors Revert Kortom Fix | get_option-query bij elke init |
| 39 | (leeg) | Geen code, kon weg |
| 34, 42–45, 47, 66, 67, 69, 71, 73, 74, 76, 77, 78, 82, 106 | Diverse Debug-snippets | REST-routes registreren bij elke request |

**Resultaat:** LiteSpeed page-cache werkt nu daadwerkelijk, geen onnodige DB-queries meer per request. Site voelt direct sneller. Rollback: snippets reactiveren via Code Snippets admin UI.

## Pagina ID's

| Pagina | ID |
|--------|-----|
| Automatische Schuifdeuren | 2804 |
| Automatische Draaideuren | 2820 |
| Deurdrangers | 2828 |
| Harmonica Deuren | 2832 |
| Guillotine Ramen | 2823 |
| Elektronische Toegang | 2520 |
| Service | 157 |
| Over Ons | 1852 |
| Contact | 1964 |
