<?php
/**
 * Navigation-Template
 *
 * @package Smashing Magazine/Parts/Navigation
 */
$nav_items_wrap = ' <ul id="%1$s" class="%2$s">';
$nav_items_wrap .=  '<li class="current"><a href="' . home_url( ) . '"><img src="' . get_template_directory_uri() . '/assets/images/logo.png" alt="Smashing Magazine" srcset="https://media-mediatemple.netdna-ssl.com/wp-content/themes/smashing-magazine/assets/images/logo.svg"  /></a></li>';
$nav_items_wrap .=  '%3$s';
$nav_items_wrap .= '</ul>';
$nav_args = array(
	'theme_location'	=> 'smashing_network',
	'menu_class'		=> 'nw clearfix',
	'container'			=> FALSE,
	'items_wrap'		=> $nav_items_wrap
);
wp_nav_menu( $nav_args );

?>
<nav id="social-media-nav" role="menu">
  <ul class="ch">
  	<li class="rss">
	    <a href="<?php echo home_url( '/feed/' ); ?>" title="<?php _e( 'Subscribe to our RSS-feed (120K)', 'smashing' ); ?>">RSS</a>
    </li>
  	<li class="fb">
	    <a href="//www.facebook.com/smashmag" title="<?php _e( 'Join our Facebook page! (267k)', 'smashing' ); ?>">Facebook</a>
    </li>
  	<li class="tw">
	    <a href="//twitter.com/smashingmag" title="<?php _e( 'Follow us on Twitter! (956k)', 'smashing' ); ?>">Twitter</a>
    </li>
  	<li class="nl">
	    <a href="<?php echo home_url( '/the-smashing-newsletter/' ); ?>" title="<?php _e( 'Subscribe to our Email Newsletter (180k)', 'smashing' ); ?>">Newsletter</a>
    </li>
  </ul>
</nav>
