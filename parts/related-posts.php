<?php
/**
 * This template overwrites the template in "inpsyde-related-posts"-Plugin
 *
 * @var     \WP_Query $relations
 */

if ( ! function_exists( 'Inpsyde\RelatedPosts\run' ) ) :
	return;
endif;

if ( ! $relations->have_posts() ) :
	return;
endif;
?>
	<div class="ras clearfix">
		<h2>Related Articles</h2>
		<?php while ( $relations->have_posts() ) : $relations->the_post(); ?>
			<div class="ra clearfix">
				<a class="pp" href="<?php the_permalink(); ?>">
					<?php
					$template = '<img data-src="%1$s" width="%2$d" height="%2$d" alt="%3$s" class="wp-post-image" />';

					// default values
					$src      = content_url( 'uploads/2014/04/post-thumb-fallback.png' );
					$width    = 178;
					$height   = 118;
					$title    = '';

					if ( has_post_thumbnail() ) :
						$attachment_id = get_post_thumbnail_id( get_the_ID() );
						$image         = wp_get_attachment_image_src( $attachment_id, 'related-thumb' );
						if ( ! ! $image ) :
							$src    = $image[ 0 ];
							$width  = (int) $image[ 1 ];
							$height = (int) $image[ 2 ];
							$title  = get_post_meta( $attachment_id, '_wp_attachment_image_alt', TRUE );
							if ( $title === '' ) :
								$title = get_the_title( $attachment_id );
							endif;
						endif;
					endif;

					printf( $template, $src, $width, $height, $title );
					?>
					<h3><?php the_title(); ?></h3>
				</a>
			</div>
		<?php endwhile; ?>
	</div>
<?php wp_reset_query();
