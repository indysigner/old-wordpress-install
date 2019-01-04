<?php
/**
 * Feature Name:    General Template Functions
 * Version:         0.1
 * Author:         Inpsyde GmbH, cb for Smashing Magazine
 * Author URI:      http://inpsyde.com/
 */

/**
 * Callback for setting our own custom title
 *
 * @wp-hook wp_title
 *
 * @param   String $title
 *
 * @return  String $title
 */
function smash_filter_wp_title( $title ) {

	// Front page, no catch headline
	if ( is_front_page() || is_author() || is_tag() || is_feed() ) {
		return $title;
	}

	// Get the catch headline to include it
	$catch_headline_meta = get_post_meta( get_the_ID(), 'catch_headline', TRUE );

	// We remove extra spaces (in case)
	$catch_headline_meta = trim( $catch_headline_meta );

	// If the catch headline is not empty, we then we add a colon.
	if ( $catch_headline_meta != '' ) {
		return $catch_headline_meta . ' &mdash; ' . $title;
	}

	return $title;
}

;


/**
 * Callback for adding a new body-class
 *
 * @wp-hook body_class
 *
 * @param   Array $classes
 *
 * @return  Array
 */
function smash_filter_body_class( Array $classes ) {
	$classes[ ] = smash_get_current_blog_slug() . '-section';

	if ( is_page( 'search-results' ) ) {
		$classes[ ] = 'search-results-page';
	}

	return $classes;
}