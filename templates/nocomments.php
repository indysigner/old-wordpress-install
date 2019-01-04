<?php
/**
 * Page template without comments.
 *
 * Template Name: Page_NoComments
 *
 * @package Smashing Magazine/Templates
 */

get_header();
?>
<article class="post">
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
    <h2><?php the_title(); ?></h2>
    <ul class="pmd clearfix">
        <li class="a">By <?php the_author_posts_link(); ?></li>
        <li><?php the_time('F jS, Y') ?></li>
        <li>
	<?php
		$posttags = get_the_tags();
		if(!empty($posttags))
		{
			$posttaglist = array();
			$count=0;
			  foreach($posttags as $key => $tag)
			  {
				  $count++;
				  if ($count < 3)
				  {
				  	if(!empty($tag->name))
					{
						$posttaglist[] = '<a href="' . get_blog_option( 2, 'home' ) . '/tag/'.$tag->slug.'/">'.ucfirst($tag->name).'</a>';
					}
				}
			  }
			echo implode(', ',$posttaglist);
		}else{
			the_category(', ');
		}
	?>
	</li>
    </ul>
    <div class="entry inner">
                <?php the_content('<p class="serif">Read the rest of this page &raquo;</p>'); ?>
                <?php wp_link_pages(array('before' => '<p><strong>Pages:</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>
    </div>
    <?php endwhile;
endif; ?>
</article>
<?php
get_footer();