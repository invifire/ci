<?php

global $options_page;

$options_page = array();

$options_page[] = array( "name" => "Page Type",
					"id" => "theme_page_type",
					"class" => "theme_page_type_i",
					"std" => "normal page",
					"options" => array(
					   "normal page",
					   "blog page",
					   "portfolio page",
					   "gallery page"
					),
					"type" => "select"); 
					
$options_page[] = array( "name" => "Page Description",
					"id" => "page_description",
					"class" => "theme_page_type theme_page_type_2 theme_page_type_3 theme_page_type_4",
					"type" => "textarea"); 
					
					
$options_page[] = array( "name" => "Portfolio Categories",
					"id" => "portfolio_categories",
					"class" => "theme_page_type theme_page_type_3",					
					"type" => "multiselect_portfolio"); 
					
$options_page[] = array( "name" => "Gallery Categories",
					"id" => "gallery_categories",
					"class" => "theme_page_type theme_page_type_4",					
					"type" => "multiselect_gallery"); 
					

						
$options_page[] = array( "name" => "Thumbnails height",
						"desc" => "leave 0 if you don't want a fixed height for the thumbnails",
						"id" => "images_height",
						"class" => "theme_page_type theme_page_type_3",
						"std" => "0",
						"min" => "0",
						"max" => "400",
						"step" => "1",
						"unit" => 'px',
						"type" => "range"); 
						
						
$options_page[] = array( "name" => "Thumbnails width (required)",
						"id" => "images_width",
						"class" => "theme_page_type theme_page_type_3 theme_page_type_4",
						"std" => "220",
						"min" => "50",
						"max" => "400",
						"step" => "2",
						"unit" => 'px',
						"type" => "range"); 
						
$options_page[] = array( "name" => "Portfolio item details height",
						"desc" => "leave 0 if you want to take just the necesary space",
						"id" => "details_height",
						"class" => "theme_page_type theme_page_type_3",		
						"std" => "0",
						"min" => "0",
						"max" => "400",
						"step" => "1",
						"unit" => 'px',
						"type" => "range"); 
						
						$options_page[] = array( "name" => "Type",
						"id" => "portfolio_type",
						"class" => "theme_page_type theme_page_type_3 theme_page_type_4 portfolio_type_i",
						"std" => "paginated",
						"options" => array(
						   "paginated",
						   "filterable"
						),
						"type" => "select"); 
					
$options_page[] = array(
			"name" => "Items per page",
			"id" => "max",
			"class" => "theme_page_type theme_page_type_3 theme_page_type_4 portfolio_type portfolio_type_1",
			"min" => "1",
			"max" => "100",
			"step" => "1",
			"unit" => '',
			"std" => "10",
			"type" => "range"
		);
		
$options_page[] = array(
			"name" => "Display Categories",
			"id" => "display_categories",
			"class" => "theme_page_type theme_page_type_3 theme_page_type_4 portfolio_type portfolio_type_1",
			"std" => "on",
			"options" => array(
			   "on",
			   "off"
			),
			"type" => "select"
		);
		
$options_page[] = array(
			"name" => "Thumbnail Hover effect",
			"id" => "hover_effect",
			"class" => "theme_page_type theme_page_type_3 theme_page_type_4",
			"std" => "color -> grayscale",
			"options" => array(
			   "color -> grayscale",
			   "grayscale -> color"
			),
			"type" => "select"
		);
		
					
										
$options_page[] = array( "name" => "Display sidebar",
					"id" => "display_sidebar",
					"class" => "theme_page_type theme_page_type_1 display_sidebar_i",
					"std" => "on",
					"options" => array(
					   "on",
					   "off"
					),
					"type" => "select"); 
					
$options_page[] = array( "name" => "Custom sidebar",
					"id" => "custom_sidebar",
					"class" => "theme_page_type theme_page_type_1 display_sidebar display_sidebar_1",
					"type" => "select_sidebar"); 
					
$options_page[] = array( "name" => "Background Type",
					"id" => "background_type",
					"class" => "theme_page_type theme_page_type_1 background_type_i",
					"std" => "default",
					"options" => array(
					   "default",
					   "slideshow",
					   "vimeo video",
					   "html5 video"
					),
					"type" => "select"); 		

$options_page[] = array( "name" => "Gallery",
					"id" => "gallery_cat",
					"class" => "theme_page_type theme_page_type_1 background_type background_type_2",
					"type" => "select_slideshow"); 	
					
