<?php //SVN: $Id: index.php 337006 2011-01-25 13:34:58Z imthiaz $ ?>
<?php 

$detectedPage = '';
$lastDate = '';
if (is_front_page()){
	$detectedPage = 'home';
	if (isset($_REQUEST['mobilePage']) && !empty($_REQUEST['mobilePage'])){
		$detectedPage = strtolower($_REQUEST['mobilePage']);
	}
}

get_header(); 
?>

<?php if($detectedPage==''||$detectedPage=='home') :?>
	<?php if (have_posts()) : ?>
		<div data-role="content">
			<ul data-role="listview">
		    <?php while (have_posts()) : the_post(); ?>
		    	<?php 
		    		$currentDate = get_the_time('m.d.y');
		    		if ($currentDate!=$lastDate):
		    			$lastDate = $currentDate;
		    	?>
		    	<li data-role="list-divider"><?php the_time(__('F jS, Y','pda-theme')) ?></li>
		    	<?php endif; ?>
				<li>
					<h3><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h3>
					<?php the_excerpt(); ?>
				</li>
		    <?php endwhile; ?>
		    </ul>
		</div>
		<?php if(get_next_posts_link()!=null || get_previous_posts_link()!=null) :?>
		    <div data-role="footer" class="ui-bar">
		    	<?php next_posts_link('&laquo; ' . __('Previous Page','pda-theme')); ?>
		    	<?php previous_posts_link(__('Next Page','pda-theme') . ' &raquo;'); ?>
			</div>
		<?php endif; ?>
	<?php else : ?>
		<div data-role="content">
	    	<p class="center"><?php _e("Sorry, but you are looking for something that isn't here.",'pda-theme'); ?></p>
		</div>
	<?php endif; ?>
<?php endif; ?>

<?php if($detectedPage=='categories') :?>
	<div data-role="content">
		<ul data-role="listview" data-inset="true">
			<?php 
				$categoriesHTML = wp_list_categories('title_li=&show_count=1&echo=0');
				$categoriesHTML = ereg_replace("/\n\r|\r\n|\n|\r/", "", $categoriesHTML);
				$categoriesHTML = str_replace("  ",' ',$categoriesHTML);	
				$categoriesHTML = str_replace("  ",' ',$categoriesHTML);	
				$categoriesHTML = str_replace("a> (",'a> <span class="ui-li-count">',$categoriesHTML);	
				$categoriesHTML = str_replace(")</li",'</span> </li',$categoriesHTML);	
				echo $categoriesHTML;
			?>
		</ul>
	</div>
<?php endif; ?>

<?php if($detectedPage=='tags') :?>
	<div data-role="content">
		<?php 
			$tagsHTML = wp_tag_cloud( 'orderby=name&format=list&echo=0' );
			$tagsHTML = str_replace("<ul class='wp-tag-cloud'>",'<ul data-role="listview" data-inset="true">',$tagsHTML);	
			print $tagsHTML;
		?>
	</div>
<?php endif; ?>

<?php if($detectedPage=='pages') :?>
	<div data-role="content">
		<ul data-role="listview" data-inset="true">
			<?php wp_list_pages('title_li=');?>
		</ul>
	</div>
<?php endif; ?>

<?php get_footer(); ?>
