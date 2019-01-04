<?php
/**
 * Feature Name:    Gravatar functions
 * Version:         0.1
 * Author:         Inpsyde GmbH, cb for Smashing Magazine
 * Author URI:      http://inpsyde.com/
 */

/**
 * Replacing the avatar with default one and added data-src and data-src-retina for lazyLoading.
 *
 * @see     /assets/js/src/onload/lazy-images.js - script file
 *
 * @issue   https://github.com/inpsyde/smashing-magazin/issues/359
 *
 * @wp-hook pre_get_avatar
 *
 * @param   string $html
 * @param   mixed  $id_or_mail
 * @param   array  $args
 *
 * @return  string $html
 */
function smash_filter_pre_get_avatar_add_lazyload( $html, $id_or_mail, $args ) {

	$args_2x           = $args;
	$args_2x[ 'size' ] = $args_2x[ 'size' ] * 2;

	$user_avatar = get_avatar_data( $id_or_mail, $args );

	// do not add "data-src"-Attributes when user has no avatar.
	if ( isset( $user_avatar[ 'found_avatar' ] ) && ! $user_avatar[ 'found_avatar' ] ) {
		return $html;
	}

	$user_avatar    = $user_avatar[ 'url' ];
	$user_avatar_2x = get_avatar_url( $id_or_mail, $args_2x );
	$default_avatar = get_avatar_url( NULL, $args );

	/**
	 * %1$s = default avatar
	 * %2$s = user avatar
	 * %3$s = user avatar x2 for retina
	 * %4$s = width of avatar
	 * %5$s = height of avatar
	 * %6$s = additional <img>-Attributes
	 */
	$template = '<img src="%1$s" data-src="%2$s" data-src-retina="%3$s" class="avatar" height="%4$d" width="%5$d" %6$s>';

	$html = sprintf(
		$template,
		esc_attr( $default_avatar ),
		esc_attr( $user_avatar ),
		esc_attr( $user_avatar_2x ),
		(int) $args[ 'height' ],
		(int) $args[ 'width' ],
		$args[ 'extra_attr' ]
	);

	return $html;
}
