<?php
/**
 * @package Hansefair
 */

namespace Inc\Api\Callbacks;

use \Inc\Base\BaseController;

class ManagerCallbacks extends BaseController
{
    public function checkboxSanitize($input)
    {
        // return filter_var($input, FILTER_SANITIZE_NUMBER_INPUT);
        // return (isset($input) ? true : false);
        $output = array();

		foreach ( $this->managers as $key => $value ) {
			$output[$key] = isset( $input[$key] ) && $input[$key] == 1 ? true : false;
		}
        var_dump($input);
        var_dump($output);
		return $output;
    }

    public function adminSectionManagaer() {
        echo 'Manage the Sections and Features of this Plugin';
    }

    public function checkboxField( $args ) {
        // var_dump($args);

        $name = $args['label_for'];
		$classes = $args['class'];
		$option_name = $args['option_name'];
		$checkbox = get_option( $option_name );
        
        $checked = isset($checkbox[$name]) ? ($checkbox[$name] ? true : false) : false;

		echo '<div class="' . $classes . '"><input type="checkbox" id="' . $name . '" name="' . $option_name . '[' . $name . ']" value="1" class="" ' . ( $checked ? 'checked' : '') . '><label for="' . $name . '"><div></div></label></div>';
    }

}
