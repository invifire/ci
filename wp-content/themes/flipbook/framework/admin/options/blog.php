<?php
	
$options[] = array( "name" => "Blog",
					"type" => "heading"); 
					
$options[] = array( "name" => "Post hover effect",
					"id" => THEME_SLUG."blog_hover_effect",
					"type" => "select",
					"options" => array(
								  "color -> grayscale",
								  "grayscale -> color",
								  )
					);
					
$options[] = array(
			"name" => "Fixed height for post images",
			"desc" => "select a fixed height (leave 0 if you don't want a fixed height )",
			"id" => THEME_SLUG."post_height",
			"min" => "0",
			"max" => "600",
			"step" => "10",
			"unit" => "px",
			"std" => "0",
			"type" => "range"
		);
		
		
		$options[] = array(
			"name" => "Blog posts width",
			"desc" => "select the width of the blog posts",
			"id" => THEME_SLUG."post_width",
			"min" => "220",
			"max" => "700",
			"step" => "10",
			"unit" => "px",
			"std" => "220",
			"type" => "range"
		);

$options[] =array(
			"name" => "Display Categories",
			"desc" => "display the categories on the blog, archive, date, tags, category pages top of the page",
			"id" => THEME_SLUG."display_categories",
			"std" => "on",
			"type" => "select",
			"options" => array(
			  "on",
			  "off"
			  )
		);
		
$options[] =array(
			"name" => "Display About the Author box",
			"desc" => "display about the author box on every post",
			"id" => THEME_SLUG."about_author",
			"std" => "on",
			"type" => "select",
			"options" => array(
			  "on",
			  "off"
			  )
		);


?>