<?php

$options[] = array( "name" => "Footer",
					"type" => "heading"); 
				

$url =  THEME_ADMIN_IMAGES . '/footer_layout/';

$options[] = array( "name" => "Footer Layout",
					"desc" => "select the footer layout, then you can go to the Widgets area and add widgets",
					"id" => THEME_SLUG."footer_layout",
					"std" => "5",
					"type" => "images",
					"options" => array(
						'1' => $url . '1.jpg',
						'2' => $url . '2.jpg',
						'3' => $url . '3.jpg',
						'4' => $url . '4.jpg',
						'5' => $url . '5.jpg',
						'6' => $url . '6.jpg'
					));
			
?>