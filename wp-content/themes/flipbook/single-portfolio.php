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
	   

	
		<div id="content_page">
			
			<?php if (has_post_thumbnail() ): 


			$image_wp = wp_get_attachment_image_src(get_post_thumbnail_id(),'full', true); ?>

			<div id="post_image" class="frame" >    
				<img src="<?php echo theme_resize($image_wp[0],427,250); ?>" alt="<?php the_title(); ?>"/>
			</div><!-- end frame -->
			<img class="shadow" width="445" src="<?php echo THEME_IMAGES.'/image_shadow.png'; ?>"/>


			<?php endif; ?>
			
			<?php the_content(); ?>
			
		</div>
	
		
        <div class="clearboth"></div>
	
        <p><?php edit_post_link(__( 'Edit this Post', 'flipbook' ),'',''); ?></p>
		
		
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
    
    
    

       
