<ul id="entry_list">
  
        <?php $images_height=get_theme_option('post_height'); 
			  $images_width=get_theme_option('post_width');
			  
		
		?>
           
		<?php while (have_posts()) : the_post(); ?>
		 
		 
		<li class="entry_item" style="width:<?php echo $images_width;?>px;">
			
		<?php if (has_post_thumbnail() ): ?>
		
			<?php
			
	
			$image_wp = wp_get_attachment_image_src(get_post_thumbnail_id(),'full', true);
			
			if($images_height!='0')  $image_wp[2]=$images_height; 
			else { 
				$thumbnail_height=get_meta_option('thumbnail_height');	
				
				if($thumbnail_height) $image_wp[2]=$thumbnail_height; 
				else  $image_wp[2]=floor(($image_wp[2]*$images_width)/$image_wp[1]);  

			}
			$image_wp[1]=$images_width;
			

			$thumbnail_click=get_meta_option('thumbnail_click');
			
			$lightbox_description = get_meta_option('lighbox_description');
         	if($lightbox_description=='') 	 $lightbox_description=" ";
			
			switch($thumbnail_click){
				case '1':
					echo '<a class="lightbox" data-desc="'.$lightbox_description.'" href="'.$image_wp[0].'" rel="entry_group" title="'.get_the_title().'" >';
					break;
				case '2':
					echo '<a class="lightbox" data-desc="'.$lightbox_description.'" rel="entry_group" href="'.get_meta_option('lightbox_video_url').'" title="'.get_the_title().'" >';
					break;
				case '3':
					echo '<a href="'.get_permalink().'" title="'.get_the_title().'" >';
					break;
				case '4':
					echo '<a href="'.get_post_meta($post->ID, 'post_adress_value', true).'" title="'.get_the_title().'" target="_blank">';
					break;				
				default:
					echo '<a class="lightbox" data-desc="'.$lightbox_description.'" href="'.$image_wp[0].'" rel="entry_group" title="'.get_the_title().'" >';
					break;
		    }
			
			?>
			
			<div class="image_container">				
				<img width=<?php echo $image_wp[1]; ?>  height=<?php echo $image_wp[2]; ?> src="<?php echo theme_resize($image_wp[0],$image_wp[1],$image_wp[2]); ?>">
			</div>
			</a>
					
					
		<?php endif; ?>	
				
					<div class="entry_details">
					
						<div class="entry_title"><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></div>
						
						<div class="entry_date"><?php echo '<a href="'.get_month_link(get_the_time('Y'), get_the_time('m')).'">'.get_the_date().'</a>'; ?></div>
				
						<div class="entry_comments"><?php comments_popup_link(__('No Comments','flipbook'), __('1 Comment','flipbook'), __('% Comments','flipbook')); ?></div>
											
						<div class="entry_categories">
						
							<?php
							
								$categories_list = get_the_category_list( __( ', ', 'flipbook' ) );
								printf($categories_list);
							
							?>
					
						</div>
						
						
						<div class="entry_description"><?php the_content(''); ?></div>
					
					</div>
					<img class="shadow" width="<?php echo $images_width; ?>" src="<?php echo THEME_IMAGES.'/image_shadow.png'; ?>"/>
					
				
	
			
			</li>
			
		 <?php endwhile; wp_reset_postdata();?>
		 
   </ul>