<?php
/**
 * Feature Name:    Author Functions
 * Version:         0.1
 * Author:         Inpsyde GmbH, cb for Smashing Magazine
 * Author URI:      http://inpsyde.com/
 */


/**
 * helper-function to get the formatted author post_link
 *
 * @uses    smash_get_user_name
 *
 * @param   Array $args
 *
 * @return  String
 */
function smash_get_author_post_link( Array $args = array() ) {

	$author_id = get_the_author_meta( 'ID' );

	// if the Author has 0 Posts, the $authordata is NULL, so we have to use the queried_object_id() to get the author_id.
	if ( $author_id === '' ) {
		$author_id = get_queried_object_id();
	}

	$author = get_userdata( $author_id );

	if ( ! $author ) {
		return '';
	}
	$default_args = array(
		'link'      => '<a rel="author" class="poa" href="%1$s" title="%2$s">%3$s</a>',
		'title'     => __( 'Posts by %s', 'smashing' ),
		'link_text' => smash_get_user_name( $author )
	);
	$args         = wp_parse_args( $args, $default_args );

	$post_author_url = get_author_posts_url( $author->ID, $author->user_nicename ) . '?rel=author';
	$title           = sprintf( $args[ 'title' ], $author->display_name );

	return sprintf( $args[ 'link' ], $post_author_url, esc_attr( $title ), $args[ 'link_text' ] );

}

/**
 * helper function to display the full name or display_name
 *
 * @param   WP_User $current_user
 *
 * @return  String $user_name
 */
function smash_get_user_name( WP_User $current_user ) {
	if ( ! empty( $current_user->first_name ) && ! empty( $current_user->last_name ) ) {
		return $current_user->first_name . ' ' . $current_user->last_name;
	}

	return $current_user->display_name;
}

/**
 * getting all users of the blog by the given args
 *
 * @param   Array $args
 *
 * @return  Mixed
 */
function smash_get_authors( Array $args = array() ) {
	global $wpdb;

	$default_args = array(
		"exclude"      => array(
			"Gastautor",
			"Team",
			"Sergej Mueller"
		),
		"capabilities" => "contributor",
		"interval"     => "-12 MONTHS",
		"min_posts"    => 5
	);

	$args = wp_parse_args( $default_args, $args );

	$post_date_query_args = array(
		'after'     => $args[ 'interval' ],
		'inclusive' => TRUE,
	);
	$post_date_query      = new WP_Date_Query( $post_date_query_args, 'post_date' );

	$sql = "
		SELECT
			*
		FROM(
			SELECT
				COUNT( " . $wpdb->posts . ".ID ) AS post_count,
				" . $wpdb->users . ".*
			FROM
				" . $wpdb->posts . "
			INNER JOIN
				" . $wpdb->usermeta . "
			ON
				" . $wpdb->usermeta . ".user_id = " . $wpdb->posts . ".post_author
			INNER JOIN
					" . $wpdb->users . "
			ON
				" . $wpdb->users . ".ID = " . $wpdb->posts . ".post_author
			WHERE
				1 = 1
			AND
				" . $wpdb->posts . ".post_type = 'post'
			AND
			(
				" . $wpdb->usermeta . ".meta_key = '" . $wpdb->prefix . "capabilities'
				AND
				" . $wpdb->usermeta . ".meta_value LIKE '%" . $args[ "capabilities" ] . "%'
			)
				" . $post_date_query->get_sql() . "
			AND
				" . $wpdb->users . ".user_login NOT IN ( '" . implode( '\', \'', $args[ 'exclude' ] ) . "' )
			GROUP BY
				" . $wpdb->posts . ".post_author
		) AS sub_table
		WHERE
			sub_table.post_count > " . $args[ 'min_posts' ];

	return $wpdb->get_results( $sql );

}
