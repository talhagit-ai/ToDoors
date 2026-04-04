# TODOORS.NL - IMPLEMENTATIE CHECKLIST & ACTION ITEMS

**Startdatum:** 3 april 2026  
**Target:** Volledige implementatie in 6 weken  
**Owner:** [ToDoors Team]

---

## FASE 1: CRITICAL FIXES (WEEK 1-2)

### Priority 1.1: FIX CONTACT FORM JAVASCRIPT REQUIREMENT
- [ ] **Task:** Remove JavaScript dependency from contact form
- [ ] **Responsible:** Developer
- [ ] **Timeline:** 2-3 days
- [ ] **Test:** Form submits without JavaScript enabled
- [ ] **Verification:** Test in browser with JS disabled
- [ ] **Impact:** Accessibility + form abandonment fix
- [ ] **Effort:** Medium (refactor form rendering)
- [ ] **Files to modify:** `/informatieverzoek/` template
- [ ] **QA Checklist:**
  - [ ] Form displays without JavaScript
  - [ ] All fields render correctly
  - [ ] Validation works
  - [ ] Success message appears
  - [ ] Email submission triggers

**Status:** ☐ Not started | ☐ In progress | ☐ Complete | ☐ Testing

---

### Priority 1.2: ADD PRICING TO 8 PRODUCT PAGES
- [ ] **Task:** Add minimum/starting prices to product pages
- [ ] **Responsible:** Content Editor
- [ ] **Timeline:** 1-2 days
- [ ] **Pages to update:**
  1. [ ] https://www.todoors.nl/automatische-schuifdeuren/ 
     → Add: "Vanaf €2.500 + installatie"
  2. [ ] https://www.todoors.nl/automatische-draaideuren/
     → Add: "Vanaf €3.500 + installatie"
  3. [ ] https://www.todoors.nl/automatische-enkelvleugelige-schuifdeuren/
     → Add: "Vanaf €2.500"
  4. [ ] https://www.todoors.nl/deurdrangers/
     → Add: "Vanaf €300-800"
  5. [ ] https://www.todoors.nl/harmonica-deuren/
     → Add: "Vanaf €800-2.000"
  6. [ ] https://www.todoors.nl/elektronische-toegang/
     → Add: "Vanaf €500"
  7. [ ] https://www.todoors.nl/guillotine-ramen/
     → Add: "Vanaf €1.200"
  8. [ ] https://www.todoors.nl/automatische-dubbelvleugelige-schuifdeuren/
     → Add: "Vanaf €4.000 + installatie"

- [ ] **Format consistency:** Use "Vanaf €[price]" template
- [ ] **Placement:** Top of page + hero section
- [ ] **Context:** Include "+ installatie kosten variabel"
- [ ] **QA:** All prices visible, consistent formatting

**Status:** ☐ Not started | ☐ In progress | ☐ Complete

---

### Priority 1.3: EXPAND AUTOMATISCHE SCHUIFDEUREN PAGE
- [ ] **Task:** Expand product page from 150 → 1.200 words
- [ ] **Responsible:** Content Writer
- [ ] **Timeline:** 3-4 days
- [ ] **Current URL:** https://www.todoors.nl/automatische-schuifdeuren/

**Section Checklist:**
- [ ] H2: "Wat zijn automatische schuifdeuren?" (200 words)
  - How they work
  - Safety features
  - Energy efficiency
  - Accessibility benefits

- [ ] H2: "Technische Specificaties" (300 words)
  - Enkelvleugelig dimensions/weight/power
  - Dubbelvleugelig specifications
  - Telescopisch variant details
  - Sensor types (motion, push button, RFID)

- [ ] H2: "Vergelijking: Enkelvleugelig vs. Dubbelvleugelig" (200 words)
  - Cost comparison table
  - Space requirements
  - Throughput differences
  - Use case matrix

- [ ] H2: "Installatieproces & Timing" (200 words)
  - How long installation takes
  - Labor costs (€800-1500)
  - Downtime/disruption
  - Warranty coverage

- [ ] H2: "Onderhoud & Waarschuwingsseinen" (150 words)
  - Quarterly maintenance tasks
  - Common issues (slow closing, sensor misalignment)
  - Service intervals
  - Troubleshooting guide

