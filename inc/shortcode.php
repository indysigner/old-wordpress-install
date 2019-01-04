<?php
/**
 * Feature Name:    Shortcode Functions
 * Version:         0.1
 * Author:          Inpsyde GmbH, cb for Smashing Magazine
 * Author URI:      http://inpsyde.com/
 */


/**
 * Callback to render the Codepen-shortcode.
 *
 * [codepen %settings% caption="{text%OPTIONAL%}"]
 *
 * %settings%:
 *
 * Attribute        Default     Note
 * theme_id         0
 * slug_hash        -           Required
 * user             -           Not required
 * default_tab      result      html/css/js/result
 * height           300         Not a part of themes
 * show_tab_bar     true        true/false, PRO only
 * animations       run         run/stop-after-5
 * border            none        none/thin/thick
 * border_color     #000000     Hex Color Code
 * tab_bar_color    #3d3d3e     Hex Color Code
 * tab_link_color   #76daff     Hex Color Code
 * active_tab_color #cccccc     Hex Color Code
 * active_link_color#000000     Hex Color Code
 * link_logo_color  #ffffff     Hex Color Code
 * custom_css_url   -           URL to CSS-File
 *
 * @link    https://blog.codepen.io/documentation/features/embedded-pens/
 *
 * @param   array $attr
 * @param   string $content
 *
 * @return  string $output
 */
function smash_shortcode_codepen_embed( $attr, $content = '' ) {

	// slug-hash is required to load the Codepen.
	if ( ! isset( $attr[ 'slug_hash' ] ) ) {
		_doing_it_wrong( __FUNCTION__, 'attribute "slug_hash" is missing', "1.8" );
		return '';
	}

	// set height to default value "400px".
	if ( ! isset( $attr[ 'height' ] ) ) {
		$attr[ 'height' ] = 400;
	}

	$allowed_settings = array(
		'theme_id',
		'slug_hash',
		'user',
		'default_tab',
		'height',
		'show_tab_bar',
		'animations',
		'border',
		'border_color',
		'tab_bar_color',
		'tab_link_color',
		'active_tab_color',
		'active_link_color',
		'link_logo_color',
		'custom_css_url'
	);
	$data    = '';
	foreach ( $allowed_settings as $setting ) {
		if ( isset( $attr[ $setting ] ) ) {
			// shortcodes are not supporting "-" as attribute
			$key = str_replace( '_', '-', $setting );
			$value = esc_attr( $attr[ $setting ] );
			$data .= 'data-' . $key . '="' . $value . '" ';
		}
	}

	$output = '';
	$output .= '<figure class="sfcp">'; // sfcp = *s*mash *f*igure *c*ode*p*en
	$output .= sprintf(
		'<p class="codepen" %1$s>%2$s</p>',
		$data,                     // the parsed data settings as string from shortcode
		do_shortcode( $content )
	);
	if ( isset( $attr[ 'caption' ] ) ) {
		$output .= '<figcaption>' . $attr[ 'caption' ] . '</figcaption>';
	}
	$output .= '</figure>';

	return $output;
}

/**
 * Add custom shortcodes.
 *
 * @return void
 */
function smash_add_shortcodes() {
	$shortcodes = array(
		'codepen_embed' => 'smash_shortcode_codepen_embed',
	);
	foreach ( $shortcodes as $tag => $callback ) {
		add_shortcode( $tag, $callback );
	}
}
