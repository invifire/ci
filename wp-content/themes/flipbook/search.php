<?php  get_header();  ?>


<div id="entry_page">

	<h1 id="page_title"><?php theme_functions('page_title');?></h1>
	
	
	
	
    <?php 


	global $query_string;

	$query_args = explode("&", $query_string);
	$search_query = array();

	foreach($query_args as $key => $string) {
		$query_split = explode("=", $string);
		$search_query[$query_split[0]] = urldecode($query_split[1]);
	} 

	$search_query['post_type']=array('post','portfolio');

	query_posts($search_query);	
		
	global $more;
	$more = "";

	?>
	
	<?php get_template_part( 'loop', 'search' );?> 

   
   
  
</div>


<?php theme_functions('pagination'); ?>

<?php get_footer('loop');?>






