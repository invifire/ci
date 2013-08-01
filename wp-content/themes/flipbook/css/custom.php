<?php
 
$absolute_path = __FILE__;
$path_to_file = explode( 'wp-content', $absolute_path );
$path_to_wp = $path_to_file[0];
require_once( $path_to_wp.'/wp-load.php' );




Header("Content-type: text/css");


$logo_left=get_theme_option('logo_left');
$logo_top=get_theme_option('logo_top');

$custom_css=get_theme_option('custom_css');
	

echo <<<CSS
	
#logo{
	left:{$logo_left}px;
	top:{$logo_top}px;
	
}

{$custom_css}

CSS;
?>