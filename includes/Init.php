<?php
/**
 * @package Hansefair
 */

namespace Inc;

final class Init
{
    public static function get_services()
    {
        return [
            Pages\Dashboard::class,
            Base\Enqueue::class,
            Base\SettingsLinks::class,
            Base\CustomPostTypeController::class
        ];
    }

    public static function register_services()
    {
        foreach (self::get_services() as $cls) {
            $service = self::instantiate($cls);
            if (method_exists($service, 'register')) {
                $service->register();
            }
        }
    }

    private static function instantiate($cls)
    {
        return new $cls();
    }
}

// use Inc\Activate;
// use Inc\Deactivate;

// use Inc\Admin\AdminPages;

// class Hansefair
// {
//     public $plugin_identifier;

//     public function __construct()
//     {
//         $this->plugin_identifier = plugin_basename( __FILE__ );
//     }

//     public function register()
//     {
//         add_action('init', array($this, 'custom_post_type'));
//         add_action('wp_enqueue_scripts', array($this, 'enqueue'));
//         add_action('admin_enqueue_scripts', array($this, 'enqueue_admin'));
//         add_action('admin_menu', array($this, 'add_admin_pages'));
//         add_filter( "plugin_action_links_$this->plugin_identifier", array($this, 'settings_links') );
//     }

//     public function add_admin_pages()
//     {
//         add_menu_page('Hansefair', 'Hansefair', 'manage_options', 'hanseconf_plugin', array($this, 'admin_index'), 'dashicons-store
//         ', 50);
//     }

//     public function admin_index()
//     {
//         // add adim page here
//         require_once plugin_dir_path(__FILE__) . 'templates/admin_index.php';
//     }

//     public function settings_links( $links )
//     {
//         $settings_link = '<a href="admin.php?page=hanseconf_plugin">Einstellungen</a>';
//         array_push( $links, $settings_link);
//         return $links;
//     }

//     function activate()
//     {
//         Activate::activate();
//     }

//     function deactivate()
//     {
//         Deactivate::deactivate();
//     }

//     public function custom_post_type()
//     {
//         register_post_type('book', ['public' => true, 'label' => 'Books']);
//     }

//     public function enqueue()
//     {
//         wp_enqueue_style('hanseconf_style', plugins_url('/assets/hansefair.css', __FILE__), [], '0.0.1');
//         wp_enqueue_script('hanseconf_script', plugins_url('/assets/hansefair.js', __FILE__), [], '0.0.1', true);
//     }

//     public function enqueue_admin()
//     {
//         wp_enqueue_style('hanseconf_admin_style', plugins_url('/assets/hanseconf_admin.css', __FILE__), [], '0.0.1');
//     }
// }

// if (class_exists('Hansefair')) {
//     $hanse_conf = new Hansefair();
//     $hanse_conf->register();
// }

// // activation.
// register_activation_hook(__FILE__, array($hanse_conf, 'activate'));
// // require_once plugin_dir_path(__FILE__) . 'includes/hansefair-plugin-activate.php';
// // register_activation_hook(__FILE__, array('HanseConfActivate', 'activate'));

// // deactivation.
// register_deactivation_hook(__FILE__, array($hanse_conf, 'deactivate'));
// // require_once plugin_dir_path(__FILE__) . 'includes/hansefair-plugin-deactivate.php';
// // register_deactivation_hook(__FILE__, array('HanseConfDeactivate', 'deactivate'));
