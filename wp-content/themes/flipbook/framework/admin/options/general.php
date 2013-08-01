<?php

$options[] = array( "name" => "General",
					"type" => "heading");
					
$options[] =	array(
			"name" => "Skin Color",
			"desc" => "select the main skin of the theme",
			"id" => THEME_SLUG."skin",
			"std" => "dark",
			"type" => "select",
			"options" => array(
			  "dark",
			  "light",
			  )
		);
		
$options[] = array( "name" => "Main Font",
					"desc" => "select the main font of the theme",
					"id" => THEME_SLUG."main_font",
					"std" => "Segan",
					"options" => array(
					          "Segan",
							  "Bebas",
							  "Surface",
							  "Vegur",
							  "YanoneKaffeesatz"
					),
					"type" => "select");  
					
					
$options[] = array( "name" => "Custom Favicon",
					"desc" => "upload a 16x16 pixels png/gif image with your desired favicon",
					"id" => THEME_SLUG."custom_favicon",
					"type" => "upload");  
				
$options[] =	array(
			"name" => "Enable Google Map",
			"desc" => "if you want to use the google map shortcode and widget, select on",
			"id" => THEME_SLUG."enable_gmap",
			"std" => "off",
			"type" => "select",
			"options" => array(
			  "on",
			  "off",
			  )
		);
$options[] =	array(
			"name" => "Google Maps API Key",
			"desc" => "paste your Google Maps API Key. Please sign up for one <a href='http://code.google.com/intl/en-US/apis/maps/signup.html'>here</a>.",
			"id" => THEME_SLUG."gmap_api_key",
			"type" => "textarea"
		);		
		
$options[] = array( "name" => "Tracking Code",
					"desc" => "paste your Google Analytics tracking code here",
					"id" => THEME_SLUG."google_analytics",
					"type" => "textarea");  
					

					
$options[] = array( "name" => "Custom CSS",
					"desc" => "paste your custom css code here",
					"id" => THEME_SLUG."custom_css",
					"type" => "textarea"); 
					
					
$options[] = array( "name" => "Default Backgroundf",
					"desc" => "specify the default gallery category that will be used for the fullscreen slideshow",
					"id" => THEME_SLUG."default_bg",
					"type" => "select_slideshow"); 
					



	
			
					

					
  
					
					
?>