<?php
/**
 * Archive header category
 *
 * @package Smashing Magazine/Parts/Archive
 */
?>
<h2>
	<?php
	printf(
		__( 'Category: %s', 'smashing' ),
		single_cat_title( '', false )
       );
	?>
</h2>
<?php
$desc = category_description();
if ( $desc !== '' ) :
	echo $desc;
else :
	$template = __( 'Check out all of the posts in &#8216;%s&#8217; below. If you still can\'t find what you are looking for, try searching using the form at the top of the page.', 'smashing' );
	printf( $template, single_cat_title( '', false ) );
endif;
?>
<?php echo smash_get_tags_by_category();