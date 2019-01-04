<?php
/**
 * Feature Name:    Ad Functions
 * Version:         0.1
 * Author:         Inpsyde GmbH, cb for Smashing Magazine
 * Author URI:      http://inpsyde.com/
 */

/**
 * Helper function to check, if the ads are disabled.
 *
 * @return bool
 */
function smash_is_ads_disabled() {

	return is_singular() && \Smashing\PostMeta\is_ads_disabled();
}

/**
 * Filtering the RSS-Excerpt and adding a ad-template.
 *
 * @wp-hook the_excerpt_rss
 *
 * @param string $content
 */
function smash_filter_the_excerpt_rss( $content ) {

	if ( is_feed() ) {
		get_template_part( 'parts/ad/rss' );
	}

	echo $content;
}

/**
 * Callback to insert Ads into single-Posts content.
 *
 * @wp-hook the_content
 *
 * @param   string $content
 *
 * @return string
 */
function smash_filter_the_content_add_ad_before_first_h3( $content ) {

	if ( ! is_single() || smash_is_ads_disabled() ) {
		return $content;
	}

	$post = get_post();
	if ( ! is_a( $post, 'WP_Post' ) ) {
		return $content;
	}

	$post_date  = new DateTime( $post->post_date );
	$limit_date = new DateTime();
	$limit_date->modify( '-15 days' );
	if ( $post_date->getTimestamp() > $limit_date->getTimestamp() ) {
		return $content;
	}

	$splitted_content = explode( '<h3', $content );
	// found at least 3 headlines (index starts at 0).
	if ( count( $splitted_content ) > 2 ) {

		// load the ad from template parts.
		ob_start();
		get_template_part( 'parts/ad/cad', 'middle' );
		$ad = ob_get_clean();

		// add before 3. headline (index 2) the ad.
		$splitted_content[ 2 ] .= $ad;
		$content = implode( '<h3', $splitted_content );
	}

	return $content;
}