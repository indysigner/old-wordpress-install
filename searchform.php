<?php
/**
 * Display the search form.
 *
 * @package Smashing Magazine
 */

$counter = smash_get_counter( 'search' );
?>
<section class="mise sf clearfix" role="search">
	<form id="search_<?php echo $counter; ?>" method="get" action="<?php echo esc_url( home_url( '/search-results/' ) ); ?>" target="_top">
    <label class="sl" for="searching_<?php echo $counter; ?>">Search on Smashing Magazine</label>
		<input id="searching_<?php echo $counter; ?>" name="q" type="text" placeholder="e.g. JavaScript" />
		<button class="search_submit" type="submit">Search</button>
		<input type="hidden" name="cx" value="<?php echo SMASH_SEARCH_CX; ?>">
		<input type="hidden" name="cof" value="<?php echo SMASH_SEARCH_COF; ?>">
		<input type="hidden" name="ie" value="<?php bloginfo( 'charset' ); ?>">
	</form>
</section>
