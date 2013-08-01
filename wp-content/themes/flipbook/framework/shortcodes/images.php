<?php

function add_shortcode_image($atts) {

	extract(shortcode_atts(array(
		'src' => '',
		'title' => '',
		'align' => 'center',
		'icon' => '',
		'lightbox' => '',
		'description' => '',
		'group' => '',
		'size' => 'medium',
		'width' => '',
		'height' => '',
		'link' => '',
		'target' => ''
	), $atts));
	
	if(!$width&&!$height){
		$width = get_theme_option($size.'_width');
		$height = get_theme_option($size.'_height');
		if(!$width) $width = '300';
		if(!$height) $height = '190';
		
	}
	$src = trim($src);
	if( $lightbox == 'yes' && $link =='' ) $link = $src;
	
	
	$output='';
	
	$output .= '<div class="media_container'.($align?' align'.$align:'').'"><div class="frame" style="width:'.$width.'px;">';
	
	if( $lightbox =='yes' || $link !='' ) 
		$output .= '<a'.($group?' rel="'.$group.'"':'').' class="'.($icon?' icon_'.$icon:'').($lightbox =='yes'?' lightbox':'').'" title="'.$title.'" href="'.$link.'"  '.($target?' target="'.$target.'"':'').' data-desc="'.($description?$description:' ').'">';
		
	$output .= '<img alt="'.$title.'" src="'.theme_resize($src,$width,$height).'" />';
	if($icon) $output .= '<span class="image_overlay"></span>';
	
	
	if( $lightbox =='yes' || $link !='' ) 
		$output .= '</a>';
		
	$output .= '</div><img class="shadow" width="'.($width+12).'" src="'.THEME_IMAGES.'/image_shadow.png"/></div>';
	
	
	return '[raw]'.$output.'[/raw]';
	
}

add_shortcode('image', 'add_shortcode_image');

