<?php //SVN: $Id: 404.php 336830 2011-01-25 06:53:12Z imthiaz $ ?>
<?php get_header(); ?>
<div id="content">
	<h2 class="center"><?php _e('Error 404 - Not Found','pda-theme'); ?></h2>
	<p class="center"><?php _e("Sorry, but you are looking for something that isn't here.",'pda-theme'); ?></p>
	<?php include (TEMPLATEPATH . "/searchform.php"); ?>
</div>
<?php get_sidebar(); ?>
<?php get_footer(); ?>