- [ ] H2: "FAQ Automatische Schuifdeuren" (150 words)
  - How much power needed?
  - Battery backup options?
  - Fire safety compliance?
  - ADA accessibility?

- [ ] **Add pricing:** "Startend vanaf €2.500 + professionele installatie"
- [ ] **Add images/video:** 30-sec product demo
- [ ] **Add internal links:** Link to related products
- [ ] **SEO:** Keyword: "automatische schuifdeuren"
- [ ] **Word count:** Target 1.200-1.400 words

**Status:** ☐ Not started | ☐ In progress | ☐ Complete | ☐ SEO Review

---

### Priority 1.4: EXPAND AUTOMATISCHE DRAAIDEUREN PAGE
- [ ] **Task:** Expand from 100 words → 1.200 words
- [ ] **Responsible:** Content Writer
- [ ] **Timeline:** 3-4 days
- [ ] **Current URL:** https://www.todoors.nl/automatische-draaideuren/

**Follow same structure as 1.3 but for revolving doors:**
- [ ] How revolving doors work (footprint, safety)
- [ ] Specifications (diameter, rotation speed, capacity)
- [ ] 3 variants: Glijarm, Knikarm, Dubbelvleugelig
- [ ] Comparison: Revolving vs. Sliding
- [ ] Installation details
- [ ] Maintenance needs
- [ ] FAQ section

- [ ] **Add pricing:** "Startend vanaf €3.500 + installatie"
- [ ] **Word count:** 1.200-1.400 words

**Status:** ☐ Not started | ☐ In progress | ☐ Complete

---

## FASE 2: HIGH IMPACT (WEEK 3-4)

### Priority 2.1: SEO METADATA & SCHEMA MARKUP
- [ ] **Task:** Implement JSON-LD schema markup
- [ ] **Responsible:** Developer + SEO Specialist
- [ ] **Timeline:** 3-4 days

**Schema markup checklist:**
- [ ] ProductSchema on all product pages
  - [ ] Name, description, price, image
  - [ ] Rating/reviews (if available)
  - [ ] Availability, brand

- [ ] LocalBusinessSchema on contact page
  - [ ] Address: Artemisweg 115I, 8239 DD Lelystad
  - [ ] Phone: +31 6 84 30 5663
  - [ ] Email: info@todoors.nl
  - [ ] Business hours
  - [ ] Service area (nationwide)

- [ ] FAQPageSchema on blog/FAQ pages
  - [ ] At least 5-7 Q&A pairs
  - [ ] Proper markup structure

- [ ] BreadcrumbList on category pages
  - [ ] Home > Category > Subcategory

- [ ] Meta descriptions (150-160 chars with keyword)
  - [ ] Each page unique
  - [ ] Include primary keyword
  - [ ] Action-oriented language

**Testing:**
- [ ] [ ] Google Rich Results test (schema validation)
- [ ] [ ] All markup valid JSON-LD
- [ ] [ ] Mobile-friendly markup check

**Status:** ☐ Not started | ☐ In progress | ☐ Complete

---

### Priority 2.2: TESTIMONIALS & SOCIAL PROOF EXPANSION
- [ ] **Task:** Expand testimonials from 3 → 8-10
- [ ] **Responsible:** Marketer/Sales
- [ ] **Timeline:** 5-7 days

**Current testimonials:** M. Hendriksen, J. van der Berg, R. Smeets

**Action items:**
- [ ] Contact 5 additional customers for testimonials
- [ ] **Request from each:**
  - [ ] Name, title, company
  - [ ] Company logo (for use)
  - [ ] Photo (headshot or team)
  - [ ] 2-3 sentence quote
  - [ ] Specific metric (if available)
  
- [ ] **Placement:**
  - [ ] Homepage carousel (4-5 testimonials)
  - [ ] /over-ons/ page (full list)
  - [ ] Product pages (relevant quotes)

- [ ] **Format:** 
  - [ ] Name + Title
  - [ ] Company + Logo
  - [ ] Photo of person
  - [ ] ⭐⭐⭐⭐⭐ rating
  - [ ] Quote text

**Status:** ☐ Not started | ☐ In progress | ☐ Complete

---

### Priority 2.3: CASE STUDIES (3 MINIMUM)
- [ ] **Task:** Create 3 detailed case studies with ROI
- [ ] **Responsible:** Content Writer + Sales
- [ ] **Timeline:** 5-7 days

