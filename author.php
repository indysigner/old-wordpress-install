<?php
/**
 * Author template
 *
 * @package Smashing Magazine
 */

get_header();
?>
<div class="cat clearfix">
	<?php get_template_part( 'parts/author' ); ?>
</div>
<?php if ( have_posts() ) : $count = 0; ?>
	<?php while ( have_posts() ) : the_post(); ?>
	<?php get_template_part( 'parts/content', get_post_format() ); ?>
	<?php $count ++; endwhile; ?>
<?php else : ?>
	<p><?php _e( 'No posts match your criteria.', 'smashing' ); ?></p>
<?php endif; ?>
<?php smash_the_pagination(); ?>
<?php
get_footer();
