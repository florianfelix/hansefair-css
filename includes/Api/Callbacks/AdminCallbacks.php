<?php
/**
 * @package Hansefair
 */

namespace Inc\Api\Callbacks;

use \Inc\Base\BaseController;

class AdminCallbacks extends BaseController
{
    public function admin_dashboard()
    {
        return require_once "$this->plugin_path/templates/Admin_Dashboard.php";
    }

    public function admin_preislisten()
    {
        return require_once "$this->plugin_path/templates/Admin_Preislisten.php";
    }

    public function admin_cpt()
    {
        return require_once "$this->plugin_path/templates/Admin_CPT.php";
    }

    // public function hanseconf_plugin_settings($input)
    // {
    //     return $input;
    // }

    // public function hanseconf_admin_section()
    // {
    //     echo 'Check this out';
    // }

    // public function hanseconf_text_example()
    // {
    //     $value = esc_attr( get_option('text_example') );
    //     echo '<input type="text" class="regular-text" name="text_example" value="' . $value . '" placeholder="SampleText"></input>';
    // }
}
