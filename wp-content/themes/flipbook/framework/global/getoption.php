<?php


function get_theme_option($var) {

    $value=get_option(THEME_SLUG.$var);

	if($value) return $value;
	else return false;


}

function get_meta_option($var) {

    global $post;

    $value=get_post_meta($post->ID, $var.'_value', true);

	if($value) return $value;
	else return false;


}


?>
