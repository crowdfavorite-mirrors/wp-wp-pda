<?php //SVN: $Id: comments.php 336830 2011-01-25 06:53:12Z imthiaz $ ?>
<?php 
// Do not delete these lines
	if ('comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
		die (__('Please do not load this page directly. Thanks!','pda-theme'));
        if (!empty($post->post_password)) { // if there's a password
            if ($_COOKIE['wp-postpass_' . COOKIEHASH] != $post->post_password) {  // and it doesn't match the cookie
				?>
				<p class="nocomments"><?php _e('This post is password protected. Enter the password to view comments.','pda-theme'); ?><p>
				<?php
				return;
            }
        }
		/* This variable is for alternating comment background */
		$oddcomment = 'alt';
?>
<!-- You can start editing here. -->
<?php if ($comments) : ?>
	<h3 id="comments"><?php comments_number(__('No Responses','pda-theme'), __('One Response','pda-theme'), __('% Responses','pda-theme')); print(' '); print(__('to','pda-theme')); print(' &#8220'); the_title(); ?>&#8221;</h3> 
	<ol class="commentlist">
	<?php foreach ($comments as $comment) : ?>
		<li class="<?php echo $oddcomment; ?>" id="comment-<?php comment_ID() ?>">
			<cite><?php comment_author_link() ?></cite> <?php _e('Says:','pda-theme'); ?>
			<?php if ($comment->comment_approved == '0') : ?>
			<em><?php _e('Your comment is awaiting moderation.','pda-theme'); ?></em>
			<?php endif; ?>
			<br />
			<small class="commentmetadata"><a href="#comment-<?php comment_ID() ?>" title=""><?php comment_date(__('F jS, Y','pda-theme')); print" "; _e('at','pda-theme'); print " "; comment_time() ?></a> <?php edit_comment_link('e','',''); ?></small>
			<?php comment_text() ?>
		</li>
	<?php /* Changes every other comment to a different class */	
		if ('alt' == $oddcomment) $oddcomment = '';
		else $oddcomment = 'alt';
	?>
	<?php endforeach; /* end for each comment */ ?>
	</ol>
 <?php else : // this is displayed if there are no comments so far ?>
  <?php if ('open' == $post->comment_status) : ?> 
		<!-- If comments are open, but there are no comments. -->
	 <?php else : // comments are closed ?>
		<!-- If comments are closed. -->
		<p class="nocomments"><?php _e('Comments are closed.','pda-theme'); ?></p>
	<?php endif; ?>
<?php endif; ?>
<?php if ('open' == $post->comment_status) : ?>
<h3 id="respond"><?php _e('Leave a Reply','pda-theme'); ?></h3>
<?php if ( get_option('comment_registration') && !$user_ID ) : ?>
<?php echo sprintf("You must be %slogged in%s to post a comment.", "<a href=\"" . get_option('siteurl') . "/wp-login.php?redirect_to=" . get_permalink() . "\">", "</a>"); ?>
<?php else : ?>
<form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">
<?php if ( $user_ID ) : ?>
<p><?php _e('Logged in as','pda-theme'); ?> <a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a>. <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?action=logout" title="<?php _e('Log out of this account','pda-theme'); ?>"><?php _e('Logout','pda-theme'); ?> &raquo;</a></p>
<?php else : ?>
<p><input type="text" name="author" id="author" value="<?php echo $comment_author; ?>" size="22" tabindex="1" />
<label for="author"><small><?php _e('Name','pda-theme'); ?> <?php if ($req) echo "(" . __('required','pda-theme') . ")"; ?></small></label></p>
<p><input type="text" name="email" id="email" value="<?php echo $comment_author_email; ?>" size="22" tabindex="2" />
<label for="email"><small><?php _e('Mail (will not be published)','pda-theme'); ?> <?php if ($req) echo "(" . __('required','pda-theme') . ")"; ?></small></label></p>
<p><input type="text" name="url" id="url" value="<?php echo $comment_author_url; ?>" size="22" tabindex="3" />
<label for="url"><small><?php _e('Website','pda-theme'); ?></small></label></p>
<?php endif; ?>
<!--<p><small><strong>XHTML:</strong> <?php _e('You can use these tags:','pda-theme'); ?> <?php echo allowed_tags(); ?></small></p>-->
<p><textarea name="comment" id="comment" cols="100%" rows="10" tabindex="4"></textarea></p>
<p><input name="submit" type="submit" id="submit" tabindex="5" value="<?php _e('Submit Comment','pda-theme'); ?>" />
<input type="hidden" name="comment_post_ID" value="<?php echo $id; ?>" />
</p>
<?php do_action('comment_form', $post->ID); ?>
</form>
<?php endif; // If registration required and not logged in ?>
<?php endif; // if you delete this the sky will fall on your head ?>
