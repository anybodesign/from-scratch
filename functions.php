<?php if ( !defined('ABSPATH') ) die();

// Content width

if ( ! isset( $content_width ) )
	$content_width = 640;


// From Scratch Theme Setup

if ( ! function_exists( 'from_scratch_setup' ) ) :

function from_scratch_setup() {
	
	
	// I18n
	
	load_theme_textdomain( 'from-scratch', get_template_directory() . '/languages' );
	
	
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


	// Custom Background
	
	$background_args = array(
		'default-color'          => '#ffffff',
		'default-image'          => '',
		'default-repeat'         => '',
		'default-position-x'     => '',
		//'wp-head-callback'       => 'from_scratch_custom_bg',
		'admin-head-callback'    => '',
		'admin-preview-callback' => '',
	);
	add_theme_support( 'custom-background', $background_args );


	// Custom Header
	
	$header_args = array(
		'default-image'          => '',
		'width'                  => 0,
		'height'                 => 0,
		'flex-width'             => true,
		'flex-height'            => true,
		'uploads'                => true,
		'random-default'         => false,
		'header-text'            => true,
		'default-text-color'     => '#ffffff',
		//'wp-head-callback'       => 'from_scratch_custom_header',
		'admin-head-callback'    => '',
		'admin-preview-callback' => '',
	);
	add_theme_support( 'custom-header', $header_args );

}
endif;
add_action( 'after_setup_theme', 'from_scratch_setup' );



// Menus

register_nav_menus( array(
	'main_menu' =>  esc_html__( 'Main Menu', 'from-scratch' ),
	'footer_menu' => esc_html__( 'Footer Menu', 'from-scratch' )
));


// Sub-menus Walker // http://wordpress.stackexchange.com/questions/88604/bootstrap-drop-down-menu-with-wp-nav-menu

include( dirname( __FILE__ ) . '/inc/subnav-walker.php' );


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
	    
	    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' );
		}
		
		
		// CSS
		
		wp_enqueue_style( 
			'pridx', 
			get_template_directory_uri() . '/css/pridx.css',
			array(), 
			'1.3', 
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
		'name'			=>	esc_html__( 'Primary Widgets Area', 'from-scratch' ),
		'id'			=>	'widgets_area1',
		'description' 	=> 	'',
		'before_widget' => 	'',
		'after_widget' 	=> 	'',
		'before_title' 	=> 	'<h3 class="widget-title">',
		'after_title' 	=> 	'</h3>',
	));
}
add_action( 'widgets_init', 'from_scratch_widgets_init' );