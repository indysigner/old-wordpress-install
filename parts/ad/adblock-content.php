<?php
/**
 * "Adblock Content" being displayed when Adblock is enabled
 *
 * @see     Script for detecting AdBlock: /assets/js/src/blocked/blocked.js
 *
 * @package Smashing Magazine/Parts/Ad
 */

if ( smash_is_ads_disabled() ) {
	return;
}

$book_url = home_url('/inclusive-design-patterns');
$images_url = trailingslashit( get_template_directory_uri() ) . 'assets/images';

$uploads_dir = wp_upload_dir();
$uploads_url = $uploads_dir['baseurl'];

?>
<div id="blocked" class="blocked clearfix">
	<p style="font-size: calc(1em + ((0.4vw + 0.25vh) / 2));">
		<a href="<?= $book_url ?>">
			<img src="<?= $uploads_url ?>/2016/10/inclusive-design-pattners-250px.png" style="float:right;max-width: 25% !important;margin-left:1em;max-height:180px;margin-top: 0;">
		</a>
		Today, too many websites are still inaccessible. In our new book <em>Inclusive Design Patterns</em>, we explore how to craft <strong>flexible front-end design patterns</strong> and make <strong>future-proof and accessible interfaces without extra effort</strong>. Hardcover, 312 pages. <a href="<?= $book_url ?>">Get the book now →</a></p>
</div>

<?php
/** @TODO: Above is temporary */
return;
?>

<div id="blocked" class="blocked clearfix">
	<figure><a href="http://barcelona.smashingconf.com"><img src="<?= $images_url ?>/sidebar-smashingconf-barcelona.png" alt="Smashing Conf Barcelona 2016"></a></figure>
  <p><strong>We use ad-blockers as well, you know.</strong> We gotta keep those servers running though. Did you know that we publish <a href="<?= home_url('/books') ?>">useful books</a> and run <a href="<?= home_url('/smashing-workshops') ?>">friendly conferences</a> — crafted for pros like yourself? E.g. upcoming <a href="http://barcelona.smashingconf.com">SmashingConf Barcelona</a>, dedicated to smart front-end techniques and design patterns.</p>
</div>
