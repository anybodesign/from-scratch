<?php if ( !defined('ABSPATH') ) die();
	
define( 'FS_THEME_VERSION', '3.0' );
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
	
	/*
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
	*/

	// Gutenberg support 
	
	add_theme_support( 'align-wide' );
	
	add_theme_support( 'editor-color-palette', array(
	    array(
	        'name' => esc_html__( 'Black', 'from-scratch' ),
	        'slug' => 'black',
	        'color' => '#4a4a4a',
	    ),
	    array(
	        'name' => esc_html__( 'White', 'from-scratch' ),
	        'slug' => 'white',
	        'color' => '#ffffff',
	    )
	));	
	
	add_theme_support( 'disable-custom-colors' );

	add_theme_support( 'editor-font-sizes', array(
	    array(
	        'name' => __( 'Small', 'from-scratch' ),
	        'shortName' => __( 'S', 'from-scratch' ),
	        'size' => 14,
	        'slug' => 'small'
	    ),
	    array(
	        'name' => __( 'Large', 'from-scratch' ),
	        'shortName' => __( 'L', 'from-scratch' ),
	        'size' => 22,
	        'slug' => 'large'
	    ),
	));
	
	add_theme_support( 'disable-custom-font-sizes' );
	
	add_theme_support( 'responsive-embeds' );

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
			FS_THEME_URL . '/js/jquery-3.4.1.min.js', 
			array(), 
			'3.4.1', 
			true
		);

		// Slick
		/*
		   	wp_enqueue_script( 
		    	'slick', 
		    	FS_THEME_URL . '/js/slick.min.js',
		    	array('jquery'), 
		    	'1.8', 
		    	true
		    );
		    wp_enqueue_script( 
		    	'slick-init', 
		    	FS_THEME_URL . '/js/slick-init.js',
		    	array('jquery'), 
		    	false, 
		    	true
		    );
		*/
		
		// Fancybox
		
		/*
		   	wp_enqueue_script( 
		    	'fancybox', 
		    	FS_THEME_URL . '/js/jquery.fancybox.min.js',
		    	array('jquery'), 
		    	'3.1.20', 
		    	true
		    );
		    wp_enqueue_script( 
		    	'fancybox-init', 
		    	FS_THEME_URL . '/js/fancybox-init.js',
		    	array('fancybox'), 
		    	false, 
		    	true
		    );
		*/			
		
		
		// Back 2 top
		
		if ( get_theme_mod('back2top') == true ) {
			
			wp_enqueue_script(
				'stickynav', 
				FS_THEME_URL . '/js/sticky-header.js', 
				array(), 
				false, 
				true
			);
			wp_enqueue_script(
				'back2top', 
				FS_THEME_URL . '/js/back2top.js', 
				array(), 
				false, 
				true
			);
		}
		
		// Sticky Nav
		
		if ( get_theme_mod('stickynav') == true ) {
			
			wp_enqueue_script(
				'stickynav', 
				FS_THEME_URL . '/js/sticky-header.js', 
				array(), 
				false, 
				true
			);
		}
		
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
		
		// Slick
		
			wp_enqueue_style( 
				'slick', 
				FS_THEME_URL . '/css/slick.css',
				array(), 
				'1.8', 
				'screen' 
			);
		
		// Fancybox

			wp_enqueue_style( 
				'fancybox', 
				FS_THEME_URL . '/css/jquery.fancybox.min.css',
				array(), 
				'3.1.20', 
				'screen' 
			);
		
		*/

		// Back to top

		if ( get_theme_mod('back2top') == true ) {

			wp_enqueue_style( 
				'back2top', 
				FS_THEME_URL . '/css/back2top.css',
				array(), 
				false, 
				'screen' 
			);
		}
		
		
		// Main stylesheet
		
		wp_enqueue_style( 'from-scratch-style', get_stylesheet_uri(), array(), FS_THEME_VERSION, 'screen' );

	}
}    
add_action( 'wp_enqueue_scripts', 'fs_scripts_load' );


// ------------------------
// Theme Stuff
// ------------------------


// Customizer

require FS_THEME_DIR . '/inc/customizer.php';


// Register Navigation Menus

function fs_custom_nav_menus() {

	$locations = array(
		'main_menu' =>  esc_html__( 'Main Menu', 'from-scratch' ),
		'footer_menu' => esc_html__( 'Footer Menu', 'from-scratch' ),
		'social_menu' => esc_html__( 'Social Menu', 'from-scratch' )
	);
	register_nav_menus( $locations );

}
add_action( 'init', 'fs_custom_nav_menus' );


// Nav tag for widget menus

function fs_modify_nav_menu_args( $args ) {

	if( empty ( $args['theme_location'] ) ) {
		$args['container'] = 'nav';
	}
	return $args;
}
add_filter( 'wp_nav_menu_args', 'fs_modify_nav_menu_args' );


// Sub-menus Walker

