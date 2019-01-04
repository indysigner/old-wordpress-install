<?php
/**
 * Feature Name:    Comment Functions
 * Version:         0.1
 * Author:         Inpsyde GmbH, cb for Smashing Magazine
 * Author URI:      http://inpsyde.com/
 */


/**
 * Helper function to remove the url-field from comment-form
 *
 * @wp-hook comment_form_default_fields
 *
 * @param   array $fields
 *
 * @return  array
 */
function smash_filter_comment_form_default_fields( $fields ) {
	if ( isset( $fields[ 'url' ] ) ) {
		unset( $fields[ 'url' ] );
	}

	return $fields;
}


/**
 * Helper function to display the link "Jump to comments"
 *
 * @param   array $args
 *
 * @return  String
 */
function smash_get_jump_to_comments_link( Array $args = array() ) {

	$title = _x( 'Comment on %s', 'title in ' . __FUNCTION__, 'smashing' );

	$default_args = array(
		'link'               => '<a href="%1$s#comments" title="%2$s">%3$s</a> ',
		'title'              => sprintf( $title, get_the_title() ),
		'link_text_singular' => __( '%s Comment', 'smashing' ),
		'link_text_plural'   => __( '%s Comments', 'smashing' ),
		'before'             => '',
		'after'              => '',
	);
	$args         = wp_parse_args( $args, $default_args );

	$comment_count = get_comments_number();

	// preparing the text
	$link_text = _n( $args[ 'link_text_singular' ], $args[ 'link_text_plural' ], $comment_count );
	$link_text = sprintf( $link_text, $comment_count );

	if ( $args[ 'title' ] === '' ) {
		$args[ 'title' ] = $link_text;
	}

	$link = is_singular( ) ? '' : get_permalink();

	return sprintf( $args[ 'link' ], $link, $args[ 'title' ], $link_text );
}


/**
 * Custom-Comments Callback-Function
 *
 * @param       stdClass $comment
 * @param   array $args
 * @param   int $depth
 *
 * @return  Void
 */
function smash_the_comment( $comment, $args, $depth ) {

	$offset = (int) $args[ 'per_page' ] * ( (int) $args[ 'page' ] - 1 );
	if ( ! isset( $GLOBALS[ 'smash_comment_counter' ] ) ) {
		$GLOBALS[ 'smash_comment_counter' ] = 1;
	} else {
		$GLOBALS[ 'smash_comment_counter' ] = $offset + $GLOBALS[ 'smash_comment_counter' ] + 1;
	}
	$counter = $GLOBALS[ 'smash_comment_counter' ];

	$reply_args = wp_parse_args( $args, array(
		'reply_text' => __( 'Reply', 'smashing' ),
		'add_below'  => 'comment',
		'depth'      => $depth,
		'max_depth'  => $args[ 'max_depth' ]
	) );

	$comment_class = 'clearfix';
	?>
<li <?php comment_class( $comment_class ); ?>>
	<span class="cn"><?php echo $counter; ?></span>

	<div class="c" id="comment-<?php echo $comment->comment_ID; ?>">
		<div class="cau clearfix">
			<?php echo get_avatar( $comment->comment_author_email, '38' ); ?>
			<div class="aum">
				<h3><?php comment_author_link(); ?></h3>
				<span class="dati"><?php
					$link = get_permalink() . '#comment-' .$comment->comment_ID;
					$title = sprintf( __( 'Jump to Commentlink #%d', 'smashing' ), $counter );
					$text = get_comment_date() . ' ' . get_comment_time();
					printf(
						'<a href="%s" title="%s">%s</a>',
						$link,
						esc_attr( $title ),
						esc_html( $text )
					);
				?></span>
			</div>
		</div>
		<div class="ctx">
			<?php comment_text(); ?>
		</div>
		<div class="com">
			<div class="reply"><?php comment_reply_link( $reply_args ); ?></div>
			<?php do_action( 'inpsyde_extended_comments_rate' ); ?>
		</div>
	</div>
<?php
}
