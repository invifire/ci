<?php 

function add_scripts() {
	
	if(is_admin()) return;
	

	wp_deregister_script('jquery');
	wp_register_script('jquery', THEME_JS . '/jquery-1.6.2.min.js');
	wp_enqueue_script('jquery');
	wp_enqueue_script('cufon', THEME_JS . '/cufon-yui.js');
	
	$main_font=get_theme_option('main_font');
	wp_enqueue_script('font', THEME_JS . '/fonts/'.$main_font.'.js');

	$background_type=get_meta_option('background_type');
	$theme_page_type=get_meta_option('theme_page_type');
	$hover_effect=get_meta_option('hover_effect');
	
	if( ($background_type==1 || $background_type==2) && ( $theme_page_type==1 || is_single() ) ){
		wp_enqueue_script('supersized', THEME_JS . '/supersized.3.2.4.min.js');
		wp_enqueue_script('supersized_init', THEME_JS . '/supersized.init.js');
	}
	elseif( ($background_type==3 || $background_type==4) && ( $theme_page_type==1 || is_single() )){
		wp_enqueue_script('video-js', THEME_JS . '/video.js');
		wp_enqueue_script('video-background', THEME_JS . '/video-custom.js');
	}
	
	if( ($theme_page_type=='4' || $theme_page_type=='3') && $hover_effect=='1')
		wp_enqueue_script( 'loop', THEME_JS .'/loop-gallery.js');
		
	if( ($theme_page_type=='4' || $theme_page_type=='3') && $hover_effect=='2')
		wp_enqueue_script( 'loop', THEME_JS .'/loop-gallery-2.js');
	
	$blog_hover_effect=get_theme_option('blog_hover_effect');
	
	if( ( $theme_page_type=='2' || is_archive()	|| is_search() ) && $blog_hover_effect==1 ) wp_enqueue_script( 'loop', THEME_JS .'/loop-gallery.js');
	if( ( $theme_page_type=='2' || is_archive()	|| is_search() ) && $blog_hover_effect==2 ) wp_enqueue_script( 'loop', THEME_JS .'/loop-gallery-2.js');
	

	wp_enqueue_script('masonry', THEME_JS . '/jquery.masonry.min.js');
	wp_enqueue_script('jquery.colorbox', THEME_JS .'/jquery.colorbox-min.js');
	wp_enqueue_script('jquery-easing', THEME_JS . '/jquery.easing.1.3.js');
	wp_enqueue_script('jquery-validate', THEME_JS . '/jquery.validate.min.js');
	wp_enqueue_script('custom', THEME_JS . '/custom.js');
	
	
	wp_register_script( 'video-js', THEME_JS . '/video.js');
	wp_register_script( 'video-custom', THEME_JS . '/video-custom.js');
	wp_register_script( 'jquery-gmap', THEME_JS .'/jquery.gmap-1.1.0-min.js');
	wp_register_script( 'jquery_tweet', THEME_JS .'/jquery.tweet.js');
	
	
	
	if(get_theme_option('enable_gmap')==1)
		echo "\n<script src='http://maps.google.com/maps?file=api&amp;v=2&amp;key=".get_theme_option('gmap_api_key')."'></script>\n";


	
}
add_action('wp_print_scripts', 'add_scripts');

function add_styles(){

	if(is_admin()) return;
	
	wp_enqueue_style('theme-style', THEME_CSS.'/style.css');

	$skin=get_theme_option('skin');
		
	if($skin==2) 	wp_enqueue_style('theme-skin', THEME_CSS.'/light.css');
	else wp_enqueue_style('theme-skin', THEME_CSS.'/dark.css');
	
	wp_enqueue_style('theme-custom', THEME_CSS.'/custom.php');
	

}
add_action('wp_print_styles', 'add_styles');



?>
