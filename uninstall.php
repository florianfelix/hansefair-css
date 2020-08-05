<?php
/* *
 * @package Hansefair
 */

defined('WP_UNINSTALL_PLUGIN') || die('Not uninstalling this.');

// Use wp functions to delete custom posts
// https://www.youtube.com/watch?v=FpnHvp9x48c&list=PLriKzYyLb28kR_CPMz8uierDWC2y3znI2&index=6

$books = get_posts(array('post_type' => 'book', 'numberposts' => -1));
foreach ($books as $book) {
    wp_delete_post($book->ID, true);
}

// Access database via SQL

// global $wpdb;
// $wpdb->query("DELETE FROM wp_posts WHERE post_type = 'book'");
// $wpdb->query("DELETE FROM wp_postmeta WHERE post_id NOT IN (SELECT id FROM wp_posts)");
// $wpdb->query("DELETE FROM wp_term_relationships WHERE object_id NOT IN (SELECT id FROM wp_posts)");
