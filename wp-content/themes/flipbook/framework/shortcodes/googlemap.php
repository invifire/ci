<?php
function add_shortcode_gmap($atts, $content = null) {

	extract(shortcode_atts(array(
		"height" => '450',
		"latitude" => '0',
		"longitude" => '0',
		"zoom" => '10',
		"html" => '',
		"maptype" => 'G_NORMAL_MAP'
	), $atts));
	
	
	$height = 'height:'.$height.'px';

	$id = rand(1,100);
	
	$output='
		<div id="google_map_'.$id.'" class="google_map" style="'.$height.'"></div>
		<script>
		jQuery(document).ready(function($) {
			jQuery("#google_map_'.$id.'").gMap({
				zoom: '.$zoom.',
				markers:[{
					latitude: '.$latitude.',
					longitude: '.$longitude.',
					html: "'.$html.'",
					popup: true
				}],
				maptype: '.$maptype.',
				controls: false
			});
		});
		</script>';
		
	return '[raw]'.$output.'[/raw]';

}

add_shortcode('gmap','add_shortcode_gmap');
?>
