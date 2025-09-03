# WC Mobile Accordion Menu for YOOtheme Pro

A WordPress plugin that creates a mobile accordion menu for WooCommerce + YOOtheme Pro, supporting up to 3 submenu levels (any source item), fully managed via Appearance → Menus.

## Features

- Dedicated menu location: "Mobile Accordion Menu"
- Only visible on mobile (default breakpoint: 960px)
- Submenu toggles open to the right for each next level
- Click/tap on navigation text controls content display
- Shortcode available: `[wc_mobile_accordion_menu]` with options for depth, breakpoint, and title

## Installation (ZIP ready to install)

1. Download the latest release (file: `wc-mobile-accordion-menu.zip`)
2. In WP Admin → Plugins → Add New → Upload Plugin → select ZIP → Install → Activate

## Manual Installation

1. Copy the folder `wc-mobile-accordion-menu` into `wp-content/plugins/`
2. Activate the plugin from WP Admin → Plugins

## Configuration

### 1. Appearance → Menus

- Create a new menu for mobile (e.g. "Mobile Accordion Menu")
- Add any items you wish and arrange them up to 3 levels deep (drag & drop). Order is preserved as set.
- Tab "Manage Locations" → assign your menu to the "Mobile Accordion Menu" location

### 2. YOOtheme Pro → Builder → Header → Mobile (Offcanvas)

- Add a new Text/HTML element with the shortcode:

  ```
  [wc_mobile_accordion_menu title="Categories" depth="3" breakpoint="960"]
  ```

- If you want to hide your theme's default mobile menu, disable it in the Builder or add CSS to hide it.

## Shortcode Options

- `depth` (default: 3): maximum submenu levels
- `breakpoint` (default: 960): menu will only be visible under this pixel width
- `title` (optional): text displayed above the list

## Accessibility

- Uses `aria-expanded` and `aria-controls` for toggle buttons; submenu toggle buttons are hidden with `[hidden]` when collapsed

## Development

- Structure:
  - `wc-mobile-accordion-menu/` — plugin files
  - `github/workflows/release.yaml` — automatic ZIP generation for each tag
  - `dist/` — contains the ZIP for quick reference

## License

GPL-3.0-or-later © Lucian Hus.
