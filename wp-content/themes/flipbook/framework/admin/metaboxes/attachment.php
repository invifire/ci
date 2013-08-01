<?php


 
global $options_at;

$options_at = array();





$options_at[] = array( "name" => "Caption Text Color",
                    "desc" => "used on fulscreen backgrounds",
					"id" => "color",
					"std" => "#ffffff",
					"type" => "color"); 
							
$options_at[] = array( "name" => "URL adress",
					"desc" => "used on fulscreen backgrounds, when you click on the image background",
					"id" => "url_adress",
					"std" => "",
					"type" => "text"); 
					
$options_at[] = array( "name" => "Thumbnail height",
					"id" => "height_type",
					"desc" => "used on created gallery pages",
					"class" => "height_type_i",
					"options" => array(
						"multiply the fixed witdh by a number",
						"maintain aspect ratio"
					),
					"std" => "multiply the fixed witdh by a number",
					"type" => "select"); 
					
$options_at[] = array( "name" => "Multiply this Thumbnail height based on the current width",
					"id" => "thumbnail_height",
					"class" => "height_type height_type_1",
					"std" => "1",
					"min" => "0.5",
					"max" => "2",
					"step" => "0.5",
					"unit" => '',
					"type" => "range"); 
							
					
$options_at[] = array( "name" => "When the thumbnail is clicked",
					"desc" => "used on created gallery pages, when you click on the thumbnail",
					"id" => "thumbnail_click",
					"class" => "thumbnail_click_i",
					"std" => "",
					"options" => array(
					   "open the post image in a lightbox",
					   "open a video in a lightbox",
					   "go to another adress",
					),
					"type" => "select"); 
					
$options_at[] = array( "name" => "Lighbox Description",
					"desc" => "used on created gallery pages, when you click on the thumbnail",
					"id" => "lighbox_description",
					"class" => "thumbnail_click thumbnail_click_1 thumbnail_click_2",
					"std" => "",
					"type" => "textarea"); 
					
$options_at[] = array( "name" => "The url of the video (youtube or vimeo)",
					"desc" => "used on created gallery pages, when you click on the thumbnail",
					"id" => "lightbox_video_url",
					"class" => "thumbnail_click thumbnail_click_2",
					"std" => "",
					"type" => "text"); 
					
$options_at[] = array( "name" => "Adress URL",
					"desc" => "used on created gallery pages, when you click on the thumbnail",
					"id" => "post_adress",
					"class" => "thumbnail_click thumbnail_click_3",
					"std" => "",
					"type" => "text"); 
					
					
function attachment_fields_to_edit($form_fields, $post) {  

	global $options_at;
	
	foreach($options_at as $option):
	
		$form_fields[$option['id']]["label"] = $option['name'];
		$form_fields[$option['id']]["input"] = "html";  
		$form_fields[$option['id']]["html"] = generate_html_option_attachment($option, $post);
		$form_fields[$option['id']]["helps"] = $option['desc'];
		
	endforeach;

	return $form_fields;  
	
}  

function generate_html_option_attachment($value, $post){

	$output='';

	switch($value['type']):
	
		case 'text':

			$val = get_post_meta($post->ID, $value['id'].'_value', true);

			
			$output .= '<input class="of-input" name="attachments['.$post->ID.']['. $value['id'] .']" id="'. $value['id'] .'" type="'. $value['type'] .'" value="'. $val .'" />';
			
		
		break;
		
		case 'textarea':
			
			$cols = '8';
			$ta_value = '';
			
			if(isset($value['std'])) {
				
				$ta_value = $value['std']; 
				
				if(isset($value['options'])){
					$ta_options = $value['options'];
					if(isset($ta_options['cols'])){
					$cols = $ta_options['cols'];
					} else { $cols = '8'; }
				}
				
			}
			
			$val = get_post_meta($post->ID, $value['id'].'_value', true);
			if( $val != "") { $ta_value = stripslashes( $val); }
			$output .= '<textarea name="attachments['.$post->ID.']['. $value['id'] .']" id="'. $value['id'] .'" cols="'. $cols .'" rows="8">'.$ta_value.'</textarea>';
		
			
		break;
	
		case 'select':

			$output .= '<select class="of-input" name="attachments['.$post->ID.']['. $value['id'] .']" id="'. $value['id'] .'">';
		
			$selected_value = get_post_meta($post->ID, $value['id'].'_value', true);
			
			if(!$selected_value) $selected_value=$value['std'];
			
			$i=1;
		 
			foreach ($value['options'] as $option) {
			
				
				$selected = '';
				
				 if ( $selected_value == $i) { $selected = ' selected="selected"';} 

				  
				 $output .= '<option'. $selected .' value="'.$i.'">';
				 $output .= $option;
				 $output .= '</option>';
				 
				 $i++;
			 
			 } 
			 $output .= '</select>';


			
		break;

		case 'color':

			$output .= '<div class="colorpicker_wrap"><input type="text" id="colorpicker_'.$post->ID.'" class="colorpicker" name="attachments['.$post->ID.'][color]" value="'.(get_post_meta($post->ID, "color_value", true)?get_post_meta($post->ID, "color_value", true):'#ffffff')  .'" /><span></span><div id="picker_'.$post->ID.'" class="hidden picker"></div></div>';
			
		break;
		
		case "range":
					
			$output .= '<div class="range-input-container">';
			
			$output .= '<input type="range" name="attachments['.$post->ID.'][' . $value['id'] . ']" value="';
			
			$val = $value['std'];
			$std = get_post_meta($post->ID, $value['id'].'_value', true);

			if ( $std )  $val = $std; 
				
			$output .= $val;
			
			if (isset($value['min'])) $output .= '" min="' . $value['min'];
			if (isset($value['max'])) $output .= '" max="' . $value['max'];
			if (isset($value['step'])) $output .= '" step="' . $value['step'];
			
			$output .= '" />';
			
			if (isset($value['unit'])) $output .= '<span>' . $value['unit'] . '</span>';
			
			$output .= '</div>';
			
		break;

	endswitch;
	
	return $output;

}


function attachment_fields_to_save($post, $attachment) {  

	global $options_at;
	
	foreach($options_at as $option):
	
	    if( isset($attachment[$option['id']]) )  update_post_meta($post['ID'], $option['id'].'_value', $attachment[$option['id']]);  
  
	endforeach;
	
    return $post;  
}  



add_filter("attachment_fields_to_edit", "attachment_fields_to_edit", null, 2);  
add_filter("attachment_fields_to_save", "attachment_fields_to_save", null, 2);




?>