$options_page[] = array( "name" => "Slide Interval",
					"desc" => "milliseconds between transitions",
					"id" => "slide_interval",
					"class" => "theme_page_type theme_page_type_1 background_type background_type_1 background_type_2",						
					"min" => "3000",
					"max" => "20000",
					"step" => "1000",
					"unit" => 'ms',
					"std" => "5000",
					"type" => "range"
				);
				
				
		$options_page[] = array( "name" => "Slide transition type",
					"id" => "transition_type",
					"class" => "theme_page_type theme_page_type_1 background_type background_type_1 background_type_2",
					"std" => "fade",
					"options" => array(
					   "fade",
					   "slide top",
					   "slide right",
					   "slide bottom",
					   "slide left",
					   "carousel right",
					   "carousel left"
					),
					"type" => "select"); 
				
			$options_page[] = array( "name" => "Video ID (required)",
					"desc" => "found in the URL of the vimeo page",
					"id" => "video_url",
					"class" => "theme_page_type theme_page_type_1 background_type background_type_3",						
					"std" => "",
					"type" => "text"
				);
				
			$options_page[] = array( "name" => "MP4 source URL",
					"desc" => "Supported by Webkit browsers (Safari, Chrome, iPhone/iPad) and Internet Explorer 9. Also supported by Flash 9 and higher",
					"id" => "mp4_url",
					"class" => "theme_page_type theme_page_type_1 background_type background_type_4",						
					"std" => "",
					"type" => "upload"
				);
				
			$options_page[] = array( "name" => "WebM source URL",
					"desc" => "Supported by newer versions of Firefox, Chrome, and Opera.",
					"id" => "webm_url",
					"class" => "theme_page_type theme_page_type_1 background_type background_type_4",						
					"std" => "",
					"type" => "upload"
				);
				
			$options_page[] = array( "name" => "Ogg source URL",
					"desc" => "Supported by Firefox, Opera, Chrome, and newer versions of Safari. Unfortunately it's not as good as WebM and MP4.",
					"id" => "ogg_url",
					"class" => "theme_page_type theme_page_type_1 background_type background_type_4",						
					"std" => "",
					"type" => "upload"
				);
				
				$options_page[] = array( "name" => "Flash source URL",
					"desc" => "Used for browsers and devices that don't support HTML5 video but do support Flash.",
					"id" => "flash_url",
					"class" => "theme_page_type theme_page_type_1 background_type background_type_4",						
					"std" => "",
					"type" => "upload"
				);
							
					
		

$options_page[] = array( "name" => "Page Layout",
					"desc" => "select which parts of the page will be displayed",
					"id" => "main_layout",
					"class" => "theme_page_type theme_page_type_1",
					"std" => "slideshow",
					"options" => array(
					   "menu & main body visible",
					   "menu & main body closed",
					   "only menu visible",
					   "only menu closed",
					   "no menu and main body"
					),
					"type" => "select"); 					
				
					



function create_meta_box_page() {
	global $theme_name;
	global $options_page;
	
	if ( function_exists('add_meta_box') ) {
		add_meta_box( 'aps', 'Page Settings', 'create_meta_options', 'page', 'advanced', 'high', array('var1' => $options_page) );
	}
}





function mytheme_save_data_page($post_id) {
    global $options_page;
	global $post;
	
	if(get_post_type( $post )=='page'){
    
	
	
		// verify nonce
		if (!wp_verify_nonce($_POST['mytheme_meta_box_nonce'], 'global_functions.php')) {
			return $post_id;
		}
	
		// check autosave
		if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
			return $post_id;
		}
	
		// check permissions
		if ('page' == $_POST['post_type']) {
			if (!current_user_can('edit_page', $post_id)) {
				return $post_id;
			}
		} elseif (!current_user_can('edit_post', $post_id)) {
			return $post_id;
		}
		
		
		foreach ($options_page as $option) {
			$old = get_post_meta($post_id, $option['id']."_value", true);
			$new = $_POST[$option['id']];
			
			if ($new !='' && $new != $old) {
				update_post_meta($post_id, $option['id']."_value", $new);
			} elseif ('' == $new && $old) {
				delete_post_meta($post_id, $option['id']."_value", $old);
			}
		}
	}
}



add_action('admin_menu', 'create_meta_box_page');
add_action('save_post', 'mytheme_save_data_page');






?>