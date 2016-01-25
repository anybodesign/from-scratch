<?php

if ( ! function_exists( 'from_scratch_setup' ) ) :

function from_scratch_setup() {
	
	
	// I18n
	
	load_theme_textdomain( 'fromscratch', get_template_directory() . '/language' );
	
	
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


	// Menus
	
	register_nav_menus( array(
		'main_menu' =>  esc_html__( 'Main Menu', 'fromscratch' ),
		'footer_menu' => esc_html__( 'Footer Menu', 'fromscratch' )
	));


	// Sub-menus
	
	function menu_set_dropdown( $sorted_menu_items, $args ) {
	    $returns = array();
	    foreach ( $sorted_menu_items as $key => $obj ) {
	        if (in_array('menu-item-has-children', $obj->classes)) {
	            $obj->title .= '<button class="sub-menu-unfold"><span>'.__("Unfold Sub-Menu","fromscratch").'</span></button>';
	        }
	        $returns[$key] = $obj;
	    }
	    return $returns;
	}
	add_filter( 'wp_nav_menu_objects', 'menu_set_dropdown', 10, 2 );

}
endif;
add_action( 'after_setup_theme', 'from_scratch_setup' );




// Enqueue JS & CSS

function fs_scripts_load() {
    if (!is_admin()) {

		// JS 
		
		wp_enqueue_script('jquery');

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
			'1.6.3', 
			'screen' 
		);
		
		wp_enqueue_style( 
			'style', 
			get_stylesheet_uri(), 
			array(), 
			'1.0', 
			'screen'
		);

	}
}    
add_action('wp_enqueue_scripts', 'fs_scripts_load');


// Custom settings

include( dirname( __FILE__ ) . '/inc/custom-settings.php' );


// Widgets


if (function_exists('register_sidebar'))

	register_sidebar(array(
		'name'			=>	esc_html__( 'Primary Widgets Area', 'fromscratch' ),
		'id'			=>	'widgets_primary',
		'description' 	=> 	'',
		'before_widget' => 	'',
		'after_widget' 	=> 	'',
		'before_title' 	=> 	'',
		'after_title' 	=> 	'',
	));



// Favicons 


function favicon_link() {
    echo '<link rel="shortcut icon" href="'. get_stylesheet_directory_uri() .'/img/favicon.png">' . "\n";
    echo '<link rel="apple-touch-icon" sizes="152x152" href="'. get_stylesheet_directory_uri() .'/img/apple-touch-icon-152x152.png">' . "\n";
}
add_action( 'wp_head', 'favicon_link' );