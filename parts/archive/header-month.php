<?php
/**
 * Archive header month.
 *
 * @package Smashing Magazine/Parts/Archive
 */
?>
<h2>
	<?php
	printf(
		__( 'Archive for %s', 'smashing' ),
		get_the_time( 'F, Y' )
	);
	?>
</h2>
<p>You are viewing all posts published for the month of <strong><?php the_time( 'F, Y' ); ?></strong>.
	If you still can't find what you are looking for, try searching using the form at the right upper
	corner of the page.</p>