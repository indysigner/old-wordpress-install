<?php
/**
 * Archive header tag.
 *
 * @package Smashing Magazine/Parts/Archive
 */
?>
<h2>
	<?php
	printf(
		__( 'Posts Tagged &#8216;%s&#8217;.', 'smashing' ),
		single_cat_title( '', false )
	);
	?>
</h2>
<p><?php
	printf(
		__( 'We are pleased to present below all posts tagged with &#8216;%s&#8217;.', 'smashing' ),
		single_cat_title( '', false )
	);
	?>
</p>