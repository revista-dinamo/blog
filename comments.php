<div id="comments">
	<?php
		$req = get_option('require_name_email'); // Checks if fields are required.
		if ( 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']) ) die ( 'Please do not load this page directly. Thanks!' );
		if ( ! empty($post->post_password) ) {
			if ( $_COOKIE['wp-postpass_' . COOKIEHASH] != $post->post_password ) {
	?>
	<div class="nopassword">
		<?php _e('This post is password protected. Enter the password to view any comments.', 'your-theme') ?>
	</div>
</div><!– #comments –>
	<?php
				return;
			}
		} 
	?>

	<?php /* See IF there are comments and do the comments stuff! */ ?>      
	<?php if ( have_comments() ) { ?>

	<?php /* Count the number of comments and trackbacks (or pings) */
	$ping_count = $comment_count = 0;

	foreach ( $comments as $comment ) {
		if (get_comment_type() == "comment") { 
			++$comment_count; 
		} else { 
			++$ping_count; 
		}
	}
	?>

	<?php /* IF there are comments, show the comments */ ?>
	<?php if ( ! empty($comments_by_type['comment']) ) { ?>
	<div id="comments-list" class="comments">

		<h3>
			<?php 
			if ($comment_count > 1 ) { 
				_e('<span>' . $comment_count . '</span> Comments', 'your-theme');
			} else { 
				_e('<span>One</span> Comment', 'your-theme');
			} 
			?>
		</h3>

		<?php /* If there are enough comments, build the comment navigation  */ ?>    
		<?php $total_pages = get_comment_pages_count(); ?> 
		
		<?php if ( $total_pages > 1 ) { ?>
		<div id="comments-nav-above" class="comments-navigation">
			<div class="paginated-comments-links">
				<?php paginate_comments_links(); ?>
			</div>
		</div>    
		<?php } ?>    

		<ol>
			<?php wp_list_comments('type=comment&callback=custom_comments'); ?>
		</ol>

		<?php if ( $total_pages > 1 ) { ?>    
		<div id="comments-nav-below" class="comments-navigation">
			<div class="paginated-comments-links">
				<?php paginate_comments_links(); ?>
			</div>
		</div>
		<?php } ?>    

	</div>
	<?php } ?>

	<?php /* If there are trackbacks(pings), show the trackbacks  */ ?>
	<?php if ( ! empty($comments_by_type['pings']) ) { ?>
	<div id="trackbacks-list" class="comments">

		<h3>
			<?php 
			if ($ping_count > 1 ) { 
				_e('<span>' . $ping_count . '</span> Trackbacks', 'your-theme');
			} else { 
				_e('<span>One</span> Trackback', 'your-theme');
			} 
			?>
		</h3>

		<ol>
			<?php wp_list_comments('type=pings&callback=custom_pings'); ?>
		</ol>    

	</div>  
	<?php } ?>

	<?php } /* if ( have_comments() ) */ ?>


	<?php /* If comments are open, build the respond form */ ?>
	<?php if ( 'open' == $post->comment_status ) { ?>
	<div id="respond">

		<h3><?php comment_form_title( __('Post a Comment', 'your-theme'), __('Post a Reply to %s', 'your-theme') ); ?></h3>

		<div id="cancel-comment-reply"><?php cancel_comment_reply_link() ?></div>

		<?php if ( get_option('comment_registration') && !$user_ID ) { ?>

		<p id="login-req">
			<?php printf(__('You must be <a href="%s" title="Log in">logged in</a> to post a comment.', 'your-theme'), get_option('siteurl') . '/wp-login.php?redirect_to=' . get_permalink() ) ?>
		</p>

		<?php } else { /* if ! ( get_option('comment_registration') && !$user_ID ) */ ?>

		<div class="formcontainer">
			<form id="commentform" action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post">

				<?php if ( $user_ID ) { ?>

				<p id="login">
					<span class="loggedin"><?php _e('Logged in as <a href="' . get_option('siteurl') . '" title="Logged in as ' . wp_specialchars($user_identity, true) . '">' . wp_specialchars($user_identity, true) . '</a>', 'your-theme'); ?>.</span>
					<span class="logout"><?php _e('<a href="' . wp_logout_url(get_permalink()) . '" title="Log out of this account">Log out?</a></span>', 'your-theme'); ?></span>
				</p>
				
				<?php } else { /* if ! ( $user_ID ) */ ?>

				<p id="comment-notes">
					<?php _e('Your email is <em>never</em> published nor shared.', 'your-theme') ?> <?php if ($req) _e('Required fields are marked <span class="required">*</span>', 'your-theme') ?>
				</p>

				<div id="form-section-author" class="form-section">
					<div class="form-label">
						<label for="author"><?php _e('Name', 'your-theme') ?></label> <?php if ($req) _e('<span class="required">*</span>', 'your-theme') ?>
					</div>
					<div class="form-input">
						<input id="author" name="author" type="text" value="<?php echo $comment_author ?>" size="30" maxlength="20" tabindex="3" />
					</div>
				</div>

				<div id="form-section-email" class="form-section">
					<div class="form-label">
						<label for="email"><?php _e('Email', 'your-theme') ?></label> <?php if ($req) _e('<span class="required">*</span>', 'your-theme') ?>
					</div>
					<div class="form-input">
						<input id="email" name="email" type="text" value="<?php echo $comment_author_email ?>" size="30" maxlength="50" tabindex="4" />
					</div>
				</div>

				<div id="form-section-url" class="form-section">
					<div class="form-label">
						<label for="url"><?php _e('Website', 'your-theme') ?></label>
					</div>
					<div class="form-input">
						<input id="url" name="url" type="text" value="<?php echo $comment_author_url ?>" size="30" maxlength="50" tabindex="5" />
					</div>
				</div>

				<?php } /* if ( $user_ID ) */ ?>

				<div id="form-section-comment" class="form-section">
					<div class="form-label">
						<label for="comment"><?php _e('Comment', 'your-theme') ?></label>
					</div>
					<div class="form-textarea">
						<textarea id="comment" name="comment" cols="45" rows="8" tabindex="6"></textarea>
					</div>
				</div>

				</br>
				<?php /*
				<div id="form-allowed-tags" class="form-section">
					<p>
						<span><?php _e('You may use these <abbr title="HyperText Markup Language">HTML</abbr> tags and attributes:', 'your-theme') ?></span>
						<code><?=allowed_tags()?></code>
					</p>
				</div>
				*/ ?>
				</br>

				<?php do_action('comment_form', $post->ID); ?>

				<div class="form-submit">
					</br>
					<input id="submit" name="submit" type="submit" value="<?php _e('Post Comment', 'your-theme') ?>" tabindex="7" />
					<input type="hidden" name="comment_post_ID" value="<?php echo $id; ?>" />
				</div>

				<?php comment_id_fields(); ?>  

			</form>          
		</div>

		<?php } /* if ( get_option('comment_registration') && !$user_ID ) */ ?>

	</div><!– #respond –>
	<?php } /* if ( 'open' == $post->comment_status ) */ ?>

</div><!– #comments –>
