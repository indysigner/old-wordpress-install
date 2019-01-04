<?php
/**
 * Feature Name:    Emoji Functions
 * Version:         0.1
 * Author:         Inpsyde GmbH, cb for Smashing Magazine
 * Author URI:      http://inpsyde.com/
 */

/**
 * Filter function used to remove the tinymce emoji plugin.
 *
 * @wp-hook tiny_mce_plugins
 *
 * @param   array $plugins
 *
 * @return  array Difference betwen the two arrays
 */
function smash_disable_emojis_tinymce( $plugins ) {
	return array_diff( $plugins, array( 'wpemoji' ) );
}
