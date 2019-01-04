<?php
/**
 * Feature Name:    Search Functions
 * Version:         0.1
 * Author:          Inpsyde GmbH, cb for Smashing Magazine
 * Author URI:      http://inpsyde.com/
 */

/**
 * Redirects if is_search is true and a search query was inserted.
 *
 * @wp-hook template_redirect
 *
 * @param   string $template
 *
 * @return  string|void
 */
function smash_filter_template_redirect_search_page( $template ) {

	if ( ! is_search() ) {
		return $template;
	}

	if ( ! isset( $_GET[ 's' ] ) ) {
		$url = home_url();
	} else {
		$url    = home_url( '/search-results/' );
		$args   = array(
			'q'     => $_GET[ 's' ],
			'cx'    => SMASH_SEARCH_CX,
			'cof'   => SMASH_SEARCH_COF,
			'ie'    => get_bloginfo( 'charset' )
		);
		$url = add_query_arg( $args, $url );
	}

	wp_safe_redirect( $url );
	exit;
}