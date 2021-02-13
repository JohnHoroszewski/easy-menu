<?php
/**
 *  @package EasyMenuItemsPlugin
 */

 /*
    Plugin Name: Easy Menu Items Plugin
    Plugin URI: https://johnswork.com/easy-menu
    Description: This is a plugin to create a custom post type needed to implement menu items with associated fields such as item name, description, price, calories, ingredients and various other options...(This is my first plugin, so......)
    Version: 1.0.0
    Author: John Horoszewski
    Author URI: https:johnswork.com
    License: GPLv2 or later
    Text Domain: easy-menu
 */

 /*
 This program is free software; you can redistribute it and/or modify it under the terms of the GNU General Public License as published by the Free Software Foundation; either version 2 of the License, or (at your option) any later version.

This program is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU General Public License for more details.

You should have received a copy of the GNU General Public License along with this program; if not, write to the Free Software Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA 02111-1307 USA
 */

 defined( 'ABSPATH' ) or die( 'Tsk, Tsk, Tsk, You are not supposed to be here!' );

 class JHMIPlugin 
 {

   function __construct() {
      add_action( 'init', array( $this, 'menu_items_post_type' ), 0 );
   }

   function activate() {

      // register custom post type
      $this->menu_items_post_type();

      // flush the wp rewrite rules
      flush_rewrite_rules();
   }

   function deactivate() {

   }

   // Register Menu Items Custom Post Type
   function menu_items_post_type() {

      $labels = array(
         'name'                  => _x( 'Menu Items', 'Post Type General Name', 'text_domain' ),
         'singular_name'         => _x( 'Menu Item', 'Post Type Singular Name', 'text_domain' ),
         'menu_name'             => __( 'Menu Items', 'text_domain' ),
         'name_admin_bar'        => __( 'Menu Item', 'text_domain' ),
         'archives'              => __( 'Menu Items Archives', 'text_domain' ),
         'attributes'            => __( 'Menu Items Attributes', 'text_domain' ),
         'parent_item_colon'     => __( 'Parent Menu Item:', 'text_domain' ),
         'all_items'             => __( 'All Menu Items', 'text_domain' ),
         'add_new_item'          => __( 'Add New Menu Item', 'text_domain' ),
         'add_new'               => __( 'Add New', 'text_domain' ),
         'new_item'              => __( 'New Menu Item', 'text_domain' ),
         'edit_item'             => __( 'Edit Menu Item', 'text_domain' ),
         'update_item'           => __( 'Update Menu Item', 'text_domain' ),
         'view_item'             => __( 'View Menu Item', 'text_domain' ),
         'view_items'            => __( 'View Menu Items', 'text_domain' ),
         'search_items'          => __( 'Search Menu Item', 'text_domain' ),
         'not_found'             => __( 'Not found', 'text_domain' ),
         'not_found_in_trash'    => __( 'Not found in Trash', 'text_domain' ),
         'featured_image'        => __( 'Featured Image', 'text_domain' ),
         'set_featured_image'    => __( 'Set featured image', 'text_domain' ),
         'remove_featured_image' => __( 'Remove featured image', 'text_domain' ),
         'use_featured_image'    => __( 'Use as featured image', 'text_domain' ),
         'insert_into_item'      => __( 'Insert into menu item', 'text_domain' ),
         'uploaded_to_this_item' => __( 'Uploaded to this menu item', 'text_domain' ),
         'items_list'            => __( 'Menu Items list', 'text_domain' ),
         'items_list_navigation' => __( 'Menu Items list navigation', 'text_domain' ),
         'filter_items_list'     => __( 'Filter Menu Items list', 'text_domain' ),
      );
      $args = array(
         'label'                 => __( 'Menu Item', 'text_domain' ),
         'description'           => __( 'Custom Menu Items Post Type', 'text_domain' ),
         'labels'                => $labels,
         'supports'              => array( 'title', 'editor', 'thumbnail' ),
         'taxonomies'            => array( 'category', 'post_tag' ),
         'hierarchical'          => false,
         'public'                => true,
         'show_ui'               => true,
         'show_in_menu'          => true,
         'menu_position'         => 20,
         'menu_icon'             => 'dashicons-carrot',
         'show_in_admin_bar'     => true,
         'show_in_nav_menus'     => true,
         'can_export'            => true,
         'has_archive'           => true,
         'exclude_from_search'   => false,
         'publicly_queryable'    => true,
         'capability_type'       => 'page',
      );
      register_post_type( 'menu_items', $args );
   }
   
 }


if ( class_exists( 'JHMIPlugin' ) ) {
   $jhmiPlugin = new JHMIPlugin();
}

// Activation
register_activation_hook( '__FILE__', array( $jhmiPlugin, 'activate' ) );

// Deactivation
register_deactivation_hook( '__FILE__', array( $jhmiPlugin, 'deactivate' ) );

// Uninstall
// register_uninstall_hook( '__FILE__', array( $jhmiPlugin, 'uninstall' ) );