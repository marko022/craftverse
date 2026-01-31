<?php
	add_theme_support( 'nav-menus' );
	add_post_type_support( 'page', 'excerpt' );
	add_theme_support( 'post-thumbnails' );

	// Register menus
	function register_my_menus() {
		register_nav_menus(
			array(
				'primary' => __( 'Primary Navigation', 'twentyten' ),
				'secondary' => __( 'Secondary Navigation', 'twentyten' ),
				'footer' => __( 'Footer Navigation', 'twentyten' ),
			)
		);
	}
	add_action( 'init', 'register_my_menus' );
  add_filter('wpcf7_autop_or_not', '__return_false');

  // Add theme options
  if( function_exists('acf_add_options_page') ) {
    acf_add_options_page("Theme Settings");
  }

?>