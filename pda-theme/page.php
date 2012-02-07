<?php //SVN: $Id: page.php 336830 2011-01-25 06:53:12Z imthiaz $ ?>
<?php get_header(); ?>
<div id="content">
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		<div class="post" id="post-<?php the_ID(); ?>">
		<h2><?php the_title(); ?></h2>
			<div class="entrytext">
				<?php the_content('<p class="serif">' . __('Read the rest of this page','pda-theme') . ' &raquo;</p>'); ?>
				<?php link_pages('<p><strong>' . __('Pages:','pda-theme') . '</strong>' , '</p>', __('number','pda-theme')); ?>
			</div>
		</div>
	  <?php endwhile; endif; ?>
</div>
<?php get_sidebar(); ?>
<?php get_footer(); ?>
