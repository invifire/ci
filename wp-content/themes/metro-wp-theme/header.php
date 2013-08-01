<?php
/**
 *  * @package WordPress
 * @subpackage Classic_Theme
 */
?>
<!DOCTYPE html>
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en" <?php language_attributes(); ?>> <!--<![endif]-->
<head>
	<title><?php wp_title('&laquo;', true, 'right'); ?> <?php bloginfo('name'); ?></title>

	<meta charset="<?php bloginfo('charset'); ?>">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> <!php bloginfo('html_type'); ?>
	<!-- Editable Meta Tags -->
	<meta property="og:title" content="<?php wp_title('&laquo;', true, 'right'); ?>" />
    <meta property="og:url" content="http://www.ivioon.com" />
	<meta property="og:description" content="Puts the stuff you love one click away and makes them your." />
    <meta property="og:site_name" content="ivioon.com" />
    <meta property="og:image" content="static/images/" />
	<meta itemprop="name" content="<?php wp_title('&laquo;', true, 'right'); ?> <?php bloginfo('name'); ?>" />
    <meta name="description" content="Puts the stuff you love one click away and makes them your." />
    <meta name="keywords" content="" />
    <meta name="author" content="ivioon.com">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="copyright" content="Invifire" />
	<meta name="robots" content="index,follow" />
	<meta name="google-site-verification" content="nj8T7x4JO1-I6aSCoo2sMk7WanHSzJEDG3-xsj0q05A" />
    <meta name="msvalidate.01" content="096CC44AE608C1586DE5658F7D37CAED" />
    <meta name="msapplication-navbutton-color" content="#5f6dbd" />
	<!-- Meta Tags End-->
	
	
	<style type="text/css" media="screen">
		@import url( <?php bloginfo('stylesheet_url'); ?> );
	</style>
	<link type="text/css" rel="stylesheet" href="<?php bloginfo('stylesheet_directory'); ?>/content/prettify/prettify.css"></link>

	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
	<?php wp_get_archives('type=monthly&format=link'); ?>
	<?php //comments_popup_script(); // off by default ?>
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div class="container">
<div class="header left">
	<h1>
	<a href="<?php bloginfo('url'); ?>" ><img class="back"/><?php bloginfo('name'); ?></h1></a>
	<!--<span class="description"><?php bloginfo('description'); ?></span>-->
</div>
<!--<div class="nav right">
  <a href="/blog/about" class="socialLink email" title="Contact Me"><span>Email Me</span></a>
  <a href="http://twitter.com/xamlcoder" target="_blank" class="socialLink twitter" title="Follow me on Twitter"><span>Follow me on Twitter</span></a>
  <a href="http://linkedin.com/in/joemcbride" target="_blank" class="socialLink linkedin" title="View my profile on Linked In"><span>View my profile on Linked In</span></a>
  <a href="http://facebook.com/josephtmcbride" target="_blank" class="socialLink facebook" title="Find me on Facebook"><span>Find me on Facebook</span></a>
  <a href="http://feeds.feedburner.com/joemcbride" target="_blank" class="socialLink rss" title="Subscribe to my RSS Feed"><span>Subscribe to my RSS Feed</span></a>
</div>-->
<div class="main clear">
<!-- end header -->
