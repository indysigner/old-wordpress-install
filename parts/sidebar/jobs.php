<?php
/**
 * jobs template for sidebar
 *
 * @package Smashing Magazine/Parts/Sidebar
 */
?>

<section class="wg">
	<div id="jobs">
		<h3>
			<a href="http://jobs.smashingmagazine.com/?pk_campaign=sm&amp;piwik_kwd=widget">
				<span>Smashing Job Board</span>
				<img data-src="<?php echo home_url( 'wp-content/themes/smashing-magazine/assets/images/sm-jobs.png' ); ?>" alt="Smashing Jobs" width="36" height="34" />
			</a>
		</h3>
		<?php
		$feed_args = array(
			'uri'          => 'http://feeds.feedburner.com/smjobs',
			'max_items'    => 2,
			'show_content' => TRUE
		);
		echo smash_get_formatted_feed( $feed_args );
		?>
		<a class="cr" href="http://jobs.smashingmagazine.com?pk_campaign=sm&amp;piwik_kwd=widget">
			<?php _e( 'View more job openings&hellip;', 'smashing' ); ?>
		</a>
	</div>
</section>
