<?php
/**
 * Feature Name:    Post Functions
 * Version:         0.1
 * Author:         Inpsyde GmbH, cb for Smashing Magazine
 * Author URI:      http://inpsyde.com/
 */

/**
 * Filtering the content and adding an ordered list of footnotes at the end of post_content.
 *
 * @wp-hook the_content
 *
 * @param string $content
 *
 * @return string $content
 */
function smash_filter_the_content_add_footnotes( $content ) {

	// first of all, get all the links in the
	// text to put them on the footer list
	$regexp = "<a\s[^>]*href=(\"??)([^\" >]*?)\\1[^>]*>(.*)<\/a>";
	if ( preg_match_all( "/$regexp/siU", $content, $matches ) ) {

		// it seems, that we have links, so we walk them to add the
		// sup stuff: <sup class="print_only" id="note-nummer"><a href="#nummer">nummer</a>
		$footnotes = '<h4 class="po">' . __( 'Footnotes', 'smashing' ) . '</h4>';
		$footnotes .= '<ol class="po">';
		foreach ( $matches[ 0 ] as $link ) {

			// set counter
			! isset( $i ) ? $i = 1 : $i ++;

			// pattern
			$pattern = '<sup class="po" id="note-' . esc_attr( $i ) . '"><a href="#' . esc_attr(
					$i
				) . '">' . $i . '</a></sup>';

			// replace the content with the link
			$content = str_replace( $link, $link . $pattern, $content );

			// create the list
			$lpos = $i - 1;
			$footnotes .= '<li id="#' . esc_attr( $i ) . '"><a href="#note-' . esc_attr(
					$i
				) . '">' . $i . ' ' . $matches[ 2 ][ $lpos ] . '</a></li>';
		}
		$footnotes .= '</ol>';

		// Add the footnotes to the content
		$content .= $footnotes;
	}

	return $content;
}

/**
 * Returns the Twitter and Facebook share links
 *
 * @return string $html
 */
function smash_get_share_links() {

	$html = '';
	$permalink = get_permalink();
	$args      = array(
		'original_referer' => $permalink,
		'source'           => 'tweetbutton',
		'text'             => rawurlencode( get_the_title() ),
		'url'              => $permalink,
		'via'              => 'smashingmag'
	);
	$share_url = add_query_arg( $args, 'https://twitter.com/intent/tweet' );
	$html .= '<a onclick="clicky.log(\'#sharelink-clicked\');" class="sot single" href="' . esc_url( $share_url ) . '">Tweet it</a>';

	$share_url = add_query_arg( 'u', $permalink, 'http://www.facebook.com/sharer/sharer.php' );
	$html .= '<a onclick="clicky.log(\'#sharelink-clicked\');" class="sot single" href="' . $share_url . '">Share on Facebook</a></p>';

	return apply_filters( 'smash_get_share_links', $html );
}

/**
 * Adding our custom post_class 'post'.
 *
 * @wp-hook post_class
 *
 * @param   array $classes
 *
 * @return  array $classes
 */
function smash_filter_post_class( $classes ) {

	global $count;

	$classes[] = 'post';

	if ( is_author() ) {
		$classes[] = 'category-archive';

		if ( $count === 0 ) {
			$classes [] = 'blank';
		}
	}

	if ( is_page() ) {
		$classes[] = 'page';
	}

	if ( is_page( 'search-results' ) ) {
		$classes[] = 'no-meta';
		$classes[] = 'search-results';
	}

	if ( is_page_template( 'templates/network.php' ) ) {
		$classes[] = 'category-archive';
		$classes[] = 'network-post-space';
	}

	return $classes;
}

/**
 * custom helper-function to limit the custom post_meta-fields
 *
 * @wp-hook postmeta_form_limit
 *
 * @param   Integer $limit
 *
 * @return  Integer
 */
function smash_filter_postmeta_form_limit( $limit ) {

	$limit = 100;

	return $limit;
}

/**
 * custom helper-function to get the absolute path of the url
 *
 * @wp-hook the_permalink
 *
 * @param   String $permalink
 *
 * @return  String
 */
function smash_filter_the_permalink( $permalink ) {

	return preg_replace( '!http(s)?://' . $_SERVER[ 'SERVER_NAME' ] . '/!', '/', $permalink );
}

/**
 * custom helper-function shortend the excerpt_length
 *
 * @wp-hook  excerpt_length
 * @return  Integer
 */
function smash_filter_excerpt_length() {

	return 100;
}

/**
 * helper-function to add a "more" to the excerpt
 *
 * @hook  excerpt_more
 * @return  String
 */
function smash_filter_excerpt_more() {

	return '...';
}

/**
 * helper-function to extract some stuff from content..
 * Strip the first line break from the <pre><code> tags ��� That's purely cosmetic,
 * as it avoids displaying an empty line in the code area.
 *
 * @wp-hook  the_content
 *
 * @param   String $content
 *
 * @return  String $content
 */
function smash_filter_the_content_extract_code_tags( $content ) {

	return @preg_replace( '/(<pre><code class=" *language-[a-zA-Z]+ *">)(\r\n?|\n)/u', '$1', $content );
}

/**
 * helper-function to get the smashing post_link from an post_meta
 *
 * @return  String $link
 */
function smash_get_network_post_link() {

	$link = get_post_meta( get_the_ID(), 'wpo_sourcepermalink', TRUE );
	if ( ! $link ) {
		return '/';
	} else {
		return $link;
	}
}

/**
 * Function to add in "is_singular" the id-Attribute to headlines for better anchor usage.
 *
 * @issue https://github.com/inpsyde/smashing-magazin/issues/364
 *
 * @wp-hook the_content
 *
 * @param string $content
 *
 * @return  string $content
 */
function smash_filter_the_content_add_ids_to_headlines( $content ) {

	if ( ! is_single() ) {
		return $content;
	}

	$pattern     = '#(?P<full_tag><(?P<tag_name>h\d)(?P<tag_extra>[^>]*)>(?P<tag_contents>.*)<\/h\d>)#i';
	$has_matched = preg_match_all( $pattern, $content, $matches, PREG_SET_ORDER );

	if ( $has_matched ) {

		/**
		 * %1$s = TAG
		 * %2$s = additional classes/ids
		 * %3$s = custom ID
		 * %4$s = innerHTML
		 * %5$s = escaped and sanitized innerHTML for aria-label=""
		 */
		$template = '<%1$s %2$s id="%3$s">';
		$template .= '%4$s';
		$template .= ' <a href="#%3$s" aria-label="' . __(
				'Link to section', 'smashing'
			) . ' \'%5$s\'" class="sr hsl">';
		$template .= __( 'Link', 'smashing' );
		$template .= '</a>';
		$template .= '</%1$s>';

		$search  = array();
		$replace = array();
		foreach ( $matches as $match ) {
			if ( strlen( $match[ 'tag_extra' ] ) && stripos( $match[ 'tag_extra' ], 'id=' ) !== FALSE ) {
				continue;
			}

			$search[]  = $match[ 'full_tag' ];
			$id        = wp_strip_all_tags( $match[ 'tag_contents' ] );
			$id        = sanitize_title( $id );
			$replace[] = sprintf(
				$template,
				$match[ 'tag_name' ],
				$match[ 'tag_extra' ],
				$id,
				$match[ 'tag_contents' ],
				esc_attr( wp_strip_all_tags( $match[ 'tag_contents' ] ) )
			);
		}
		$content = str_replace( $search, $replace, $content );
	}

	return $content;
}
