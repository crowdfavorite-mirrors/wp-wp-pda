<?php //SVN: $Id: functions.php 337006 2011-01-25 13:34:58Z imthiaz $?>
<?php

if ( ! function_exists( 'jqmobile_comment' ) ) :
	function jqmobile_comment( $comment, $args, $depth ) {
		$GLOBALS['comment'] = $comment;
		switch ( $comment->comment_type ) :
			case '' :
		?>
		<li>
	<!--		<?php echo get_avatar( $comment, 40 ); ?>-->
			<h3><?php comment_author(); ?></h3>
			<?php comment_text(); ?>
			
		<?php
				break;
			case 'pingback'  :
				break;
			case 'trackback' :
				break;
		endswitch;
	}

endif;