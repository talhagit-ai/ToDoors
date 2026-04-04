# ToDoors.nl Refinements - April 4, 2026
**Status:** Implementation Plan Ready

---

## Pending Updates

### 1️⃣ Service Page Refinements (Page ID: 157)

**Remove:** Hourly rate lines from all service packages
```
BEFORE: <p><strong>Uurtarief:</strong> €73/uur (kantoor)</p>
AFTER:  [REMOVED]
```

**Patterns to remove:**
- `<p><strong>Uurtarief:</strong> €73/uur (kantoor)</p>` (Basic)
- `<p><strong>Uurtarief:</strong> €69/uur (kantoor)</p>` (Basic+)
- `<p><strong>Uurtarief:</strong> €65/uur (kantoor)</p>` (Basic+ 2x)
- `<p><strong>Geen uurtarief &#8211; alles inbegrepen!</strong></p>` (Full Service - delete with package)

**COMPLETELY REMOVE:** Full Service package (4th column - from `<div class="gdlr-core-pbf-column...">` containing "Full Service*" to closing `</div>`)

---

### 2️⃣ Product Pages (6 pages)

**Page IDs:** 2804, 2820, 2828, 2823, 2832, 2520

**Changes:**
```
FIND:    Prijzen &amp; Offerte
REPLACE: Offerte

FIND:    Prijzen & Offerte  
REPLACE: Offerte

FIND:    Vanaf €2.500
REPLACE: [REMOVED - temporarily]
```

---

### 3️⃣ Contact Form (Page ID: 1964)

**Current Issue:** JavaScript fallback form was added but user wants original form only

**Action:** Disable/remove Snippet 18-19 (JS form fallback)

**Result:** Original contact form will display

---

### 4️⃣ Benefits Section Layout

**Pages affected:**
- Voordelen Schuifdeuren (page 2804)
- Voordelen Draaideuren (page 2820)

**Issue:** 4 benefits items are "door elkaar" (jumbled) - not properly aligned in grid

**Solution:** Restructure column classes from `gdlr-core-column-25` or similar to proper `gdlr-core-column-50` (2-column) layout with proper wrapping

---

### 5️⃣ Google Business Reviews

**To integrate on:**
- /over-ons/ (page 1852)
- /service/ (page 157 - after other changes)

**Reviews (5⭐):**
1. **HvO Meat** - [Pending: actual quote]
2. **Voordeelfiets** - [Pending: actual quote]
3. **Mark Butterman** - [Pending: actual quote]

**Source:** Google My Business - "ToDoors | Intelligente toegang en automatisering"

---

## Implementation Strategy

### Option A: PHP Snippet Update
Create Snippet #24 that:
1. Hooks into `wp` action
2. Checks for `?todoors_refine=1` parameter
3. Applies regex replacements to post content before rendering
4. Clears cache after modifications

### Option B: Direct REST API Updates
Use curl to:
1. Fetch page content
2. Apply sed/perl replacements locally
3. POST updated content back via REST API

### Option C: Manual WordPress Admin
Edit each page in WordPress admin interface directly

---

## Next Steps

1. **Confirm approach** with user (which method preferred?)
2. **Execute service page changes** (remove uurtarief + Full Service)
3. **Execute product page changes** (rename sections, remove prices)
4. **Fix contact form** (revert JS fallback)
5. **Restructure benefits layout** (grid alignment)
6. **Integrate Google reviews** (once customer quotes confirmed)
7. **Test all pages** for proper display and functionality

---

## Files Created
- `/Users/todoors/Documents/claude/ToDoors/Site/REFINEMENTS_APRIL_04_2026.md` (this file)
- `/tmp/todoors_refinement_plan.md` (implementation notes)
- `/tmp/todoors_refinements.php` (PHP helper functions)

