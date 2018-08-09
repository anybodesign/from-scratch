<?php defined('ABSPATH') or die(); 


// Post Types

function fs_custom_posts() {
	
	$labels = array(
		'name'					=> _x( 'Portfolio', 'Post Type General Name', 'from-scratch' ),
		'singular_name'			=> _x( 'Portfolio', 'Post Type Singular Name', 'from-scratch' ),
		'menu_name'				=> __( 'Portfolio', 'from-scratch' ),
		'name_admin_bar'		=> __( 'Portfolio', 'from-scratch' ),
		//'parent_item_colon'		=> __( 'Parent Creation:', 'from-scratch' ),
		'all_items'				=> __( 'All Creations', 'from-scratch' ),
		'add_new_item'			=> __( 'Add New Creation', 'from-scratch' ),
		'new_item'				=> __( 'New Creation', 'from-scratch' ),
		'edit_item'				=> __( 'Edit Creation', 'from-scratch' ),
		'update_item'			=> __( 'Update Creation', 'from-scratch' ),
		'view_item'				=> __( 'View Creation', 'from-scratch' ),
		'search_items'			=> __( 'Search Creation', 'from-scratch' ),
		'not_found'				=> __( 'No creations were found', 'from-scratch' ),
		'featured_image'	 	=> __( 'Creation Picture', 'from-scratch' ),
		'set_featured_image' 	=> __( 'Set Creation Picture', 'from-scratch' ),
		'remove_featured_image' => __( 'Remove Creation Picture', 'from-scratch' ),
		'use_featured_image' 	=> __( 'Use as Creation Picture', 'from-scratch' ),
	);
	$rewrite = array(
		'slug'					=> __( 'portfolio', 'from-scratch' ),
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
	register_post_type( 'portfolio', $args);
	
}
add_action('init', 'fs_custom_posts');



// Flush Rewrite

add_action( 'after_switch_theme', function() {
    fs_custom_posts();
    flush_rewrite_rules();
});



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
		'popular_items'					=> __( 'Popular Creation Category', 'from-scratch' ),
		'search_items'					=> __( 'Search Creation Category', 'from-scratch' ),
		'not_found'						=> __( 'No creation categories were found', 'from-scratch' ),
	);
	$args = array(
		'labels'				=> $labels,
		'hierarchical'			=> false,
		'public'				=> true,
		'show_ui'				=> true,
		'show_admin_column'		=> true,
		'show_in_nav_menus'		=> true,
		'show_tagcloud'			=> false,
		'rewrite'				=> array( 'slug' => __( 'creations', 'from-scratch' ) ),		
	);
	register_taxonomy( 'type-creation', array( 'portfolio' ), $args );	

}
add_action( 'init', 'fs_custom_taxonomies', 0 );


// Taxonomy Selects
//
// https://blog.tjnevis.com/wordpress-admin-add-dropdown-filters-for-custom-taxonomies/

$restrict_manage_posts = function ($post_type, $taxonomy) {
    return function() use ($post_type, $taxonomy) {
        global $typenow;

        if ($typenow == $post_type) {
            $selected = isset($_GET[$taxonomy]) ? $_GET[$taxonomy] : '';
            $info_taxonomy = get_taxonomy($taxonomy);

            wp_dropdown_categories(array(
                'show_option_all'   => $info_taxonomy->label,
                'taxonomy'          => $taxonomy,
                'name'              => $taxonomy,
                'orderby'           => 'name',
                'selected'          => $selected,
                'show_count'        => TRUE,
                'hide_empty'        => TRUE,
            ));

        }

    };

};

$parse_query = function($post_type, $taxonomy) {

    return function($query) use($post_type, $taxonomy) {
        global $pagenow;

        $q_vars = &$query->query_vars;

        if( $pagenow == 'edit.php'
            && isset($q_vars['post_type']) && $q_vars['post_type'] == $post_type
            && isset($q_vars[$taxonomy])
            && is_numeric($q_vars[$taxonomy]) && $q_vars[$taxonomy] != 0
        ) {
            $term = get_term_by('id', $q_vars[$taxonomy], $taxonomy);
            $q_vars[$taxonomy] = $term->slug;
        }

    };

};

add_action('restrict_manage_posts', $restrict_manage_posts('portfolio', 'type-creation') );
add_filter('parse_query', $parse_query('portfolio', 'type-creation') );


// Custom titles

function fs_change_title_text( $title ) {
	$screen = get_current_screen();

	if  ( 'portfolio' == $screen->post_type ) {
		$title = __( 'Enter the name of the creation', 'from-scratch' );
	}

	return $title;
}
add_filter( 'enter_title_here', 'fs_change_title_text' );


// Admin Columns Shows

function fs_new_columns_portfolio( $wp_columns ) {
	$column_before = array();
	unset( $wp_columns['date'] );
	$column_after['visuel'] = __( 'Picture', 'from-scratch');
	$column_after['date'] = __( 'Date', 'from-scratch');
	$wp_columns = array_merge( $column_before, $wp_columns, $column_after );
	
	return $wp_columns;
}
function fs_manage_columns_portfolio( $column_name ) {
	global $wpdb, $post;

	switch( $column_name ) {
		case 'visuel':
			if( has_post_thumbnail( $post->ID ) ){
				echo get_the_post_thumbnail( $post->ID, array(60,60) );
			}
			break;
		
		default:
			break;
	}
}
add_filter( 'manage_edit-portfolio_columns', 'fs_new_columns_portfolio' );
add_filter( 'manage_portfolio_posts_custom_column', 'fs_manage_columns_portfolio' );
