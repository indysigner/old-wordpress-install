<?php
/**
 * Product sidebar template
 *
 * @package Smashing Magazine/Parts/Sidebar
 */

$images_url = trailingslashit( get_template_directory_uri() ) . 'assets/images';

$books_url = untrailingslashit( home_url('/books') );

$book_url     = home_url( '/2015/03/31/real-life-responsive-web-design-smashing-book-5/' );

$campaign_url = add_query_arg(
	[
		'utm_source'   => 'magazine',
		'utm_medium'   => 'sidebar-ad',
		'utm_campaign' => 'sb5'
	],
	$book_url
);

$inclusive_book_url = home_url('/inclusive-design-patterns');

?>
<section class="so wg">
	<div class="fir">
		<a href="<?= $campaign_url ?>" style="border:0;">
			<img src="<?= $images_url ?>/sidebar-sb5.png" alt="The Smashing Book #5" width="94" height="135">
		</a>
		<p>
			Smashing Book 5: "Real-Life Responsive Web Design", our playbook to master all the tricky facets and hurdles of <strong>responsive web design</strong>. Gorgeous hardcover with 584 pages. The eBook is included. Free worldwide shipping. <a href="<?= $campaign_url ?>">Get your book now!</a>
		</p>
	</div>
	<div class="sec">
		<a href="<?= $inclusive_book_url ?>" style="border: 0;">
			<img src="<?= $images_url ?>/inclusive-design-patterns.png" alt="Inclusive Design Patterns by Heydon Pickering" width="94" height="135">
		</a>
		<p>
			Today, too many websites are still inaccessible. In our new book <em>Inclusive Design Patterns</em>, we explore how to craft <strong>flexible front-end design patterns</strong> and make future-proof and accessible interfaces without extra effort. Hardcover, 312 pages. <a href="<?= $inclusive_book_url ?>">Get the book →</a>
		</p>
	</div>
	<div class="thi">
		<a href="<?= $books_url ?>/#hardboiled-webdesign" style="border:0;">
			<img src="<?= $images_url ?>/hardboiled-web-design-left.png" alt="Hardboiled Web Design by Andy Clarke" width="94" height="135"></a>
		<p>
			With responsive design, creating Photoshop mock-ups is just inefficient. In the new anniversary edition of <a href="<?= $books_url ?>/#hardboiled-webdesign">Hardboiled Web Design</a>,&nbsp;Andy Clarke shows how to improve workflow, craft better front-end, establish style guides and reduce wasted time. <a href="<?= $books_url ?>/#hardboiled-webdesign">Get the book</a>.
		</p>
	</div>

</section>

<?php
/** TODO: the above widget is temporary */
return;
?>

<section class="so wg">
	<div class="fir">
		<a href="<?php echo $book_url; ?>">
			<img src="<?php echo home_url( 'wp-content/themes/smashing-magazine/assets/images/sidebar-sb5.png' ); ?>" alt="The Smashing Book #5" width="94" height="135" /></a>
		<p>It's finally here. <a href="<?php echo $book_url; ?>">Smashing Book #5</a>, our new book on <strong>real-life responsive design</strong>. With front-end techniques and patterns from actual projects, it's a playbook to master all the tricky facets and hurdles of responsive design.
			<a href="<?php echo $book_url; ?>">Get the book.</a> <strong>Free shipping.</strong></p>
	</div>
	<div class="sec">
		<a href="<?php echo home_url( '/books/#inclusive-design-patterns' ); ?>">
			<img src="<?php echo home_url( 'wp-content/themes/smashing-magazine/assets/images/inclusive-design-patterns.png' ); ?>" alt="Inclusive Design Patterns by Heydon Pickering" width="94" height="135" /></a>
		<p>We build inaccessible websites all the time, but it’s not for the lack of care or talent. It’s a matter of <strong>doing things the wrong way</strong>. That’s why we're writing a new book on <a href="https://www.smashingmagazine.com/books/#inclusive-design-patterns">Inclusive Design Patterns</a>, by Heydon Pickering. Available from September. <a href="<?php echo home_url( '/books/#get-inclusive-design-patterns' ); ?>">Pre-order the book today.</a></p>
	</div>
	<div class="thi">
		<a href="<?php echo home_url( '/books/#hardboiled-webdesign' ); ?>">
			<img src="<?php echo home_url( 'wp-content/themes/smashing-magazine/assets/images/hardboiled-web-design-left.png' ); ?>" alt="Hardboiled Web Design by Andy Clarke" width="94" height="135" /></a>
		<p>With responsive design, creating Photoshop mock-ups is just inefficient. In the new anniversary edition of
			<a href="<?php echo home_url( '/books/#hardboiled-webdesign' ); ?>">Hardboiled Web Design</a>,&nbsp;Andy Clarke shows how to improve workflow, craft better front-end, establish style guides and reduce wasted time. <a href="<?php echo home_url( '/books/#hardboiled-webdesign' ); ?>">Get the book</a>.</p>
	</div>
</section>
