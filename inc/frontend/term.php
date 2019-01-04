<?php
/**
 * Feature Name:    Term and Taxonomy Functions
 * Version:         0.1
 * Author:         Inpsyde GmbH, cb for Smashing Magazine
 * Author URI:      http://inpsyde.com/
 */


/**
 * Fetching some popular Tags from the current category
 *
 * @since   0.1
 * @created 09.01.2014, cb
 * @updated 09.01.2014, cb
 *
 * @param   Array $args
 *
 * @return  String $output
 */
function smash_get_tags_by_category( Array $args = array() ) {

	if ( ! is_category() ) {
		return '';
	}

	$category = get_category( get_query_var( 'cat' ) );

	$default_args = array(
		'max_items'      => 5,
		'category_id'    => $category->cat_ID,
		'link'           => '<a href="%1$s">%2$s</a>',
		'link_separator' => ' ',
		'link_before'    => '',
		'link_after'     => '',
		'before'         => __( '<h3>Popular tags in this category:</h3><div class="poptag"> ' ),
		'after'          => '</div>',
	);
	$args         = wp_parse_args( $args, $default_args );

	$post_args = array(
		'category'    => $args[ 'category_id' ],
		'fields'      => 'ids',
		'numberposts' => - 1
	);
	$posts     = get_posts( $post_args );

	if ( empty( $posts ) ) {
		return '';
	}

	$tag_order     = array();
	$tags          = array();
	$post_tag_args = array(
		'orderby' => 'count',
		'order'   => 'DESC'
	);
	foreach ( $posts as $post_id ) {

		// getting all post_tags
		$post_tags = wp_get_post_tags( $post_id, $post_tag_args );

		// looping through them and adding the count
		foreach ( $post_tags as $tag ) {

			if ( ! array_key_exists( $tag->slug, $tags ) ) {
				$tag_order[ $tag->slug ] = 0;
				$tags[ $tag->slug ]      = $tag;
			}
			$tag_order[ $tag->slug ] += 1;
		}
	}

	if ( count( $tag_order ) < 1 ) {
		return '';
	}

	// sorting the tags from high to low
	arsort( $tag_order );

	// we don't need all items, do we?
	if ( $args[ 'max_items' ] !== - 1 ) {

		$tag_order = array_slice( $tag_order, 0, $args[ 'max_items' ] );

	}

	// generating the output~
	$output     = '';
	$counter    = 1;
	$count_tags = count( $tag_order );

	foreach ( $tag_order as $tag_slug => $count ) {

		$tag = $tags[ $tag_slug ];

		// building the link
		$link = sprintf( $args[ 'link' ], get_term_link( $tag->slug, 'post_tag' ), $tag->name );

		$output .= $args[ 'link_before' ];
		$output .= $link;
		if ( $counter < $count_tags ) {
			$output .= $args[ 'link_separator' ];
		}
		$output .= $args[ 'link_after' ];

		$counter ++;
	}

	return $args[ 'before' ] . $output . $args[ 'after' ];
}


/**
 * helper function to get a list of terms to a given taxonomy. use this in your loop!
 *
 * @param   Array $args
 *
 * @return  String $output|$empty_string
 */
function smash_get_term_list( Array $args = array() ) {

	$default_args = array(
		'max_items'   => 3,
		'taxonomy'    => 'post_tag',
		'link'        => '<a href="%1$s">%2$s</a>',
		'link_before' => '',
		'link_after'  => '',
		'before'      => '',
		'after'       => '',
	);
	$args         = wp_parse_args( $args, $default_args );

	$items = get_the_terms( get_the_ID(), $args[ 'taxonomy' ] );

	// fallback to categories if no tags found
	if ( empty( $items ) ) {
		return '';
	}

	$output = '';
	$count  = 0;
	// generating the output
	foreach ( $items as $term ) {

		if ( $count >= $args[ 'max_items' ] ) {
			break;
		}

		$link = get_term_link( $term->slug, $term->taxonomy );

		if ( is_wp_error( $link ) ) {
			continue;
		}

		$output .= $args[ 'link_before' ];
		$output .= sprintf( $args[ 'link' ], $link, $term->name );

		$count ++;

		if ( $count != $args[ 'max_items' ] ) {
			$output .= $args[ 'link_after' ];
		}
	}

	return $args[ 'before' ] . $output . $args[ 'after' ];

}

/**
 * old but not used...historical stuff from 1990
 *
 * @param   Array $args
 *
 * @return  String
 */
function smash_get_tag_cloud( Array $args = array() ) {
	$my_args = array_merge( $args, array( 'echo' => FALSE ) );
	$c       = preg_replace( "/(<a[^>]+>[^>]+<\/a>)/i", "<li>$1</li>", wp_tag_cloud( $my_args ) );

	return '<ul class="tags">' . $c . '</ul>';
}
