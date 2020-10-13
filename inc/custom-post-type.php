<?php
class FS_CPT {
	
	function __construct() {
	}
	
	
	function init() {
		
		add_action( 'init',                 array( $this, 'cpt_project'), 1 );
		
		add_action( 'init',                 array( $this, 'tax_project'), 1 );
		
		//add_action( 'pre_get_posts',		array( $this, 'pre_get_posts' ), 1 );

		add_filter( 'enter_title_here',		array( $this, 'change_title_text' ) );

		//add_filter( 'manage_edit-project_columns',				array( $this, 'add_new_columns_project' ) );
		//add_filter( 'manage_project_posts_custom_column',			array( $this, 'manage_columns_project' ) );
	}
	
	/**
	*
	*	Register Custom Post Type
	*
	**/
	
	function cpt_project() {
	
		$labels = array(
			'name'                  => _x( 'Projects', 'Post Type General Name', 'from-scratch' ),
			'singular_name'         => _x( 'Project', 'Post Type Singular Name', 'from-scratch' ),
			'menu_name'             => __( 'Projects', 'from-scratch' ),
			'name_admin_bar'        => __( 'Projects', 'from-scratch' ),
			'archives'              => __( 'Item Archives', 'from-scratch' ),
			'attributes'            => __( 'Item Attributes', 'from-scratch' ),
			'parent_item_colon'     => __( 'Parent Item:', 'from-scratch' ),
			'all_items'             => __( 'All Items', 'from-scratch' ),
			'add_new_item'          => __( 'Add New Item', 'from-scratch' ),
			'add_new'               => __( 'Add New', 'from-scratch' ),
			'new_item'              => __( 'New Item', 'from-scratch' ),
			'edit_item'             => __( 'Edit Item', 'from-scratch' ),
			'update_item'           => __( 'Update Item', 'from-scratch' ),
			'view_item'             => __( 'View Item', 'from-scratch' ),
			'view_items'            => __( 'View Items', 'from-scratch' ),
			'search_items'          => __( 'Search Item', 'from-scratch' ),
			'not_found'             => __( 'Not found', 'from-scratch' ),
			'not_found_in_trash'    => __( 'Not found in Trash', 'from-scratch' ),
			'featured_image'        => __( 'Featured Image', 'from-scratch' ),
			'set_featured_image'    => __( 'Set featured image', 'from-scratch' ),
			'remove_featured_image' => __( 'Remove featured image', 'from-scratch' ),
			'use_featured_image'    => __( 'Use as featured image', 'from-scratch' ),
			'insert_into_item'      => __( 'Insert into item', 'from-scratch' ),
			'uploaded_to_this_item' => __( 'Uploaded to this item', 'from-scratch' ),
			'items_list'            => __( 'Items list', 'from-scratch' ),
			'items_list_navigation' => __( 'Items list navigation', 'from-scratch' ),
			'filter_items_list'     => __( 'Filter items list', 'from-scratch' ),
		);
		$rewrite = array(
			'slug'                  => __('project', 'from-scratch'),
			'with_front'            => true,
			'pages'                 => true,
			'feeds'                 => true,
		);
		$args = array(
			'label'                 => __( 'Project', 'from-scratch' ),
			'description'           => __( 'Post Type Description', 'from-scratch' ),
			'labels'                => $labels,
			'supports'              => array( 'title', 'editor', 'thumbnail', 'comments', 'revisions', 'page-attributes' ),
			'taxonomies'            => array( 'project-type' ),
			'hierarchical'          => false,
			'public'                => true,
			'show_ui'               => true,
			'show_in_menu'          => true,
			'menu_position'         => 5,
			'menu_icon'             => 'dashicons-carrot',
			'show_in_admin_bar'     => true,
			'show_in_nav_menus'     => true,
			'can_export'            => true,
			'has_archive'           => true,
			'exclude_from_search'   => false,
			'publicly_queryable'    => true,
			'rewrite'               => $rewrite,
			'capability_type'       => 'post',
			'show_in_rest'          => true,
		);
		register_post_type( 'project', $args );
	}	
	
	function change_title_text( $title ) {
		$screen = get_current_screen();

		if( 'project' == $screen->post_type ) {
			$title = __('Choose a title for this project', 'from-scratch');
		}

		return $title;
	}



/*
	function add_new_columns_publication( $wp_columns ) {
		
		$column_before = array();
		$column_after['visuel'] = 'Visuel';
		
		unset( $wp_columns['date'] );
		
		$wp_columns = array_merge( $column_before, $wp_columns, $column_after );

		return $wp_columns;
	}

	function manage_columns_publication( $column_name ) {
		global $wpdb, $post;

		switch( $column_name ) {
			
			case 'visuel':
				if( has_post_thumbnail( $post->ID ) ){
					echo get_the_post_thumbnail( $post->ID, 'medium' );
				}
				break;

			default:
				break;
		} // end switch
	}
	
*/
	

	// Register Custom Taxonomy

	function tax_project() {
	
		$labels = array(
			'name'                       => _x( 'Project types', 'Taxonomy General Name', 'from-scratch' ),
			'singular_name'              => _x( 'Project type', 'Taxonomy Singular Name', 'from-scratch' ),
			'menu_name'                  => __( 'Project types', 'from-scratch' ),
			'all_items'                  => __( 'All Items', 'from-scratch' ),
			'parent_item'                => __( 'Parent Item', 'from-scratch' ),
			'parent_item_colon'          => __( 'Parent Item:', 'from-scratch' ),
			'new_item_name'              => __( 'New Item Name', 'from-scratch' ),
			'add_new_item'               => __( 'Add New Item', 'from-scratch' ),
			'edit_item'                  => __( 'Edit Item', 'from-scratch' ),
			'update_item'                => __( 'Update Item', 'from-scratch' ),
			'view_item'                  => __( 'View Item', 'from-scratch' ),
			'separate_items_with_commas' => __( 'Separate items with commas', 'from-scratch' ),
			'add_or_remove_items'        => __( 'Add or remove items', 'from-scratch' ),
			'choose_from_most_used'      => __( 'Choose from the most used', 'from-scratch' ),
			'popular_items'              => __( 'Popular Items', 'from-scratch' ),
			'search_items'               => __( 'Search Items', 'from-scratch' ),
			'not_found'                  => __( 'Not Found', 'from-scratch' ),
			'no_terms'                   => __( 'No items', 'from-scratch' ),
			'items_list'                 => __( 'Items list', 'from-scratch' ),
			'items_list_navigation'      => __( 'Items list navigation', 'from-scratch' ),
		);
		$rewrite = array(
			'slug'                       => __('project-type', 'from-scratch'),
			'with_front'                 => true,
			'hierarchical'               => false,
		);
		$args = array(
			'labels'                     => $labels,
			'hierarchical'               => true,
			'public'                     => true,
			'show_ui'                    => true,
			'show_admin_column'          => true,
			'show_in_nav_menus'          => true,
			'show_tagcloud'              => true,
			'rewrite'                    => $rewrite,
			'show_in_rest'               => true,
		);
		register_taxonomy( 'project-type', array( 'project' ), $args );
	
	}	
	
}

$fs_cpt = new FS_CPT();
$fs_cpt->init();