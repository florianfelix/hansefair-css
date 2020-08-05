<?php
/**
 * @package Hansefair
 */

namespace Inc\Base;

class Activate
{
    public static function activate()
    {
        flush_rewrite_rules();

        // Default empty array in hanse_conf column
        if (get_option('hanse_conf')) {
            return;
        }

        $default = array();

        update_option('hanse_conf', $default);
    }
}
