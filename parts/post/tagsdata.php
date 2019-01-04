<?php
/**
 * Entry tagsdata template.
 *
 * @package Smashing Magazine/Parts/Post
 */

$term_list_args = array(
	'before' => '<div class="lt">',
	'after'  => '</div>'
);
echo smash_get_term_list( $term_list_args );
?>

<p>
	<a href="#top" class="top">&uarr; Back to top</a>

	<?php
	if ( is_singular() ) :
		echo smash_get_share_links();
	endif;
	?>

	<?php get_template_part( 'parts/ad/degreed' ); ?>
</p>
