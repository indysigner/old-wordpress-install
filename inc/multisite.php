<?php
/**
 * Feature Name:    Helper-Functions for Smashing-MultiSite
 * Version:         0.1
 * Author:         Inpsyde GmbH, cb for Smashing Magazine
 * Author URI:      http://inpsyde.com/
 */

/**
 * Gets the Slug of the current Subdomain-Name
 *
 * We can't use get_current_site() and get_bloginfo( 'url' ),
 * we have to use domain-mapping and mu-folder-install,
 * because the provider doesn't support wildcards for subdomains.. :|
 *
 * @return  String
 */
function smash_get_current_blog_slug() {

	if ( empty( $_SERVER[ 'HTTP_HOST' ] ) ) {
		return 'www';
	}
	$host = explode( '.', $_SERVER[ 'HTTP_HOST' ] );

	return ( ! is_array( $host ) ) ? $host : $host[ 0 ];
}

/**
 * Checks if the given blog_slug is equal to the current_blog_slug
 *
 * @example smash_is_current_blog_slug( 'coding' );
 * @uses    smash_get_current_blog_slug
 *
 * @param   String $blog_name
 *
 * @return  Boolean
 */
function smash_is_current_blog_slug( $blog_name = '' ) {

	$current_blog_name = smash_get_current_blog_slug();

	return ( $current_blog_name === $blog_name );

}