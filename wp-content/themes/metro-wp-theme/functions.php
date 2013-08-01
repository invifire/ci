<?php
/**
 * @package WordPress
 * @subpackage Classic_Theme
 */

automatic_feed_links();

if ( function_exists('register_sidebar') )
	register_sidebar(array(
		'before_widget' => '<li id="%1$s" class="widget %2$s">',
		'after_widget' => '</li>',
		'before_title' => '',
		'after_title' => '',
	));
	
function p2_maybe_define( $constant, $value, $filter = '' ) {
	if ( defined( $constant ) )
		return;

	if ( !empty( $filter ) )
		$value = apply_filters( $filter, $value );

	define( $constant, $value );
}
p2_maybe_define( 'P2_INC_PATH', get_template_directory()     . '/inc' );
p2_maybe_define( 'P2_INC_URL',  get_template_directory_uri() . '/inc' );
p2_maybe_define( 'P2_JS_PATH',  get_template_directory()     . '/js'  );
p2_maybe_define( 'P2_JS_URL',   get_template_directory_uri() . '/js'  );

class P2 {
	/**
	 * DB version.
	 *
	 * @var int
	 */
	var $db_version = 1;

	/**
	 * Options.
	 *
	 * @var array
	 */
	var $options = array();

	/**
	 * Option name in DB.
	 *
	 * @var string
	 */
	var $option_name = 'p2_manager';

	/**
	 * Components.
	 *
	 * @var array
	 */
	var $components = array();

	/**
	 * Includes and instantiates the various P2 components.
	function P2() {
		// Fetch options
		$this->options = get_option( $this->option_name );
		if ( false === $this->options )
			$this->options = array();

		// Include the P2 components
		$includes = array( 'compat', 'terms-in-comments', 'js-locale',
			'mentions', 'search', 'js', 'options-page',
			'template-tags', 'widgets/recent-tags', 'widgets/recent-comments',
			'list-creator' );

		if ( defined('DOING_AJAX') && DOING_AJAX )
			$includes[] = 'ajax';

		foreach ( $includes as $name ) {
			require_once( P2_INC_PATH . "/$name.php" )
		};
	 */
};
?>