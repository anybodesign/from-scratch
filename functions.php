<?php if ( !defined('ABSPATH') ) die();

// Theme Setup

if ( ! function_exists( 'from_scratch_setup' ) ) :

function from_scratch_setup() {
	
	
	// I18n
	
	load_theme_textdomain( 'fromscratch', get_template_directory() . '/languages' );
	
	
	// Theme Support
	
	add_editor_style( array('css/editor-style.css') );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );

	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	add_theme_support( 'post-formats', array(
		'aside',
		'image',
		'video',
		'quote',
		'link',
		'gallery',
		'status',
		'audio',
		'chat',
	) );


	// Menus
	
	register_nav_menus( array(
		'main_menu' =>  esc_html__( 'Main Menu', 'fromscratch' ),
		'footer_menu' => esc_html__( 'Footer Menu', 'fromscratch' )
	));


	// Sub-menus
	
	function from_scratch_submenu( $sorted_menu_items, $args ) {
	    $returns = array();
	    foreach ( $sorted_menu_items as $key => $obj ) {
	        if (in_array('menu-item-has-children', $obj->classes)) {
	            $obj->title .= '<button class="sub-menu-unfold"><span>'.__("Unfold Sub-Menu","fromscratch").'</span></button>';
	        }
	        $returns[$key] = $obj;
	    }
	    return $returns;
	}
	add_filter( 'wp_nav_menu_objects', 'from_scratch_submenu', 10, 2 );


}
endif;
add_action( 'after_setup_theme', 'from_scratch_setup' );




// Enqueue JS & CSS

function from_scratch_scripts_load() {
    if (!is_admin()) {

		// JS 
		
		wp_enqueue_script( 'jquery' );

		wp_enqueue_script(
			'from-scratch-skip-link-focus-fix', 
			get_template_directory_uri() . '/js/skip-link-focus-fix.js', 
			array(), 
			false, 
			true
		);
		
	    wp_enqueue_script( 
	    	'main', 
	    	get_template_directory_uri() . '/js/main.min.js',
	    	array('jquery'), 
	    	'1.0', 
	    	true
	    );
		
		
		// CSS
		
		wp_enqueue_style( 
			'prid', 
			get_template_directory_uri() . '/css/prid.css',
			array(), 
			'1.7', 
			'screen' 
		);
		
		wp_enqueue_style( 'from-scratch-style', get_stylesheet_uri() );

	}
}    
add_action( 'wp_enqueue_scripts', 'from_scratch_scripts_load' );


// Custom settings

include( dirname( __FILE__ ) . '/inc/custom-settings.php' );


// Widgets

function from_scratch_widgets_init() {
	register_sidebar(array(
		'name'			=>	esc_html__( 'Primary Widgets Area', 'fromscratch' ),
		'id'			=>	'widgets_area1',
		'description' 	=> 	'',
		'before_widget' => 	'',
		'after_widget' 	=> 	'',
		'before_title' 	=> 	'<h3 class="widget-title">',
		'after_title' 	=> 	'</h3>',
	));
}
add_action( 'widgets_init', 'from_scratch_widgets_init' );
