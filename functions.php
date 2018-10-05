<?php if ( !defined('ABSPATH') ) die();
	
	
define( 'FS_THEME_DIR', get_template_directory() );
define( 'FS_THEME_URL', get_template_directory_uri() );
	

// ------------------------
// Theme Setup
// ------------------------

if ( ! isset( $content_width ) )
	$content_width = 2048;


if ( ! function_exists( 'fs_setup' ) ) :

function fs_setup() {
	
	
	// I18n
	
	load_theme_textdomain( 'from-scratch', FS_THEME_DIR . '/languages' );
	
	
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
	

	// Gutenberg support 
	
	add_theme_support( 'align-wide' );
	add_theme_support( 'editor-color-palette', array(
	    array(
	        'name' => esc_html__( 'very dark gray', 'from-scratch' ),
	        'slug' => 'very-dark-gray',
	        'color' => '#4a4a4a',
	    ),
	    array(
	        'name' => esc_html__( 'very light gray', 'from-scratch' ),
	        'slug' => 'very-light-gray',
	        'color' => '#e0e0e0',
	    )
	));	
	add_theme_support( 'disable-custom-colors' );

}
endif;
add_action( 'after_setup_theme', 'fs_setup' );


// Gutenberg editor styles

function fs_block_editor_styles() {
    wp_enqueue_style( 
    	'fs_block_editor_styles',
    	FS_THEME_URL .'/css/block-editor-style.css', 
    	false, 
    	'1.0', 
    	'screen'
    );
}
add_action( 'enqueue_block_editor_assets', 'fs_block_editor_styles' );


// ------------------------
// Enqueue JS & CSS
// ------------------------

function fs_scripts_load() {
    if (!is_admin()) {

		// JS 
		
		wp_deregister_script( 'jquery' );

		wp_enqueue_script(
			'jquery', 
			FS_THEME_URL . '/js/jquery-3.3.1.min.js', 
			array(), 
			'3.3.1', 
			true
		);
		
		wp_enqueue_script(
			'focus-visible', 
			FS_THEME_URL . '/js/focus-visible.js', 
			array(), 
			false, 
			true
		);
		
		wp_enqueue_script(
			'from-scratch-skip-link-focus-fix', 
			FS_THEME_URL . '/js/skip-link-focus-fix.js', 
			array(), 
			false, 
			true
		);
		
	    wp_enqueue_script( 
	    	'main', 
	    	FS_THEME_URL . '/js/main.js',
	    	array('jquery'), 
	    	'1.0', 
	    	true
	    );
	    
	    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' );
		}
		
		
		// CSS
		
		/* Enqueue your customl CSS here
		
		wp_enqueue_style( 
			'your-css', 
			FS_THEME_URL . '/css/your.css',
			array(), 
			'1.0', 
			'screen' 
		);
		
		*/
		
		
		// Main stylesheet
		
		wp_enqueue_style( 'from-scratch-style', get_stylesheet_uri() );

	}
}    
add_action( 'wp_enqueue_scripts', 'fs_scripts_load' );


// ------------------------
// Theme Stuff
// ------------------------


// Customizer

require FS_THEME_DIR . '/inc/customizer.php';


// Menus

register_nav_menus( array(
	'main_menu' =>  esc_html__( 'Main Menu', 'from-scratch' ),
	'footer_menu' => esc_html__( 'Footer Menu', 'from-scratch' )
));

// Sub-menus Walker

include_once( dirname( __FILE__ ) . '/inc/subnav-walker.php' );


// Custom Post types

include_once( dirname( __FILE__ ) . '/inc/fs-cpt.php' );


// Extended Search

include_once( dirname( __FILE__ ) . '/inc/fs-extended-search.php' );



// Image Sizes

add_image_size( 'thumbnail-hd', 320, 320, true );
add_image_size( 'medium-hd', 640, 640, false );
add_image_size( 'large-hd', 2048, 2048, false );