**Case Study 1: Retail/Shop**
- [ ] [ ] Company type: Small retail boutique
- [ ] [ ] Challenge: Manual door operation, accessibility
- [ ] [ ] Solution: Single-wing automatic sliding door
- [ ] [ ] Results: 
  - Cost saved: €X/year
  - Customer satisfaction: Increased
  - Accessibility: ADA compliant
  
- [ ] [ ] Format: 500-800 words + images
- [ ] [ ] Include: Before/After scenario

**Case Study 2: Hospital/Healthcare**
- [ ] [ ] Challenge: High traffic, contamination control
- [ ] [ ] Solution: Electronic access + automatic doors
- [ ] [ ] Results: Infection reduction, efficiency gain

**Case Study 3: Logistics/Warehouse**
- [ ] [ ] Challenge: Door bottleneck, throughput
- [ ] [ ] Solution: Double-wing revolving doors
- [ ] [ ] Results: Throughput increase %, time saved

**Publishing:**
- [ ] [ ] Dedicated case study page: /case-studies/
- [ ] [ ] PDF download version
- [ ] [ ] Testimonial quotes extracted for homepage

**Status:** ☐ Not started | ☐ In progress | ☐ Complete

---

### Priority 2.4: TRUST SIGNALS & BADGES
- [ ] **Task:** Create and display trust badges
- [ ] **Responsible:** Designer + Developer
- [ ] **Timeline:** 2-3 days

**Badges to create:**
- [ ] [ ] VCA-Certified badge (prominent)
- [ ] [ ] EN16005 compliance badge
- [ ] [ ] NEN3140 compliance badge
- [ ] [ ] 24/7 Service guarantee badge
- [ ] [ ] Nationwide coverage badge
- [ ] [ ] 15+ years experience badge

**Placement:**
- [ ] [ ] Homepage footer
- [ ] [ ] Contact page
- [ ] [ ] /over-ons/ page
- [ ] [ ] Product pages (relevant)

**Statistics to add:**
- [ ] [ ] "500+ installations" (or actual number)
- [ ] [ ] "100% customer satisfaction" (or %)
- [ ] [ ] "15+ years in business"
- [ ] [ ] "24/7 service availability"
- [ ] [ ] "99.9% uptime guarantee" (if applicable)

**On /over-ons/ page:**
- [ ] Fix placeholder numbers (currently showing "0")
  - [ ] "Klanten: 500+"
  - [ ] "Projecten: 1000+"
  - [ ] "Jaren ervaring: 15+"
  - [ ] "Tevredenheidsscore: 99%+"

**Status:** ☐ Not started | ☐ In progress | ☐ Complete

---

## FASE 3: OPTIMIZATION (WEEK 5-6)

### Priority 3.1: MOBILE UX IMPROVEMENTS
- [ ] **Task:** Enhance mobile experience
- [ ] **Responsible:** Developer + Designer
- [ ] **Timeline:** 3-4 days

**Sticky footer implementation:**
- [ ] [ ] Sticky header with call/quote buttons
- [ ] [ ] "Bel nu" button (tel: link)
- [ ] [ ] "Gratis offerte" button (form link)
- [ ] [ ] Only show on mobile (< 768px)

**Click-to-call links:**
- [ ] [ ] Add tel: links to phone number
  `<a href="tel:+31684305663">+31 6 84 30 5663</a>`
- [ ] [ ] Place phone number in header
- [ ] [ ] Place phone number above fold on contact page

**Form optimization:**
- [ ] [ ] Replace dropdown menus with cleaner UI
- [ ] [ ] Option 1: Button group selection
- [ ] [ ] Option 2: Horizontal scroll options
- [ ] [ ] Single-column layout on mobile

**Image optimization:**
- [ ] [ ] Implement WebP format with PNG fallback
- [ ] [ ] Reduce image file sizes
- [ ] [ ] Lazy loading (already present, verify)

**Performance testing:**
- [ ] [ ] Mobile Lighthouse score > 85
- [ ] [ ] Load time < 3 seconds on 4G

**Status:** ☐ Not started | ☐ In progress | ☐ Complete

---

### Priority 3.2: CTA BUTTON TEXT OPTIMIZATION
- [ ] **Task:** Review and update all CTA button text
- [ ] **Responsible:** Marketer + Content Editor
- [ ] **Timeline:** 1-2 days

