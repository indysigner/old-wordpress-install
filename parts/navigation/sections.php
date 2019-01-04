<?php
/**
 * Section navigatoin template.
 *
 * @package Smashing Magazine/Parts/Navigation
 */

wp_nav_menu( array(
	'theme_location'	=> 'smashing_sections',
	'menu_class'		=> 'clearfix',
	'container'			=> 'div',
	'container_class'   => 'sct',
	'items_wrap'		=> '<ul id="%1$s" class="%2$s">%3$s</ul>'
) );