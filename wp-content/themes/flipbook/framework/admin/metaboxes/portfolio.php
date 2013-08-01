<?php


 
global $options_portfolio;

$options_portfolio = array();






$options_portfolio[] = array( "name" => "Thumbnails height",
						"desc" => "leave 0 if you want to maintain aspect ratio",
						"id" => "thumbnail_height",
						"std" => "0",
						"min" => "0",
						"max" => "400",
						"step" => "1",
						"unit" => 'px',
						"type" => "range"); 
					
					

					
$options_portfolio[] = array( "name" => "When the thumbnail is clicked",
					"id" => "thumbnail_click",
					"class" => "thumbnail_click_i",
					"std" => "",
					"options" => array(
					   "open the post image in a lightbox",
					   "open a video in a lightbox",
					   "go to the post page",
					   "go to another adress",
					),
					"type" => "select"); 
					
$options_portfolio[] = array( "name" => "Lighbox Description",
					"id" => "lighbox_description",
					"class" => "thumbnail_click thumbnail_click_1 thumbnail_click_2",
					"std" => "",
					"type" => "textarea"); 
					
$options_portfolio[] = array( "name" => "The url of the video",
					"desc" => "youtube or vimeo",
					"id" => "lightbox_video_url",
					"class" => "thumbnail_click thumbnail_click_2",
					"std" => "",
					"type" => "text"); 
					
$options_portfolio[] = array( "name" => "Type the adress here",
					"id" => "post_adress",
					"class" => "thumbnail_click thumbnail_click_4",
					"std" => "",
					"type" => "text"); 
					
$options_portfolio[] = array( "name" => "Display sidebar",
					"id" => "display_sidebar",
					"class" => "display_sidebar_i",
					"std" => "on",
					"options" => array(
					   "on",
					   "off"
					),
					"type" => "select"); 
					
$options_portfolio[] = array( "name" => "Custom sidebar",
					"id" => "custom_sidebar",
					"class" => "display_sidebar display_sidebar_1",
					"type" => "select_sidebar"); 
					
$options_portfolio[] = array( "name" => "Background Type",
					"id" => "background_type",
					"class" => "background_type_i",
					"std" => "default",
					"options" => array(
					   "default",
					   "slideshow",
					   "vimeo video",
					   "html5 video"
					),
					"type" => "select"); 		

$options_portfolio[] = array( "name" => "Gallery category",
					"id" => "gallery_cat",
					"class" => "background_type background_type_2",
					"type" => "select_slideshow"); 	
					
$options_portfolio[] = array( "name" => "Slide Interval",
                    "desc" => "milliseconds between transition",
					"id" => "slide_interval",
					"class" => "background_type background_type_1 background_type_2",						
					"min" => "3000",
					"max" => "20000",
					"step" => "1000",
					"unit" => 'ms',
					"std" => "5000",
					"type" => "range"
				);
				
								$options_portfolio[] = array( "name" => "Slide transition type",
					"id" => "transition_type",
					"class" => "background_type background_type_1 background_type_2",
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
				
			$options_portfolio[] = array( "name" => "Video ID (required)",
			        "desc" => "found in the URL of the vimeo page",
					"id" => "video_url",
					"class" => "background_type background_type_3",						
					"std" => "",
					"type" => "text"
				);
				
			$options_portfolio[] = array( "name" => "MP4 source URL",
					"desc" => "Supported by Webkit browsers (Safari, Chrome, iPhone/iPad) and Internet Explorer 9. Also supported by Flash 9 and higher",
					"id" => "mp4_url",
					"class" => "background_type background_type_4",						
					"std" => "",
					"type" => "text"
				);
				
			$options_portfolio[] = array( "name" => "WebM source URL ",
					"desc" => "Supported by newer versions of Firefox, Chrome, and Opera.",
					"id" => "webm_url",
					"class" => "background_type background_type_4",						
					"std" => "",
					"type" => "text"
				);
				
			$options_portfolio[] = array( "name" => "Ogg source URL",
					"desc" => "Supported by Firefox, Opera, Chrome, and newer versions of Safari. Unfortunately it's not as good as WebM and MP4.",
					"id" => "ogg_url",
					"class" => "background_type background_type_4",						
					"std" => "",
					"type" => "text"
				);
				
				$options_portfolio[] = array( "name" => "Flash source URL",
					"desc" => "Used for browsers and devices that don't support HTML5 video but do support Flash.",
					"id" => "flash_url",
					"class" => "background_type background_type_4",						
					"std" => "",
					"type" => "text"
				);
							
					
		

$options_portfolio[] = array( "name" => "Page Layout",
					"desc" => "select which parts of the page will be displayed",
					"id" => "main_layout",
					"std" => "slideshow",
					"options" => array(
					   "menu & main body visible",
					   "menu & main body closed",
					   "only menu visible",
					   "only menu closed",
					   "no menu and main body"
					),
					"type" => "select"); 			





function create_meta_box_portfolio() {
	global $theme_name;
	global $options_portfolio;
	
	if ( function_exists('add_meta_box') ) {
		add_meta_box( 'portfolio', 'Portfolio Settings', 'create_meta_options', 'portfolio', 'advanced', 'high', array('var1' => $options_portfolio) );
	}
}

function mytheme_save_data_portfolio($post_id) {
    global $options_portfolio;
	global $post;
	
	if(get_post_type( $post )=='portfolio'){
    
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
		
		foreach ($options_portfolio as $option) {
			$old = get_post_meta($post_id, $option['id']."_value", true);
			$new = $_POST[$option['id']];
			
			if ($new!='' && $new != $old) {
				update_post_meta($post_id, $option['id']."_value", $new);
			} elseif ('' == $new && $old) {
				delete_post_meta($post_id, $option['id']."_value", $old);
			}
		}
	}
}


add_action('admin_menu', 'create_meta_box_portfolio');
add_action('save_post', 'mytheme_save_data_portfolio');





?>