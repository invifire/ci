<?php



class FP_Widget_Twitter extends WP_Widget {

	function FP_Widget_Twitter() {
		$widget_ops = array('classname' => 'widget_twitter', 'description' => 'displays a list of twitter feeds' );
		$this->WP_Widget('twitter', THEME_SLUG.' - '.'Twitter', $widget_ops);
		
		if ( is_active_widget(false, false, $this->id_base) ){
			add_action( 'wp_print_scripts', array(&$this, 'add_script') );
		}
		
	}

	function add_script(){
	
		if( is_admin() ) return;	

		wp_enqueue_script('jquery_tweet');
	}
	
	function widget( $args, $instance ) {
		extract( $args );
		$title = apply_filters('widget_title', empty($instance['title']) ? 'Recent Tweets': $instance['title'], $instance, $this->id_base);
		$username= $instance['username'];
		$count = (int)$instance['count'];

		if($count < 1) $count = 1;
		
		echo $before_widget;
		if ( $title)
			echo $before_title . $title . $after_title;
			
		$id = rand(1,100);
		?>
		
		<script>
				jQuery(document).ready(function($) {
					 $("#twitter_wrap_<?php echo $id;?>").tweet({
						username: "<?php echo $username;?>",
						count: <?php echo $count;?>,
						seconds_ago_text: '<?php _e('%d seconds ago','flipbook');?>',
						a_minutes_ago_text: '<?php _e('a minute ago','flipbook');?>',
						minutes_ago_text: '<?php _e('%d minutes ago','flipbook');?>',
						a_hours_ago_text: '<?php _e('an hour ago','flipbook');?>',
						hours_ago_text: '<?php _e('%d hours ago','flipbook');?>',
						a_day_ago_text: '<?php _e('a day ago','flipbook');?>',
						days_ago_text: '<?php _e('%d days ago','flipbook');?>',
						view_text: '<?php _e('view tweet on twitter','flipbook');?>'
					 });
				});
		</script>
		
		<div id="twitter_wrap_<?php echo $id;?>"></div>
		<div class="clearboth"></div>
		<?php
		echo $after_widget;
		
	}

	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['username'] = strip_tags($new_instance['username']);
		$instance['count'] = (int) $new_instance['count'];
		
		return $instance;
	}

	function form( $instance ) {
		$title = isset($instance['title']) ? esc_attr($instance['title']) : '';
		$username = isset($instance['username']) ? esc_attr($instance['username']) : '';
		$count = isset($instance['count']) ? absint($instance['count']) : 3;
		$display = isset( $instance['display'] ) ? $instance['display'] : 'latest';
?>
		<p><label for="<?php echo $this->get_field_id('title'); ?>">Title</label>
		<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" /></p>

		<p><label for="<?php echo $this->get_field_id('username'); ?>">Username</label>
		<input class="widefat" id="<?php echo $this->get_field_id('username'); ?>" name="<?php echo $this->get_field_name('username'); ?>" type="text" value="<?php echo $username; ?>" /></p>
		
		<p><label for="<?php echo $this->get_field_id('count'); ?>">How many tweets to show?</label>
		<input id="<?php echo $this->get_field_id('count'); ?>" name="<?php echo $this->get_field_name('count'); ?>" type="text" value="<?php echo $count; ?>" size="3" /></p>
		
<?php
	}
}

register_widget('FP_Widget_Twitter');