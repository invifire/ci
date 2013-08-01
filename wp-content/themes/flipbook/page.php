<?php

$theme_page_type=get_meta_option('theme_page_type');

if($theme_page_type=='2') return require(THEME_DIR . "/template-loop.php");
if($theme_page_type=='3') return require(THEME_DIR . "/template-portfolio.php");
if($theme_page_type=='4') return require(THEME_DIR . "/template-gallery.php");


get_header();

?>

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
				<?php the_content(); ?>
			</div>
		
        <div class="clearboth"></div>
	
        <p><?php edit_post_link(__( 'Edit this Page', 'flipbook' ),'',''); ?></p>
		
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
    
    
    

       
