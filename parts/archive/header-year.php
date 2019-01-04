<?php
/**
 * Archive header year.
 *
 * @package Smashing Magazine/Parts/Archive
 */
?>
<h2>
	<?php
	printf(
		__( 'Archive for %d', 'smashing' ),
		get_the_time( 'Y' )
	);
	?>
</h2>
<p>
	<?php
	$template = __( "You are viewing all posts published in the year <strong>%d</strong>. If you still can't find what you are looking for, try searching using the form at the right upper corner of the page.", 'smashing' );
	printf( $template, get_the_time( 'Y' ) );
	?>
</p>