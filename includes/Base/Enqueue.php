<?php
/**
 * @package Hansefair
 */

namespace Inc\Base;

use \Inc\Base\BaseController;

class Enqueue extends BaseController
{
    public function register()
    {
        add_action('wp_enqueue_scripts', array($this, 'enqueue'));
        add_action('admin_enqueue_scripts', array($this, 'enqueue_admin'));
    }


    public function enqueue()
    {
        wp_enqueue_style('hanseconf_style', $this->plugin_url . 'assets/hansefair.css', [], '0.0.1');
        wp_enqueue_script('hanseconf_script', $this->plugin_url . 'assets/hansefair.js', [], '0.0.1', true);
    }

    public function enqueue_admin()
    {
        wp_enqueue_style('hanseconf_admin_style', $this->plugin_url . '/assets/hanseconf_admin.css', [], '0.0.1');
        wp_enqueue_script('hanseconf_script', $this->plugin_url . 'assets/hanseconf_admin.js', [], '0.0.1', true);
    }
}