**Current text:** "Offerte", "Verstuur", "Meer weten", "Kontakt"

**New text (action-oriented):**
- [ ] [ ] "Gratis offerte aanvragen" (primary)
- [ ] [ ] "Bel ons nu" (phone link)
- [ ] [ ] "Chat met specialist" (if chatbot available)
- [ ] [ ] "Informatie request" → "Vraag info aan"

**Add micro-copy (reassurance):**
- [ ] "↓ Reactie in 2 uur op werkdagen"
- [ ] "→ Geen verplichtingen"
- [ ] "→ Gratis advies"
- [ ] "→ 15+ jaren ervaring"

**Button placement audit:**
- [ ] [ ] Homepage: 3+ buttons
- [ ] [ ] Each product page: 2+ buttons
- [ ] [ ] Contact page: 2 options (form + phone)
- [ ] [ ] Footer: 1 button

**Button styling:**
- [ ] [ ] Primary color (ensure contrast)
- [ ] [ ] Size: at least 44x44px (mobile)
- [ ] [ ] Hover state visible
- [ ] [ ] Mobile: take full width or 80%

**Status:** ☐ Not started | ☐ In progress | ☐ Complete

---

### Priority 3.3: VIDEO CONTENT CREATION
- [ ] **Task:** Create 4 videos
- [ ] **Responsible:** Videographer/Production
- [ ] **Timeline:** 1-2 weeks (outsource recommended)

**Video 1: How automatic doors work (30-45 sec)**
- [ ] [ ] Animation-based explanation
- [ ] [ ] 4-step process visualization
- [ ] [ ] Subtitle captions
- [ ] [ ] End with CTA: "Learn more"

**Video 2: Installation process (60-90 sec)**
- [ ] [ ] Time-lapse montage
- [ ] [ ] Before/after transformation
- [ ] [ ] Professional music + narration
- [ ] [ ] Include: measurement → installation → testing

**Video 3: Customer testimonial (30-45 sec)**
- [ ] [ ] Recorded testimonial (video, not text)
- [ ] [ ] Company name/logo visible
- [ ] [ ] Professional setting
- [ ] [ ] Authentic, natural speech

**Video 4: 24/7 Service guarantee (20-30 sec)**
- [ ] [ ] What it includes
- [ ] [ ] Response time guarantee
- [ ] [ ] Team professionalism showcase

**Platform hosting:**
- [ ] [ ] Upload to YouTube (SEO benefit)
- [ ] [ ] Embed on website
- [ ] [ ] Add schema markup (VideoSchema)
- [ ] [ ] Create thumbnail images (professional)

**Estimated budget:** €2,500-5,000 (if outsourced)

**Status:** ☐ Not started | ☐ In progress | ☐ Complete

---

### Priority 3.4: PRODUCT PHOTOGRAPHY
- [ ] **Task:** Professional product photography
- [ ] **Responsible:** Photographer
- [ ] **Timeline:** 1-2 weeks (outsource recommended)

**Product shots needed:**
- [ ] [ ] Automatic sliding doors (3 angles)
- [ ] [ ] Revolving doors (3 angles)
- [ ] [ ] Door closers (3 variants)
- [ ] [ ] Harmonica doors (open/closed states)
- [ ] [ ] Electronic access components
- [ ] [ ] Guillotine windows

**Specifications:**
- [ ] [ ] High-resolution (2000x1500px minimum)
- [ ] [ ] Lifestyle context: installation in real setting
- [ ] [ ] Close-ups: detail/mechanism
- [ ] [ ] Consistent lighting/background
- [ ] [ ] Logo/branding not visible (clean focus)

**Lifestyle shots:**
- [ ] [ ] Hospital entrance with automatic doors
- [ ] [ ] Retail store (customer entering)
- [ ] [ ] Office building (accessibility)
- [ ] [ ] Logistics facility (high traffic)

**Editing/optimization:**
- [ ] [ ] Color correction consistency
- [ ] [ ] Cropping for web layout
- [ ] [ ] WebP + PNG formats
- [ ] [ ] File size optimization

**Estimated budget:** €1,500-3,000

**Status:** ☐ Not started | ☐ In progress | ☐ Complete

---

### Priority 3.5: ANALYTICS & TRACKING SETUP
- [ ] **Task:** Implement comprehensive analytics
- [ ] **Responsible:** Developer + Analytics
- [ ] **Timeline:** 2-3 days

