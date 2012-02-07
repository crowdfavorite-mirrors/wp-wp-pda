<?php //SVN: $Id: page.php 337006 2011-01-25 13:34:58Z imthiaz $ ?>
<?php get_header(); ?>
    <?php if (have_posts()) : ?>
    <?php while (have_posts()) : the_post(); ?>
		<div data-role="content">
		    <h2><?php the_title(); ?></h2>
	    	<div class="content"><?php the_content(); ?></div>
			<p>
				<small>
					<?php echo sprintf(__('This entry was posted on %1$s at %2$s and is filled under:','pda-theme'), the_date(__('l, F jS, Y','pda-theme'), '', '', FALSE),get_the_time()) . " "; the_category(', ');?>
				</small>
			</p>
		</div>
	<?php endwhile; else: ?>
		<div data-role="content">
			<p class="center"><?php _e("Sorry, but you are looking for something that isn't here.",'pda-theme'); ?></p>
		</div>
	<?php endif; ?>
<?php get_footer(); ?>
