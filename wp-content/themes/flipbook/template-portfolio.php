<?php  get_header();  ?>


<div id="entry_page">

	<h1 id="page_title"><?php the_title(); ?></h1>
	
	<?php if(get_meta_option('page_description')!=''): ?>
	<div id="page_description"><?php echo get_meta_option('page_description'); ?></div>
	<?php endif; ?>
	
	<?php 
	
	$portfolio_categories=get_meta_option('portfolio_categories');

	$args = array("hide_empty" => 1, "taxonomy" => "portfolio_category");

	if($portfolio_categories)  $args['include'] = implode(',', $portfolio_categories);

	$terms = get_terms('portfolio_category', $args);

	$portfolio_type=get_meta_option('portfolio_type');
	
	if(get_meta_option('display_categories')==1): ?>
	
	<ul id="categories">
		<li><?php _e( 'Categories', 'flipbook' ); ?></li>

	    <?php

		if($portfolio_type==1) {
	   
			$cat=$_GET['cat'];
			$current='';
			if($cat=="") $current=' class="current"';
	   
	        echo '<li><a '.$current.' href="' . get_permalink() . '" title="' .__('All','flipbook'). '" ' . '>'.__('All','flipbook').'</a></li>';
			foreach ($terms as $term) {
			
				$current='';
				if($cat==$term->term_id) $current=' class="current"';
				echo '<li><a '.$current.' href="' . get_permalink() . '&cat='.$term->term_id.'" title="' .$term->name. '" ' . '>'.$term->name.'</a></li>';
			}
		}
		else {
		
			echo '<li><a class="current" title="' .__('All','flipbook'). '" ' . ' data-cat="entry_item">'.__('All','flipbook').'</a></li>';
			foreach ($terms as $term) 
				echo '<li><a title="' .$term->name. '" ' . ' data-cat="cat-'. $term->term_id .'">'.$term->name.'</a></li>';
		}
		?>
		
	</ul>
	
	<?php endif; ?>
	
	
    <?php 		 
	
		
	
	if($portfolio_categories) $cat=implode(',', $portfolio_categories);	
	if($_GET['cat']) $portfolio_categories = $_GET['cat'];

	$paged = get_query_var('paged'); 
	if($paged=='') $paged=get_query_var('page');
	if($paged=='') $paged=1;
	
	$posts_per_page=get_post_meta($post->ID, 'max_value', true);
	
	if($portfolio_type==2) $posts_per_page=-1;
	
	query_posts( array(
		"posts_per_page" => $posts_per_page,
		"post_type" => "portfolio",
		"paged" => $paged,
		"tax_query" => array(
			array(
			"taxonomy" => "portfolio_category",
			"field" => "id",
			"terms" => $portfolio_categories
			)
		)
	));

		
	
	global $more;
    $more = "";

	?>
	
	<?php get_template_part( 'loop', 'portfolio' ); ?> 

   
   
  
</div>


<?php if($portfolio_type==1) theme_functions('pagination'); ?>

<?php get_footer('loop');?>