**Form analytics:**
- [ ] [ ] Form view tracking (Google Analytics)
- [ ] [ ] Form start tracking (first field focus)
- [ ] [ ] Form completion tracking (submission)
- [ ] [ ] Field-level abandonment (which field loses users?)
- [ ] [ ] Time-to-submit tracking

**Goal conversion setup:**
- [ ] [ ] Goal 1: Form submission = Lead conversion
- [ ] [ ] Goal 2: Phone click (tel:) = Lead conversion
- [ ] [ ] Goal 3: Email click (mailto:) = Inquiry
- [ ] [ ] Goal 4: Product page view > 2 min = Engagement

**Segment analysis:**
- [ ] [ ] Mobile vs. Desktop conversion rates
- [ ] [ ] Traffic source performance
- [ ] [ ] Product page engagement ranking
- [ ] [ ] Geographic breakdown (if applicable)

**Custom events tracking:**
- [ ] [ ] CTA button clicks (which button?)
- [ ] [ ] Scroll depth (how far do users read?)
- [ ] [ ] Video play/completion rates
- [ ] [ ] Download engagement (if PDFs offered)

**Tools to implement:**
- [ ] [ ] Google Analytics 4 (GA4) events
- [ ] [ ] Google Search Console monitoring
- [ ] [ ] Optional: Hotjar (heat mapping)
- [ ] [ ] Optional: Hotjar session recordings (see user behavior)

**Reporting setup:**
- [ ] [ ] Monthly dashboard (traffic, conversions)
- [ ] [ ] Product page ranking (by engagement)
- [ ] [ ] Mobile vs. desktop performance split
- [ ] [ ] Lead quality metrics (phone vs. form)

**Status:** ☐ Not started | ☐ In progress | ☐ Complete

---

## ADDITIONAL NICE-TO-HAVES (Lower Priority)

### Additional 1: Content Consolidation Strategy
- [ ] **Task:** Review and consolidate duplicate blog content
- [ ] **Effort:** High (ongoing process)
- [ ] Audit 700+ blog posts
- [ ] Identify duplicates/overlaps
- [ ] Create pillar content pages (50-100 main topics)
- [ ] Link subpages hierarchically
- [ ] Improve internal linking structure

---

### Additional 2: Guillotine Windows Strategic Review
- [ ] **Task:** Decide: Integration vs. Separate Product
- [ ] **Options:**
  - Option A: Integrate with door automation (recommended)
  - Option B: Separate product line
- [ ] **Decision impact:** Content rewrite needed

---

### Additional 3: Newsletter Signup
- [ ] **Task:** Add email list capture
- [ ] **Implementation:**
  - [ ] Pop-up or sticky banner
  - [ ] Simple form: Email + checkbox
  - [ ] Offer: "Maintenance tips" free PDF
  - [ ] Email platform integration (Mailchimp, etc.)

---

## TIMELINE SUMMARY

| Phase | Week | Tasks | Owner |
|-------|------|-------|-------|
| 1 | 1-2 | Contact form JS, Pricing, Content expansion | Dev + Writer |
| 2 | 3-4 | Schema markup, Testimonials, Case studies | Dev + Marketer |
| 3 | 5-6 | Mobile UX, Video, Photography, Analytics | All teams |

**Total project timeline:** 6 weeks  
**Full team required:** Developer, Designer, Content Writer, Marketer, Photographer/Videographer

---

## SUCCESS METRICS

**Post-implementation targets (3 months):**

| Metric | Current | Target | Growth |
|--------|---------|--------|--------|
| Organic traffic | 100% | 140-160% | +40-60% |
| Form submissions | 100% | 130-150% | +30-50% |
| Mobile conversions | 100% | 115-125% | +15-25% |
| Average time-on-page | 100% | 145-175% | +45-75% |
| Bounce rate | 100% | 70-80% | -20-30% |
| Lead quality score | 100% | 125-140% | +25-40% |

---

## APPROVAL & SIGN-OFF

**Project initiated:** 3 april 2026  
**Expected completion:** 14 mei 2026  
**Project lead:** [Name]  
**Budget approved:** [Yes/No]  
**Team assigned:** [Names]

---

**Document version:** 1.0  
**Last updated:** 3 april 2026

