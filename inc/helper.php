<?php
/**
 * Feature Name:   Helper
 * Version:         0.1
 * Author:         Inpsyde GmbH, cb for Smashing Magazine
 * Author URI:      http://inpsyde.com/
 */

/**
 * Simple counter for repeating elements.
 *
 * @param  string $name
 * @return int
 */
function smash_get_counter( $name ) {
	static $counters = array ();
	if ( ! isset ( $counters[ $name ] ) )
		$counters[ $name ] = 0;
	$counters[ $name ] += 1;
	return $counters[ $name ];
}


/**
 * getting the script version for debug- or live-mode
 *
 * @return  string
 */
function smash_get_script_version() {

	if ( defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ) {
		return time();
	}

	// getting the theme-data
	$theme_data = wp_get_theme();
	$version    = $theme_data->Version;

	return $version;
}

/**
 * Getting the Script Suffix .min when SCRIPT_DEBUG is true
 *
 * @return string
 */
function smash_get_script_suffix() {

	$debug = defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG;

	return ! $debug ? '.min' : '';
}