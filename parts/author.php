<?php
/**
 * Author full bio for author.php
 *
 * @package Smashing Magazine/Templates
 */
if ( get_query_var( 'author_name' ) ) {
	$author_name    = get_query_var( 'author_name' );
	$current_author = get_user_by( 'slug', $author_name );
} else {
	$current_author = get_userdata( get_query_var( 'author' ) );
}
$author_name    = smash_get_user_name( $current_author );
$twitter_exist  = empty( $current_author->twitter ) ? FALSE : TRUE;
$google_profile = get_the_author_meta( 'google_profile', $current_author->ID );
$facebook_id    = get_the_author_meta( 'facebook_id', $current_author->ID );
?>
<div class="entry" vocab="http://schema.org/" typeof="Person">
	<h2>Author: <span property="name"><?php echo smash_get_author_post_link(); ?></span></h2>
	<?php if ( ! empty( $current_author->description ) ) : ?>
		<div class="gra" property="image">
			<?php echo get_avatar( $current_author->user_email, 78 ); ?>
		</div>
	<?php endif; ?>
	<?php if ( ! empty( $current_author->description ) ) : ?>
		<p property="description"><?php echo $current_author->description; ?></p>
	<?php endif; ?>
	<?php if ( ! empty( $current_author->user_url ) && ! empty( $current_author->website_name ) ) : ?>
		<p>
			Website:
			<a property="url" href="<?php echo $current_author->user_url ?>"><?php echo $current_author->website_name ?></a>
		</p>
	<?php endif; ?>
	<?php if ( $twitter_exist ) : ?>
		<p>Twitter:
			<a property="twitter" href="http://www.twitter.com/<?php echo $current_author->twitter ?>">
				<?php
				$msg = __( 'Follow %1$s on %2$s', 'smashing' );
				printf( $msg, $author_name, 'Twitter' );
				?>
			</a>
		</p>
	<?php endif; ?>
	<?php if ( $google_profile ) : ?>
		<p>Google Profile:
			<a property="google+" href="<?php echo esc_url( $google_profile ); ?>?rel=author"><?php echo $google_profile; ?></a>
		</p>
	<?php endif; ?>
	<?php if ( $facebook_id ) : ?>
		<p>Facebook:
			<a property="facebook" href="http://www.facebook.com/<?php echo $facebook_id; ?>"><?php echo $facebook_id; ?></a>
		</p>
	<?php endif; ?>
</div>