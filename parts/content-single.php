<?php
/**
 * Single template.
 *
 * @package Smashing Magazine/Templates
 */
?>
<article <?php post_class(); ?> vocab="http://schema.org/" typeof="TechArticle">

	<?php get_template_part( 'parts/post/headline' ); ?>

	<?php if ( ! is_page( 'search-results' ) ): ?>
		<?php get_template_part( 'parts/post/meta' ); ?>
	<?php endif; ?>

	<?php get_template_part( 'parts/ad/single', 'cad' ); ?>

	<?php the_content( '<p>Read the rest of this entry &raquo;</p>' ); ?>

	<?php get_template_part( 'parts/ad/single', 'editors-note' ); ?>

	<?php
	$link_pages_args = array(
		'before' => '<div class="single-post-navigation">' . __( 'Pages:', 'smashing' ),
		'after'  => '</div>'
	);
	wp_link_pages( $link_pages_args );
	?>

	<?php get_template_part( 'parts/post/tagsdata' ); ?>

</article>
<?php
get_template_part( 'parts/author', 'bio' );
do_action( 'inpsyde_related_posts', get_the_ID() );
comments_template();
