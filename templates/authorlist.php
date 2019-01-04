<?php
/**
 * Authorlist template file.
 *
 * Template Name: Page_AuthorList
 *
 * @package Smashing Magazine/Templates
 */

get_header();
?>
	<article class="default">
		<h2><?php _e( 'Regular Authors', 'smashing' ); ?></h2>
		<?php
		$authors = smash_get_authors();
		foreach ( $authors as $user ) :
			$numposts = count_user_posts( $user->ID );
			?>
			<div class="bio clearfix">
				<div class="grv">
					<?php echo get_avatar( $user->ID, '78' ) ?>
				</div>
				<div class="about">
					<a href="<?php echo get_author_posts_url( $user->ID ) ?>" class="post-author">
						<?php echo $user->display_name ?>
					</a>

					<p>
						<?php echo get_the_author_meta( 'description', (int) $user->ID ); ?>
						<?php _e( 'Posts:', 'smashing' ); ?>
						<a href="<?php echo get_author_posts_url( $user->ID ) ?>"><?php echo $numposts ?></a>
					</p>
				</div>
			</div>
		<?php endforeach; ?>
	</article>
<?php
get_footer();