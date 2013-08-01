<?php  get_header();  ?>


<div id="entry_page">

	<h1 id="page_title"><?php theme_functions('page_title'); ?></h1>
	
	<?php if(get_theme_option('display_categories')==1): ?>
	<ul id="categories">
		<li>Categories</li>

	    <?php
		
	    $args = array("hide_empty" => 0, "exclude" => 1);                   
	    $categories_obj = get_categories($args);
	   
	    foreach ($categories_obj as $cat) {
			
			echo '<li><a href="' . get_category_link( $cat->term_id ) . '" title="' .$cat->cat_name. '" ' . '>'.$cat->cat_name.'</a></li>';

		} 	
		?>
		
	</ul>
	<?php endif; ?>


    <?php get_template_part( 'loop' ); ?>
	
</div>


<?php theme_functions('pagination'); ?>

<?php get_footer('loop');?>