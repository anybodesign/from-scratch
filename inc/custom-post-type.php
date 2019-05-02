<?php
class FS_CPT {
	
	function __construct() {
	}
	
	
	function init() {
		
		add_action( 'init',                 array( $this, 'cpt_project'), 1 );
		
		add_action( 'init',                 array( $this, 'custom_taxonomy'), 1 );
		
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
			'name_admin_bar'        => __( 'Project', 'from-scratch' ),
			'archives'              => __( 'Project archives', 'from-scratch' ),
			'attributes'            => __( 'Project attributes', 'from-scratch' ),
			'parent_item_colon'     => __( 'Parent project:', 'from-scratch' ),
			'all_items'             => __( 'All the projects', 'from-scratch' ),
			'add_new_item'          => __( 'Add new project', 'from-scratch' ),
			'add_new'               => __( 'Add New', 'from-scratch' ),
			'new_item'              => __( 'New project', 'from-scratch' ),
			'edit_item'             => __( 'Edit project', 'from-scratch' ),
			'update_item'           => __( 'Update project', 'from-scratch' ),
			'view_item'             => __( 'View project', 'from-scratch' ),
			'view_items'            => __( 'View projects', 'from-scratch' ),
			'search_items'          => __( 'Search project', 'from-scratch' ),
			'not_found'             => __( 'Not found', 'from-scratch' ),
			'not_found_in_trash'    => __( 'Not found in Trash', 'from-scratch' ),
			'featured_image'        => __( 'Project picture', 'from-scratch' ),
			'set_featured_image'    => __( 'Set project picture', 'from-scratch' ),
			'remove_featured_image' => __( 'Remove project picture', 'from-scratch' ),
			'use_featured_image'    => __( 'Use as project picture', 'from-scratch' ),
			'insert_into_item'      => __( 'Insert into project', 'from-scratch' ),
			'uploaded_to_this_item' => __( 'Uploaded to this project', 'from-scratch' ),
			'items_list'            => __( 'Projects list', 'from-scratch' ),
			'items_list_navigation' => __( 'Projects list navigation', 'from-scratch' ),
			'filter_items_list'     => __( 'Filter events list', 'from-scratch' ),
		);
		$rewrite = array(
			'slug'                  => 'project',
			'with_front'            => true,
			'pages'                 => true,
			'feeds'                 => false,
		);
		$args = array(
			'label'                 => __( 'Project', 'from-scratch' ),
			'description'           => __( 'Project description', 'from-scratch' ),
			'labels'                => $labels,
			'supports'              => array( 'title', 'editor', 'thumbnail', 'excerpt' ),
			'taxonomies'            => array( 'project_type' ),
			'hierarchical'          => false,
			'public'                => true,
			'show_ui'               => true,
			'show_in_menu'          => true,
			'menu_position'         => 5,
			'menu_icon'             => 'dashicons-carrot',
			'show_in_admin_bar'     => true,
			'show_in_nav_menus'     => true,
			'can_export'            => true,
			'has_archive'           => 'projects',
			'exclude_from_search'   => false,
			'publicly_queryable'    => true,
			'rewrite'               => $rewrite,
			'capability_type'       => 'post',
			'show_in_rest'          => false,
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
	
	function custom_taxonomy() {
		
		// project_type
		$labels = array(
			'name'                       => _x( 'Projects types', 'Taxonomy General Name', 'from-scratch' ),
			'singular_name'              => _x( 'Project type', 'Taxonomy Singular Name', 'from-scratch' ),
			'menu_name'                  => __( 'Project type', 'from-scratch' ),
			'all_items'                  => __( 'All types', 'from-scratch' ),
			'parent_item'                => __( 'Parent type', 'from-scratch' ),
			'parent_item_colon'          => __( 'Parent type:', 'from-scratch' ),
			'new_item_name'              => __( 'New type name', 'from-scratch' ),
			'add_new_item'               => __( 'Add type Item', 'from-scratch' ),
			'edit_item'                  => __( 'Edit type', 'from-scratch' ),
			'update_item'                => __( 'Update type', 'from-scratch' ),
			'view_item'                  => __( 'View type', 'from-scratch' ),
			'separate_items_with_commas' => __( 'Separate types with commas', 'from-scratch' ),
			'add_or_remove_items'        => __( 'Add or remove types', 'from-scratch' ),
			'choose_from_most_used'      => __( 'Choose from the most used', 'from-scratch' ),
			'popular_items'              => __( 'Popular types', 'from-scratch' ),
			'search_items'               => __( 'Search types', 'from-scratch' ),
			'not_found'                  => __( 'Not Found', 'from-scratch' ),
			'no_terms'                   => __( 'No types', 'from-scratch' ),
			'items_list'                 => __( 'Types list', 'from-scratch' ),
			'items_list_navigation'      => __( 'Types list navigation', 'from-scratch' ),
		);
		$args = array(
			'labels'                     => $labels,
			'hierarchical'               => false,
			'public'                     => true,
			'show_ui'                    => true,
			'show_admin_column'          => true,
			'show_in_nav_menus'          => true,
			'show_tagcloud'              => false,
			'query_var'                  => 'project-type',
			'show_in_rest'               => false,
		);
		register_taxonomy( 'project_type', array( 'project' ), $args );
		
	}
	
	
}

$fs_cpt = new FS_CPT();
$fs_cpt->init();