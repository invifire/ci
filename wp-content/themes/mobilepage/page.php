<?php
/**
 * @package WordPress
 * @subpackage Default_Theme
 */

get_header(); ?>
		
	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
    
        <div class="header">
        <a href="<?php echo home_url( '/' ); ?>" class="left_bt">home</a>
        <span><?php the_title(); ?></span>
        <a href="#" class="right_bt" id="activator"><img src="<?php bloginfo('template_directory'); ?>/themedesigns/<?php echo get_option('themecolor'); ?>/images/search.png" alt="" title="" border="0" /></a>
        </div>
        
        <div class="content">
        
            <div class="corner_wrap">
                <div class="entry">
                <?php the_content(); ?>
                <div class="clear"></div>
                </div>     
            </div>
            <div class="clear_left"></div>
        
        </div>
    
    <?php endwhile; endif; ?>


</div>
<?php get_footer(); ?>
