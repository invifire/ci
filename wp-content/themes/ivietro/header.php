<?php
/**
 * @package WordPress
 * @subpackage P2
 */
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>
<head profile="http://gmpg.org/xfn/11">
<meta http-equiv="Content-Type" content="<?php bloginfo( 'html_type' ); ?>; charset=<?php bloginfo( 'charset' ); ?>" />
<title><?php wp_title( '&laquo;', true, 'right' ); ?> <?php bloginfo( 'name' ); ?></title>
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<link rel="stylesheet" href="<?php bloginfo( 'stylesheet_url' ); ?>" type="text/css" media="screen" />
	<meta property="og:title" content="Experience a more beautiful web" />
    <meta property="og:url" content="http://www.invifire.com" />
	<meta property="og:description" content="Fire's blog - Internet lover" />
    <meta property="og:site_name" content="invifire.com" />
	<meta itemprop="name" content="Internet lover - Invifire.com" />
    <meta name="description" content="<?php wp_title( '&laquo;', true, 'right' ); ?> <?php bloginfo( 'name' ); ?>." />
    <meta name="keywords" content="Invifire, Internet, Google app engine, python, cloud, django, php, web development, website, life sharing, Amazon, wordpress theme, funny, html5, javascript, jquery" />
    <meta name="author" content="Invifire.com">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

<div id="header">

	<div class="sleeve">
		<h1><a href="<?php echo home_url( '/' ); ?>"><?php bloginfo( 'name' ); ?></a></h1>
		<?php if ( get_bloginfo( 'description' ) ) : ?>
			<small><?php bloginfo( 'description' ); ?></small>
		<?php endif; ?>
		<a class="secondary" href="<?php echo home_url( '/' ); ?>"></a>
	</div>

</div>

<div id="wrapper">
	<?php get_sidebar(); ?>