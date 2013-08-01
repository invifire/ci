<?php

$options[] = array( "name" => "Images",
					"type" => "heading"); 
					
$options[] = array( "name" => "<div class='theme_subtitle'>Small image size</div>");
					
$options[] = array(
			"name" => "Width",
			"id" => THEME_SLUG."small_width",
			"desc" => "image dimensions that are used within image shortcodes if you specify small",
			"min" => "10",
			"max" => "700",
			"step" => "1",
			"unit" => "px",
			"std" => "220",
			"type" => "range"
		);
		
$options[] = array(
			"name" => "Height",
			"id" => THEME_SLUG."small_height",
			"min" => "10",
			"max" => "700",
			"step" => "1",
			"unit" => "px",
			"std" => "150",
			"type" => "range"
		);
					
$options[] = array( "name" => "<div class='theme_subtitle'>Medium image size</div>");
					
$options[] = array(
			"name" => "Width",
			"id" => THEME_SLUG."medium_width",
			"desc" => "image dimensions that are used within image shortcodes if you specify medium or default",
			"min" => "10",
			"max" => "700",
			"step" => "1",
			"unit" => "px",
			"std" => "300",
			"type" => "range"
		);
		
$options[] = array(
			"name" => "Height",
			"id" => THEME_SLUG."medium_height",
			"min" => "10",
			"max" => "700",
			"step" => "1",
			"unit" => "px",
			"std" => "190",
			"type" => "range"
		);
					
$options[] = array( "name" => "<div class='theme_subtitle'>Large image size</div>");
					
$options[] = array(
			"name" => "Width",
			"id" => THEME_SLUG."large_width",
			"desc" => "image dimensions that are used within image shortcodes if you specify large",
			"min" => "10",
			"max" => "700",
			"step" => "1",
			"unit" => "px",
			"std" => "450",
			"type" => "range"
		);
		
$options[] = array(
			"name" => "Height",
			"id" => THEME_SLUG."large_height",
			"min" => "10",
			"max" => "700",
			"step" => "1",
			"unit" => "px",
			"std" => "240",
			"type" => "range"
		);
				

					
?>