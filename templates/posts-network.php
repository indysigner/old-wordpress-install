<?php
/**
 * Page template for network posts.
 *
 * Template Name: Page_PostsNetwork
 *
 * @package Smashing Magazine/Templates
 */

get_header(); ?>

<?php /*<!-- tpl: page_posts_network.php -->*/ ?>
<div class="post" style="padding-bottom:0;">
    <div class="entry">
        <h2>Smashing Network</h2>
        <p>The <a href="/the-smashing-network/" title="Learn more about the Smashing Network!">Smashing Network</a> was founded in November 2009 and features manually selected articles from the best design blogs. The network tab (on the top of the page) is updated several times a day. There is also a <a href="<?php echo home_url( '/feed/?f=smashing-network' ); ?>">Network RSS feed</a>.</p>
    </div>
</div>
<div class="subtab-pages">
    <div id="all-network-entrys">

        <?php

        $count = 0;
        $post_args = array(
	        'order'     => 'DESC',
	        'orderby'   => 'date',
	        'showposts' => AMOUNT_POSTS_NETWORK_PER_PAGE,
	        'cat'       => 883
        );
        $wp_query = new WP_Query( $post_args );

        if( $wp_query->have_posts() ) : while( $wp_query->have_posts() ) : $wp_query->the_post(); ?>

        <div <?php post_class(); ?>>
            <div class="pt">
                <p><a href="<?php the_permalink(); ?>" rel="image" class="post-image"><?php echo get_the_post_thumbnail($post->ID, 'thumbnail' ); ?></a></p>
            </div>

            <div class="entry">
                <h2><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
                <ul class="pmd">
                    <li class="a">From <a href="/author/<?php echo get_the_author_meta('user_nicename')?>"><?php the_title();?></a></li>
                    <li class="rm-border"><?php the_time('F jS, Y') ?></li>
                </ul>
	            <p><?php echo get_the_excerpt(); ?> <a class="cr" href="<?php the_permalink(); ?>">Read more...</a></p>
            </div>
        </div>

                <?php
                if(defined('AD_HOMEPAGE_PREMIUM_ADTARGET_POSITION') && is_int(AD_HOMEPAGE_PREMIUM_ADTARGET_POSITION) && $count === AD_HOMEPAGE_PREMIUM_ADTARGET_POSITION-1)
                {
                    //print('<div class="ed hpad"><span class="declare">Advertisement</span><span class="awithus"><a class="sprite ed-us" title="Advertise with us!" href="mailto:&#97;&#100;&#118;&#101;&#114;&#116;&#105;&#115;&#105;&#110;&#103;&#64;&#115;&#109;&#97;&#115;&#104;&#105;&#110;&#103;&#109;&#97;&#103;&#97;&#122;&#105;&#110;&#101;&#46;&#99;&#111;&#109;">Advertise with us!</a></span><div id="homepagepremedtarget"></div></div>');
                }
                $count++;
            endwhile;
        endif;
        wp_reset_query();
        ?>
        <?php smash_the_pagination( ); ?>


    </div><?php /*<!-- /#all-network-entrys -->*/ ?>

</div><?php /*<!-- /.subtab-pages -->*/ ?>

<?php
get_footer();