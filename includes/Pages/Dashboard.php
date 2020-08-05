<?php
/**
 * @package Hansefair
 */

namespace Inc\Pages;

use \Inc\Api\Callbacks\AdminCallbacks;
use \Inc\Api\Callbacks\ManagerCallbacks;
use \Inc\Api\SettingsApi;
use \Inc\Base\BaseController;

class Dashboard extends BaseController
{
    public $settings;
    public $callbacks;
    public $callbacks_mngr;
    public $pages = array();
    public $subpages = array();

    public function register()
    {
        $this->settings = new SettingsApi();
        $this->callbacks = new AdminCallbacks();
        $this->callbacks_mngr = new ManagerCallbacks();
        $this->set_pages();
        $this->set_sub_pages();
        $this->set_settings();
        $this->set_sections();
        $this->set_fields();

        $this->settings->add_pages($this->pages)->with_sub_page('Dashboard')->add_sub_pages($this->subpages)->register();
    }

    public function set_pages()
    {
        $this->pages = array(
            [
                'page_title' => 'Hansefair Settings',
                'menu_title' => 'Hansefair',
                'capability' => 'manage_options',
                'menu_slug' => 'hanse_conf',
                'callback' => array($this->callbacks, 'admin_dashboard'),
                'icon_url' => 'dashicons-store',
                'position' => '50',
            ],
        );
    }

    public function set_sub_pages()
    {
        $this->subpages = array(
            [
                'parent_slug' => 'hanse_conf',
                'page_title' => 'Custom Post Types',
                'menu_title' => 'CPT',
                'capability' => 'manage_options',
                'menu_slug' => 'hanseconf_cpt',
                'callback' => array($this->callbacks, 'admin_cpt'),
            ],
            [
                'parent_slug' => 'hanse_conf',
                'page_title' => 'Preislisten',
                'menu_title' => 'Preislisten',
                'capability' => 'manage_options',
                'menu_slug' => 'hanseconf_preislisten',
                'callback' => array($this->callbacks, 'admin_preislisten'),
            ],
        );
    }

    public function set_settings()
    {
        $args = array(
            array(
                'option_group' => 'hanseconf_plugin_settings',
                'option_name' => 'hanse_conf',
                'callback' => array($this->callbacks_mngr, 'checkboxSanitize'),
            )
        );
        // foreach ($this->managers as $key => $value) {
        //     $args[] = array(
        //         'option_group' => 'hanseconf_plugin_settings',
        //         'option_name' => $key,
        //         'callback' => array($this->callbacks, 'checkboxSanitize'),
        //     );
        // }
        $this->settings->set_settings($args);
    }

    public function set_sections()
    {
        $args = array(
            array(
                'id' => 'hanseconf_admin_index',
                'title' => 'Settings Manager',
                'callback' => array($this->callbacks_mngr, 'adminSectionManagaer'),
                'page' => 'hanse_conf',
            ),
        );

        $this->settings->set_sections($args);
    }

    public function set_fields()
    {
        $args = array();
        foreach ($this->managers as $key => $value) {
            $args[] = array(
                'id' => $key,
                'title' => $value,
                'callback' => array($this->callbacks_mngr, 'checkboxField'),
                'page' => 'hanse_conf',
                'section' => 'hanseconf_admin_index',
                'args' => array(
                    'option_name' => 'hanse_conf',
                    'label_for' => $key,
                    'class' => 'ui-toggle',
                ),
            );
        }

        $this->settings->set_fields($args);
    }
}
