<?php
/**
 * Page template for custom google-search results. This template replaces the search.php
 *
 * Template Name: Page_Search
 *
 * @package Smashing Magazine/Templates
 */

get_header(); ?>

<article <?php post_class(); ?>>
    <h2><?php _e( 'Search Results', 'smashing' ); ?></h2>
    <div id="cse-search-results"></div>
    <script>(function(){var a="010521519489695173737:7dgwtbiirey";var c=document.createElement("script");c.type="text/javascript";c.async=true;c.src=(document.location.protocol=="https:"?"https:":"http:")+"//cse.google.com/cse.js?cx="+a;var b=document.getElementsByTagName("script")[0];b.parentNode.insertBefore(c,b)})();</script>
    <gcse:search></gcse:search>
</article>

<?php get_footer(); ?>