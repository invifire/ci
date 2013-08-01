<?php

global $shortcode_options;


$shortcode_options = array(	
    

			
	array(
				"name" => "Contact Form",
				"id" => "contactform",
				"options" => array (
					array(
						"name" => "Email (optional)",
						"id" => "email",
						"type" => "text"
					),
					array(
						"name" => "Success Text (optional)",
						"id" => "success",
						"desc" => "the text that will be displayed when the message has been sent",
						"type" => "textarea"
					),
				)
			),
			
	
	array(
				"name" => "Flickr Images",
				"id" => "flickr",
				"options" => array (
					array(
						"name" => "Flickr ID",
						"desc" => "get your Flickr ID from <a href='http://idgettr.com/' target='_blank'>here</a>",
						"id" => "id",
						"type" => "text"
					),
					array(
						"name" => "Count (optional)",
						"desc" => "",
						"id" => "count",
						"min" => 0,
						"max" => 30,
						"step" => "1",
						"type" => "range"
					),
					array(
						"name" => "Display (optional)",
						"id" => "display",
						"options" => array(
							"...",
							"latest",
							"random",
						),
						"type" => "select",
					),
				)
			),
			
	 array(
				  "name" => "Google Map",
				  "id" => "gmap",
				  "options" => array(

					  array(
						  "name" => "Latitude",
						  "id" => "latitude",
						  "type" => "text",
					  ),
					  array(
						  "name" => "Longitude",
						  "id" => "longitude",
						  "type" => "text",
					  ),
					  array (
						  "name" => "Height (optional)",
						  "id" => "height",
						  "min" => 0,
						  "max" => 800,
						  "step" => "1",
						  "type" => "range"
					  ),
					  array (
						  "name" => "Zoom (optional)",
						  "id" => "zoom",
						  "min" => 0,
						  "max" => 20,
						  "step" => "1",
						  "type" => "range"
					  ),
					  array (
						  "name" => "Html (optional)",
						  "id" => "html",
						  "type" => "text",
					  ),
					  array(
						  "name" => "Maptype (optional)",
						  "id" => "maptype",
						  "options" => array(
							  "...",
							  "G_NORMAL_MAP" ,
							  "G_SATELLITE_MAP",
							  "G_HYBRID_MAP",
							  "G_DEFAULT_MAP_TYPES",
							  "G_PHYSICAL_MAP",
						  ),
						  "type" => "select",
					  ),
		           ),
				   
	           ),
			   
	array(
		"name" => "Images",
		"id" => "images",
		"options" => array(
			
					array(
						"name" => "Image Source URL",
						"desc" => "you can paste the File URL of the desired image from the media section, or click browse and click the 'Insert Adress' button",
						"id" => "src",
						"type" => "upload",
					),
					array(
						"name" => "Image Title (optional)",
						"desc" => "will be displayed in the markup and at the top of the lightbox image",
						"id" => "title",
						"type" => "text",
					),
					array(
						"name" => "Align (optional)",
						"id" => "align",
						"options" => array(
							"...",
							"left" ,
							"right" ,
							"center",
						),
						"type" => "select",
					),
					array(
						"name" => "Icon (optional)",
						"desc" => "will be displayed on mouse hover",
						"id" => "icon",
						"options" => array(
						    "..." ,
							"zoom" ,
							"play",
							"link",
						),
						"type" => "select",
					),
					array (
						"name" => "Lightbox (optional)",
						"desc" => "open a lightbox frame when the image is clicked",
						"id" => "lightbox",
						"options" => array(
						  "...",
						  "yes"
						),
						"type" => "select"
					),
					
					array (
						"name" => "Lightbox description (optional)",
						"desc" => "text displayed at the bottom of the lightbox image",
						"id" => "description",
						"type" => "textarea"
					),
					
					array (
						"name" => "Lightbox group (optional)",
						"id" => "group",
						"type" => "text"
					),
			
					array(
						"name" => "Size (optional)",
						"id" => "size",
						"options" => array(
						    "...",
							"small",
							"medium",
							"large",
						),
						"type" => "select",
					),
					array (
						"name" => "Width (optional)",
						"id" => "width",
						"min" => 0,
						"max" => 700,
						"step" => "1",
						"type" => "range"
					),
					array (
						"name" => "Height (optional)",
						"id" => "height",
						"min" => 0,
						"max" => 700,
						"step" => "1",
						"type" => "range"
					),
					array(
						"name" => "Link (optional)",
						"id" => "link",
						"type" => "text",
					),
					
					array(
						"name" => "Link target (optional)",
						"id" => "target",
						"type" => "text",
						"options" => array(
						    "...",
							"_blank",
							"_self",
							"_parent",
							"_top"
						),
						"type" => "select",
						
						
					),
					
					
		),
	),
			   
			   
	
	
	array(
		"name" => "Layout",
		"id" => "layout",
		"subtype" => "yes",
		"options" => array(
			array(
				"name" => "1/2 - 1/2",
				"id" => "1_2_1_2",
				"options" => array (
					array(
						"name" => "1/2 content",
						"id" => "1",
						"type" => "textarea"
					),
					array(
						"name" => "1/2 content last",
						"id" => "2",
						"type" => "textarea"
					),
				)
			),
			array(
				"name" => "1/3 - 1/3 - 1/3",
				"id" => "1_3_1_3_1_3",
				"options" => array (
					array(
						"name" => "1/3 content",
						"id" => "1",
						"type" => "textarea"
					),
					array(
						"name" => "1/3 content",
						"id" => "2",
						"type" => "textarea"
					),
					array(
						"name" => "1/3 content last",
						"id" => "3",
						"type" => "textarea"
					),
				)
			),
			array(
				"name" => "1/4 - 1/4 - 1/4 - 1/4",
				"id" => "1_4_1_4_1_4_1_4",
				"options" => array (
					array(
						"name" => "1/4 content",
						"id" => "1",
						"type" => "textarea"
					),
					array(
						"name" => "1/4 content",
						"id" => "2",
						"type" => "textarea"
					),
					array(
						"name" => "1/4 content",
						"id" => "3",
						"type" => "textarea"
					),
					array(
						"name" => "1/4 content last",
						"id" => "4",
						"type" => "textarea"
					),
				)
			),

			array(
				"name" => "1/3 - 2/3",
				"id" => "1_3_2_3",
				"options" => array (
					array(
						"name" => "1/3 content",
						"id" => "1",
						"type" => "textarea"
					),
					array(
						"name" => "2/3 content last",
						"id" => "2",
						"type" => "textarea"
					),
				)
			),
			array(
				"name" => "2/3 - 1/3",
				"id" => "2_3_1_3",
				"options" => array (
					array(
						"name" => "2/3 content",
						"id" => "1",
						"type" => "textarea"
					),
					array(
						"name" => "1/3 content last",
						"id" => "2",
						"type" => "textarea"
					),
				)
			),
			array(
				"name" => "1/4 - 3/4",
				"id" => "1_4_3_4",
				"options" => array (
					array(
						"name" => "1/4 content",
						"id" => "1",
						"type" => "textarea"
					),
					array(
						"name" => "3/4 content last",
						"id" => "2",
						"type" => "textarea"
					),
				)
			),
			array(
				"name" => "3/4 - 1/4",
				"id" => "3_4_1_4",
				"options" => array (
					array(
						"name" => "3/4 content",
						"id" => "1",
						"type" => "textarea"
					),
					array(
						"name" => "1/4 content last",
						"id" => "2",
						"type" => "textarea"
					),
				)
			),
			array(
				"name" => "1/4 - 1/4 - 1/2",
				"id" => "1_4_1_4_1_2",
				"options" => array (
					array(
						"name" => "1/4 content",
						"id" => "1",
						"type" => "textarea"
					),
					array(
						"name" => "1/4 content",
						"id" => "2",
						"type" => "textarea"
					),
					array(
						"name" => "1/2 content last",
						"id" => "3",
						"type" => "textarea"
					),
				)
			),
			array(
				"name" => "1/4 - 1/2 - 1/4",
				"id" => "1_4_1_2_1_4",
				"options" => array (
					array(
						"name" => "1/4 content",
						"id" => "1",
						"type" => "textarea"
					),
					array(
						"name" => "1/2 content",
						"id" => "2",
						"type" => "textarea"
					),
					array(
						"name" => "1/4 content last",
						"id" => "3",
						"type" => "textarea"
					),
				)
			),
			array(
				"name" => "1/2 - 1/4 - 1/4",
				"id" => "1_2_1_4_1_4",
				"options" => array (
					array(
						"name" => "1/2 content",
						"id" => "1",
						"type" => "textarea"
					),
					array(
						"name" => "1/4 content",
						"id" => "2",
						"type" => "textarea"
					),
					array(
						"name" => "1/4 content last",
						"id" => "3",
						"type" => "textarea"
					),
				)
			),
			
		),
	),
	

	
	array(
		"name" => "Typography",
		"id" => "typography",
		"subtype" => "yes",
		"options" => array(
			
			array(
				"name" => "Block Quotes",
				"id" => "blockquote",
				"options" => array (
				
					array(
						"name" => "Content",
						"id" => "content",
						"type" => "textarea"
					),
					array(
						"name" => "Align (optional)",
						"id" => "align",
						"options" => array(
							"...",
							"left" ,
							"right",
							"center"
						),
						"type" => "select",
					),
					array(
						"name" => "Cite (optional)",
						"id" => "cite",
						"type" => "text",
					),
				)
			),
			array(
				"name" => "Lists",
				"id" => "lists",
				"options" => array (
					array(
						"name" => "Content",
						"id" => "content",
						"desc" => "e.g:<br/> &#60;li&#62;first item&#60;/li&#62; </br>  &#60;li&#62;second item&#60;/li&#62;",
						"type" => "textarea"
					),
					array(
						"name" => "Style (optional)",
						"id" => "style",
						"options" => array(
							"...",
							"list1",
							"list2",
							"list3",
							"list4"
						),
						"type" => "select",
					),
				)
			),
			array(
				"name" => "Highlight",
				"id" => "highlight",
				"options" => array (
					array(
						"name" => "Content",
						"id" => "content",
						"type" => "textarea"
					),
					array(
						"name" => "Color (optional)",
						"id" => "color",
						"options" => array(
						    "...",
							"black",
							"gray",
							"red",
							"yellow",
							"blue",
							"pink",
							"green",
							"orange",
							"magenta",
						),
						"type" => "select",
					),
				)
				
			),
			
			
			array(
				"name" => "Dividers",
				"id" => "divider",
				"options" => array(

					array(
						"name" => "Divider Type",
						"id" => "type",
						"options" => array(
							"divider_line",
							"divider_dashed",
							"padding",
							"clearboth"
						),
						"type" => "select",
					),
				),

				
				
			),
			
			
		),
	),
	
	
	
	
	array(
				"name" => "Twitter Feeds",
				"id" => "twitter",
				"options" => array (
					array(
						"name" => "Username",
						"id" => "username",
						"type" => "text"
					),
					array(
						"name" => "Count (optional)",
						"id" => "count",
						"min" => 0,
						"max" => 10,
						"step" => "1",
						"type" => "range"
					)
				)
			),

	array(
		"name" => "Videos",
		"id" => "videos",
		"subtype" => "yes",
		"options" => array(
			array(
				"name" => "YouTube",
				"id" => "youtube",
				"options" => array(
					array(
						"name" => "Video ID",
						"desc" => "the id from the video's URL (http://www.youtube.com/watch?v=<span style='color:red'>d0vXxH1IEmQ</span>)",
						"id" => "id",
						"type" => "text",
					),
					array (
						"name" => "Width (optional)",
						"id" => "width",
						"min" => 0,
						"max" => 700,
						"step" => "1",
						"type" => "range"
					),
					array (
						"name" => "Height (optional)",
						"id" => "height",
						"min" => 0,
						"max" => 700,
						"step" => "1",
						"type" => "range"
					),
					array (
						"name" => "Align (optional)",
						"id" => "align",
						"options" => array(
							"...",
							"center",
							"left",
							"right"
						),
						"type" => "select"
					),
				),
			),
			array(
				"name" => "Vimeo",
				"id" => "vimeo",
				"options" => array(
					array(
						"name" => "Video ID",
						"desc" => "the id from the video's URL (http://vimeo.com/<span style='color:red'>123456</span>)",
						"id" => "id",
						"type" => "text",
					),
					array (
						"name" => "Width (optional)",
						"id" => "width",
						"min" => 0,
						"max" => 700,
						"step" => "1",
						"type" => "range"
					),
					array (
						"name" => "Height (optional)",
						"id" => "height",
						"min" => 0,
						"max" => 700,
						"step" => "1",
						"type" => "range"
					),
					array (
						"name" => "Align (optional)",
						"id" => "align",
						"options" => array(
							"...",
							"center",
							"left",
							"right"
						),
						"type" => "select"
					),
				),
			),
			array(
				"name" => "HTML5",
				"id" => "html5",
				"options" => array(

					array (
						"name" => "MP4 Source URL",
						"id" => "mp4_source",
						"desc" => "Supported by Webkit browsers (Safari, Chrome, iPhone/iPad) and Internet Explorer 9.",
						"type" => "upload"
					),
					array (
						"name" => "Webm Source URL",
						"id" => "webm_source",
						"desc" => "Supported by newer versions of Firefox, Chrome, and Opera. ",
						"type" => "upload"
					),
					array (
						"name" => "Ogg Source URL",
						"id" => "ogg_source",
						"desc" => "Supported by Firefox, Opera, Chrome, and newer versions of Safari. Unfortunately it's not as good as WebM and MP4.",
						"type" => "upload"
					),
					array (
						"name" => "Flash Source URL",
						"id" => "flash_source",
						"desc" => "Used for browsers and devices that don't support HTML5 video but do support Flash. ",
						"type" => "upload"
					),
					array (
						"name" => "Autoplay (optional)",
						"id" => "autoplay",
						"desc" => "starts playing the video when the page loads",
						"options" => array(
							"...",
							"yes",
							"no"
						),
						"type" => "select"
					),
					array (
						"name" => "Poster image (optional)",
						"id" => "poster",
						"desc" => "url of the image that will be displayed before you click the play button",
						"type" => "upload"
					),
					array (
						"name" => "Width (optional)",
						"id" => "width",
						"min" => 0,
						"max" => 700,
						"step" => "1",
						"type" => "range"
					),
					array (
						"name" => "Height (optional)",
						"id" => "height",
						"min" => 0,
						"max" => 700,
						"step" => "1",
						"type" => "range"
					),
					array (
						"name" => "Align (optional)",
						"id" => "align",
						"options" => array(
							"...",
							"center",
							"left",
							"right"
						),
						"type" => "select"
					),
				),
			),
		),
	),
	
	
	
	

	
	
	
	
	
	
	
	
);				



