<?php $main_layout=get_meta_option('main_layout');  ?>

<?php if($main_layout==1 || $main_layout==2 ): ?>

<?php $footer_layout = get_theme_option('footer_layout');  ?>


  <div id="footer"> 


  
<?php
  switch($footer_layout):
		case 1:
?>
		<?php theme_functions('get_footer_sidebar'); ?>

<?php	break;
		case 2:  ?>
          <div class="one_half"><?php theme_functions('get_footer_sidebar'); ?></div>
          <div class="one_half last"><?php theme_functions('get_footer_sidebar'); ?></div>
        
<?php	break;	
        case 3:  ?>
          <div class="one_third"><?php theme_functions('get_footer_sidebar'); ?></div>
          <div class="one_third"><?php theme_functions('get_footer_sidebar'); ?></div>
          <div class="one_third last"><?php theme_functions('get_footer_sidebar'); ?></div>
        
<?php	break;
        case 4:  ?>
          <div class="one_half"><?php theme_functions('get_footer_sidebar'); ?></div>
          <div class="one_fourth"><?php theme_functions('get_footer_sidebar'); ?></div>
          <div class="one_fourth last"><?php theme_functions('get_footer_sidebar'); ?></div>
        
<?php	break;
        case 5:  ?>
          <div class="one_fourth"><?php theme_functions('get_footer_sidebar',1); ?></div>
          <div class="one_fourth"><?php theme_functions('get_footer_sidebar'); ?></div>
          <div class="one_fourth"><?php theme_functions('get_footer_sidebar'); ?></div>
          <div class="one_fourth last"><?php theme_functions('get_footer_sidebar'); ?></div>
        
<?php	break;
        case 6:  ?>
          <div class="one_fourth"><?php theme_functions('get_footer_sidebar'); ?></div>
          <div class="one_fourth"><?php theme_functions('get_footer_sidebar'); ?></div>
          <div class="one_half last"><?php theme_functions('get_footer_sidebar'); ?></div>
        
<?php	break;
  endswitch; ?>
   
        <div class="clearboth"></div>
  
    
  </div><!-- end footer -->
  


</div><!-- end main -->
  


 
<?php endif; ?>

		
<?php

	wp_footer();
	
	if(get_theme_option('google_analytics')!='')  echo '<div class="hidden">'.stripslashes(get_theme_option('google_analytics')).'</div>';

?>
</body>
</html>
Powered by <a href="http://premiumwordpressthemesfree.com/flipbook-premium-wordpress-theme">WordPress</a>