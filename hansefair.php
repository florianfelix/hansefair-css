<?php
/**
 * Plugin Name: Hansefair Plugin
 * Plugin URI: https://github.com/florianfelix/hansefair-plugin
 * Description: Hansefair-Markisen Produkt Konfigurator
 * Version: 0.0.1
 * Author: Florian Meyer
 * Author URI: https://github.com/florianfelix
 * Licence: MIT
 * Text Domain: hansefair-plugin
 *
 * @category Woocommerce_Plugin
 * @package  Hansefair
 * @author   Florian Meyer <florianfelixmeyer@gmail.com>
 * @license  MIT https://github.com/florianfelix
 * @link     https://github.com/florianfelix
 */

defined('ABSPATH') || die('funny');

if (file_exists(dirname(__FILE__) . '/vendor/autoload.php')) {
    require_once dirname(__FILE__) . '/vendor/autoload.php';
}


function activate_hanseconf() {
    Inc\Base\Activate::activate();
}
register_activation_hook( __FILE__, 'activate_hanseconf' );


function deactivate_hanseconf() {
    Inc\Base\Deactivate::deactivate();
}
register_deactivation_hook( __FILE__, 'deactivate_hanseconf' );



if (class_exists('Inc\\Init')) {
    Inc\Init::register_services();
}
