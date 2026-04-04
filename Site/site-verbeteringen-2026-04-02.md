# ToDoors Site Verbeteringen
**Datum:** 2 april 2026

---

## Overzicht van doorgevoerde wijzigingen

### 1. ✅ FAQ menu-item verwijderd
- Menu-item ID 12417 ("FAQ's") verwijderd uit de hoofdnavigatie
- Link verwees naar `/category/blog-nieuw/blog/` (dode URL)
- Navigatie heeft nu 18 items (was 19)

### 2. ✅ Contact pagina: "KLIK HIER" knop gefixt
- Pagina ID: 1964
- Knoptekst gewijzigd van "KLIK HIER" naar "Vraag offerte aan"
- Knop linkt naar `/informatieverzoek/`

### 3. ✅ Service pagina: Onderhoudspakketten toegevoegd
- Pagina ID: 157
- Nieuwe sectie toegevoegd: **Onderhoudspakketten**
- **Basis Pakket** – Vanaf €125/jaar: jaarlijkse inspectie, reactie 24u
- **Standaard Pakket** – Vanaf €225/jaar: halfjaarlijkse inspectie + onderhoud, reactie 8u
- **Premium Pakket** – Vanaf €395/jaar: kwartaal onderhoud + 24/7 service, reactie 4u

### 4. ✅ Automatische Schuifdeuren: Technische specs toegevoegd
- Pagina ID: 2804
- Nieuwe sectie: **Technische Specificaties**
- Enkelvleugelig: 700–1500mm breed, max 150kg, EN16005/NEN3140
- Dubbelvleugelig: 1400–3000mm breed, max 2x150kg, EN16005/NEN3140
- Telescopisch: 1800–5000mm breed, max 4x120kg, EN16005/NEN3140

### 5. ✅ Over Ons: Klantervaringen (testimonials) toegevoegd
- Pagina ID: 1852
- Nieuwe sectie: **Klantervaringen**
- M. Hendriksen – Winkelcentrum De Stadspoort, Lelystad
- J. van der Berg – Medisch Centrum Flevo, Almere
- R. Smeets – Logistics Hub Nederland, Amsterdam

### 6. ✅ LiteSpeed Cache optimalisatie geconfigureerd
- CSS minificatie: AAN
- CSS combineren: AAN
- JS minificatie: AAN
- JS combineren: AAN
- JS defer (uitgesteld laden): AAN
- Browser caching: AAN (30 dagen)
- Pagina caching TTL: 7 dagen
- Emoji scripts verwijderd
- Query strings van assets verwijderd

---

## Statistieken Over Ons (al correct)
De statistieken waren al correct geconfigureerd via JavaScript animatie:
- Klanten: 170+
- Projecten: 250+
- Producten: 10+
- Ervaring: 15+
Ze toonden "0+" alleen bij statische tools (zonder JavaScript).

---

## Technische aanpak
- WordPress REST API met Application Password authenticatie
- Pagina's gebruiken GoodLayers/RealFactory theme page builder
- Content opgeslagen in `gdlr-core-page-builder` post meta (PHP serialized array)
- Wijzigingen doorgevoerd via Code Snippets plugin (PHP snippets)
- LiteSpeed Cache geconfigureerd via WordPress options

---

## Actieve snippets na opschoning
| ID | Naam | Doel |
|----|------|------|
| 7 | ToDoors REST Tools | REST API endpoints (get-meta, set-meta) |
| 12 | ToDoors Settings Register | Registreert settings voor API toegang |

## Openstaande verbeteringen
- Portfolio pagina zichtbaar maken in navigatie
- Nieuws/Blog pagina structuur verbeteren
- Echte klantfoto's toevoegen aan testimonials
- Contact pagina: 3 service-specifieke CTAs onderscheiden (storing melden, offerte, onderhoud)
- Overige productpagina's verrijken (draaideuren, deurdrangers, harmonica, guillotine, elektronische toegang)