function meta_options_shortcode($shortcode_options) {
	

	
	global $shortcode_options;
	
	echo '<div>
			<table class="metabox_table">
				<tr>
					<th><h4><label>Shortcode</label></h4></th>
					<td><select id="first_sc_select">
							<option value="none">select which shortcode to add</option>';
	
							foreach($shortcode_options as $shortcode) 
									echo '<option value="'.$shortcode['id'].'">'.$shortcode['name'].'</option>';
							
	
				echo '</select>
					</td>
				</tr>
			</table>
		</div>';
	
	foreach($shortcode_options as $shortcode):
	
			echo '<div class="first_sc_container first_sc_container_'.$shortcode['id'].'">';
			
			if($shortcode['subtype']!="yes"):
							
			    echo '<table class="metabox_table">';
				foreach($shortcode['options'] as $option):
					
					echo '<tr>';
					echo '<th><h4>'.$option['name'].'</h4></th>';
					
					echo '<td class="option">';
					$option['class']='sc_'.$shortcode['id'].'_'.$option['id'];
					
					renderHTML($option);
					
					echo '</td>';
					echo '<td class="description">'.$option['desc'].'</td>';
					echo '</tr>';
					
				endforeach;
				echo '</table>';
				
			else:
			
				echo '<div>
						<table class="metabox_table">
							<tr><th><h4><label>Type</label></h4></th>
							<td><select class="secondary_sc_select secondary_sc_select_'.$shortcode['id'].'">
									<option value="none">...</option>';
									
									foreach($shortcode['options'] as $secondary_shortcode)
										echo '<option value="'.$secondary_shortcode['id'].'">'.$secondary_shortcode['name'].'</option>';
								
				
							echo '</select>
								 </td>
								</tr>
							</table>
						</div>';
				
				foreach($shortcode['options'] as $secondary_shortcode):
					echo '<div class="secondary_sc_container secondary_sc_container_'.$secondary_shortcode['id'].'">
							<table class="metabox_table">';
							
							foreach($secondary_shortcode['options'] as $option):
								
								echo '<tr>';
								echo '<th><h4>'.$option['name'].'</h4></th>';
								
								echo '<td class="option">';
								$option['class']='sc_'.$shortcode['id'].'_'.$secondary_shortcode['id'].'_'.$option['id'];
								
								renderHTML($option);
								
								echo '</td>';
								echo '<td class="description">'.$option['desc'].'</td>';
								echo '</tr>';
							  
							endforeach;
					echo '</table>
						</div>';
				endforeach;
		
			endif;
			
			echo '</div>';
		endforeach;
		
		echo '<div id="sc_error" class="hidden">Please fill all the required fields:<br/> fill all the required fields fill all the required fields</div><br/>';
		echo '<input type="button" id="add_shortcode" class="button-primary hidden" value="Add Shortcode"/>';


}

