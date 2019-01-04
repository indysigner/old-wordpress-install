<?php
/**
 * Feature Name:    oEmbed Functions
 * Version:         0.1
 * Author:          Inpsyde GmbH, cb for Smashing Magazine
 * Author URI:      http://inpsyde.com/
 */

/**
 * Callback to add the "width"- and "height"-args to Vimeo oEmbed-URL to load the correct video size.
 *
 * width=500 -> 295x166.webp
 * width=720 -> 640.webp
 * width=1280 -> 960.webp
 *
 * @link    https://developer.vimeo.com/apis/oembed#arguments
 *
 * @wp-hook oembed_fetch_url
 *
 * @param   string $provider URL of the oEmbed provider.
 * @param   string $url      URL of the content to be embedded.
 * @param   array $args      Optional arguments, usually passed from a shortcode.
 *
 * @return string $provider
 */
function smash_filter_oembed_fetch_url_vimeo( $provider, $url, $args ) {

	if ( ! ! stristr( $url, 'vimeo' ) ) {
		$provider = add_query_arg( 'width', (int) $args[ 'width' ], $provider );
		$provider = add_query_arg( 'height', (int) $args[ 'height' ], $provider );
	}

	return $provider;
}
