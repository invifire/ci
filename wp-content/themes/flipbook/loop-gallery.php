<?php

$gallery_categories=get_meta_option('gallery_categories');

?>

<ul id="entry_list">
      
	  
		<?php $images_height=get_meta_option('images_height'); ?>
		<?php $images_width=get_meta_option('images_width'); ?>
        
		<?php while (have_posts()) : the_post(); ?>
		
	
		<?php 



			$class = '';
			foreach($gallery_categories as $gallery):
				
				$gallery_array=explode(',', get_post_meta($gallery,'gallery_items_value',true));
				
				foreach($gallery_array as $id):
									
					if(get_the_id() == $id) $class .= "cat-".$gallery." ";
				
				endforeach;

			endforeach;
		
		?> 
		

		<?php
		
		$image_wp = wp_get_attachment_image_src(get_the_id(),'full', true);
		
		if(get_meta_option('height_type')==1){

			$image_width=$images_width;
			
			$thumbnail_height=get_meta_option('thumbnail_height');
			
			if($thumbnail_height=='0.5')  $image_height=0.5*$image_width-1;
			if($thumbnail_height=='1')  $image_height=1*$image_width;
			if($thumbnail_height=='1.5')  $image_height=1.5*$image_width+1;
			if($thumbnail_height=='2')  $image_height=$thumbnail_height*$image_width+2;

		}
		else{
		
			$image_width=$images_width;
			$image_height=floor(($image_width*$image_wp[2])/$image_wp[1]);


		}

	
		$item_width=' style="width:'.$image_width.'px"';

		?>
		

		 
		 
		<li class="entry_item gallery_item <?php echo $class; ?>" <?php echo $item_width; ?>>

			<?php

			
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
					echo '<a href="'.get_post_meta($post->ID, 'post_adress_value', true).'" title="'.get_the_title().'" target="_blank">';
					break;				
				default:
					echo '<a class="lightbox" data-desc="'.$lightbox_description.'" href="'.$image_wp[0].'" rel="entry_group" title="'.get_the_title().'" >';
					break;
		    }
			
			?>
			
				
			<div class="image_container">
				<img width=<?php echo $image_width; ?>  height=<?php echo $image_height; ?> src="<?php echo theme_resize($image_wp[0],$image_width,$image_height); ?>">
			</div>
			</a>
			

			
		</li>
					


		<?php endwhile; wp_reset_postdata();?>

</ul>