function create_meta_box_shortcode() {

	if ( function_exists('add_meta_box') ) {
		
		add_meta_box( 'add_shortcode_metabox', 'Add Shortcode', 'meta_options_shortcode', 'post', 'normal', 'high' );
		add_meta_box( 'add_shortcode_metabox', 'Add Shortcode', 'meta_options_shortcode', 'page', 'normal', 'high' );
		add_meta_box( 'add_shortcode_metabox', 'Add Shortcode', 'meta_options_shortcode', 'portfolio', 'normal', 'high' );
	}
}

add_action('admin_menu', 'create_meta_box_shortcode');




function renderHTML($opt){
	
	    $output='';
	
		switch($opt['type']):
		case 'select':
		
			$output .= '<select class="of-input '. $opt['class'] .'">';
		
			foreach ($opt['options'] as $option) {
				
				 $output .= '<option>';
				 $output .= $option;
				 $output .= '</option>';
			 
			 } 
			 $output .= '</select>';

			
		break;
		
		case 'text':

			$output .= '<input class="of-input '. $opt['class'] .'" value="" />';
			
		break;
		case 'textarea':
			
			$output .= '<textarea class="of-input '. $opt['class'] .'" ></textarea>';
			
		break;
		
		
		
		case 'upload':
		
		    $output .= '<div class="op_upload_wrap" >';
			$output .= '<input class="'.$opt['class'].'" value="" />';
			$output .= '<button class="button-primary">Browse</button>';
			$output .= '</div>';
		
		break;
		case "range":
			
			$output .= '<div class="range-input-container">';
			
			$output .= '<input type="range" class="'. $opt['class'];
			
			if (isset($opt['min'])) $output .= '" min="' . $opt['min'];
			if (isset($opt['max'])) $output .= '" max="' . $opt['max'];
			if (isset($opt['step'])) $output .= '" step="' . $opt['step'];
			$output .= '" />';
			
			if (isset($opt['unit'])) $output .= '<span>' . $opt['unit'] . '</span>';
			
			$output .= '</div>';
			
	    break;

	endswitch;
	
	echo $output;
}







?>