function fs_custom_sizes( $sizes ) {
    return array_merge( $sizes, array(
        'thumbnail-hd'	=> __( 'Thumbnail High', 'from-scratch' ),
        'medium-hd'		=> __( 'Medium High', 'from-scratch' ),
        'large-hd'		=> __( 'Large High', 'from-scratch' ),
    ) );
}
add_filter( 'image_size_names_choose', 'fs_custom_sizes' );


// Widgets

function fs_widgets_init() {
	register_sidebar(array(
		'name'			=>	esc_html__( 'Primary Widgets Area', 'from-scratch' ),
		'id'			=>	'widgets_area1',
		'description' 	=> 	'',
		'before_widget' => 	'<div id="%1$s" class="widget-container %2$s">',
		'after_widget' 	=> 	'</div>',
		'before_title' 	=> 	'<p class="widget-title">',
		'after_title' 	=> 	'</p>',
	));
}
add_action( 'widgets_init', 'fs_widgets_init' );


// Tinymce class

function fs_mce_buttons_2($buttons) {
    array_unshift($buttons, 'styleselect');
    return $buttons;
}
add_filter('mce_buttons_2', 'fs_mce_buttons_2');

function fs_tiny_formats($init_array) {

    $style_formats = array(

        array(
            'title' => 'Texte intro',
            'selector' => 'p',
            'classes' => 'text-intro',
            'wrapper' => true,
        ),
        array(
            'title' => 'Texte mentions',
            'selector' => 'p',
            'classes' => 'text-mentions',
            'wrapper' => true,
        ),
        array(
            'title' => 'Bouton d’action',
            'selector' => 'a',
            'classes' => 'action-btn',
        )
    );
    
    // Filter
    $style_formats = apply_filters( 'fs_tiny_formats', $style_formats ); 
    
    $init_array['style_formats'] = json_encode($style_formats);
    return $init_array;

}
add_filter('tiny_mce_before_init', 'fs_tiny_formats');


// Custom search form

function fs_search_form( $form ) {
    $form = '<form role="search" method="get" id="searchform" class="searchform" action="' . home_url( '/' ) . '" >
    <label class="screen-reader-text" for="s">' . __( 'Search for:' ) . '</label>
    <input type="search" placeholder="' . __( 'Keywords' ) . '" value="' . get_search_query() . '" name="s" id="s">
    <input type="submit" class="action-btn" id="searchsubmit" value="'. esc_attr__( 'Search' ) .'">
    </form>';
 
    return $form;
}
add_filter( 'get_search_form', 'fs_search_form' );



// ------------------------
// ACF
// ------------------------

if( class_exists('acf') ) {

	// Remove the WP Custom Fields meta box
	
	add_filter('acf/settings/remove_wp_meta_box', '__return_true');
	
	
	// Custom ACF Functions
	
	include_once('inc/acf/acf-functions.php');
	include_once('inc/acf/popup-acf.php');
	
	
	// Front-End ACF Functions
	
	add_filter('acf/settings/save_json', 'fs_acf_json_save_point');
	function fs_acf_json_save_point( $path ) {
	    
	    $path = FS_THEME_DIR . '/inc/acf';
	    
	    return $path;
	}
	add_filter('acf/settings/load_json', 'fs_acf_json_load_point');
	function fs_acf_json_load_point( $paths ) {
	    
	    unset($paths[0]);
	
	    $paths[] = FS_THEME_DIR . '/inc/acf';
	    
	    return $paths;
	}
	
	
	//	Admin style and script
	
	add_action('admin_print_styles', 'fs_admin_css', 11 );
	function fs_admin_css() {
		wp_enqueue_style( 'admin-css', FS_THEME_URL . '/css/admin.css' );
		wp_enqueue_style( 'popup-acf-css', FS_THEME_URL . '/css/popup-acf.css' );
	}
	
}



// ------------------------
// Auto-Updater
// ------------------------

// Remove these lines and dependencies for your theme

require 'inc/plugin-update-checker/plugin-update-checker.php';
$myUpdateChecker = Puc_v4_Factory::buildUpdateChecker(
	'https://github.com/anybodesign/from-scratch',
	__FILE__,
	'from-scratch'
);
$myUpdateChecker->setBranch('master');