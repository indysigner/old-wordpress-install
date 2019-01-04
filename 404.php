<?php
/**
 * 404 template file for our theme
 *
 * @package Smashing Magazine
 */

get_header(); ?>
<article class="post 404">
  <h2>We Couldn't Find Your Page! (404 Error)</h2>
  <ul class="pmd clearfix">
    <li class="a">By <a href="<?php echo home_url(); ?>">Smashing Magazine's Server</a></li>
    <?php get_template_part( 'parts/inline', 'ad' ); ?>
    <li class="rd">Right now</li>
    <li class="tags"><a href="<?php echo home_url( '/tag/404/' ); ?>">404</a> <a href="<?php echo home_url( '/tag/errors/' ); ?>">Errors</a></li>
    <li class="comments"><a href="#comments" title="Comment">No comments</a></li>
  </ul>
  <p>Unfortunately, the page you've requested <strong>cannot be displayed</strong>. It appears that you've lost your way either through an outdated link or a typo on the page you were trying to reach.</p>
  <p>Please feel free to <a href="<?php echo home_url(); ?>">return to the front page</a> or use the <strong>search box</strong> in the upper area of the page to find the information you were looking for. We are very sorry for any inconvenience.</p>
  <h4>What Else Can You Do?</h4>
  <ul>
    <li>Report this error using our <a href="<?php echo home_url( '/contact' ); ?>">contact form</a>. We'll be very grateful.</li>
    <li>Get in touch with the Smashing Team on <a href="https://twitter.com/smashingmag">Twitter</a> &mdash; maybe they can help you out faster!</li>
  </ul>
</article>
<?php
get_footer();
