<?php //SVN: $Id: single.php 336830 2011-01-25 06:53:12Z imthiaz $ ?>
<?php get_header(); ?>
<div id="content">
  <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		<div class="post" id="post-<?php the_ID(); ?>">
			<h2><a href="<?php echo get_permalink() ?>" rel="bookmark" title="<?php echo sprintf(__('Permanent Link to %s','pda-theme'),the_title('','',FALSE)); ?>"><?php the_title(); ?></a></h2>
			<div class="entry">
				<?php the_content('<p class="serif">' . __('Read the rest of this entry','pda-theme') . ' &raquo;</p>'); ?>
				<?php link_pages('<p><strong>Pages:</strong> ', '</p>', __('number','pda-theme')); ?>
			</div>
			<br clear="all" />
			<p class="postmetadata">
				<?php echo sprintf(__('This entry was posted on %1$s at %2$s and is filled under:','pda-theme'), the_date(__('l, F jS, Y','pda-theme'), '', '', FALSE),get_the_time()) . " "; the_category(', ');?>
				<?php the_tags(__('Tags: ','pda-theme'), ', ', ''); ?>
			</p>
		</div>
	<?php comments_template(); ?>
	<div class="navigation">
		<?php previous_post_link('&laquo; %link') ?>&nbsp;<?php next_post_link('%link &raquo;') ?>
	</div>
	<?php endwhile; else: ?>
		<p><?php _e('Sorry, no posts matched your criteria.','pda-theme'); ?></p>
	<?php endif; ?>
</div>
<?php get_sidebar(); ?>
<?php get_footer(); ?>
