<?php  get_header();  ?>


<div id="entry_page">

	<h1 id="page_title"><?php the_title(); ?></h1>
	<?php if(get_meta_option('page_description')!=''): ?>
	<div id="page_description"><?php echo get_meta_option('page_description'); ?></div>
	<?php endif; ?>
	
	<?php
	
	$gallery_categories=get_meta_option('gallery_categories');

	$galleries = get_posts(array('post_type'=> 'gallery', 'include' =>  $gallery_categories ));

	$gallery_type=get_meta_option('portfolio_type');
		
	?>
	
	
	<?php 
	if(get_meta_option('display_categories')==1): ?>
	
	<ul id="categories">
		<li><?php _e( 'Categories', 'flipbook' ); ?></li>

	    <?php
		
		if($gallery_type=='1') {
	   
			$cat=$_GET['cat'];
			$current='';
			if($cat=="") $current=' class="current"';
	   
	        echo '<li><a '.$current.' href="' . get_permalink() . '" title="' .__('All','flipbook'). '" ' . '>'.__('All','flipbook').'</a></li>';
			foreach ($galleries as $gallery) {
			
				$current='';
				if($cat==$gallery->ID) $current=' class="current"';
				echo '<li><a '.$current.' href="' . get_permalink() . '&cat='.$gallery->ID.'" title="' .$gallery->post_name. '" ' . '>'.$gallery->post_name.'</a></li>';
			}
		}
		else {
		
			echo '<li><a class="current" title="' .__('All','flipbook'). '" ' . ' data-cat="entry_item">'.__('All','flipbook').'</a></li>';
			foreach ($galleries as $gallery) 
				echo '<li><a title="' .$gallery->post_name. '" ' . ' data-cat="cat-'. $gallery->ID .'">'.$gallery->post_name. '</a></li>';
		}
		?>
		
	</ul>
	
	<?php endif; ?>
	
	
    <?php 		 
	
		
	$attachments = array();
	
	foreach ($galleries as $gallery) {
	
		$attachments = array_merge ($attachments, explode(',', get_post_meta($gallery->ID, 'gallery_items_value', true)));
	}

	if($_GET['cat']) $attachments= explode(',', get_post_meta($_GET['cat'], 'gallery_items_value', true));

	$paged = get_query_var('paged'); 
	if($paged=='') $paged=get_query_var('page');
	if($paged=='') $paged=1;
	
	$posts_per_page=get_meta_option('max');
	
	if($gallery_type==2) $posts_per_page=-1;
	

	query_posts( array(
		"post_status" => "any",
		"post_type" => "attachment",
		'post__in' => $attachments,
		"paged" => $paged,
		"posts_per_page" => $posts_per_page,
		)
	);
	

	
	global $more;
    $more = "";
	
	?>
		
	<?php get_template_part( 'loop', 'gallery' );?> 

   
   
  
</div>




<?php if($gallery_type==1) theme_functions('pagination'); ?>




<?php get_footer('loop');?>






