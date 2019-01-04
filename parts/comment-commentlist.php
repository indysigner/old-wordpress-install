<?php
/**
 * Comments list template
 *
 * @package Smashing Magazine/Parts
 */
?>
<ol id="comments-overview" class="cl">
  <?php
  $list_comment_args = array(
    'type'      => 'comment',
    'callback'  => 'smash_the_comment',
    'max_depth' => 5
  );
  wp_list_comments( $list_comment_args );
  ?>
</ol>
<?php
$links = paginate_comments_links( 'type=array&echo=0' );
if ( $links ) :
  ?>
  <div class="pgn clearfix">
    <div class="prv"><?php previous_comments_link( '&laquo; Previous', 0 ); ?></div>
    <div class="pgs clearfix">
      <?php
      for ( $i = 1; $i < count( $links ) - 1; $i ++ ) :
        echo $links[ $i ];
      endfor;
      ?>
    </div>
    <div class="nxt"><?php next_comments_link( 'Next &raquo;', 0 ); ?></div>
  </div>
  <br />
<?php endif;