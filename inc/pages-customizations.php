<?php
/**
 * Feature Name: Homepage pages
 * Version:      0.1
 * Author:       Inpsyde GmbH, cb for Smashing Magazine
 * Author URI:   http://inpsyde.com/
 */

/**
 * @wp-hook pre_get_posts
 *
 * @param WP_Query $query
 */
function smash_homepage_pages_filter_query( \WP_Query $query ) {

	if ( ! is_admin() && $query->is_front_page() ) {
		add_filter( 'posts_clauses_request', 'smash_add_homepage_pages' );
	}
}

/**
 * Adds homepage pages to the homepage loop.
 *
 * @wp-hook posts_clauses_request
 *
 * @param array $clauses
 *
 * @return array
 */
function smash_add_homepage_pages( array $clauses ) {

	remove_filter( current_filter(), __FUNCTION__ );

	$cached = get_transient( 'smash_homepage_pages_ids' );
	$where  = empty( $clauses[ 'where' ] ) ? '' : $clauses[ 'where' ] . ' OR ';
	global $wpdb;

	if ( $cached ) {
		$clauses[ 'where' ] = $where . $wpdb->posts . '.ID IN(' . implode( ',', wp_parse_id_list( $cached ) ) . ')';

		return $clauses;
	}

	$page_ids = get_posts(
		array(
			'post_type'      => 'page',
			'meta_key'       => '_wp_page_template',
			'meta_value'     => 'templates/home-excerpt.php',
			'posts_per_page' => get_option( 'posts_per_page', 10 ),
			'fields'         => 'ids'
		)
	);

	if ( $page_ids ) {
		set_transient( 'smash_homepage_pages_ids', $page_ids, DAY_IN_SECONDS );
		$clauses[ 'where' ] = $where . $wpdb->posts . '.ID IN(' . implode( ',', wp_parse_id_list( $page_ids ) ) . ')';
	}

	return $clauses;
}

/**
 * @wp-hook wp_insert_post
 *
 * @param int      $post_id
 * @param \WP_Post $post
 */
function smash_clean_homepage_pages_cache( $post_id, \WP_Post $post ) {

	if ( $post->post_type === 'page' ) {
		delete_transient( 'smash_homepage_pages_ids' );
	}
}

/**
 * Adds tag support for pages. We need to filter query because by default WordPress queries only
 * standard post for tag terms.
 *
 * We need to use "wp_loaded" because we have to wait WordPress registers default post types and taxonomies for 2nd time
 * on "init" hook.
 *
 * @wp-hook wp_loaded
 */
function smash_tag_support_for_pages() {

	register_taxonomy_for_object_type( 'post_tag', 'page' );

	add_filter(
		'pre_get_posts',
		function ( \WP_Query $query ) {

			if ( $query->is_main_query() && $query->is_tag() && ! $query->get( 'post_type' ) ) {
				$query->set( 'post_type', array( 'post', 'page' ) );
			}
		}
	);
}