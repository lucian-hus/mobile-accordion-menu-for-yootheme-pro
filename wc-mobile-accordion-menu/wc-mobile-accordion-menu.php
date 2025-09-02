<?php
/**
 * Plugin Name: WC Mobile Accordion Menu
 * Description: Meniu mobil tip acordeon (până la 3 niveluri) pentru WooCommerce/YOOtheme Pro. Se gestionează manual din Appearance → Menus.
 * Version: 1.0.0
 * Author: Lucian Hus
 * License: GPL-3.0-or-later
 * Text Domain: wc-mobile-accordion-menu
 */

if (!defined('ABSPATH')) exit;

class WCMobileAccordionMenu {
    const VERSION  = '1.0.0';
    const LOCATION = 'mobile_accordion_menu';

    public function __construct() {
        add_action('init', [$this, 'register_menu_location']);
        add_action('wp_enqueue_scripts', [$this, 'enqueue_assets']);
        add_shortcode('wc_mobile_accordion_menu', [$this, 'shortcode']);
    }

    public function register_menu_location() {
        register_nav_menus([
            self::LOCATION => __('Mobile Accordion Menu', 'wc-mobile-accordion-menu'),
        ]);
    }

    public function enqueue_assets() {
        if (is_admin()) return;

        wp_register_style(
            'wc-mobile-accordion-menu',
            plugins_url('assets/css/mobile-accordion-menu.css', __FILE__),
            [],
            self::VERSION
        );

        wp_register_script(
            'wc-mobile-accordion-menu',
            plugins_url('assets/js/mobile-accordion-menu.js', __FILE__),
            [],
            self::VERSION,
            true
        );

        wp_enqueue_style('wc-mobile-accordion-menu');
        wp_enqueue_script('wc-mobile-accordion-menu');
    }

    public function shortcode($atts) {
        $atts = shortcode_atts([
            'depth'      => 3,      // limitează la 3 niveluri
            'class'      => '',     // clase adiționale pe container
            'breakpoint' => '960',  // px – afișează doar sub acest prag
            'title'      => '',     // titlu opțional deasupra meniului
        ], $atts, 'wc_mobile_accordion_menu');

        $container_class = 'wc-mobile-accordion-menu';
        if (!empty($atts['class'])) {
            $container_class .= ' ' . sanitize_html_class($atts['class']);
        }

        $menu_html = wp_nav_menu([
            'theme_location' => self::LOCATION,
            'container'      => false,
            'menu_class'     => $container_class . '__list',
            'fallback_cb'    => '__return_empty_string',
            'depth'          => max(1, (int) $atts['depth']),
            'echo'           => false,
            'item_spacing'   => 'discard',
        ]);

        if (empty($menu_html)) {
            if (current_user_can('edit_theme_options')) {
                $msg = sprintf(
                    __('Nu există niciun meniu asignat la locația „%s”. Asignează unul în Appearance → Menus → Manage Locations.', 'wc-mobile-accordion-menu'),
                    self::LOCATION
                );
                return '<div class="' . esc_attr($container_class) . '"><p>' . esc_html($msg) . '</p></div>';
            }
            return '';
        }

        ob_start(); ?>
        <nav class="<?php echo esc_attr($container_class); ?>"
             data-breakpoint="<?php echo esc_attr((int) $atts['breakpoint']); ?>"
             aria-label="<?php esc_attr_e('Mobile accordion menu', 'wc-mobile-accordion-menu'); ?>">
            <?php if (!empty($atts['title'])): ?>
                <div class="<?php echo esc_attr($container_class); ?>__title">
                    <?php echo esc_html($atts['title']); ?>
                </div>
            <?php endif; ?>
            <?php echo $menu_html; ?>
        </nav>
        <?php
        return ob_get_clean();
    }
}

new WCMobileAccordionMenu();