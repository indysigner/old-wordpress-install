<?php
/**
 * Single Page Template with Sidebar
 *
 * @package Smashing Magazine
 */

get_header();

if ( have_posts() ) :
	while ( have_posts() ) : the_post();
		get_template_part( 'parts/content', 'single' );
	endwhile;
else :
	get_template_part( 'parts/content', 'none' );
endif;

get_footer();
