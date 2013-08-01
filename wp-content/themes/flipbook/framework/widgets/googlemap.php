<?php



class FP_Widget_Google_Map extends WP_Widget {

	function FP_Widget_Google_Map() {
		$widget_ops = array('classname' => 'widget_gmap', 'description' => 'displays a google map');
		$this->WP_Widget('gmap', THEME_SLUG.' - '.'Googlemap', $widget_ops);
		
		if ( is_active_widget(false, false, $this->id_base) ){
			add_action( 'wp_print_scripts', array(&$this, 'add_script') );
		}
	
	}
	
	function add_script(){
	
		if(is_admin()) return;
		wp_enqueue_script('jquery-gmap');
	}
	
	
	
	function widget( $args, $instance ) {
		extract( $args );
		$title = apply_filters('widget_title', empty($instance['title']) ? '' : $instance['title'], $instance, $this->id_base);
		$height = (int)$instance['height'];
		$latitude = !empty($instance['latitude'])?$instance['latitude']:0;
		$longitude = !empty($instance['longitude'])?$instance['longitude']:0;
		$zoom = (int)$instance['zoom'];
		$html = $instance['html'];
		$maptype = $instance['maptype'];

	
		if($zoom < 1) $zoom = 1;
	
		echo $before_widget;
		if ( $title)
			echo $before_title . $title . $after_title;
				
		$id = rand(1,100);
		?>
		
		<div id="gmap_widget_<?php echo $id;?>" class="google_map" style="height:<?php echo $height;?>px"></div>
		<script type="text/javascript">
		jQuery(document).ready(function($) {
			jQuery("#gmap_widget_<?php echo $id;?>").gMap({
			    zoom: <?php echo $zoom;?>,
			    markers:[{
					latitude: <?php echo $latitude;?>,
			    	longitude: <?php echo $longitude;?>,
			    	html: "<?php echo $html;?>",
			    	popup: true
				}],
				maptype: <?php echo $maptype;?>,
				controls: false
			});
		});
		</script>

		<div class="clearboth"></div>
		<?php
		echo $after_widget;
	}

	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);	
		$instance['height'] = (int) $new_instance['height'];		
		$instance['latitude'] = strip_tags($new_instance['latitude']);
		$instance['longitude'] = strip_tags($new_instance['longitude']);
		$instance['zoom'] = (int) $new_instance['zoom'];
		$instance['html'] = strip_tags($new_instance['html']);
		$instance['maptype'] = strip_tags($new_instance['maptype']);

		return $instance;
	}

	function form( $instance ) {
		$title = isset($instance['title']) ? esc_attr($instance['title']) : '';
		$height = isset($instance['height']) ? absint($instance['height']) : 300;
		$address = isset($instance['address']) ? esc_attr($instance['address']) : '';
		$latitude = isset($instance['latitude']) ? esc_attr($instance['latitude']) : '';
		$longitude = isset($instance['longitude']) ? esc_attr($instance['longitude']) : '';
		$zoom = isset($instance['zoom']) ? absint($instance['zoom']) : 10;
		$html = isset($instance['html']) ? esc_attr($instance['html']) : '';
		$maptype = isset($instance['maptype']) ? esc_attr($instance['maptype']) : 'G_NORMAL_MAP';

		
?>
		<p><label for="<?php echo $this->get_field_id('title'); ?>">Title</label>
		<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" /></p>

		<p><label for="<?php echo $this->get_field_id('height'); ?>">Height</label>
		<input class="widefat" id="<?php echo $this->get_field_id('height'); ?>" name="<?php echo $this->get_field_name('height'); ?>" type="text" value="<?php echo $height; ?>" /></p>
		
		<p><label for="<?php echo $this->get_field_id('latitude'); ?>">Latitude</label>
		<input class="widefat" id="<?php echo $this->get_field_id('latitude'); ?>" name="<?php echo $this->get_field_name('latitude'); ?>" type="text" value="<?php echo $latitude; ?>" /></p>
		
		<p><label for="<?php echo $this->get_field_id('longitude'); ?>">Longitude</label>
		<input class="widefat" id="<?php echo $this->get_field_id('longitude'); ?>" name="<?php echo $this->get_field_name('longitude'); ?>" type="text" value="<?php echo $longitude; ?>" /></p>
		
		<p><label for="<?php echo $this->get_field_id('zoom'); ?>">Zoom value from 1 to 19</label>
		<input id="<?php echo $this->get_field_id('zoom'); ?>" name="<?php echo $this->get_field_name('zoom'); ?>" type="text" value="<?php echo $zoom; ?>" size="3" /></p>
		
		<p><label for="<?php echo $this->get_field_id('html'); ?>">Html content for the marker</label>
		<input class="widefat" id="<?php echo $this->get_field_id('html'); ?>" name="<?php echo $this->get_field_name('html'); ?>" type="text" value="<?php echo $html; ?>" /></p>
		
		<p><label for="<?php echo $this->get_field_id('maptype'); ?>">Map type</label>
		<select id="<?php echo $this->get_field_id('maptype'); ?>" name="<?php echo $this->get_field_name('maptype'); ?>">
			<option<?php if($maptype == 'G_NORMAL_MAP') echo ' selected="selected"'?> value="G_NORMAL_MAP">G_NORMAL_MAP</option>
			<option<?php if($maptype == 'G_SATELLITE_MAP') echo ' selected="selected"'?> value="G_SATELLITE_MAP">G_SATELLITE_MAP</option>
			<option<?php if($maptype == 'G_HYBRID_MAP') echo ' selected="selected"'?> value="G_HYBRID_MAP">G_HYBRID_MAP</option>
			<option<?php if($maptype == 'G_DEFAULT_MAP_TYPES') echo ' selected="selected"'?> value="G_DEFAULT_MAP_TYPES">G_DEFAULT_MAP_TYPES</option>
			<option<?php if($maptype == 'G_PHYSICAL_MAP') echo ' selected="selected"'?> value="G_PHYSICAL_MAP">G_PHYSICAL_MAP</option>
		</select>

		

<?php
	}
}

register_widget('FP_Widget_Google_Map');