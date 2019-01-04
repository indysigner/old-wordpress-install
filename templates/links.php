<?php
/**
 * Page "Links" with custom bookmark links.
 *
 * Template Name: Links
 *
 * @package Smashing Magazine/Templates
 */

get_header();
?>
<div class="post">
    <div class="entry inner">
        <h2 id="not_found">
            <?php
            printf(
                __( '%s Links', 'smashing' ),
                get_bloginfo( 'name', 'display' )
            );
            ?>
            </h2>
        <p>We find a lot of cool things on the web. A lot of websites, resources, and inspiration. We've kept a list of them over the years, and thought you'd like to check them out.</p>
        <ul class="spaced">
            <?php wp_list_bookmarks('title_li=&categorize=0'); ?>
        </ul>
    </div>
</div>
</div>
<div id="rightcolumn" class="column">
</div>
<?php
get_footer();