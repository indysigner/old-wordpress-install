<?php
/**
 * Page "Contact" with contact-form template file.
 *
 * Template Name: Page_ContactForm
 *
 * @package Smashing Magazine/Templates
 */

get_header();
?>
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
	<article class="contactform post">
		<h2>Hello. Let's talk.</h2>
		<ul class="pmd clearfix">
			<li class="a">
				<?php
				$template = __( 'By %s', 'smashing' );
				$link     = '<a href="' . home_url( '/author/vitaly-friedman/' ) . '" rel="author">';
				$link     .= __( 'Smashing Editorial', 'smashing' );
				$link     .= '</a>';
				printf(
					$template,
					$link
				);
				?>
			</li>
			<li class="rd">Right now</li>
			<li class="comments"><a href="#comments"><?php _e( 'No comments', 'smashing' ); ?></a></li>
		</ul>
		<?php the_content(); ?>
		<?php do_shortcode( '[smash-form redirect="/contact-form-thank-you/"]' ); ?>
	</article>
<?php endwhile; endif; ?>
<?php
get_footer();
