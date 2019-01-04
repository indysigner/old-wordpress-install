<?php
/**
 * Header Template which is called by get_header();
 *
 * @package Smashing Magazine
 */

// Commindo random number for tracking.
$ads_seed = rand( 0, 1000000000 );
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<title><?php wp_title( ' | ', TRUE, '' ); ?></title>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<link rel="dns-prefetch" href="https://media-mediatemple.netdna-ssl.com/" />
	<link rel="dns-prefetch" href="https//auslieferung.commindo-media-resourcen.de/" />
	<link rel="preconnect" href="https://media-mediatemple.netdna-ssl.com" />
	<link rel="preconnect" href="https://auslieferung.commindo-media-resourcen.de/" />
	<?php wp_head(); ?>
	<?php get_template_part( 'parts/header', 'metadata' ); ?>
</head>
<body id="top" <?php body_class(); ?>>
<?php get_template_part( 'parts/navigation/toggle', 'buttons' ); ?>
<a class="sr" href="#content"><?php _e( 'Jump to the content', 'smashing' ); ?></a>
<header class="h" role="banner">
	<h1 class="logo">
		<span class="sr">Smashing Magazine</span>
		<a href="<?php echo home_url( '/' ); ?>"><img src="<?php echo get_template_directory_uri(
			); ?>/assets/images/logo.png" alt="Smashing Magazine Logo" srcset="https://media-mediatemple.netdna-ssl.com/wp-content/themes/smashing-magazine/assets/images/logo.svg" /></a>
	</h1>
</header>
<?php get_template_part( 'parts/navigation/mobile' ); ?>
<?php get_template_part( 'parts/search', 'mobile' ); ?>
<nav class="tn clearfix" role="navigation">
	<?php get_template_part( 'parts/navigation/header' ); ?>
</nav>
<main>
	<div class="cc">
		<div class="fluid clearfix">
			<div class="grid clearfix">
				<?php get_search_form(); ?>
				<div class="col sn">
					<?php get_template_part( 'parts/navigation/sections' ); ?>
				</div>
				<div id="content" class="col main">
					<?php get_template_part( 'parts/ad/adblock-content' ); ?>
