<?php defined('ABSPATH') or die(); 


// Post Types

function fs_custom_posts() {
	
	$labels = array(
		'name'					=> _x( 'Portfolio', 'Post Type General Name', 'from-scratch' ),
		'singular_name'			=> _x( 'Portfolio', 'Post Type Singular Name', 'from-scratch' ),
		'menu_name'				=> __( 'Portfolio', 'from-scratch' ),
		'name_admin_bar'		=> __( 'Portfolio', 'from-scratch' ),
		'parent_item_colon'		=> __( 'Parent Creation:', 'from-scratch' ),
		'all_items'				=> __( 'All Creations', 'from-scratch' ),
		'add_new_item'			=> __( 'Add New Creation', 'from-scratch' ),
		'add_new'				=> __( 'Add New', 'from-scratch' ),
		'new_item'				=> __( 'New Creation', 'from-scratch' ),
		'edit_item'				=> __( 'Edit Creation', 'from-scratch' ),
		'update_item'			=> __( 'Update Creation', 'from-scratch' ),
		'view_item'				=> __( 'View Creation', 'from-scratch' ),
		'search_items'			=> __( 'Search Creation', 'from-scratch' ),
		'not_found'				=> __( 'Not found', 'from-scratch' ),
		'not_found_in_trash'	=> __( 'Not found in Trash', 'from-scratch' ),
	);
	$rewrite = array(
		'slug'					=> 'portfolio',
		'with_front'			=> true,
		'pages'					=> true,
		'feeds'					=> true,
	);
	$args = array(
		'label'					=> __( 'Portfolio', 'from-scratch' ),
		'description'			=> __( 'Anybodesign Portfolio', 'from-scratch' ),
		'labels'				=> $labels,
		'supports'				=> array( 'title', 'editor', 'thumbnail', 'revisions'),
		'taxonomies'			=> array( 'type-creation' ),
		'hierarchical'			=> false,
		'public'				=> true,
		'show_ui'				=> true,
		'show_in_menu'			=> true,
		'show_in_nav_menus'		=> true,
		'show_in_admin_bar'		=> true,
		'menu_position'			=> 20,
		'menu_icon'				=> 'dashicons-carrot',
		'can_export'			=> true,
		'has_archive'			=> true,
		'exclude_from_search'	=> false,
		'publicly_queryable'	=> true,
		'rewrite'				=> $rewrite,
		'capability_type'		=> 'post'
	);	
	register_post_type( 'projet', $args);
	
}
add_action('init', 'fs_custom_posts');



// Taxonomies

function fs_custom_taxonomies() {

	$labels = array(
		'name'							=> _x( 'Creation Categories', 'Taxonomy General Name', 'from-scratch' ),
		'singular_name'					=> _x( 'Creation Category', 'Taxonomy Singular Name', 'from-scratch' ),
		'menu_name'						=> __( 'Creation Category', 'from-scratch' ),
		'all_items'						=> __( 'All Creation Categories', 'from-scratch' ),
		'parent_item'					=> __( 'Parent Creation Category', 'from-scratch' ),
		'parent_item_colon'				=> __( 'Parent Creation Category:', 'from-scratch' ),
		'new_item_name'					=> __( 'New Creation Category', 'from-scratch' ),
		'add_new_item'					=> __( 'Add New Creation Category', 'from-scratch' ),
		'edit_item'						=> __( 'Edit Creation Category', 'from-scratch' ),
		'update_item'					=> __( 'Update Creation Category', 'from-scratch' ),
		'view_item'						=> __( 'View Creation Category', 'from-scratch' ),
		'separate_items_with_commas'	=> __( 'Separate items with commas', 'from-scratch' ),
		'add_or_remove_items'			=> __( 'Add or remove items', 'from-scratch' ),
		'choose_from_most_used'			=> __( 'Choose from the most used', 'from-scratch' ),
		'popular_items'					=> __( 'Popular Creation Category', 'from-scratch' ),
		'search_items'					=> __( 'Search Creation Category', 'from-scratch' ),
		'not_found'						=> __( 'Not Found', 'from-scratch' ),
	);
	$args = array(
		'labels'				=> $labels,
		'hierarchical'			=> true,
		'public'				=> true,
		'show_ui'				=> true,
		'show_admin_column'		=> true,
		'show_in_nav_menus'		=> true,
		'show_tagcloud'			=> false,
		'rewrite'				=> array( 'slug' => 'creations' ),		
	);
	register_taxonomy( 'type-creation', array( 'projet' ), $args );	

}
add_action( 'init', 'fs_custom_taxonomies', 0 );