include_once( dirname( __FILE__ ) . '/inc/subnav-walker.php' );


// Custom Post types

include_once( dirname( __FILE__ ) . '/inc/custom-post-type.php' );
include_once( dirname( __FILE__ ) . '/inc/custom-post-type-functions.php' );


// Extended Search

include_once( dirname( __FILE__ ) . '/inc/fs-extended-search.php' );


// Archives titles

add_filter( 'get_the_archive_title', function ($title) {

    if ( is_category() ) {

        $title = single_cat_title( '', false );

    } elseif ( is_tag() ) {

        $title = single_tag_title( '', false );

    } elseif ( is_post_type_archive() ) {

        $title = post_type_archive_title( '', false );
    
    } elseif ( is_tax() ) {

        $title = single_term_title( '', false );
    } 

    return $title;

});


// Excerpts lenght

function fs_custom_excerpt_length( $length ) {
	return 24;
}
add_filter( 'excerpt_length', 'fs_custom_excerpt_length', 999 );


// Excerpt link

function fs_excerpt_more( $more ) {
    return sprintf( ' […] <a class="read-more" href="%1$s" rel="nofollow">%2$s</a>',
        get_permalink( get_the_ID() ),
        __( 'Read More', 'from-scratch' )
    );
}
add_filter( 'excerpt_more', 'fs_excerpt_more' );


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


// Background image

function fs_bg_img() {
	
	if ( '' != get_the_post_thumbnail() ) {
		$img_url = wp_get_attachment_image_src( get_post_thumbnail_id(), 'large-hd' );
		$bg = ' style="background-image: url('.$img_url[0].')"';
	} else {
		$bg = null;	
	}
	
	echo $bg;
}

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
            'title' => __( 'Text intro', 'from-scratch' ),
            'selector' => 'p',
            'classes' => 'text-intro',
            'wrapper' => true,
        ),
        array(
            'title' => __( 'Text mentions', 'from-scratch' ),
            'selector' => 'p',
            'classes' => 'text-mentions',
            'wrapper' => true,
        ),
        array(
            'title' => __( 'Action button', 'from-scratch' ),
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
		
	
	// Front-End ACF Functions
	
	add_filter('acf/settings/save_json', 'fs_acf_json_save_point');
	function fs_acf_json_save_point( $path ) {
	    
	    $path = FS_THEME_DIR . '/inc/acf-json';
	    
	    return $path;
	}
	add_filter('acf/settings/load_json', 'fs_acf_json_load_point');
	function fs_acf_json_load_point( $paths ) {
	    
	    unset($paths[0]);
	
	    $paths[] = FS_THEME_DIR . '/inc/acf-json';
	    
	    return $paths;
	}
	
	
	//	Admin style and script
	
	add_action('admin_print_styles', 'fs_acf_admin_css', 11 );
	function fs_acf_admin_css() {
		wp_enqueue_style( 'admin-css', FS_THEME_URL . '/css/admin.css' );
	}

	
	// Social Menu icons
	
	add_filter('wp_nav_menu_objects', 'fs_nav_menu_icons', 10, 2);
	
	function fs_nav_menu_icons( $items, $args ) {
		
		foreach( $items as $item ) {
			
			$icon = get_field('icon', $item);
			
			if( $icon ) {
				$item->classes[] = 'social-item';
				$item->title = '<img src="'.$icon['url'].'" alt=""><span>'.$item->title.'</span>';
			}		
		}

		return $items;
	}


	//	ACF Options page
	
	if (function_exists('acf_add_options_page')) {
	    
		add_action( 'init', 'fs_acf_add_options_page' );
		function fs_acf_add_options_page() {
			
			$parent = acf_add_options_page(array(
				'page_title'	=> esc_html__( 'Site Options', 'from-scratch' ),
				'menu_title'	=> esc_html__( 'Site Options', 'from-scratch' ),
				'menu_slug'		=> 'options-site',
				'capability'	=> 'edit_posts',
				'icon_url'		=> 'dashicons-admin-network',
				'redirect'		=> false,
				'position'		=> 30
			));
			acf_add_options_sub_page(array(
				'page_title' 	=> esc_html__( 'Main Menu', 'from-scratch'),
				'menu_title' 	=> esc_html__( 'Main Menu', 'from-scratch'),
				'parent_slug' 	=> $parent['menu_slug'],
			));		
			acf_add_options_sub_page(array(
				'page_title' 	=> esc_html__( 'Archives Customizer', 'from-scratch'),
				'menu_title' 	=> esc_html__( 'Archives Customizer', 'from-scratch'),
				'parent_slug' 	=> $parent['menu_slug'],
			));	
			acf_add_options_sub_page(array(
				'page_title' 	=> esc_html__( 'Social Networks', 'from-scratch'),
				'menu_title' 	=> esc_html__( 'Social Networks', 'from-scratch'),
				'parent_slug' 	=> $parent['menu_slug'],
			));
			
		}
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