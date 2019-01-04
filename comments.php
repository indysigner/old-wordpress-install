<?php
/**
 * Comments template.
 *
 * Added to single posts and pages and to custom post types with comment support.
 *
 * @package Smashing Magazine
 */

if ( post_password_required() ) : ?>
	<p class="nocomments">
		<?php _e( 'This post is password protected. Enter the password to view comments.', 'smashing' ); ?>
	</p>
	<?php return;
endif;

$empty         = __( '0 Comments', 'smashing' );
$singular      = __( '1 Comment', 'smashing' );
$plural        = __( '% Comments', 'smashing' );
$best_comments = __( 'Best Comments', 'smashing' );

get_template_part( 'parts/ad/single', 'comment' );
?>

<ul id="comments" class="sub-tabs clearfix">
	<li><a href="#show-comments" class="active"><?php comments_number( $empty, $singular, $plural ); ?></a></li>
	<?php if ( have_comments() && class_exists( 'Inpsyde\ExtendedComments\Core' ) ) : ?>
		<li><a href="#best-comments"><?php comments_number( $best_comments, $best_comments, $best_comments ); ?></a>
		</li>
	<?php endif; ?>
</ul>
<div id="discussion" class="subtab-pages discussion">
	<div id="show-comments">
		<?php if ( have_comments() ) : ?>
			<?php get_template_part( 'parts/comment', 'commentlist' ); ?>
		<?php else : ?>
			<?php if ( comments_open() ) : ?>
				<ol id="cs" class="cl">
					<li><span class="cn">00</span>
						<div class="c">
							<p>
								<?php _e(
									'No comments have been posted yet. Please feel free to <a href="#respond">comment first</a>!',
									'smashing'
								); ?>
								<br/>
								<em>
									<?php _e(
										'Note: Make sure your comment is related to the topic of the article above. Let\'s start a personal and meaningful conversation!',
										'smashing'
									); ?>
								</em>
							</p>
						</div>
					</li>
				</ol>
			<?php else : // comments are closed ?>
				<p class="nc"><?php _e( 'Comments are closed.', 'smashing' ); ?></p>
			<?php endif; ?>
		<?php endif; ?>
	</div>
	<?php if ( have_comments() && class_exists( 'Inpsyde\ExtendedComments\Core' ) ) : ?>
		<?php get_template_part( 'parts/comment', 'best' ); ?>
	<?php endif; ?>
</div>

<?php if ( ! comments_open() ) : ?>
	<?php return; ?>
<?php endif; ?>

<?php if ( get_option( 'comment_registration' ) && ! is_user_logged_in() ) : ?>
	<h3><?php _e( 'Leave a Comment', 'smashing' ); ?></h3>
	<p>
		<?php
		$msg = __( 'You must be <a href="%s">logged in</a> to post a comment.', 'smashing' );
		$url = wp_login_url( get_permalink() );
		printf( $msg, $url );
		?>
	</p>
<?php else : ?>
	<?php
	$author = '<div class="clearfix">';
	$author .= '<p class="input-half">';
	$author .= '<label for="comment_author">' . __( 'Your name', 'smashing' ) . '</label>';
	$author .= '<input type="text" name="author" id="comment_author" value="' . esc_attr(
			$comment_author
		) . '" class="input" required />';
	$author .= '</p>';
	$author .= '</div>';

	$email = '<div class="clearfix">';
	$email .= '<p class="input-half">';
	$email .= '<label for="email">' . __( 'Your email', 'smashing' ) . '</label>';
	$email .= '<input type="text" name="email" id="email" value="' . esc_attr(
			$comment_author_email
		) . '" class="input" required />';
	$email .= '</p>';
	$email .= '</div>';

	$fields            = array(
		'author' => $author,
		'email'  => $email,
	);
	$cancel_reply_link = get_cancel_comment_reply_link( __( 'Click here to cancel reply.', 'smashing' ) );

	$comment_field = '';
	$comment_field .= '<div class="ccr right"><small>' . $cancel_reply_link . '</small></div>';
	$comment_field .= '<label for="comment">' . __( 'Your message', 'smashing' ) . '</label>';
	$comment_field .= '<p>You may use simple HTML to add links or lists to your comment. Also, use <code>&lt;pre>&lt;code class="language-*">...&lt;/code>&lt;/pre></code> to mark up code snippets. We support -js, -markup and -css for comments.</p>';
	$comment_field .= '<textarea name="comment" id="comment" rows="10" class="input textarea" required></textarea>';

	$title_after = '<p>' . __(
			'Yay! You\'ve decided to leave a comment. That\'s fantastic! Please keep in mind that <strong>all fields are mandatory</strong>, comments are moderated and <code>rel="nofollow"</code> is in use. So, please do not use a spammy keyword or a domain as your name, or else it will be deleted. Let\'s have a personal and meaningful conversation instead. Thanks for dropping by!',
			'smashing'
		) . '</p>';

	$comments_args = array(
		'fields'               => $fields,
		'comment_field'        => $comment_field,
		'title_reply'          => __( 'Leave a Comment', 'smashing' ),
		'title_reply_to'       => __( 'Leave a Reply to %s', 'smashing' ),
		'title_after'          => $title_after,
		'comment_notes_before' => '',
		'comment_notes_after'  => '',
		'label_submit'         => 'Submit Comment',
		'cancel_reply_link'    => ''
	);
	comment_form( $comments_args );
	?>
<?php endif; ?>

