<?php
/**
 * Page template with a tag cloud.
 *
 * Template Name: Page_TagCloud
 *
 * @package Smashing Magazine/Templates
 */

get_header();
?>
<h2>List of Tags</h2>

<?php
echo smash_get_tag_cloud(array('number'=> 150, 'smallest' => 1.2, 'largest' => 1.2, 'unit' => 'em'));
smash_the_pagination();
get_footer();