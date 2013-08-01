<?php
/**
 * @package WordPress
 * @subpackage Default_Theme
 */

get_header(); ?>

	<div class="logo">
    <a href="<?php echo home_url( '/' ); ?>"><img src="<?php echo get_option('main_title'); ?>" alt="" title="" border="0" /></a>
    </div>
     
    
	<div class="menu">
    	<ul>  
        <?php
        query_posts(array( 'post_type' => 'icons_menu', 'orderby' => 'menu_order', 'order' => 'ASC', 'showposts' => '999'));
        ?>
             <?php if (have_posts()) : ?>
             <?php while (have_posts()) : the_post(); ?>
    
<li><a href="<?php echo get_post_meta($post->ID, "menu_item_url", $single = true); ?>"><?php the_post_thumbnail('menu-icon-size'); ?><?php the_title(); ?></a></li>
            
            <?php 
            endwhile; ?>
            <?php endif; ?>
        </ul>
    </div>
    
    

</div>    