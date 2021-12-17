<?php

// Do not delete these lines
if (!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
	die ('Please do not load this page directly. Thanks!');

if ( post_password_required() ) {
	?> <p>Password</p> <?php
	return;
}
	
function theme_comment($comment, $args, $depth) {
	$GLOBALS['comment'] = $comment; ?>
	
	<li>
		<div <?php comment_class(); ?> id="comment-<?php comment_ID(); ?>">
			
			<p class="meta"><?php comment_date('F d, Y'); ?> в <?php comment_time('H:i'); ?>, <?php comment_author_link(); ?> sais:</p>
			<?php if ($comment->comment_approved == '0') : ?>
			<p>Moderation</p>
			<?php else: ?>
			<?php comment_text(); ?>
			<?php endif; ?>
			
			<?php
				comment_reply_link(array_merge( $args, array(
					'reply_text' => 'Reply',
					'before' => '<p>',
					'after' => '</p>',
					'depth' => $depth,
					'max_depth' => $args['max_depth']
				))); ?>
		</div>
	<?php }
	
	function theme_comment_end() { ?>
		</li>
	<?php }
?>

<?php if ( have_comments() ) : ?>
<h1 class="space" id="comments"><?php comments_number( '0', '1', '%' ); ?> Responses to <span class="normal">"<?php the_title();?>"</span></h1>
<div class="section comments" id="comments">

	<ol class="commentlist">
		<?php /*wp_list_comments(array(
			'callback' => 'theme_comment',
			'end-callback' => 'theme_comment_end'
			)); */?>
		<?php wp_list_comments( 'type=comment&callback=mytheme_comment' ); ?>
	</ol>
	

	<div class="navigation">
		<div class="next"><?php previous_comments_link('&laquo; Older commments') ?></div>
		<div class="prev"><?php next_comments_link('Newest comments &raquo;') ?></div>
	</div>

</div>

 <?php else : // this is displayed if there are no comments so far ?>

	<?php if ( comments_open() ) : ?>
		<!-- If comments are open, but there are no comments. -->

	 <?php else : // comments are closed ?>
		<!-- If comments are closed. -->

	<?php endif; ?>
	
<?php endif; ?>


<?php if ( comments_open() ) : ?>


<div class="section respond" id="respond">
	<h1><?php comment_form_title( 'LEAVE A REPLY', 'LEAVE A REPLY %s' ); ?></h1>
	<div class="cancel-comment-reply">
		<small><?php cancel_comment_reply_link(); ?></small>
	</div>

	<form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">
		
			<?php if ( get_option('comment_registration') && !is_user_logged_in() ) : ?>
				<p> <a href="<?php echo wp_login_url( get_permalink() ); ?>">login</a></p>
			<?php else : ?>
			
			<?php if ( is_user_logged_in() ) : ?>

			<p class="field"><a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a>. 
			<p class="field">
				<span>
					<textarea style="background: none;" name="comment" id="comment" cols="70%" rows="10"></textarea>
				</span>
			</p>
			
			<?php else : ?>
			
			<p class="field">
				<label for="author">Name <small>(required)</small></label>
				<input type="text" name="author" id="author" value="<?php echo esc_attr($comment_author); ?>" size="22" tabindex="1" aria-required="true">
			</p>
			<p class="field"><label for="email">Mail <small>(will not be published) (required)</small></label><input type="text" name="email" id="email" value="<?php echo esc_attr($comment_author_email); ?>" size="22" tabindex="2" aria-required="true"></p>
			<p><label for="comment">Message</label><textarea name="comment" id="comment" cols="58" rows="10" tabindex="4"></textarea></p>
				
			<?php endif; ?>
			<p>
				<input name="submit" type="submit" id="submit" tabindex="5" value="Submit Comment">
				<input type="hidden" name="comment_parent" id="comment_parent" value="0">
			</p>
			
			
			<?php
				comment_id_fields();
				do_action('comment_form', $post->ID);
			?>
			
			<?php endif; ?>

		
	</form>
</div>






<br><br><br>
<?php endif; ?>