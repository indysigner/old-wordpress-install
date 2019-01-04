<?php
/**
 * Archive header with descriptions.
 *
 * @package Smashing Magazine/Parts
 */

$classes = array( 'cat' );
if ( is_category() ) {
	$classes[ ]  = sanitize_title_with_dashes( single_cat_title( '', false ) );
}
?>
<div class="<?php echo implode( ' ', $classes ); ?>">
	<div class="entry">
		<?php
		if ( is_tag( 'smashing-daily' ) ) :
			get_template_part( 'parts/archive/header', 'daily' );
		elseif ( is_category() ) :
			get_template_part( 'parts/archive/header', 'category' );
		elseif ( is_tag() ) :
			get_template_part( 'parts/archive/header', 'tag' );
		elseif ( is_day() ) :
			get_template_part( 'parts/archive/header', 'day' );
		elseif ( is_month() ) :
			get_template_part( 'parts/archive/header', 'month' );
		elseif ( is_year() ) :
			get_template_part( 'parts/archive/header', 'year' );
		elseif ( is_author() ) :
			get_template_part( 'parts/archive/header', 'author' );
		elseif ( is_paged() ) :
			get_template_part( 'parts/archive/header', 'paged' );
		endif;
		?>
	</div>
</div>
