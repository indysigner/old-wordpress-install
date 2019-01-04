<?php
/**
 * Best Comments list template
 *
 * @package Smashing Magazine/Parts
 */
?>
<div id="best-comments" class="subtab-pages">
  <ol id="ratedcomments-overview" class="cl">
    <?php
    $comment_args = array(
      'orderby' => 'comment_karma',
      'order'   => 'DESC',
      'type'    => 'comment'
    );
    $comments     = get_comments( $comment_args );
    $list_comment_args = array(
      'type'      => 'comment',
      'callback'  => 'smash_the_comment',
      'max_depth' => 1
    );
    wp_list_comments( $list_comment_args, $comments );
    ?>
  </ol>
</div>