<?php
/**
 * Feature Name:    Script Functions
 * Version:         0.1
 * Author:         Inpsyde GmbH, cb for Smashing Magazine
 * Author URI:      http://inpsyde.com/
 */

/**
 * Getting all Scripts for Smashing Magazine
 *
 * @return array
 */
function smash_get_scripts() {

	$asset_uri = get_template_directory_uri();
	$js_uri    = $asset_uri . '/assets/js/';
	$suffix    = smash_get_script_suffix();

	$version = smash_get_script_version();

	$js_assets = array(
		'html5shiv'         => array(
			'file'      => $js_uri . 'html5shiv' . $suffix . '.js',
			'deps'      => array(),
			'ver'       => $version,
			'in_footer' => FALSE,
			'data'      => array(
				'conditional' => 'IE 8',
			)
		),
		'smash-onload'      => array(
			'file'      => $js_uri . 'onload' . $suffix . '.js',
			'deps'      => array(),
			'ver'       => $version,
			'in_footer' => TRUE,
			'data'      => array(
				'filters' => array(
					'loadjs' => array( 'async' => TRUE, 'onLoad' => TRUE )
				)
			)
		),
		'smash-fastclick'   => array(
			'file'      => $js_uri . 'fastclick' . $suffix . '.js',
			'deps'      => array(),
			'ver'       => $version,
			'in_footer' => TRUE,
			'data'      => array(
				'filters' => array(
					'loadjs' => array( 'async' => TRUE, 'onLoad' => TRUE )
				)
			)
		),
		'smash-lazy-images' => array(
			'file'      => $js_uri . 'lazy-images' . $suffix . '.js',
			'deps'      => array(),
			'ver'       => $version,
			'in_footer' => TRUE,
			'data'      => array(
				'filters' => array(
					'loadjs' => array( 'async' => TRUE, 'onLoad' => TRUE )
				)
			)
		),
		'smash-blocked'     => array(
			'file'      => $js_uri . 'blocked' . $suffix . '.js',
			'deps'      => array(),
			'ver'       => $version,
			'in_footer' => TRUE,
			'data'      => array(
				'filters' => array(
					'loadjs' => array( 'async' => TRUE, 'onLoad' => TRUE )
				)
			)
		),
	);

	if ( is_singular() ) {

		// enqueue comments-reply script
		//if ( comments_open() ) {
		wp_enqueue_script( 'comment-reply' );
		//}

		// codepen embed
		$js_assets[ 'codepen' ] = array(
			'file'      => $js_uri . 'codepen.js',
			'deps'      => array(),
			'ver'       => $version,
			'in_footer' => TRUE,
			'data'      => array(
				'filters' => array(
					'loadjs' => array( 'async' => TRUE, 'onLoad' => TRUE )
				)
			)
		);

		// prism
		$js_assets[ 'prism' ] = array(
			'file'      => $js_uri . 'prism.js',
			'deps'      => array(),
			'ver'       => $version,
			'in_footer' => TRUE,
			'data'      => array(
				'filters' => array(
					'loadjs' => array( 'async' => TRUE, 'onLoad' => TRUE )
				)
			)
		);

		// tablesaw - only when enabled via PostMeta in Backend.
		$meta = (bool) get_post_meta( get_the_ID(), 'enable_tablesaw', TRUE );
		if ( $meta ) {
			$js_assets[ 'tablesaw' ] = array(
				'file'      => $js_uri . 'tablesaw' . $suffix . '.js',
				'deps'      => array( 'jquery-core' ),
				'ver'       => $version,
				'in_footer' => TRUE,
			);
		}
	}

	// check if the current post/page has ads deactivated
	$disable_ads = FALSE;
	if ( is_single() ) {
		$disable_ads = (bool) get_post_meta( get_the_ID(), 'disable_wholeads', TRUE );
	}

	if ( ! $disable_ads ) {
		$js_assets[ 'smash-ads' ] = array(
			'file'      => $js_uri . 'ads' . $suffix . '.js',
			'deps'      => '',
			'ver'       => $version,
			'in_footer' => TRUE,
			'localize'  => array(
				'AdsI18N' => array(
					'Advertisement' => __( 'Advertisement', 'smashing' )
				)
			)
		);
	}

	return $js_assets;
}

/**
 * callback to register Scripts
 *
 * @wp-hook wp_enqueue_scripts
 * @return  Void
 */
