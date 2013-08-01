<?php
function add_shortcode_twitter($atts) {

	extract(shortcode_atts(array(
		'username' => '',
		'count'=> 3
	), $atts));
	
	wp_print_scripts('jquery_tweet');
	
	$id = rand(1,100);
	
	$output='
		<div class="twitter_wrap">
			<div id="twitter_wrap_'.$id.'"></div>
			<div class="clearboth"></div>
			<script>
			jQuery(document).ready(function($) {
				jQuery("#twitter_wrap_'.$id.'").tweet({
					username: "'.$username.'",
					count: "'.$count.'",
					seconds_ago_text: "'.__('%d seconds ago','flipbook').'",
					a_minutes_ago_text: "'. __('a minute ago','flipbook').'",
					minutes_ago_text: "'. __('%d minutes ago','flipbook').'",
					a_hours_ago_text: "'. __('an hour ago','flipbook').'",
					hours_ago_text: "'. __('%d hours ago','flipbook').'",
					a_day_ago_text: "'. __('a day ago','flipbook').'",
					days_ago_text: "'. __('%d days ago','flipbook').'",
					view_text: "'. __('view tweet on twitter','flipbook').'"			
				});
			});
			</script>
		</div>';
	
	return '[raw]'.$output.'[/raw]';
}
add_shortcode('twitter', 'add_shortcode_twitter');
?>