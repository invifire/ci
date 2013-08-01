<?php
function add_shortcode_flickr($atts) {

	extract(shortcode_atts(array(
		'id' => '',
		'count' => 4,
		'display' => 'latest'
	), $atts));
	
	return '<div class="flickr_wrap">
				<script type="text/javascript" src="http://www.flickr.com/badge_code_v2.gne?user='.$id.'&amp;count='.$count.'&amp;display='.$display.'&amp;layout=x&amp;source=user"></script>
			</div>
			<div class="clearboth"></div>';
}

add_shortcode('flickr', 'add_shortcode_flickr');
?>