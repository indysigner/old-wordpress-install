<?php
/**
 * Feature Name:    Pagination Functions
 * Version:         0.1
 * Author:         Inpsyde GmbH, cb for Smashing Magazine
 * Author URI:      http://inpsyde.com/
 */

/**
 * helper-function to get the pagination on your site
 *
 * @param   Array $args
 *
 * @return  String $output
 */
function smash_get_pagination( Array $args = array() ) {
	global $wp_query;

	$default_args = array(
		'previous'     => '<span class="prv">%s</span>',
		'next'         => '<span class="nxt">%s</span>',
		'current'      => '<span class="current">%d</span>',
		'before_pages' => '<div class="pgs clearfix">',
		'after_pages'  => '</div>',
		'link'         => '<a href="%1$s" class="page">%2$s</a>',
		'before'       => '<div class="pgn clearfix">',
		'after'        => '</div>'
	);
	$args         = wp_parse_args( $args, $default_args );

	if ( is_single() ) {
		return;
	}

	$paged    = intval( get_query_var( 'paged' ) );
	$max_page = $wp_query->max_num_pages;

	if ( empty( $paged ) || $paged == 0 ) {
		$paged = 1;
	}

	$pages_to_show         = 6;
	$larger_page_to_show   = 0;
	$larger_page_multiple  = 0;
	$pages_to_show_minus_1 = $pages_to_show - 1;
	$half_page_start       = floor( $pages_to_show_minus_1 / 2 );
	$half_page_end         = ceil( $pages_to_show_minus_1 / 2 );
	$start_page            = $paged - $half_page_start;

	if ( $start_page <= 0 ) {
		$start_page = 1;
	}

	$end_page = $paged + $half_page_end;
	if ( ( $end_page - $start_page ) != $pages_to_show_minus_1 ) {
		$end_page = $start_page + $pages_to_show_minus_1;
	}

	if ( $end_page > $max_page ) {
		$start_page = $max_page - $pages_to_show_minus_1;
		$end_page   = $max_page;
	}

	if ( $start_page <= 0 ) {
		$start_page = 1;
	}

	$larger_per_page         = $larger_page_to_show * $larger_page_multiple;
	$larger_start_page_start = floor( $start_page ) + $larger_page_multiple - $larger_per_page;
	$larger_start_page_end   = floor( $start_page ) + $larger_page_multiple;

	if ( $larger_start_page_end - $larger_page_multiple == $start_page ) {
		$larger_start_page_start = $larger_start_page_start - $larger_page_multiple;
		$larger_start_page_end   = $larger_start_page_end - $larger_page_multiple;
	}

	if ( $larger_start_page_start <= 0 ) {
		$larger_start_page_start = $larger_page_multiple;
	}

	if ( $larger_start_page_end > $max_page ) {
		$larger_start_page_end = $max_page;
	}

	$output = '';

	if ( $paged > 1 ) {
		$output .= sprintf( $args[ 'previous' ], get_previous_posts_link( '&laquo; previous' ) );
	} else {
		$output .= sprintf( $args[ 'previous' ], '' );
	}

	$output .= $args[ 'before_pages' ];
	for ( $i = $start_page; $i <= $end_page; $i ++ ) {

		if ( $i < 5 ) {
			$i = "0" . $i;
		}

		if ( $i == $paged ) {
			$output .= sprintf( $args[ 'current' ], number_format_i18n( $i ) );
		} else {
			$output .= sprintf( $args[ 'link' ], get_pagenum_link( $i ), number_format_i18n( $i ) );
		}
	}
	$output .= $args[ 'after_pages' ];
	$output .= sprintf( $args[ 'next' ], get_next_posts_link( 'next &raquo;' ) );

	return $args[ 'before' ] . $output . $args[ 'after' ];

}

/**
 * helper-function to echo a pagination on your site
 *
 * @param   Array $args
 *
 * @return  String $output
 */
function smash_the_pagination( Array $args = array() ) {
	echo smash_get_pagination( $args );
}
