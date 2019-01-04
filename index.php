<?php
/**
 * Fallback file for missing specialized template files.
 *
 * @package Smashing Magazine
 */

get_header();
$count = 0;

$is_home = is_home();

if ( is_archive() ) : ?>
	<div id="leaderboardtarget"></div>
	<?php
	get_template_part( 'parts/archive', 'header' );
endif;

if ( have_posts() ) :
	while ( have_posts() ) : the_post();

		// the content
		get_template_part( 'parts/content', get_post_format() );

		if ( $is_home && $count === 1 ) :
			// ads within the loop
			get_template_part( 'parts/ad/loop' );
		endif;

		$count++;

		if ( is_active_sidebar( 'under-archive-loop' ) && $is_home && ! is_paged() && $count === 4 ) : ?>
			<div class="loop-widgets clearfix">
				<?php dynamic_sidebar( 'under-archive-loop' ); ?>
			</div>
		<?php endif;
	endwhile;
	smash_the_pagination();
else:
	get_template_part( 'parts/content', 'none' );
endif;

get_footer();
