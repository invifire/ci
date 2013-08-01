<?php



class FP_Widget_Subnavigation extends WP_Widget {

	function FP_Widget_Subnavigation() {
		$widget_ops = array('classname' => 'widget_subnav', 'description' => 'displays a list of subpages of the current page' );
		$this->WP_Widget('subnav', THEME_SLUG.' - '.'Sub Navigation', $widget_ops);
	}

	function widget( $args, $instance ) {
	
		global $post;
		$has_children=wp_list_pages( 'echo=0&child_of=' . $post->ID . '&title_li=' );
		if (!$has_children)  return;

		
		extract( $args );
		$title = apply_filters('widget_title', empty($instance['title']) ? get_the_title($parent) : $instance['title'], $instance, $this->id_base);
		$sortby = empty( $instance['sortby'] ) ? 'menu_order' : $instance['sortby'];
		$exclude = empty( $instance['exclude'] ) ? '' : $instance['exclude'];
		
		$out = wp_list_pages( array('title_li' => '', 'echo' => 0, 'child_of' => $post->ID, 'sort_column' => $sortby, 'exclude' => $exclude, 'depth' => 1) );

		if ( !empty( $out ) ) {
			echo $before_widget;
			if ( $title)
				echo $before_title . $title . $after_title;
		?>
		<ul>
			<?php echo $out; ?>
		</ul>
		<?php
			echo $after_widget;
		}
	}

	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);
		if ( in_array( $new_instance['sortby'], array( 'post_title', 'menu_order', 'ID' ) ) ) {
			$instance['sortby'] = $new_instance['sortby'];
		} else {
			$instance['sortby'] = 'menu_order';
		}

		$instance['exclude'] = strip_tags( $new_instance['exclude'] );

		return $instance;
	}

	function form( $instance ) {
		
		$instance = wp_parse_args( (array) $instance, array( 'sortby' => 'menu_order', 'title' => '', 'exclude' => '') );
		$title = esc_attr( $instance['title'] );
		$exclude = esc_attr( $instance['exclude'] );
	?>
		<p><label for="<?php echo $this->get_field_id('title'); ?>">Title</label> <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" /></p>
		<p>
			<label for="<?php echo $this->get_field_id('sortby'); ?>">Sort by</label>
			<select name="<?php echo $this->get_field_name('sortby'); ?>" id="<?php echo $this->get_field_id('sortby'); ?>" class="widefat">
				<option value="menu_order"<?php selected( $instance['sortby'], 'menu_order' ); ?>>Page order</option>
				<option value="post_title"<?php selected( $instance['sortby'], 'post_title' ); ?>>Page title</option>
				<option value="ID"<?php selected( $instance['sortby'], 'ID' ); ?>>Page ID</option>
			</select>
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('exclude'); ?>">Exclude</label> <input type="text" value="<?php echo $exclude; ?>" name="<?php echo $this->get_field_name('exclude'); ?>" id="<?php echo $this->get_field_id('exclude'); ?>" class="widefat" />
			<br />
			<small>Page IDs, separated by commas</small>
		</p>
<?php
	}

}

register_widget('FP_Widget_Subnavigation');