<?php  get_header(); ?>

<?php theme_functions('page_background'); ?>

<?php 

$main_layout=get_meta_option('main_layout'); 

$class='';
if($main_layout==2) $class='class="closed"';

?>

<?php if($main_layout==1): ?>

	<div id="close_btn"></div>  

<?php endif; ?>

<?php if($main_layout==2 ): ?>

	<div id="close_btn" class="hidden"></div>  

<?php endif; ?>


<?php if($main_layout==1 || $main_layout==2 ): ?>

 <div id="main" <?php echo $class;?>>
 
	   <div id="main_container">	   
 
    
<?php if ( have_posts() ) while ( have_posts() ) : the_post();   ?>
    
    
       <h1><?php the_title(); ?></h1>

       <?php $layout=get_meta_option('display_sidebar'); ?>
	   
	   
	   
	   <?php if($layout==1): ?>
			<div id="primary">
	   <?php endif; ?>
	   
	          <div id="metabox">
   
	   <?php   
	   
	   echo '<div class="meta date"><time datetime="'.get_the_time('Y-m-d').'"><a href="'.get_month_link(get_the_time('Y'), get_the_time('m')).'">'.get_the_date().'</a></time></div>';
	   $categories_list = get_the_category_list( __( ', ', 'flipbook' ) );
	   echo '<div class="meta categories">';
	   printf($categories_list);
	   echo '</div>';
	   echo '<div class="meta comments">';
	   comments_popup_link(__('No Comments','flipbook'), __('1 Comment','flipbook'), __('% Comments','flipbook')); 
	   echo '</div>';
	   ?>
					
       </div>
       
	   
	   <?php if (has_post_thumbnail() ): 

           
        $image_wp = wp_get_attachment_image_src(get_post_thumbnail_id(),'full', true); ?>
	   
	       <div id="post_image" class="frame" >    
              <img src="<?php echo theme_resize($image_wp[0],427,250); ?>" alt="<?php the_title(); ?>"/>
              

          </div><!-- end frame -->
		  <img class="shadow" width="445" src="<?php echo THEME_IMAGES.'/image_shadow.png'; ?>"/>
		  
		  
		<?php endif; ?>

	
		<?php the_content(); ?>
	
		
        <div class="clearboth"></div>
	
        <p><?php edit_post_link(__( 'Edit this Post', 'flipbook' ),'',''); ?></p>
		
        <?php if(get_theme_option('about_author')==1) theme_functions('about_the_author'); ?>
        
        <?php comments_template( '', true ); ?>
				
		<?php endwhile; // end of the loop. ?>
				

	   
	   
    <?php if($layout==1): ?> 
		</div>
	   
		<div id="secondary">

			<?php get_sidebar(); ?>	

		</div>
	<?php endif; ?>
	
	</div>
	
<?php endif; ?>



<?php get_footer(); ?>
    
    
    

       
