<?php

function add_video_vimeo($atts) {

	extract(shortcode_atts(array(
		'id' 	=> '',
		'width' => '',
		'height' => '',
		'align' => 'center'
	), $atts));

	if ($width && !$height ) $height = floor(9/16 * $width);
	if (!$width && $height ) $width = floor(16/9 * $height);
	
	if (!$width && !$height){
		$width = get_theme_option('video_width');
		$height = get_theme_option('video_height');
	}
	

	if ($id!='')
		return '[raw]<div class="media_container align'.$align.'"><div class="frame" style="width:'.$width.'px;"><iframe src="http://player.vimeo.com/video/'.$id.'?title=0&amp;byline=0&amp;portrait=0" width="'.$width.'" height="'.$height.'" frameborder="0" webkitAllowFullScreen allowFullScreen></iframe></div><img class="shadow" width="'.($width+12).'"	src="'.THEME_IMAGES.'/image_shadow.png"/></div>[/raw]';
	
}
add_shortcode('vimeo', 'add_video_vimeo');

function add_video_youtube($atts) {

	extract(shortcode_atts(array(
		'id' 	=> '',
		'width' 	=> '',
		'height' 	=> '',
		'align' => 'center'
	), $atts));
	
	if ($width && !$height ) $height = floor(9/16 * $width);
	if (!$width && $height ) $width = floor(16/9 * $height);
	
	if (!$width && !$height){
		$width = get_theme_option('video_width');
		$height = get_theme_option('video_height');
	}
	

	if ($id!='')
		return '[raw]<div class="media_container align'.$align.'"><div class="frame" style="width:'.$width.'px;"><iframe src="http://www.youtube.com/embed/'.$id.'" width="'.$width.'" height="'.$height.'" frameborder="0"></iframe></div><img class="shadow" width="'.($width+12).'"	src="'.THEME_IMAGES.'/image_shadow.png"/></div>[/raw]';
	
}
add_shortcode('youtube', 'add_video_youtube');


function add_video_html5($atts) {

	extract(shortcode_atts(array(
			'width' 	=> '',
			'height' 	=> '',
			'align' => 'center',
			'mp4_source' => '',
			'webm_source' => '',
			'ogg_source' => '',
			'flash_source' => '',
			'autoplay' => '',
			'poster' => ''
		), $atts));
		


	wp_print_scripts('video-js');
	wp_print_scripts('video-custom');
	
	if ($width && !$height ) $height = floor(9/16 * $width);
	if (!$width && $height ) $width = floor(16/9 * $height);
	
	if (!$width && !$height){
		$width = get_theme_option('video_width');
		$height = get_theme_option('video_height');
	}
		
	if($poster!='') $poster= theme_resize($poster,$width,$height);
	


$output='
<div class="media_container align'.$align.'">
  <div class="frame" style="width:'.$width.'px;">
	  <div class="video-js-box">
		<video id="video_1" class="video-js" width="'.$width.'" height="'.$height.'" preload '.($autoplay=='yes'?'autoplay':'').' poster="'.$poster.'">';
	
			if($mp4_source)
				$output.='<source src="'.$mp4_source.'" type=\'video/mp4; codecs="avc1.42E01E, mp4a.40.2"\' />'; 
			 
			
			if($webm_source)
			  $output.='<source src="'.$webm_source.'" type=\'video/webm; codecs="vp8, vorbis"\' />';

			
			if($ogg_source)
			  $output.='<source src="'.$ogg_source.'" type=\'video/ogg; codecs="theora, vorbis"\' />';

		  $output.='
		  <object id="flash_fallback" class="vjs-flash-fallback" width="'.$width.'" height="'.$height.'" type="application/x-shockwave-flash" data="'.THEME_JS.'/flowplayer-3.2.7-0.swf'.'">
			<param name="movie" value="'.THEME_JS.'/flowplayer-3.2.7-0.swf'.'" />
			<param name="allowfullscreen" value="true" />
	

			<param name="flashvars" value=\'config={"clip":{"url":"'.$flash_source.'","autoPlay":false,"autoBuffering":false}  }\' />
		
		    <img src="'.$poster.'" width="'.$width.'" height="'.$height.'" alt="Poster Image" title="No video playback capabilities." />

		  </object>
		</video>

	  </div>
  </div>
  <img class="shadow" width="'.($width+12).'"	src="'.THEME_IMAGES.'/image_shadow.png"/>
 </div>';


return '[raw]'.$output.'[/raw]';


}
add_shortcode('html5video', 'add_video_html5');


?>