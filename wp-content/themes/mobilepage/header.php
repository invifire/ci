<?php
/**
 * @package WordPress
 * @subpackage Default_Theme
 */
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>

<head profile="http://gmpg.org/xfn/11">
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
<meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0;">  
<title><?php wp_title('&laquo;', true, 'right'); ?> <?php bloginfo('name'); ?></title>
<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/style.css" type="text/css" />
<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/themedesigns/<?php echo get_option('themecolor'); ?>/style.css" type="text/css" />
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
<?php if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); ?>
<?php wp_enqueue_script('jquery'); ?>
<?php wp_head(); ?>
<script type="text/javascript">
var $ = jQuery.noConflict();
	$(function() {
		$('#activator').click(function(){
				$('#box').animate({'top':'65px'},500);
		});
		$('#boxclose').click(function(){
				$('#box').animate({'top':'-400px'},500);
		});
		$('#activator_share').click(function(){
				$('#box_share').animate({'top':'65px'},500);
		});
		$('#boxclose_share').click(function(){
				$('#box_share').animate({'top':'-400px'},500);
		});

	});
	$(document).ready(function(){
	$(".toggle_container").hide(); 
	$(".trigger").click(function(){
		$(this).toggleClass("active").next().slideToggle("slow");
		return false;
	});
	
	});
</script>
<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/photoslide.js"></script>
</head>
<body>
<div id="main_container">

        <div class="box" id="box">
        	<div class="box_content">
            
            	<div class="box_content_tab">
                Search
                </div>
                
                <div class="box_content_center">
                <div class="form_content">
                <form method="get" id="searchform" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                <input type="text" class="form_input_box" value="<?php the_search_query(); ?>" name="s" id="s"/>
                <a class="boxclose" id="boxclose">Close</a>
                <input type="submit" class="form_submit" id="searchsubmit" value="Submit"/>
                </form>
                </div> 
                
                <div class="clear"></div>
                </div>
            
           </div>
        </div>

        <div class="box" id="box_share">
        	<div class="box_content">
            	<div class="box_content_tab">
                Social Share
                </div>
                <div class="box_content_center">
                
                        <div class="social_share">
                        <ul>    
                        
				<?php if (get_option('rss') != '') { ?>
                <li><a href="<?php echo stripslashes(get_option('rss'));?>"><img src="<?php bloginfo('template_directory'); ?>/images/social/rss.png" alt="" title="" border="0" /></a></li> 
                <? } else { }?>
				<?php if (get_option('google') != '') { ?>
                <li><a href="<?php echo stripslashes(get_option('google'));?>"><img src="<?php bloginfo('template_directory'); ?>/images/social/google.png" alt="" title="" border="0" /></a></li>
                <? } else { }?>
				<?php if (get_option('twitter') != '') { ?>
                <li><a href="<?php echo stripslashes(get_option('twitter'));?>"><img src="<?php bloginfo('template_directory'); ?>/images/social/twitter.png" alt="" title="" border="0" /></a></li>
                <? } else { }?>
				<?php if (get_option('delicious') != '') { ?>
                <li><a href="<?php echo stripslashes(get_option('delicious'));?>"><img src="<?php bloginfo('template_directory'); ?>/images/social/delicious.png" alt="" title="" border="0" /></a></li>
                <? } else { }?>
				<?php if (get_option('digg') != '') { ?>
                <li><a href="<?php echo stripslashes(get_option('digg'));?>"><img src="<?php bloginfo('template_directory'); ?>/images/social/digg.png" alt="" title="" border="0" /></a></li>
                <? } else { }?>
				<?php if (get_option('linkedin') != '') { ?>
                <li><a href="<?php echo stripslashes(get_option('linkedin'));?>"><img src="<?php bloginfo('template_directory'); ?>/images/social/linkedin.png" alt="" title="" border="0" /></a></li>
                <? } else { }?>
				<?php if (get_option('facebook') != '') { ?>
                <li><a href="<?php echo stripslashes(get_option('facebook'));?>"><img src="<?php bloginfo('template_directory'); ?>/images/social/facebook.png" alt="" title="" border="0" /></a></li>
                <? } else { }?>
				<?php if (get_option('reddit') != '') { ?>
                <li><a href="<?php echo stripslashes(get_option('reddit'));?>"><img src="<?php bloginfo('template_directory'); ?>/images/social/reddit.png" alt="" title="" border="0" /></a></li>
                <? } else { }?>
				<?php if (get_option('myspace') != '') { ?>
                <li><a href="<?php echo stripslashes(get_option('myspace'));?>"><img src="<?php bloginfo('template_directory'); ?>/images/social/myspace.png" alt="" title="" border="0" /></a></li>
                <? } else { }?>
				<?php if (get_option('technorati') != '') { ?>
                <li><a href="<?php echo stripslashes(get_option('technorati'));?>"><img src="<?php bloginfo('template_directory'); ?>/images/social/technorati.png" alt="" title="" border="0" /></a></li>
                <? } else { }?>
				<?php if (get_option('stumbleupon') != '') { ?>
                <li><a href="<?php echo stripslashes(get_option('stumbleupon'));?>"><img src="<?php bloginfo('template_directory'); ?>/images/social/stumbleupon.png" alt="" title="" border="0" /></a></li>
                <? } else { }?>
				<?php if (get_option('flickr') != '') { ?>
                <li><a href="<?php echo stripslashes(get_option('flickr'));?>"><img src="<?php bloginfo('template_directory'); ?>/images/social/flickr.png" alt="" title="" border="0" /></a></li>
                <? } else { }?>
                        </ul>
                        </div>
            
                <a class="boxclose_right" id="boxclose_share">close</a>
                <div class="clear"></div>
                
                </div>
           </div>
        </div>