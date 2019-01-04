<?php
/**
 * Page template "thank you" which will be shown after successfully confirming the contact form.
 *
 * Template Name: Page_ThankYou
 *
 * @package Smashing Magazine/Templates
 */

get_header();
?>
<article class="post">
	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
		<h2><?php the_title(); ?></h2>
		<ul class="pmd clearfix">
			<li class="a">By <?php the_author_posts_link(); ?></li>
			<li>
				<?php
				$posttags = get_the_tags();
				if ( ! empty( $posttags ) ) :
					$posttaglist = array();
					$count       = 0;
					foreach ( $posttags as $key => $tag ) :
						$count ++;
						if ( $count < 3 ) :
							if ( ! empty( $tag->name ) ) :
								$posttaglist[ ] = '<a href="http://www.smashingmagazine.com/tag/' . $tag->slug . '/">' . ucfirst( $tag->name ) . '</a>';
							endif;
						endif;
					endforeach;
					echo implode( ', ', $posttaglist );
				else :
					the_category( ', ' );
				endif;
				?>
			</li>
		</ul>
		<div class="entry inner">
			<?php the_content( '<p class="serif">Read the rest of this page &raquo;</p>' ); ?>
			<?php
			$link_pages_args =  array(
				'before'         => '<p><strong>Pages:</strong> ',
				'after'          => '</p>',
				'next_or_number' => 'number'
			);
			wp_link_pages( $link_pages_args ); ?>
		</div>
	<?php endwhile;
	endif; ?>
	<img src="http://media.smashingmagazine.com/themes/smashingv4/assets/images/thank_you.png" class="thank-you-image" alt="Thank You!" width="500" height="259" />
</article>
<?php get_sidebar();
get_footer(); ?>
