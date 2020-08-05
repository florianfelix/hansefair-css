<?php
/**
 * @package Hansefair
 */

namespace Inc\Base;

use Inc\Base\BaseController;

class CustomPostTypeController extends BaseController
{
    public function register()
    {
        add_action('init', array($this, 'activate'));
    }

    public function activate()
    {
        register_post_type( 'hanse_post', array(
            'labels' => array(
                'name' => 'Hanse Post',
                'singular_name' => 'HPost'
            ),
            'public' => true,
            'has_archive' => true
        ) );
    }
}