function smash_enqueue_scripts() {

	global $wp_scripts;

	$js_assets = smash_get_scripts();

	foreach ( $js_assets AS $handle => $asset ) {

		wp_enqueue_script( $handle, $asset[ 'file' ], $asset[ 'deps' ], $asset[ 'ver' ], $asset[ 'in_footer' ] );

		// checking for localize script args
		if ( array_key_exists( 'localize', $asset ) && ! empty( $asset[ 'localize' ] ) ) {
			foreach ( $asset[ 'localize' ] as $name => $args ) {
				wp_localize_script( $handle, $name, $args );
			}
		}

		if ( array_key_exists( 'data', $asset ) ) {
			foreach ( $asset[ 'data' ] as $key => $value ) {
				$wp_scripts->add_data( $handle, $key, $value );
			}
		}

	}
}

/**
 * Callback-Function to register some site-analytics to the footer
 *
 * @wp-hook     wp_footer
 * @return      Void
 */
function smash_wp_footer_site_analytics() {

	// don't track logged in users.
	if ( is_user_logged_in() ) {
		return;
	}
	?>

	<script>
		var clicky_site_ids = clicky_site_ids || [];
		clicky_site_ids.push( 2727 );
		(
			function( d ) {
				var $s = d.createElement( "script" );
				$s.type = "text/javascript";
				$s.async = 1;
				$s.src = "//static.getclicky.com/js";
				d.getElementsByTagName( "head" )[ 0 ].appendChild( $s )
			}
		)( document )
	</script>
	<noscript><p><img alt="Clicky" width="1" height="1" src="//in.getclicky.com/2727ns.gif" /></p></noscript>
	<?php
}

/**
 * Adding a script tag to footer to attach a <link rel="prerender">-Tag to the head with first article of page on
 * archive pages.
 *
 * @wp-hook wp_footer
 */
function smash_wp_footer_prerender_first_post() {

	global $wp_query;

	if ( ! is_front_page() && ! is_archive() ) {
		return;
	}

	if ( ! isset( $wp_query->posts[ 0 ] ) ) {
		return;
	}
	$post = $wp_query->posts[ 0 ];
	?>
	<script>
		(
			function( d, w ) {
				w.onload = function() {
					var $l = d.createElement( "link" );
					$l.rel = "prerender";
					$l.href = "<?php echo esc_url( get_permalink( $post ) ); ?>";
					d.getElementsByTagName( "head" )[ 0 ].appendChild( $l );
				}
			}
		)( document, window )
	</script>
	<?php
}

/**
 * Adds the advertising stuff to the footer.
 * This functions needs to be triggered on wp_print_footer_scripts, because it requires a enqueue-script.
 *
 * @wp-hook wp_footer
 *
 * @return  void
 */
function smash_wp_footer_add_ads() {

	?>

	<?php /* appending the JS-File to the document */ ?>
	<script>try {
			SmashingAds.loadAds();
		} catch ( e ) {
		}</script>

	<?php /* rendering the ads after JS-File is added */ ?>
	<script>try {
			SmashingAds.render( OA_output );
		} catch ( e ) {
		}</script>

	<?php
}

/**
 * Filtering the default_scripts to add "loadJS" and "async" to WordPress-Resource's.
 *
 * @issue   https://github.com/inpsyde/smashing-magazin/issues/420
 *
 * @wp-hook script_loader_src
 *
 * @param string $src
 * @param string $handle
 *
 * @return string $src
 */
function smash_filter_script_loader_src( $src, $handle ) {

	$scripts = wp_scripts();

	if ( $handle === 'comment-reply' ) {

		$scripts->registered[ $handle ]->extra[ 'filters' ] = array(
			'loadjs' => array(
				'async'  => TRUE,
				'onLoad' => TRUE
			)
		);
	} else if ( $handle === 'wp-embed' ) {
		// @issue https://github.com/inpsyde/smashing-magazin/issues/440
		// Adding ABSPATH to src, otherwhise the file_get_contents will fail.
		$scripts->registered[ $handle ]->src = ABSPATH . $scripts->registered[ $handle ]->src;
		$scripts->registered[ $handle ]->extra[ 'filters' ] = array( 'inlinejs' => TRUE );
	} else if ( function_exists( '\CloudFour\ServiceWorkerManager\get_config' ) ) {
		$config = \CloudFour\ServiceWorkerManager\get_config();
		if ( $handle === $config[ 'serviceWorkerRegistrationHandle' ] ) {
			$scripts->registered[ $handle ]->extra[ 'filters' ] = array(
				'inlinejs' => TRUE
			);
		}
	}

	return $src;
}
