<?php
/**
 * Archive header day.
 *
 * @package Smashing Magazine/Parts/Archive
 */
?>
<h2>
	<?php
	printf(
		__( 'Archive for %s', 'smashing' ),
		get_the_time( 'F jS, Y' )
	);
	?>
</h2>
<p>You are viewing all posts published for the time of &#8217;<?php the_time( 'F jS, Y' ); ?>&#8217;. If
	you still can't find what you are looking for, try searching using the form at the right upper
	corner of the page.</p>