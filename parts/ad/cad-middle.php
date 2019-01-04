<?php
/**
 * "CAD Middle" Ad in single-templates before 3. <h3>.
 *
 * @see smash_filter_the_content_add_ad_before_first_h3();
 *
 * @package Smashing Magazine/Parts/Ad
 */

if ( smash_is_ads_disabled( 'sidebarads' ) ) {
	return;
}
?>

<section>
<div class="oa_zone--ad icad" id="cad-middle" data-ad-name="Content Ad Middle" data-ad-zone="110" data-ad-media="all"></div>
</section>
