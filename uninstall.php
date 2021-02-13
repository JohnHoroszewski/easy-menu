<?php

/*
* Trigger this file on Plugin Uninstal
*
*  @package EasyMenuItemsPlugin
*/

if ( ! deined( 'WP_UNINSTALL_PLUGIN' ) ) {
    die;
}

// Clear Database stored data
// $menus = get_posts( array( 'post_type' => 'menu_items', 'numberposts' => -1  ) );

// foreach  ( $menus as $menu ) {
//     wp_delete_posts( $menu->ID, true );
// }


// Access the database via the SQL
global $wpdb;

// Remove all posts associated with Custon Post Type
$wpdb->query( "DELETE from wp_posts WHRE post_type = 'menu_item" );
// Delete all post meta data from posts id's that no longer exists(Must come after 1st statement)
$wpdb->query( "DELETE from wp_postmeta WHERE post_id NOT IN ( SELECT id FROM wp_posts )" );
// Delete all post categories and taxonoimies from posts id's that no longer exists(Must come after 1st statement)
$wpdb->query( "DELETE from wp_term_relationships WHERE object_id NOT IN ( SELECT id FROM wp_posts )" );