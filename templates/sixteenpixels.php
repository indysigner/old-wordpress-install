<?php
/**
 * Page template for sixteenpixels..dunno what it is, but its there.
 *
 * Template Name: Page_Sixteenpixels_Template
 *
 * @package Smashing Magazine/Templates
 */
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>
  <head profile="http://gmpg.org/xfn/11">
  <meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
  <title><?php wp_title( '' ); ?> | <?php bloginfo( 'name' ); ?></title>
  <meta rel="icon" link="<?php echo get_home_url( '/assets/images/favicon.ico' ); ?>" />
  <link rel="apple-touch-icon" href="<?php echo get_template_directory_uri(); ?>/assets/images/appletouchicon.png" />
  <?php wp_head(); ?>
	<link rel="stylesheet" href="<?php echo content_url( 'uploads/sixteenpixels/sixteenpixels.css'); ?>" type="text/css" media="screen" />
	<script src="<?php echo content_url( 'uploads/sixteenpixels/modernizr.js' ); ?>"></script>
</head>
<body <?php body_class(); ?>>
	<div id="container">
		<a href="<?php echo get_home_url(); ?>"><img id="logo" src="<?php echo content_url( 'uploads/sixteenpixels/smashing-logo-adjusted.png' ); ?>" /></a>
		<nav>
			<ul id="major-nav">
				<li><a href="<?php echo get_home_url(); ?>">Home</a></li>
				<li><a href="<?php echo get_home_url(); ?>/categories/">Categories</a></li>
				<li><del title="Following this link you will be redirected to our homepage as the network does not exist anymore"><a href="<?php echo get_home_url(); ?>">Network</a></del></li>
				<li><a href="http://shop.smashingmagazine.com/">Shop</a></li>
				<li><a href="http://jobs.smashingmagazine.com/">Jobs</a></li>
				<li><del title="Following this link you will be redirected to our homepage as the directory does not exist anymore"><a href="<?php echo get_home_url(); ?>">Directory</a></del></li>
			</ul>
			<ul id="minor-nav">
				<li><a href="http://www.smashingmagazine.com/category/coding/">Coding</a></li>
				<li><a href="http://www.smashingmagazine.com/category/uxdesign/">UX Design</a></li>
				<li><a href="http://www.smashingmagazine.com/category/wordpress/">WordPress</a></li>
			</ul>
			<ul id="social-nav">
				<li><a id="rss" href="http://www.smashingmagazine.com/feed/" title="Subscribe to our RSS feed">RSS</a></li>
				<li><a id="facebook" href="http://www.facebook.com/smashmag" title="Join us on Facebook (50k fans)!">Facebook</a></li>
				<li><a id="twitter" href="http://twitter.com/smashingmag" title="Follow us on Twitter (421k followers)!">Twitter</a></li>
				<li><a id="newsletter" href="<?php echo get_home_url(); ?>/the-smashing-newsletter/" title="Subscribe to bi-weekly Smashing Email Newsletter">Newsletter</a></li>
			</ul>
		</nav>
		<article>
 			<?php
            if (have_posts())
            {
                while (have_posts())
                {
                    the_post();
                    the_content();
                }
            }
            else { echo "hello3"; }
            ?>
          </article>
		<?php comments_template(); ?>
	</div><?php /*<!--#container-->*/ ?>
  <?php get_footer(); ?>
</body>
</html>
