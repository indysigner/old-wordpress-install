<?php
/**
 * Feature Name:    Feed Functions
 * Version:         0.1
 * Author:         Inpsyde GmbH, cb for Smashing Magazine
 * Author URI:      http://inpsyde.com/
 */

/**
 * helper-function to load feeds an format them
 *
 * @param   Array $args array(
 *                      'max_items'     => Integer,
 *                      'uri'           => String,
 *                      'link_callback' => String|Array,
 *                      'link'          => String,
 *                      'link_before'   => String,
 *                      'link_after'    => String,
 *                      'before'        => String,
 *                      'after'         => String
 *                      )
 *
 * @return  String $output
 */
function smash_get_formatted_feed( Array $args ) {

	$default_args = array(
		'max_items'     => 5,
		'uri'           => NULL,
		'link'          => '<a href="%1$s">%2$s</a>',
		'link_callback' => NULL,
		'link_before'   => '<li class="clearfix">',
		'link_after'    => '</li>',
		'before'        => '<ul class="tl">',
		'after'         => '</ul>',
		'show_content'  => FALSE
	);
	$args         = wp_parse_args( $args, $default_args );

	$output = '';

	if ( $args[ 'uri' ] === NULL ) {
		return $output;
	}

	$response = fetch_feed( $args[ 'uri' ] );

	if ( is_wp_error( $response ) ) {
		return $output;
	}

	$max_items = $response->get_item_quantity( $args[ 'max_items' ] );
	$messages  = $response->get_items( 0, $max_items );

	foreach ( $messages as $message ) {

		$output .= $args[ 'link_before' ];

		if ( is_callable( $args[ 'link_callback' ] ) ) {
			// do we have a callback for the link?
			$output .= call_user_func( $args[ 'link_callback' ], $message, $args );
		} else {

			// otherwise...fallback to default formatting
			$output .= sprintf( $args[ 'link' ], $message->get_permalink(), $message->get_title() );
		}

		if ( $args[ 'show_content' ] == TRUE ) {
			$output .= '<p>' . strip_tags( substr( $message->get_description(), 0, 165 ) ) . '...</p>';
		}
		$output .= $args[ 'link_after' ];

	}

	return $args[ 'before' ] . $output . $args[ 'after' ];
}

/**
 * Callback-Function for the Twitter-Feed
 *
 * @deprecated  this callback-function shouldn't be used anymore, because the twitter api requires auth to use~
 *
 * @param       SimplePie_Item $message
 * @param       Array $args
 *
 * @return      String $output
 */
function smash_feed_item_twitter_callback( SimplePie_Item $message, Array $args ) {

	// formatting the msg...took the old stuff in this function...
	$msg = $message->get_description();
	$msg = " " . substr( strstr( $msg, ': ' ), 2, strlen( $msg ) ) . " ";
	// ereg_replace is deprecated
	//$msg    = ereg_replace( "[[:alpha:]]+://[^<>[:space:]]+[[:alnum:]/]", "<a href=\"\\0\">\\0</a>", $msg );
	$msg = preg_replace( "/\b([a-zA-Z][a-zA-Z0-9\_\.\-]*[a-zA-Z]*\@[a-zA-Z][a-zA-Z0-9\_\.\-]*[a-zA-Z]{2,6})\b/i",
	                     "<a href=\"mailto://$1\" class=\"twitter-link\">$1</a>", $msg );
	$msg = preg_replace( '/([\.|\,|\:|\?|\?|\>|\{|\(]?)#{1}(\w*)([\.|\,|\:|\!|\?|\>|\}|\)]?)\s/i',
	                     "$1<a href=\"http://twitter.com/#search?q=$2\" class=\"twitter-link\">#$2</a>$3 ", $msg );
	$msg = preg_replace( '/([\.|\,|\:|\?|\?|\>|\{|\(]?)@{1}(\w*)([\.|\,|\:|\!|\?|\>|\}|\)]?)\s/i',
	                     "$1<a href=\"http://twitter.com/$2\" class=\"twitter-user\">@$2</a>$3 ", $msg );

	$output = sprintf( $args[ 'link' ], $msg, $message->get_permalink(), $message->get_date( 'c' ) );

	return $args[ 'link_before' ] . $output . $args[ 'link_after' ];
}

