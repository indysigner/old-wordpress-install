<?php
/**
 * Feature Name:    Style Functions
 * Version:         0.1
 * Author:         Inpsyde GmbH, cb for Smashing Magazine
 * Author URI:      http://inpsyde.com/
 */

/**
 * getting all Smashing Styles
 *
 * @return array
 */
function smash_get_styles() {

	$asset_uri = get_stylesheet_directory_uri();
	$css_uri   = $asset_uri . '/assets/css/';
	$suffix    = smash_get_script_suffix();

	$css_assets = array();

	// basic styles in header.php.
	$css_assets[ 'smash-above-the-fold' ] = array(
		'src'  => $css_uri . 'above-the-fold' . $suffix . '.css',
		'data' => array(
			'filters' => array(
				'inlinecss' => array()
			)
		)
	);
	// the "smash-main" file will be wrapped into a <noscript>-Tag in header.php and
	// re-used in footer.php in a <script>-Tag to load the styles async.
	$css_assets[ 'smash-main' ] = array(
		'src'  => $css_uri . 'main' . $suffix . '.css',
		'deps' => array( 'smash-above-the-fold' ),
		'data' => array(
			'filters' => array(
				'loadcss' => array( 'noscriptcss' => TRUE, 'preload' => TRUE ),
			)
		)
	);

	if ( is_archive() || is_author() ) {

		// for category, tag and author archives
		$css_assets[ 'smash-archive-pages' ] = array(
			'src'  => $css_uri . 'archive-pages' . $suffix . '.css',
			'deps' => array( 'smash-above-the-fold' ),
			'data' => array(
				'filters' => array(
					'loadcss' => array( 'noscriptcss' => TRUE, 'preload' => TRUE ),
				)
			)
		);
	}

	if ( is_singular() && ! is_page_template( [ 'templates/contactform.php', 'templates/search.php' ] ) ) {

		$css_assets[ 'smash-article-only' ] = array(
			'src'  => $css_uri . 'articles-only' . $suffix . '.css',
			'deps' => array( 'smash-above-the-fold' ),
			'data' => array(
				'filters' => array(
					'loadcss' => array( 'noscriptcss' => TRUE, 'preload' => TRUE ),
				)
			)
		);

		$css_assets[ 'smash-below-articles' ] = array(
			'src'  => $css_uri . 'below-articles' . $suffix . '.css',
			'deps' => array( 'smash-above-the-fold' ),
			'data' => array(
				'filters' => array(
					'loadcss' => array( 'noscriptcss' => TRUE ),
				)
			)
		);

		// comments styles
		$css_assets[ 'smash-comments' ] = array(
			'src'  => $css_uri . 'comments' . $suffix . '.css',
			'deps' => array( 'smash-above-the-fold' ),
			'data' => array(
				'filters' => array(
					'loadcss' => array( 'noscriptcss' => TRUE ),
				)
			)
		);
	}

	// styles for the contact-page.
	if ( is_page_template( 'templates/contactform.php' ) ) {
		$css_assets[ 'smash-contact' ] = array(
			'src'  => $css_uri . 'contact' . $suffix . '.css',
			'deps' => array( 'smash-above-the-fold' ),
			'data' => array(
				'filters' => array(
					'loadcss' => array( 'noscriptcss' => TRUE ),
				)
			)
		);
	}

	// styles for search-results page.
	if ( is_page_template( 'templates/search.php' ) ) {
		$css_assets[ 'smash-search' ] = array(
			'src'  => $css_uri . 'search-results' . $suffix . '.css',
			'deps' => array( 'smash-above-the-fold' ),
			'data' => array(
				'filters' => array(
					'loadcss' => array( 'noscriptcss' => TRUE ),
				)
			)
		);
	}

	$css_assets[ 'smash-print' ] = array(
		'src'   => $css_uri . 'print' . $suffix . '.css',
		'deps'  => array( 'smash-above-the-fold', 'smash-main' ),
		'media' => 'print'
	);

	$css_assets[ 'smash-webfonts' ] = array(
		'src'  => $css_uri . 'webfonts' . $suffix . '.css',
		'deps' => array( 'smash-above-the-fold', 'smash-main' ),
		'data' => array(
			'filters' => array(
				'loadcss' => array(
					'localStorage' => TRUE,
					'noscript'     => FALSE
				),
			)
		),
	);
	// ie8-styles wrapped into a CC.
	$css_assets[ 'smash-ie8' ] = array(
		'src'  => $css_uri . 'ie8-nu' . $suffix . '.css',
		'data' => array(
			'conditional' => 'IE 8'
		),
	);

	if ( is_singular() ) {
		$meta = (bool) get_post_meta( get_the_ID(), 'enable_tablesaw', TRUE );
		if ( $meta ) {
			$css_assets[ 'tablesaw' ] = array(
				'src'  => $css_uri . 'tablesaw' . $suffix . '.css',
				'data' => array(
					'loadCSS' => TRUE
				)
			);
		}
	}

	return $css_assets;
}

/**
 * callback to register styles
 *
 * @wp-hook wp_enqueue_scripts
 *
 * @return  Void
 */
function smash_enqueue_styles() {

	global $wp_styles;

	$default_style = array(
		'src'     => '',
		'deps'    => array(),
		'version' => smash_get_script_version(),
		'media'   => 'all',
		'enqueue' => TRUE
	);

	$styles = smash_get_styles();

	foreach ( $styles AS $id => $style ) {

		$style = wp_parse_args( $style, $default_style );

		wp_register_style( $id, $style[ 'src' ], $style[ 'deps' ], $style[ 'version' ], $style[ 'media' ] );

		if ( $style[ 'enqueue' ] ) {
			wp_enqueue_style( $id );
		}

		if ( array_key_exists( 'data', $style ) ) {
			foreach ( $style[ 'data' ] as $key => $value ) {
				$wp_styles->add_data( $id, $key, $value );
			}
		}

	}
}
