<?php //SVN: $Id: index.php 336830 2011-01-25 06:53:12Z imthiaz $ ?>
<?php get_header(); ?>
<div id="content">
	<?php if (have_posts()) : ?>
		<?php while (have_posts()) : the_post(); ?>
			<div class="post">
				<h2><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php echo sprintf(__('Permanent Link to %s','pda-theme'),the_title('','',FALSE)); ?>"><?php the_title(); ?></a></h2>
				<small><?php the_time(__('F jS, Y','pda-theme')) ?> <!-- <?php _e('by','pda-theme'); ?> <?php the_author() ?> --></small>
				<div class="entry">
					<?php the_excerpt(); ?>
				</div>
			</div>
			<p class="postmetadata">
				<?php _e('Posted in','pda-theme'); ?> <?php the_category(', ') ?> | <?php edit_post_link(__('Edit','pda-theme'), '', ' | '); ?>  <?php comments_popup_link(__('No Comments','pda-theme') . ' &#187;', __('1 Comment','pda-theme') . ' &#187;', __('% Comments','pda-theme') . ' &#187;'); ?>
			</p>
		<?php endwhile; ?>
		<div class="navigation">
			<?php next_posts_link('&laquo; ' . __('Previous Page','pda-theme')); ?>&nbsp;<?php previous_posts_link(__('Next Page','pda-theme') . ' &raquo;') ?>
		</div>
	<?php else : ?>
		<h2 class="center"><?php _e('Not Found','pda-theme'); ?></h2>
		<p class="center"><?php _e("Sorry, but you are looking for something that isn't here.",'pda-theme'); ?></p>
		<?php include (TEMPLATEPATH . "/searchform.php"); ?>
	<?php endif; ?>
</div>
<?php get_sidebar(); ?>
<?php get_footer(); ?>
