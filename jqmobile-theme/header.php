<?php //SVN: $Id: header.php 337025 2011-01-25 14:02:14Z imthiaz $ ?>
<?php global $detectedPage;?>
<?php load_theme_textdomain('pda-theme');?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head profile="http://gmpg.org/xfn/11">
		<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
		<title><?php bloginfo('name'); ?> <?php if ( is_single() ) { ?> &raquo; Blog Archive <?php } ?> <?php wp_title(); ?></title>
		<meta name="generator" content="WordPress <?php bloginfo('version'); ?>" /> <!-- leave this for stats -->
		<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
		<link rel="stylesheet" href="http://code.jquery.com/mobile/1.0a2/jquery.mobile-1.0a2.min.css" />
		<script src="http://code.jquery.com/jquery-1.4.4.min.js"></script>
		<script type="text/javascript" src="<?php echo get_theme_root_uri(); ?>/jqmobile-theme/script.js"></script>
		<script type="text/javascript" src="http://code.jquery.com/mobile/1.0a2/jquery.mobile-1.0a2.min.js"></script>
		<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>?nocache=<?php echo time() ?>" type="text/css" media="screen" />
	</head>
<body>
<div data-role="page">
	<div data-role="header">
		<h1><?php bloginfo('name'); ?></h1>
	</div><!-- /header -->
		<div data-role="navbar" class="navbar-header" >
		<ul>
			<li><?php //echo $detectedPage; ?><a <?php if ($detectedPage=='home') : ?> href="#" class="ui-btn-active" <?php else : ?> href="<?php echo home_url( '/?mobilePage=home' ); ?>" <?php endif; ?> id="navbar-icon-home" data-icon="custom"><?php _e('Home','pda-theme'); ?></a></li>
			<li><a <?php if ($detectedPage=='categories') : ?> href="#" class="ui-btn-active" <?php else : ?> href="<?php echo home_url( '/?mobilePage=categories' ); ?>" <?php endif; ?> id="navbar-icon-categories" data-icon="custom"><?php _e('Categories','pda-theme'); ?></a></li>
			<li><a <?php if ($detectedPage=='tags') : ?> href="#" class="ui-btn-active" <?php else : ?> href="<?php echo home_url( '/?mobilePage=tags' ); ?>" <?php endif; ?> id="navbar-icon-tags" data-icon="custom"><?php _e('Tags','pda-theme'); ?></a></li>
			<li><a <?php if ($detectedPage=='pages') : ?> href="#" class="ui-btn-active" <?php else : ?> href="<?php echo home_url( '/?mobilePage=pages' ); ?>" <?php endif; ?> id="navbar-icon-pages" data-icon="custom"><?php _e('Pages','pda-theme'); ?></a></li>
		</ul>
		</div>	


