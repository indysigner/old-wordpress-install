<?php
/**
 * Sidebar template.
 *
 * @package Smashing Magazine
 */
?>
<aside id="wpsidebar" class="sb" role="complementary">
	<div class="col side">
		<?php get_search_form(); ?>

		<?php get_template_part( 'parts/ad/sidebar', 'a' ); ?>

		<?php get_template_part( 'parts/sidebar/newsletter' ); ?>

		<?php get_template_part( 'parts/ad/sidebar', 'b' ); ?>

		<?php get_template_part( 'parts/sidebar/products' ); ?>

		<?php get_template_part( 'parts/ad/sidebar', 'c' ); ?>

		<?php get_template_part( 'parts/sidebar/mediatemple' ); ?>

		<?php get_template_part( 'parts/ad/sidebar', 'special' ); ?>

		<?php get_template_part( 'parts/sidebar/jobs' ); ?>

		<?php get_template_part( 'parts/ad/sidebar', 'skyscraper' ); ?>

		<?php #get_template_part( 'parts/sidebar/conf' ); ?>

		<?php get_template_part( 'parts/ad/sidebar', 'd' ); ?>

		<?php get_template_part( 'parts/ad/sidebar', 'skyscraper-two' ); ?>

	</div>
</aside>
