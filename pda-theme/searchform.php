<?php //SVN: $Id: searchform.php 336830 2011-01-25 06:53:12Z imthiaz $ ?>
<form method="get" action="<?php bloginfo('home'); ?>/">
	<input type="text" value="<?php echo wp_specialchars($s, 1); ?>" name="s" />&nbsp;<input type="submit" value="<?php _e('Search','pda-theme'); ?>" />
</form>
