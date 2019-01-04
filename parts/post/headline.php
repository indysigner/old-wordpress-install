<?php
/**
 * Post/Page entry headline template.
 *
 * @package Smashing Magazine/Parts/Post
 */

$post_id        = get_the_ID();
$catch_headline = get_post_meta( $post_id, 'catch_headline', TRUE );

if ( ! empty( $catch_headline ) ) : ?>
	<h2>
		<a property="url" href="<?php the_permalink(); ?>" rel="bookmark" title="Read '<?php the_title_attribute(); ?>'">
			<span class="cahe" property="alternativeHeadline"><?php echo $catch_headline; ?></span>
			<span class="headline" property="name"><?php the_title(); ?></span>
		</a>
	</h2>
<?php else : ?>
	<h2>
		<a property="url" href="<?php the_permalink(); ?>" rel="bookmark" title="Read '<?php the_title_attribute(); ?>'"><span property="name"><?php the_title(); ?></span></a>
	</h2>
<?php endif;