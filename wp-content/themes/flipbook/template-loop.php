<?php  get_header();  ?>


<div id="entry_page">

	<h1 id="page_title"><?php the_title(); ?></h1>
	
	<?php if(get_meta_option('page_description')!=''): ?>
	<div id="page_description"><?php echo get_meta_option('page_description'); ?></div>
	<?php endif; ?>
	

	<?php if(get_theme_option('display_categories')==1): ?>
	<ul id="categories">
		<li><?php _e( 'Categories', 'flipbook' ); ?></li>

	    <?php
		
		
	    $args = array("hide_empty" => 0, "exclude" => 1);                   
	    $categories_obj = get_categories($args);
	   
	    foreach ($categories_obj as $cat) {
			
			echo '<li><a href="' . get_category_link( $cat->term_id ) . '" title="' .$cat->cat_name. '" ' . '>'.$cat->cat_name.'</a></li>';

		} 	
		?>
		
	</ul>
	<?php endif; ?>

	<?php 		 

	$paged = get_query_var('paged'); 
	if($paged=='') $paged=get_query_var('page');
	if($paged=='') $paged=1;

	query_posts( array(
		"post_type" => "post",
		"paged" => $paged
	));
	
		
	global $more;
    $more = "";

	?>
   
	<?php get_template_part( 'loop' );?> 	 

</div>

<?php theme_functions('pagination'); ?>

<?php get_footer('loop'); ?>