<?php



class FP_Widget_Contact_Form extends WP_Widget {

	function FP_Widget_Contact_Form() {
		$widget_ops = array('classname' => 'widget_contact_form', 'description' => 'displays a contact form');
		$this->WP_Widget('contact_form', THEME_SLUG.' - '.'Contact Form', $widget_ops);
		
	}
	
	
	function widget( $args, $instance ) {
	
		extract( $args );
		$title = apply_filters('widget_title', empty($instance['title']) ? 'Email Us' : $instance['title'], $instance, $this->id_base);
		$email= $instance['email'];
		$success= $instance['success'];
	
		if(empty($success))  $success = __('Your message was successfully sent!','flipbook');
	   
		echo $before_widget;
		if ($title)
			echo $before_title . $title . $after_title;
		
		?>
		<div class="contact_form_wrap">
			<div class="success hidden"><?php echo $success; ?></div> 
			<form class="contact_form" action="<?php echo THEME_INCLUDES;?>/mail.php" method="post" novalidate="novalidate">
				<p><input type="text" required="required" id="contact_name" name="contact_name" value=""/>
				<label for="contact_name">Name</label></p>

				<p><input type="email" required="required" id="contact_email" name="contact_email" value=""/>
				<label for="contact_name">Email</label></p>
				
				<p><textarea required="required" name="contact_content"></textarea></p>
				
				<p><button type="submit" class="button">Submit</button></p>
				<input type="hidden" value="<?php echo $email;?>" name="contact_to"/>
						
			</form>
		</div>
		<?php
		echo $after_widget;

	}

	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['email'] = strip_tags($new_instance['email']);
		$instance['success'] = strip_tags($new_instance['success']);

		return $instance;
	}

	function form( $instance ) {

		$title = isset($instance['title']) ? esc_attr($instance['title']) : '';
		$email = isset($instance['email']) ? esc_attr($instance['email']) : get_bloginfo('admin_email');		
		$success = isset($instance['success']) ? esc_attr($instance['success']) : '';
		
	?>
		<p><label for="<?php echo $this->get_field_id('title'); ?>">Title</label>
		<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" /></p>

		<p><label for="<?php echo $this->get_field_id('email'); ?>">Your Email</label>
		<input class="widefat" id="<?php echo $this->get_field_id('email'); ?>" name="<?php echo $this->get_field_name('email'); ?>" type="text" value="<?php echo $email; ?>" /></p>
        
        <p><label for="<?php echo $this->get_field_id('success'); ?>">Success Text</label>
		<input class="widefat" id="<?php echo $this->get_field_id('success'); ?>" name="<?php echo $this->get_field_name('success'); ?>" type="text" value="<?php echo $success; ?>" /></p>
        
<?php
	}

}

register_widget('FP_Widget_Contact_Form');