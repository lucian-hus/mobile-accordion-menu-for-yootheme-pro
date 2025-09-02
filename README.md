# WC Mobile Accordion Menu for YOOtheme Pro

Un plugin WordPress care oferă un meniu mobil tip acordeon pentru WooCommerce + YOOtheme Pro, cu până la 3 niveluri de categorii (sau orice iteme), configurat manual din Appearance → Menus.

## Funcționalități
- Locație dedicată de meniu: "Mobile Accordion Menu".
- Afișează doar pe mobil (sub breakpoint, implicit 960px).
- Toate submeniurile sunt închise implicit; toggle pe dreapta deschide nivelul următor.
- Click pe textul itemului navighează; doar iconița controlează deschiderea.
- Shortcode: `[wc_mobile_accordion_menu]` cu opțiuni `depth`, `breakpoint`, `title`.

## Instalare (ZIP gata de instalat)
1. Descarcă ultima versiune din Releases (fișierul `wc-mobile-accordion-menu-*.zip`).
2. WP Admin → Plugins → Add New → Upload Plugin → selectează ZIP → Install → Activate.

## Instalare din surse (manual)
1. Copiază folderul `wc-mobile-accordion-menu` în `wp-content/plugins/`.
2. Activează pluginul din WP Admin → Plugins.

## Configurare
1. Appearance → Menus
   - Creează un meniu pentru mobil (ex. "Mobile Accordion Menu").
   - Adaugă „Product Categories" și aranjează-le pe 3 niveluri (drag&drop). Ordinea se păstrează exact cum o setezi.
   - Tab "Manage Locations" → asignează meniul la locația "Mobile Accordion Menu".
2. YOOtheme Pro → Builder → Header → Mobile (Offcanvas)
   - Adaugă un element Text/HTML cu shortcode-ul:

   ```
   [wc_mobile_accordion_menu title="Categorii" depth="3" breakpoint="960"]
   ```

   - Dacă vrei să ascunzi meniul mobil existent al temei, dezactivează-l din Builder sau adaugă un CSS pentru a-l ascunde pe mobil.

## Opțiuni Shortcode
- `depth` (implicit 3): adâncimea maximă a submenu-urilor.
- `breakpoint` (implicit 960): pixeli; meniul este vizibil doar sub acest prag.
- `title` (opțional): text afișat deasupra listei.

## Accesibilitate
- Folosește `aria-expanded` și `aria-controls` pe butoanele de toggle; submeniurile sunt ascunse cu `[hidden]`.

## Dezvoltare
- Structură:
  - `wc-mobile-accordion-menu/` – pluginul
  - `.github/workflows/release.yml` – generează ZIP automat la tag
  - `dist/` – conține zip-ul preconstruit pentru referință

## Licență
GPL-3.0-or-later. © Lucian Hus.