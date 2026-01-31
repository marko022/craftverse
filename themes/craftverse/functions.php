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

	// Add CPT Called "Projects"
	function create_post_type_projects() {
		register_post_type( 'projects',
			array(
				'labels' => array(
					'name' => __( 'Projects' ),
					'singular_name' => __( 'Project' )
				),
				'public' => true,
				'has_archive' => true,
				'supports' => array( 'title', 'editor', 'thumbnail', 'excerpt', 'custom-fields' ),
				'rewrite' => array( 'slug' => 'projects' ),
				'taxonomies' => array('brands'),
				'menu_icon' => 'dashicons-portfolio',
			)
		);
	}
	add_action( 'init', 'create_post_type_projects' );

	// Custom Taxonomy for Projects Called "Brands"
	function create_taxonomy_brands() {
		register_taxonomy(
			'brands',
			'projects',
			array(
				'label' => __( 'Brands' ),
				'rewrite' => array( 'slug' => 'brands' ),
				'hierarchical' => true,
			)
		);
	}
	add_action( 'init', 'create_taxonomy_brands' );
	
?>