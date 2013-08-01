<?php

//constants
define('THEME_NAME', 'Flipbook');
define('THEME_SLUG', 'flipbook');
define('THEME_DIR', get_template_directory());
define('THEME_URI', get_template_directory_uri());
define('THEME_FRAMEWORK', THEME_DIR . '/framework');
define('THEME_GLOBAL', THEME_FRAMEWORK . '/global');
define('THEME_CUSTOM_TYPES', THEME_FRAMEWORK . '/custom_post_types');
define('THEME_WIDGETS', THEME_FRAMEWORK . '/widgets');
define('THEME_SHORTCODES', THEME_FRAMEWORK . '/shortcodes');
define('THEME_INCLUDES', THEME_URI . '/includes');
define('THEME_IMAGES', THEME_URI . '/images');
define('THEME_CSS', THEME_URI . '/css');
define('THEME_JS', THEME_URI . '/js');
define('THEME_ADMIN', THEME_FRAMEWORK . '/admin');
define('THEME_ADMIN_URI', THEME_URI . '/framework/admin');
define('THEME_ADMIN_CSS', THEME_ADMIN_URI . '/css');
define('THEME_ADMIN_JS', THEME_ADMIN_URI . '/js');
define('THEME_ADMIN_IMAGES', THEME_ADMIN_URI . '/images');
define('THEME_ADMIN_OPTIONS', THEME_ADMIN . '/options');
define('THEME_ADMIN_METABOXES', THEME_ADMIN . '/metaboxes');


//supports
register_nav_menu('main_nav', THEME_NAME . ' Navigation');
add_theme_support('post-thumbnails', array('post', 'page', 'portfolio', 'gallery'));
add_theme_support('automatic-feed-links');


//global functions
require_once (THEME_GLOBAL . '/head.php');
require_once (THEME_GLOBAL . '/theme_functions.php');
require_once (THEME_GLOBAL . '/getoption.php');
require_once (THEME_GLOBAL . '/resize.php');

//custom post types
require_once (THEME_CUSTOM_TYPES . '/gallery.php');
require_once (THEME_CUSTOM_TYPES . '/portfolio.php');

//admin
require_once (THEME_ADMIN_METABOXES . '/global_functions.php');
require_once (THEME_ADMIN_METABOXES . '/attachment.php');
require_once (THEME_ADMIN_METABOXES . '/post.php');
require_once (THEME_ADMIN_METABOXES . '/page.php');
require_once (THEME_ADMIN_METABOXES . '/portfolio.php');
require_once (THEME_ADMIN_METABOXES . '/gallery.php');
require_once (THEME_ADMIN_METABOXES . '/shortcodes.php');

// Custom functions and plugins
require_once (THEME_ADMIN . '/admin-functions.php');

// Admin Interfaces (options,framework, seo)		
require_once (THEME_ADMIN . '/admin-interface.php');		

// Options panel settings and custom settings
require_once (THEME_ADMIN . '/theme-options.php'); 
require_once (THEME_ADMIN . '/head.php');

//shortcodes
require_once (THEME_SHORTCODES . '/columns.php');
require_once (THEME_SHORTCODES . '/contactform.php');
require_once (THEME_SHORTCODES . '/flickr.php');
require_once (THEME_SHORTCODES . '/googlemap.php');
require_once (THEME_SHORTCODES . '/images.php');
require_once (THEME_SHORTCODES . '/raw.php');
require_once (THEME_SHORTCODES . '/twitter.php');
require_once (THEME_SHORTCODES . '/typography.php');
require_once (THEME_SHORTCODES . '/videos.php');

//widgets
require_once (THEME_WIDGETS . '/contactform.php');
require_once (THEME_WIDGETS . '/flickr.php');
require_once (THEME_WIDGETS . '/googlemap.php');
require_once (THEME_WIDGETS . '/popular.php');
require_once (THEME_WIDGETS . '/recent.php');
require_once (THEME_WIDGETS . '/related.php');
require_once (THEME_WIDGETS . '/subnavigation.php');
require_once (THEME_WIDGETS . '/twitter.php');
require_once (THEME_WIDGETS . '/video.php');
?>