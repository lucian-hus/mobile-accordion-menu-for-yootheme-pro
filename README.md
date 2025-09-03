# WC Mobile Accordion Menu for YOOtheme Pro

A WordPress plugin that provides a mobile accordion menu for YOOtheme Pro, with support for up to 3 submenu levels. All menu items are manually controlled through WordPress Appearance → Menus, giving you complete control over your mobile navigation structure.

## Features
- **Manual Menu Control**: Configure your mobile menu entirely through Appearance → Menus - no automatic WooCommerce category generation
- **YOOtheme Pro Compatible**: Seamlessly integrates with YOOtheme Pro themes and builder
- **Up to 3 Submenu Levels**: Supports deep navigation hierarchies with accordion-style expansion
- **Mobile-Only Display**: Shows only on mobile devices (below breakpoint, default 960px)
- **Accessible Design**: All submenus are closed by default; toggle icons on the right expand the next level
- **Intuitive Navigation**: Click on menu item text to navigate; only the toggle icon controls submenu expansion
- **Flexible Shortcode**: `[wc_mobile_accordion_menu]` with customizable `depth`, `breakpoint`, and `title` options
- **Dedicated Menu Location**: "Mobile Accordion Menu" location for easy menu assignment

## Installation (Ready-to-Install ZIP)
1. Download the latest version from Releases (the `wc-mobile-accordion-menu-*.zip` file).
2. Go to WP Admin → Plugins → Add New → Upload Plugin → select ZIP → Install → Activate.

## Installation from Source (Manual)
1. Copy the `wc-mobile-accordion-menu` folder to your `wp-content/plugins/` directory.
2. Activate the plugin from WP Admin → Plugins.

## Configuration

### Step 1: Set Up Your Menu
1. **Appearance → Menus**
   - Create a new menu for mobile (e.g., "Mobile Accordion Menu")
   - Add your desired menu items (Pages, Custom Links, Product Categories, etc.)
   - Organize them in up to 3 levels using drag & drop - the order you set is exactly preserved
   - Go to the "Manage Locations" tab → assign your menu to the "Mobile Accordion Menu" location

### Step 2: Add to YOOtheme Pro
2. **YOOtheme Pro → Builder → Header → Mobile (Offcanvas)**
   - Add a Text/HTML element with the shortcode:

   ```
   [wc_mobile_accordion_menu title="Menu" depth="3" breakpoint="960"]
   ```

   - If you want to hide the existing theme mobile menu, disable it in the Builder or add custom CSS to hide it on mobile devices.

### Pro Tips
- You can add any type of menu item: pages, posts, custom links, WooCommerce product categories, etc.
- The plugin preserves your exact menu structure and ordering
- Use custom CSS classes on menu items for additional styling control

## Shortcode Options
- **`depth`** (default: 3): Maximum depth of submenus (1-3 levels supported)
- **`breakpoint`** (default: 960): Pixel width below which the menu becomes visible
- **`title`** (optional): Text displayed above the menu list

### Example Usage
```
[wc_mobile_accordion_menu title="Categories" depth="2" breakpoint="768"]
```

## Accessibility
- Uses proper ARIA attributes: `aria-expanded` and `aria-controls` on toggle buttons
- Submenus are hidden using the `[hidden]` attribute for screen reader compatibility
- Keyboard navigation support
- Semantic HTML structure for better accessibility

## Development
### Project Structure
- `wc-mobile-accordion-menu/` – Main plugin directory
- `.github/workflows/release.yml` – Automated ZIP generation on tag creation
- `dist/` – Contains pre-built ZIP files for reference

### Version 2.0.0 Changes
- **Manual Menu Control**: Complete control over menu structure through WordPress Menus
- **Enhanced YOOtheme Pro Integration**: Better compatibility and easier setup
- **Improved Accessibility**: Enhanced ARIA support and keyboard navigation
- **Flexible Content**: Support for any menu item type, not just WooCommerce categories
- **Better Documentation**: Clear step-by-step setup instructions

## License
GPL-3.0-or-later. © Lucian Hus.