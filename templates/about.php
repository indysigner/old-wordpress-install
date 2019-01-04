<?php
/**
 * About template file.
 *
 * Template Name: About
 *
 * @package Smashing Magazine/Templates
 */

get_header();
?>
	<article class="post">
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			<h2><?php the_title(); ?></h2>
			<div class="entry inner">
				<?php the_content('<p class="serif">Read the rest of this entry &raquo;</p>'); ?>
				<?php comments_template(); ?>
			</div>
		<?php endwhile; else: ?>
			<p><?php _e( 'Sorry, no posts matched your criteria.', 'smashing' ); ?></p>
		<?php endif; ?>
	</article>
<?php
get_footer();