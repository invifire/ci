<?php

$options[] = array( "name" => "Videos",
					"type" => "heading"); 
					
$options[] = array( "name" => "<div class='theme_subtitle'>Video sizes</div>");
					
$options[] = array(
			"name" => "Width",
			"id" => THEME_SLUG."video_width",
			"desc" => "video dimensions that are used within video shortcodes if no other dimensions are specified",
			"min" => "10",
			"max" => "700",
			"step" => "1",
			"unit" => "px",
			"std" => "600",
			"type" => "range"
		);
		
$options[] = array(
			"name" => "Height",
			"id" => THEME_SLUG."video_height",
			"min" => "10",
			"max" => "700",
			"step" => "1",
			"unit" => "px",
			"std" => "350",
			"type" => "range"
		);
?>