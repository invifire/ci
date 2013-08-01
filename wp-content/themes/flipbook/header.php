<!DOCTYPE HTML>
<html <?php language_attributes(); ?>>
<?php load_theme_textdomain( 'flipbook', TEMPLATEPATH . '/languages' ); ?>
<head>
<meta charset="<?php bloginfo('charset'); ?>" />

<link rel="shortcut icon" href="<?php echo get_theme_option('custom_favicon'); ?>" />

<link href='http://fonts.googleapis.com/css?family=Open+Sans:600' rel='stylesheet' type='text/css'>

<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" href="<?php bloginfo('rss2_url'); ?>" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />


<?php wp_head(); ?>

<!--[if lte IE 9]>
<script src="http://ie7-js.googlecode.com/svn/version/2.1(beta4)/IE9.js"></script>
<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->


<!--[if IE 8]>
<link rel="stylesheet" href="<?php echo THEME_CSS;?>/ie8.css" type="text/css" media="screen" />
<![endif]-->


<title><?php theme_functions('title'); ?></title>


</head>

<body>

<?php 

$main_layout=get_meta_option('main_layout');

$theme_page_type=get_meta_option('theme_page_type');

$class='';
if($main_layout==2 || $main_layout==4 || $main_layout==5) $class='class="closed"';

?>

<div id="header" <?php echo $class;?>>

    <a id="logo" href="<?php echo home_url( '/' ); ?>"><img src="<?php echo get_theme_option('logo_image'); ?>"></a>

    <?php wp_nav_menu( array( 'sort_column' => 'menu_order', 'container' => false, 'menu' =>'main_nav', 'menu_id' => 'nav' ) ); ?>

    <ul id="social_icons">
    
		<?php

		$social_icons=get_theme_option("social_icons");
		$social_icons=explode(',',$social_icons);

		foreach($social_icons as $icon)
			echo '<li><a target="_blank" title="'.$icon.'" href="'.get_theme_option("social_icons_".$icon).'"><img src="'.THEME_IMAGES.'/social_icons/'.$icon.'.png"></a></li>';
		?>
	
    </ul>
    
    <form method="get" id="searchform" action="<?php echo home_url(); ?>">
		<input type="text" class="text_input" value="<?php _e('Search...', 'flipbook');?>" name="s" id="s" onfocus="if(this.value == '<?php _e('Search...', 'flipbook');?>') {this.value = '';}" onblur="if (this.value == '') {this.value = '<?php _e('Search...', 'flipbook');?>';}" />
	</form>
	
	<?php if( ($main_layout==3 || $main_layout==4 ) && ( $theme_page_type==1 || is_single() ) ): ?>
	
		<div id="close_btn_header"></div>
	
    <?php endif; ?>
	

	

</div>

	<?php if( ($main_layout==1 || $main_layout==2 ) && ( $theme_page_type==1 || is_single() ) ): ?>
	
		<div id="open_btn"></div>
	
	<?php endif; ?>


	<?php if( ($main_layout==3 || $main_layout==4 ) && ( $theme_page_type==1 || is_single() ) ): ?>
	
		<div id="open_btn_header"></div>
	
	<?php endif; ?>


