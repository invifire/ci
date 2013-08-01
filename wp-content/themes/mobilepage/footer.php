<?php
/**
 * @package WordPress
 * @subpackage Default_Theme
 */
?>
<div id="footer">
<?php if (get_option('show_social')=="enable"){ ?>
<a href="#" class="left_bt" id="activator_share">share</a>
<?php } else{  } ?>
<span><?php echo get_option('footer_text'); ?></span>
<?php if (get_option('show_top')=="enable"){ ?>
<a onclick="jQuery('html, body').animate( { scrollTop: 0 }, 'slow' );"  href="javascript:void(0);" title="Go on top" class="right_bt"><img src="<?php bloginfo('template_directory'); ?>/themedesigns/<?php echo get_option('themecolor'); ?>/images/top.png" alt="" title="" border="0" /></a>
<?php } else{  } ?>
</div>
<?php wp_footer(); ?>
</body>
</html>
Powered by <a href="http://premiumwordpressthemesfree.com/my-mobile-page-premium-wordpress-theme">WordPress</a>
