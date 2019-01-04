<?php
/**
 * Template File for the Mobile Navigation
 *
 * @package Smashing Magazine/Parts/Navigation
 */
?>
<nav class="mn" id="mn" role="navigation menu">
	<h2><?php _ex( 'Smashing Pages:', 'Mobile Navigation title', 'smashing' ); ?></h2>
	<?php
	$nav_items_wrap = ' <ul id="%1$s" class="%2$s">';
	$nav_items_wrap .=  '%3$s';
	$nav_items_wrap .= '</ul>';
	wp_nav_menu( array(
	                  'theme_location'	=> 'mobile_smashing_pages',
	                  'menu_class'		=> 'mnu',
	                  'container'			=> FALSE,
	                  'items_wrap'		=> $nav_items_wrap
	             ) );
	?>
	<h2><?php _ex( 'Categories:', 'Mobile Navigation title', 'smashing' ); ?></h2>
	<?php
	$nav_items_wrap = ' <ul id="%1$s" class="%2$s">';
	$nav_items_wrap .=  '%3$s';
	$nav_items_wrap .= '</ul>';
	wp_nav_menu( array(
	                  'theme_location'	=> 'mobile_smashing_categories',
	                  'menu_class'		=> 'mnu',
	                  'container'			=> FALSE,
	                  'items_wrap'		=> $nav_items_wrap
	             ) );
	?>
</nav>
<a class="mnc js-toggle-btn" href="#top" data-toggle-target="mn" title="<?php _e( 'Close the navigation', 'smashing' ); ?>">X</a>