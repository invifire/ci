
	<div id="comments">
	<?php if ( post_password_required() ) : ?>
		<p class="nopassword"><?php _e( 'This post is password protected. Enter the password to view any comments.', 'flipbook' ); ?></p>
	</div><!-- #comments -->
	<?php
			/* Stop the rest of comments.php from being processed,
			 * but don't kill the script entirely -- we still have
			 * to fully load the template.
			 */
			return;
		endif;
	?>


	<?php if ( have_comments() ) : ?>
		<h2 id="comments-title" class="heading">
			<?php
				printf( _n( 'One comment', '%1$s comments', get_comments_number() ), number_format_i18n( get_comments_number() ));
			?>
		</h2>


		<ol class="commentlist">
			<?php wp_list_comments( array( 'callback' => 'comment_item' ) ); ?>
		</ol>

		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // are there comments to navigate through ?>
		<nav id="comment-nav-below">
			<div class="nav-previous"><?php previous_comments_link( __( '&larr; Older Comments', 'flipbook' ) ); ?></div>
			<div class="nav-next"><?php next_comments_link( __( 'Newer Comments &rarr;', 'flipbook' ) ); ?></div>
		</nav>
		<?php endif; // check for comment navigation ?>

	<?php
		/* If there are no comments and comments are closed, let's leave a little note, shall we?
		 * But we don't want the note on pages or post types that do not support comments.
		 */
		elseif ( ! comments_open() && ! is_page() && post_type_supports( get_post_type(), 'comments' ) ) :
	?>
		<p class="nocomments"><?php _e( 'Comments are closed.', 'flipbook' ); ?></p>
	<?php endif; ?>

	<?php theme_functions('comment_form'); ?>

</div><!-- #comments -->

<?php

function comment_item($comment, $args, $depth) {

	$GLOBALS['comment'] = $comment; 
?>
	<li <?php comment_class(); ?> id="li_comment_<?php comment_ID(); ?>">
    
			<div class="gravatar">
					<?php echo get_avatar($comment , $size='60'); ?>
                    <div class="reply">
						<?php comment_reply_link(array_merge( $args, array('reply_text' => __('Reply','flipbook'),'depth' => $depth))); ?>
					</div>
            </div>

			<div class="comment_content">
				<div class="comment_meta">
					<div class="comment_author"><?php comment_author_link(); ?><?php edit_comment_link(__('Edit', 'flipbook' ),'&nbsp;',''); ?></div>
                    <time><?php echo get_comment_date(' M j , Y , h:i'); ?></time>           
				</div>
				<div class="comment_text">
					<?php comment_text(); ?>
					<?php if ($comment->comment_approved == '0') : ?>
						<p><?php _e('Your comment is awaiting moderation!','flipbook') ?></p>
					<?php endif; ?>
				</div>

			</div>

<?php
}



?>
