<?php
/**
 * Content template within loop.
 *
 * @package Smashing Magazine/Templates
 */

global $count;

$post_id        = get_the_ID();
$catch_headline = get_post_meta( $post_id, 'catch_headline', TRUE );

$id = '';
if ( $count === 2 && is_home() ) :
	// id is required for home-archive pages to load the ads on right position.
	$id = 'id="jump"';
endif;
?>

<article <?php echo $id; ?> <?php post_class(); ?> vocab="http://schema.org/" typeof="TechArticle">

	<?php get_template_part( 'parts/post/headline' ); ?>

	<?php get_template_part( 'parts/post/meta' ); ?>

	<?php echo get_the_excerpt(); ?>
	<a href="<?php echo get_permalink(); ?>" class="cr">Read more...</a>
</article>
