<?php
/**
 * Feature Name:    Main functions file for Smashing Magazine.
 * Version:            1.0
 * Author:            Inpsyde GmbH, cb for Smashing Magazine
 * Author URI:        http://inpsyde.com/
 */

if ( ! isset( $content_width ) ) {
	$content_width = 980;
}

add_action( 'after_setup_theme', 'smash_setup' );
function smash_setup() {

	// adds theme support
	add_theme_support( 'title-tag' );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'html5' );
	add_theme_support( 'post-thumbnails' );
	add_post_type_support( 'page', 'excerpt' );
	set_post_thumbnail_size( 78, 78 );

	// add image sizes
	add_image_size( 'mobile-thumb', 300, 250, TRUE );
	add_image_size( 'related-thumb', 178, 118, TRUE );

	include_once( 'inc/config.php' );
	include_once( 'inc/helper.php' );

	// widget areas
	include_once( 'inc/widget-areas.php' );
	add_action( 'widgets_init', 'smash_register_widget_areas' );

	// navigation
	include_once( 'inc/navigation.php' );
	smash_register_nav_menus();
	add_filter( 'nav_menu_css_class', 'smash_filter_nav_menu_css_class', 10, 2 );
	add_filter( 'walker_nav_menu_start_el', 'smash_filter_walker_nav_menu_start_el', 10, 4 );

	// shortcodes
	include_once( 'inc/shortcode.php' );
	smash_add_shortcodes();

	include_once( 'inc/oembed.php' );
	add_filter( 'oembed_fetch_url', 'smash_filter_oembed_fetch_url_vimeo', 10, 3 );

	// feed
	include_once( 'inc/feed.php' );

	// multisite
	include_once( 'inc/multisite.php' );

	// Remove Emoji
	include_once( 'inc/emoji.php' );
	remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
	remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
	remove_action( 'wp_print_styles', 'print_emoji_styles' );
	remove_action( 'admin_print_styles', 'print_emoji_styles' );
	remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
	remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );
	remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
	add_filter( 'tiny_mce_plugins', 'smash_disable_emojis_tinymce' );

	// general-template
	include_once( 'inc/general-template.php' );
	add_filter( 'body_class', 'smash_filter_body_class' );
	add_filter( 'wp_title', 'smash_filter_wp_title' );

	// page customizations: homepage pages + tag support for pages
	include_once( 'inc/pages-customizations.php' );
	add_action( 'pre_get_posts', 'smash_homepage_pages_filter_query' );
	add_action( 'wp_insert_post', 'smash_clean_homepage_pages_cache', 100, 2 );
	add_action( 'wp_loaded', 'smash_tag_support_for_pages', 1 );

	// Frontend Hooks and Functions.
	if ( ! is_admin() ) {

		// search
		include_once( 'inc/frontend/search.php' );
		add_action( 'template_redirect', 'smash_filter_template_redirect_search_page' );

		// content
		include_once( 'inc/frontend/post.php' );
		add_filter( 'post_class', 'smash_filter_post_class' );
		add_filter( 'the_content', 'smash_filter_the_content_extract_code_tags' );
		add_filter( 'the_content', 'smash_filter_the_content_add_footnotes' );
		add_filter( 'the_content', 'smash_filter_the_content_add_ids_to_headlines' );
		add_filter( 'excerpt_more', 'smash_filter_excerpt_more' );
		add_filter( 'excerpt_length', 'smash_filter_excerpt_length', 999 );
		add_filter( 'the_permalink', 'smash_filter_the_permalink' );
		add_filter( 'postmeta_form_limit', 'smash_filter_postmeta_form_limit' );

		// terms
		include_once( 'inc/frontend/term.php' );

		// comment
		include_once( 'inc/frontend/comment.php' );
		add_filter( 'comment_form_default_fields', 'smash_filter_comment_form_default_fields' );

		//pagination
		include_once( 'inc/frontend/pagination.php' );

		//scripts
		include_once( 'inc/frontend/script.php' );
		add_action( 'wp_enqueue_scripts', 'smash_enqueue_scripts' );

		add_action( 'wp_footer', 'smash_wp_footer_site_analytics' );
		add_action( 'wp_footer', 'smash_wp_footer_prerender_first_post' );
		add_action( 'wp_footer', 'smash_wp_footer_add_ads',PHP_INT_MAX );
		add_filter( 'script_loader_src', 'smash_filter_script_loader_src', 10, 2 );

		// styles
		include_once( 'inc/frontend/style.php' );
		add_action( 'wp_enqueue_scripts', 'smash_enqueue_styles' );

		// ads
		include_once( 'inc/frontend/ad.php' );
		// we've to ensure, that this filter runs as very first filter on the_content, to insert the Ad correctly
		add_filter( 'the_content', 'smash_filter_the_content_add_ad_before_first_h3', -PHP_INT_MAX );
		add_filter( 'the_excerpt_rss', 'smash_filter_the_excerpt_rss' );

		// gravatar
		include_once( 'inc/frontend/gravatar.php' );
		add_filter( 'pre_get_avatar', 'smash_filter_pre_get_avatar_add_lazyload', 10, 3 );

		// author
		include_once( 'inc/frontend/author.php' );

		// term
		include_once( 'inc/frontend/term.php' );

		// pagination
		include_once( 'inc/frontend/pagination.php' );
	}

	// Removing basic WordPress-stuff.
	add_filter( 'show_admin_bar', '__return_false' );
	add_filter( 'widget_title', '__return_false' );

	// remove stuff
	remove_action( 'wp_head', 'wp_generator' );
	remove_action( 'wp_head', '_wp_render_title_tag', 1 );

	// remove w3tc footer comments
	add_filter( 'w3tc_can_print_comment', '__return_false', 10, 1 );

	// move the styles directly below the wp_title() and after the <meta charset>.
	remove_action( 'wp_head', 'wp_print_styles', 8 );
	add_action( 'wp_head', 'wp_print_styles', 1 );

}
