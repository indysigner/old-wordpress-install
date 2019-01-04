<?php
/**
 * Footer Template which is called by get_footer();
 *
 * @package Smashing Magazine
 */
?>
			</div><?php /* .col.main */ ?>
		</div><?php /* .grid */ ?>
		<p><a href="#top" class="top" title="Jump to the top of the page"><?php _e( '&uarr; Back to top', 'smashing' ); ?></a></p>
	</div><?php /* .fluid */ ?>
</div><?php /* .cc */ ?>
</main>
<?php get_sidebar(); ?>
<footer class="f" id="footer" role="contentinfo">
	<?php get_template_part( 'parts/footer', 'products' ); ?>
	<p class="stmt">
		<em><?php _e( 'With a commitment to quality content for the design community.', 'smashing' ); ?></em>
		<br /><?php
			printf(
				__( 'Founded by Vitaly Friedman and Sven Lennartz. 2006-%d.', 'smashing' ),
				get_the_date( 'Y' )
			);
		?>
		<br /><?php _e( 'Made in Germany.', 'smashing' ); ?>
		<span class="flinks">
			&#9998;
			<a href="<?php echo home_url( '/write-for-us/' ); ?>"><?php _ex( 'Write for us', 'Footer contentinfo link', 'smashing' ); ?></a> –
			<a href="<?php echo home_url( '/contact/' ); ?>"><?php _ex( 'Contact us', 'Footer contentinfo link', 'smashing' ); ?></a> –
			<a href="<?php echo home_url( '/privacy-policy-2/' ); ?>"><?php _ex( 'Datenschutzerklärung', 'Footer contentinfo link', 'smashing' ); ?></a> –
			<a href="<?php echo home_url( '/about/' ); ?>"><?php _ex( 'Impressum', 'Footer contentinfo link', 'smashing' ); ?></a>.
		</span>
	</p>
</footer>
<?php wp_footer(); ?>
</body></html>
