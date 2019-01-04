<?php
/**
 * Feature Name:    Widget Areas
 * Version:         0.1
 * Author:         Inpsyde GmbH, cb for Smashing Magazine
 * Author URI:      http://inpsyde.com/
 */

/**
 * Registers some widget areas
 *
 * @return    void
 */
function smash_register_widget_areas() {

	// Define widget areas
	$sidebars = array(
		/*
			Outcommented the custom-loop because it kept showing up even though
			it was deactivated (s. Github-Issue #351).
			###################################################################

		'under-archive-loop' => array(
			'class' => 'under-loop-widget-area',
			'name'  => _x( 'Under Loop Widget', 'Widget area name in wp-admin/widgets.php', 'smash' ),
			'desc'  => _x( 'Widget area under the loop on archive pages',
			               'Widget area description in wp-admin/widgets.php', 'smash' )
		),*/
	);

	// Create widget areas
	foreach ( $sidebars as $id => $args ) {
		$sidebar_args = array(
			'name'          => $args[ 'name' ],
			'id'            => $id,
			'description'   => $args[ 'desc' ],
			'class'         => $args[ 'class' ],
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		);
		register_sidebar( $sidebar_args );
	}
}
