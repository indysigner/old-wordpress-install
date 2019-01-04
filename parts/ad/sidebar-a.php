<?php
/**
 * "Sidebar-A" Ad template for sidebar
 *
 * @package Smashing Magazine/Parts/Ad
 */

if ( smash_is_ads_disabled( 'sidebarads' ) ) {
    return;
}
?>
<section class="bw faw">
  <p class="awithus">
      <a class="ed-us" href="mailto:<?php echo antispambot( 'sponsoring@smashingmagazine.com' ); ?>">
	      <?php _e( 'Become a sponsor!', 'smashing' ); ?>
      </a>
  </p>
  <div id="spnsrlist-a" class="oa_zone--sponsor" data-sponsor-lines="1"></div>
</section>