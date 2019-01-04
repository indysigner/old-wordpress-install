<?php
/**
 * Feature Name:    Navigation Functions
 * Version:         0.1
 * Author:         Inpsyde GmbH, cb for Smashing Magazine
 * Author URI:      http://inpsyde.com/
 */


function smash_filter_walker_nav_menu_start_el( $item_output, $item, $depth, $args ) {

	if ( $item->title === 'WordPress' ) {

		$search_text  = $item->title;
		$replace_text = '<span class="long"><span>Word</span><span>Press</span></span><span class="short">WP</span>';
		$search       = '>' . $args->link_before . '%s' . $args->link_after . '</a>';

		$item_output = str_replace( sprintf( $search, $search_text ), sprintf( $search, $replace_text ), $item_output );

	}

	return $item_output;

}


/**
 * adding a new css class to a <li>-Nav-Item
 *
 * @since   0.1
 * @created 10.01.2014, cb
 * @updated 10.01.2014, cb
 *
 * @wp-hook nav_menu_css_class
 *
 * @param   Array $classes
 * @param   WP_Post $item
 *
 * @return  Array $classes
 */
function smash_filter_nav_menu_css_class( $classes, $item ) {

	$classes[ ] = 'menu-item-' . sanitize_title( $item->title );

	return $classes;

}


/**
 * Registering the nav_menus to our blog
 *
 * @since    0.1
 * @created  04.12.2013, cb
 * @updated  04.12.2013, cb
 *
 * @uses     register_nav_menu
 */
function smash_register_nav_menus() {

	register_nav_menus( array(
		                    'mobile_smashing_pages'      => 'Mobile: Smashing Pages',
		                    'mobile_smashing_categories' => 'Mobile: Categories',
		                    'smashing_sections'          => 'Smashing Sections',
		                    'smashing_network'           => 'Smashing Network',
	                    ) );

}