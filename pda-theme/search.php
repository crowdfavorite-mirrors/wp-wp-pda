<?php //SVN: $Id: search.php 336830 2011-01-25 06:53:12Z imthiaz $ ?>
<?php get_header(); ?>
<div id="content">
	<?php if (have_posts()) : ?>
		<div class="pagetitle"><?php _e('Search Results','pda-theme'); ?></div>
		<?php while (have_posts()) : the_post(); ?>
			<div class="post">
				<h3 id="post-<?php the_ID(); ?>"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php echo sprintf(__('Permanent Link to %s','pda-theme'),the_title('','',FALSE)); ?>"><?php the_title(); ?></a></h3>
				<small><?php the_time(__('l, F jS, Y','pda-theme')) ?></small>
				<div class="entry">
					<?php the_excerpt(); ?>
				</div>	
				<p class="postmetadata"><?php _e('Posted in', 'pda-theme'); print ' '; the_category(', '); ?> | <?php edit_post_link(__('Edit','pda-theme'), '', ' | '); ?>  <?php comments_popup_link(__('No Comments','pda-theme') . ' &#187;', __('1 Comment','pda-theme') . ' &#187;', __('% Comments','pda-theme') . ' &#187;'); ?></p>
			</div>
		<?php endwhile; ?>
		<div class="navigation">
			<?php next_posts_link('&laquo; ' . __('Previous Entries','pda-theme')) ?>&nbsp;<?php previous_posts_link(__('Next Entries','pda-theme') .' &raquo;') ?>
		</div>
	<?php else : ?>
		<h2 class="center"><?php _e('No posts found. Try a different search?','pda-theme'); ?></h2>
	<?php endif; ?>
</div>
<?php get_sidebar(); ?>
<?php get_footer(); ?>
