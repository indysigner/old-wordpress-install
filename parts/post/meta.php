<?php
/**
 * Post/Page entry meta template.
 *
 * @package Smashing Magazine/Parts/Post
 */
?>

<ul class="pmd clearfix">
	<li class="a" property="author" typeof="person" resource="#authorname">By <?php the_author_posts_link(); ?></li>
	<?php
	$disable_ads = (bool) get_post_meta( get_the_ID(), 'disable_wholeads', TRUE );
	if ( ! $disable_ads ) :
		get_template_part( 'parts/inline', 'ad' );
	endif;
	?>
	<?php if ( ! is_page() ) : ?>
		<li class="rd" property="datePublished" content="<?php the_time( 'F jS, Y' ) ?>"><?php the_time( 'F jS, Y' ) ?></li>
	<?php endif; ?>
	<?php
	$term_list = smash_get_term_list();
	if ( ! is_tag() && $term_list !== '' ) : ?>
		<li class="tags" property="keywords"><?php echo $term_list; ?></li>
	<?php endif; ?>
	<li class="comments" property="discussionUrl"><?php echo smash_get_jump_to_comments_link(); ?></li>
	<?php edit_post_link( 'Edit', '<li>', '</li>' ); ?>
	<?php if ( is_tag() ) : ?>
		<li class="pt"><a href="<?php the_permalink(); ?>" class="post-image"><?php echo get_the_post_thumbnail( get_the_ID(), 'thumbnail' ); ?></a></li>
	<?php endif; ?>
</ul>
