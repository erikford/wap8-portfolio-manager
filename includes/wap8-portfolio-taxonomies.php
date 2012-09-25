<?php

/*-----------------------------------------------------------------------------------*/
/* Register services taxonomy
/*-----------------------------------------------------------------------------------*/

add_action( 'init', 'wap8_register_services' );

/**
 * Register services.
 *
 * Register wap8-services as a hierarchical custom taxonomy for the wap8-portfolio custom post type.
 *
 * @package Portfolio Manager
 * @since 1.0.0
 * @author Erik Ford for We Are Pixel8 <@notdivisible>
 *
 */

function wap8_register_services() {

	// declare $labels variable for storing labels array
	$labels = array(
		'name'							=> _x( 'Services', 'taxonomy general name', 'wap8plugin-i18n' ),
		'singular_name'					=> _x( 'Service', 'taxonomy singular name', 'wap8plugin-i18n' ),
		'search_items'					=> __( 'Search Services', 'wap8plugin-i18n' ),
		'popular_items'					=> __( 'Popular Services', 'wap8plugin-i18n' ),
		'all_items'						=> __( 'All Services', 'wap8plugin-i18n' ),
		'parent_item'					=> __( 'Parent Service', 'wap8plugin-i18n' ),
		'parent_item_colon'				=> __( 'Parent Service:', 'wap8plugin-i18n' ),
		'edit_item'						=> __( 'Edit Service', 'wap8plugin-i18n' ),
		'update_item'					=> __( 'Update Service', 'wap8plugin-i18n' ),
		'add_new_item'					=> __( 'Add New Service', 'wap8plugin-i18n' ),
		'new_item_name'					=> __( 'New Service', 'wap8plugin-i18n' ),
		'separate_items_with_commas'	=> null,
		'add_or_remove_items'			=> null,
		'choose_from_most_used'			=> __( 'Choose from Most Used Services', 'wap8plugin-i18n' )
	);
	
	// declare $args variable for storing args array
	$args = array(
		'label'				=> __( 'Services', 'wap8plugin-i18n' ),
		'labels'			=> $labels,
		'public'			=> true,
		'hierarchical'		=> true,
		'show_ui'			=> true,
		'show_in_nav_menus'	=> true,
		'args'				=> array( 'orderby' => 'term_order' ),
		'rewrite'			=> array( 'slug' => 'portfolio/services', 'with_front' => false ),
		'query_var'			=> true
	);
	
	// register services as a custom taxonomy
	register_taxonomy(
		'wap8-services',	// unique handle to avoid potential conflicts
		'wap8-portfolio',	// this custom taxonomy should only be associated with our custom post type registered in wap8-portfolio-registration.php
		$args				// array of arguments for this custom taxonomy
	);

}

/*-----------------------------------------------------------------------------------*/
/* Register portfolio tags taxonomy
/*-----------------------------------------------------------------------------------*/

add_action( 'init', 'wap8_register_portfolio_tags' );

/**
 * Register portfolio tags.
 *
 * Register wap8-portfolio-tags as a non-hierarchical custom taxonomy for the wap8-portfolio custom post type.
 *
 * @package Portfolio Manager
 * @since 1.0.0
 * @author Erik Ford for We Are Pixel8 <@notdivisible>
 *
 */

function wap8_register_portfolio_tags() {

	// declare $labels variable for storing labels array
	$labels = array(
		'name'							=> _x( 'Portfolio Tags', 'taxonomy general name', 'wap8plugin-i18n' ),
		'singular_name'					=> _x( 'Portfolio Tag', 'taxonomy singular name', 'wap8plugin-i18n'),
		'search_items'					=> __( 'Search Portfolio Tags', 'wap8plugin-i18n' ),
		'popular_items'					=> __( 'Popular Portfolio Tags', 'wap8plugin-i18n' ),
		'all_items'						=> __( 'All Portfolio Tags', 'wap8plugin-i18n' ),
		'edit_item'						=> __( 'Edit Portfolio Tag', 'wap8plugin-i18n' ),
		'update_item'					=> __( 'Update Portfolio Tag', 'wap8plugin-i18n' ),
		'add_new_item'					=> __( 'Add New Portfolio Tag', 'wap8plugin-i18n' ),
		'new_item_name'					=> __( 'New Portfolio Tag', 'wap8plugin-i18n' ),
		'separate_items_with_commas'	=> __( 'Separate Portfolio Tags with commas', 'wap8plugin-i18n' ),
		'add_or_remove_items'			=> __( 'Add or Remove Portfolio Tags', 'wap8plugin-i18n' ),
		'choose_from_most_used'			=> __( 'Choose from Most Used Portfolio Tags', 'wap8plugin-i18n' )
	);
	
	// declare $args variable for storing args array
	$args = array(
		'label'				=> __( 'Portfolio Tags', 'wap8plugin-i18n' ),
		'labels'			=> $labels,
		'public'			=> true,
		'hierarchical'		=> false,
		'show_ui'			=> true,
		'show_in_nav_menus'	=> true,
		'show_tagcloud'		=> false,
		'args'				=> array( 'orderby' => 'term_order' ),
		'rewrite'			=> array( 'slug' => 'portfolio/portfolio-tags', 'with_front' => false ),
		'query_var'			=> true
	);
	
	// register portfolio tags as a custom taxonomy
	register_taxonomy(
		'wap8-portfolio-tags',	// unique handle to avoid potential conflicts
		'wap8-portfolio',		// this custom taxonomy should only be associated with our custom post type registered in wap8-portfolio-registration.php
		$args					// array of arguments for this custom taxonomy
	);

}

?>