<?php
/**
 * Navigation template for blogazine.
 *
 * @package Smashing Magazine/Parts/Navigation
 */
?>
<div id="smashnav">
	<div id="smashnav-width">
		<ul id="smashnav-tabs">
			<li id="smashnav-tab-magazine" class="active"><a href="<?php echo home_url(); ?>"><strong>Magazine</strong></a></li>
			<li id="smashnav-tab-showlist"><a href="<?php echo home_url( '/categories/' ); ?>"></a></li>
			<li id="smashnav-tab-network"<?php if (is_page('network-posts')) echo ' class="active"'; ?>><a href="<?php echo home_url( '/network-posts/' ); ?>"><strong>Network</strong></a></li>
			<li id="smashnav-tab-shop"><a href="http://shop.smashingmagazine.com/"><strong>Shop</strong></a></li>
			<li id="smashnav-tab-jobs"><a href="http://jobs.smashingmagazine.com/"><strong>Jobs</strong></a></li>
			<li id="smashnav-tab-directory"><a href="http://directory.smashingmagazine.com/"><strong>Smashing Directory</strong></a></li>
			<li id="smashnav-tab-coding" class="active"><a href="http://coding.smashingmagazine.com/"><strong>Coding</strong></a></li>
			<li id="smashnav-tab-uxdesign" class="active"><a href="http://uxdesign.smashingmagazine.com/"><strong>UXDesign</strong></a></li>
		</ul>
		<div id="smashnav-content">
			<ul id="head-icons">
				<li id="head-icon-rss"><a title="Subscribe to our RSS-feed" href="<?php echo home_url( '/feed/' ); ?>"><strong>RSS</strong></a></li>
				<li id="head-icon-facebook"><a title="Join us on Facebook (50K fans)!" href="http://www.facebook.com/smashmag"></a><strong>Facebook</strong></li>
				<li id="head-icon-twitter"><a title="Follow us on Twitter (421K followers)!" href="http://twitter.com/smashingmag"></a><strong>Twitter</strong></li>
				<li id="head-icon-email"><a title="Subscribe to bi-weekly Smashing E-Mail Newsletter" href="<?php echo home_url( '/the-smashing-newsletter/' ); ?>"><strong>Newsletter</strong></a></li>
			</ul>
		</div>
	</div>
</div>