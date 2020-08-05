<?php
/**
 * @package Hansefair
 */

namespace Inc\Base;

class BaseController
{
    public $plugin_path;
    public $plugin_url;
    public $plugin_id;
    public $managers = array();

    public function __construct()
    {
        $this->plugin_path = plugin_dir_path(dirname(__FILE__, 2));
        $this->plugin_url = plugin_dir_url(dirname(__FILE__, 2));
        $this->plugin_id = plugin_basename(dirname(__FILE__, 3)) . '/hansefair-plugin.php';
    
        $this->managers = array(
            'cpt_manager' => 'Custom Post Type Manager',
            'price_manager' => 'Price Manager',
            'block_manager' => 'Block Manager',
            'taxonomy_manager' => 'Taxonomy Manager',
            'widget_manager' => 'Widget Manager'
        );
    }
}
