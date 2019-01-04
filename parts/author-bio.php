<?php
/**
 * Author bio section.
 *
 * @package Smashing Magazine/Parts
 */
?>
<div class="bio clearfix">
  <div class="grv">
    <?php echo get_avatar( get_the_author_meta( 'user_email' ), '78' );  ?>
	</div>
	<div class="about">
		<?php echo smash_get_author_post_link(); ?>
		<p><?php the_author_meta( 'description' ); ?></p>
	</div>
</div>