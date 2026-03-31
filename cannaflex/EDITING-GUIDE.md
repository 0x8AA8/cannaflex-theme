# Cannaflex Theme — Editing Guide

How to update site content from WordPress admin without touching code.

---

## Logo

| What | Where |
|------|-------|
| Site logo | **Appearance → Customize → Site Identity → Logo** |
| Note | Any custom logo set in WP admin will be rendered. If no logo is set, a Cannaflex SVG wordmark is shown. |

## Navigation Menu

| What | Where |
|------|-------|
| Main menu | **Appearance → Menus** → Create menu with items: Home, About, Activity, Products, Brands, News, Contact → Assign to "Primary Navigation" |
| Note | If no valid menu is assigned, the theme renders canonical Cannaflex links automatically |

## Home Page

| Section | Setting Location | Field Name(s) |
|---------|-----------------|---------------|
| Hero heading/text/button | Appearance → Customize → **Home — Hero** | `hero_heading`, `hero_text`, `hero_btn_text`, `hero_btn_url` |
| Hero background image | Same | `hero_image` |
| About heading/intro/body | Appearance → Customize → **Home — About Block** | `home_about_heading`, `home_about_intro`, `home_about_text`, `home_about_btn` |
| About background photo | Same | `home_about_photo` |
| "Made in Morocco" badge | Same | `home_about_image` |
| Seed-to-Shelf heading/text | Appearance → Customize → **Home — Seed to Shelf** | `seed_heading`, `seed_text`, `seed_image` |
| Process tiles (3) | Same | `process_1_title`, `process_1_text`, etc. |
| Products heading/subtitle | Appearance → Customize → **Home — Products** | `products_heading`, `products_text` |
| Brands heading/subtitle | Appearance → Customize → **Home — Brands** | `brands_heading`, `brands_text` |
| Contact CTA text/image | Appearance → Customize → **Home — Contact Block** | `home_contact_text`, `home_contact_image` |

## About Page

| Section | Setting Location | Field Name |
|---------|-----------------|------------|
| Intro heading | Pages → About → **About — Intro Heading** meta box | `_cfx_about_intro_heading` |
| Intro body text | Pages → About → **About — Intro Body Text** meta box | `_cfx_about_body` |
| Featured image (left panel + values bg) | Pages → About → **Featured Image** | WordPress Featured Image |
| Mission text | Pages → About → **About — Mission** meta box | `_cfx_about_mission` |
| Values (4 items) | Pages → About → **About — Values (JSON)** meta box | `_cfx_about_values` (JSON array) |
| CTA heading | Pages → About → **About — CTA Heading** | `_cfx_about_cta` |
| CTA body text | Pages → About → **About — CTA Body Text** | `_cfx_about_cta_text` |
| CTA background image | Pages → About → **About — CTA Background Image URL** | `_cfx_about_cta_bg` |

### Values JSON format:
```json
[
  {"title": "Socials", "text": "Description..."},
  {"title": "Sustainability", "text": "Description..."},
  {"title": "Innovation", "text": "Description..."},
  {"title": "Authenticity", "text": "Description..."}
]
```

## Activity Page

| Section | Setting Location | Field Name |
|---------|-----------------|------------|
| Intro heading | Pages → Activity → meta box | `_cfx_activity_intro_heading` |
| Intro text | Pages → Activity → meta box | `_cfx_activity_intro` |
| Value chain blocks | Pages → Activity → **Activity — Blocks (JSON)** | `_cfx_activity_blocks` |
| Block images | Direct DB meta (planned: media uploader) | `_cfx_activity_img_0` through `_cfx_activity_img_4` |
| Certifications heading/text | Pages → Activity → meta boxes | `_cfx_activity_certs_heading`, `_cfx_activity_certs_text` |

## Contact Page

| Section | Setting Location | Field Name |
|---------|-----------------|------------|
| Heading/intro | Appearance → Customize → **Contact Page** | `contact_heading`, `contact_intro` |
| Address/phone/email | Same | `contact_address`, `contact_phone`, `contact_email` |
| Google Maps embed URL | Same | `contact_map_embed` |
| Left side image | Same | `contact_image` |

## Team Members

| What | Where |
|------|-------|
| Add/edit members | **Team Members → Add New** |
| Photo | Set Featured Image |
| Job title | **Job Title** meta box in sidebar |

## Products

| What | Where |
|------|-------|
| Add products | **Products → Add New** |
| Categories | **Products → Product Categories** |
| Product image | Set Featured Image |

## Brands

| What | Where |
|------|-------|
| Add brands | **Brands → Add New** |
| Logo | Set Featured Image |
| Tagline | **Brand Tagline** meta box |

## Certifications

| What | Where |
|------|-------|
| Add certifications | **Certifications → Add New** |
| Logo | Set Featured Image |
| Description | **Short Description** meta box |

## Footer

| Section | Setting Location | Field Name |
|---------|-----------------|------------|
| Social media URLs | Appearance → Customize → **Footer** | `social_facebook`, `social_whatsapp`, `social_instagram`, `social_linkedin` |
| "Made in Morocco" badge | Same | `footer_badge` |
| Copyright text | Same | `copyright` |
| Legal info URL | Same | `footer_legal_url` |
| Terms URL | Same | `footer_terms_url` |
| FAQ URL | Same | `footer_faq_url` |
| Careers URL | Same | `footer_careers_url` |
| B2B Access URL | Same | `footer_b2b_url` |

## 404 Page

| Section | Setting Location | Field Name |
|---------|-----------------|------------|
| Heading | Appearance → Customize → **404 Page** | `404_heading` |
| Message | Same | `404_message` |
| Button text | Same | `404_btn_text` |
| Button URL | Same | `404_btn_url` |

## Brands Page CTA

| Section | Setting Location | Field Name |
|---------|-----------------|------------|
| CTA heading | Appearance → Customize → **Brands Page** | `brands_cta_heading` |
| CTA text | Same | `brands_cta_text` |
| CTA button text | Same | `brands_cta_btn` |

## Activity Page Images

| Section | Setting Location | Field Name |
|---------|-----------------|------------|
| Block 1 image (Culture) | Pages → Activity → **Activity — Block 1 Image URL** | `_cfx_activity_img_0` |
| Block 2 image (R&D) | Same | `_cfx_activity_img_1` |
| Block 3 image (Extraction) | Same | `_cfx_activity_img_2` |
| Block 4 image (Transformation) | Same | `_cfx_activity_img_3` |
| Block 5 image (Sales) | Same | `_cfx_activity_img_4` |

## Reading Settings

| What | Where |
|------|-------|
| Set static front page | **Settings → Reading → "A static page"** → Front page: Home |
| Flush permalinks | **Settings → Permalinks → Save Changes** (click once after theme activation) |

## Admin Notices

The theme shows admin notices when:
- Required pages are missing (About, Activity, Products, Brands, News, Contact)
- No primary menu is assigned
- Front page is not set to a static page

Each notice includes a direct link to fix the issue.
