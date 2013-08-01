<?php

function add_shortcode_blockquote($atts, $content = null) {

	extract(shortcode_atts(array(
		'align' => 'center',
		'cite' => '',
	), $atts));
	
	return '[raw]<blockquote class="align'.$align.'" >'.do_shortcode($content).($cite ? '<p class="cite">'.$cite.'</p>':'') . '</blockquote>[/raw]';
}
add_shortcode('blockquote', 'add_shortcode_blockquote');

function add_shortcode_highlight($atts, $content = null) {

	extract(shortcode_atts(array(
		'color' => ''
	), $atts));

	return '<span class="highlight'.$color.'">'.do_shortcode($content).'</span>';
}
add_shortcode('highlight', 'add_shortcode_highlight');

function add_shortcode_list($atts, $content = null) {

	extract(shortcode_atts(array(
		'style' => 'list1'
	), $atts));
		
	return '[raw]<ul class="'.$style.'">'. do_shortcode($content).'</ul>[/raw]';
}
add_shortcode('list', 'add_shortcode_list');


function add_shortcode_divider_line() {
	return '<div class="divider_line"></div>';
}
add_shortcode('divider_line', 'add_shortcode_divider_line');


function add_shortcode_divider_dashed() {
	return '<div class="divider_dashed"></div>';
}
add_shortcode('divider_dashed', 'add_shortcode_divider_dashed');


function add_shortcode_padding() {
	return '<div class="divider_padding"></div>';
}
add_shortcode('padding', 'add_shortcode_padding');


function add_shortcode_clearboth() {
   return '<div class="clearboth"></div>';
}
add_shortcode('clearboth', 'add_shortcode_clearboth');

