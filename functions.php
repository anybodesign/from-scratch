<?php if ( !defined('ABSPATH') ) die();
	
define( 'FS_THEME_VERSION', '6.1' );
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
	));

	add_theme_support( 'customize-selective-refresh-widgets' );
	
	if ( get_theme_mod('enable_woocommerce') == true ) {
			
		add_theme_support( 'woocommerce' );
		add_theme_support( 'wc-product-gallery-zoom' );
		add_theme_support( 'wc-product-gallery-lightbox' );
		add_theme_support( 'wc-product-gallery-slider' );
	}
	
	if ( get_theme_mod('enable_custombg') == true ) {
		
		add_theme_support( 'custom-background', array(
			'default-color'          => 'ffffff',
			'default-image'          => '',
			'default-repeat'         => 'repeat',
			'default-position-x'     => 'left',
	    	'default-position-y'     => 'top',
	    	'default-size'           => 'auto',
			'default-attachment'     => 'scroll',
			'wp-head-callback'       => '_custom_background_cb',
			'admin-head-callback'    => '',
			'admin-preview-callback' => ''
		));
	}
	
	if ( get_theme_mod('enable_customheader') == true ) {
		
		add_theme_support( 'custom-header', array(
			'default-image'          => FS_THEME_URL . '/img/header.jpg',
			'width'                  => 0,
			'height'                 => 0,
			'flex-height'            => false,
			'flex-width'             => true,
			'uploads'                => true,
			'random-default'         => false,
			'header-text'            => true,
			'default-text-color'     => '',
			'wp-head-callback'       => '',
			'admin-head-callback'    => '',
			'admin-preview-callback' => '',
		));
	}
	
	if ( get_theme_mod('enable_customlogo') == true ) {
		
		add_theme_support( 'custom-logo', array(
			'height'      => '',
			'width'       => '',
			'flex-height' => true,
			'flex-width'  => true,
			'header-text' => array( 'site-title', 'site-desc' ),
		));	
	}
	
	if ( get_theme_mod('enable_postformats') == true ) {
		
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
		));
	}

	// Gutenberg support 
	
	add_theme_support( 'align-wide' );
	
	add_theme_support( 'responsive-embeds' );
	
	// Remove fucking patterns 
	remove_theme_support( 'core-block-patterns' );	
	
}
endif;
add_action( 'after_setup_theme', 'fs_setup' );


// Dark mode

function fs_add_highcontrast_body_class($classes) {
	if (isset($_COOKIE['highcontrast']) && $_COOKIE['highcontrast'] === 'yes') {
		$classes[] = 'high-contrast';
	}
	return $classes;
}
add_filter('body_class', 'fs_add_highcontrast_body_class');


// Disable Tags

if ( get_theme_mod('enable_posttags') != true ) {
	function fs_unregister_tags() {
		register_taxonomy( 'post_tag', array() );
	}
	add_action( 'init', 'fs_unregister_tags' );
}

// Gutenberg editor styles

function fs_block_editor_styles() {
    wp_enqueue_style( 
    	'fs_block_editor_styles',
    	FS_THEME_URL .'/css/block-editor-style.css', 
    	false, 
    	FS_THEME_VERSION, 
    	'screen'
    );
}
add_action( 'enqueue_block_editor_assets', 'fs_block_editor_styles' );


// Gutenberg allowed blocks

function fs_allowed_blocks() {
    wp_enqueue_script(
        'byebyeblocks',
		FS_THEME_URL . '/js/byebyeblocks.js',
        array( 'wp-blocks', 'wp-dom-ready', 'wp-edit-post' ), 
        FS_THEME_VERSION
    );
}
// Uncomment to disable blocks
//add_action( 'enqueue_block_editor_assets', 'fs_allowed_blocks' );

// Gutenberg block styles

function fs_allowed_blocks_styles() {
	wp_enqueue_script(
		'byebyeblocks-styles',
		FS_THEME_URL . '/js/byebyeblocks-styles.js',
		array( 'wp-blocks', 'wp-dom-ready', 'wp-edit-post' ), 
		FS_THEME_VERSION
	);
}
add_action( 'enqueue_block_editor_assets', 'fs_allowed_blocks_styles' );


//	Admin style and script

add_action('admin_enqueue_scripts', 'fs_acf_admin_css', 11 );
function fs_acf_admin_css() {
	wp_enqueue_style( 'admin-css', FS_THEME_URL . '/css/admin.css' );
}


// ------------------------
// JS & CSS
// ------------------------

function fs_scripts_load() {
    if (!is_admin()) {


		// Register JS
		// ------------------------
			
			// Fancybox
			
		    wp_register_script( 
		    	'fancybox', 
		    	FS_THEME_URL . '/js/jquery.fancybox.min.js',
		    	array('jquery'), 
		    	'3.1.20', 
		    	true
		    );
		    wp_register_script( 
		    	'fancybox-fs-init', 
		    	FS_THEME_URL . '/js/fancybox-init.js',
		    	array('fancybox'), 
		    	null, 
		    	true
		    );
			
			// Scroll-Out
			
			wp_register_script(
				'scrollout', 
				FS_THEME_URL . '/js/scroll-out.min.js', 
				array(), 
				FS_THEME_VERSION, 
				true
			);
			
			// IAS
			
			wp_register_script(
				'ias', 
				FS_THEME_URL . '/js/infinite-ajax-scroll.min.js', 
				array(), 
				FS_THEME_VERSION, 
				true
			);
			wp_register_script(
				'ias-fs-init', 
				FS_THEME_URL . '/js/infinite-ajax-scroll-init.js', 
				array('ias'), 
				FS_THEME_VERSION, 
				true
			);
			
			// Back 2 top
			
			wp_register_script(
				'back2top', 
				FS_THEME_URL . '/js/back2top.js', 
				array(), 
				FS_THEME_VERSION, 
				true
			);
			
			// Sticky Nav
			
			wp_register_script(
				'stickynav', 
				FS_THEME_URL . '/js/sticky-header.js', 
				array(), 
				FS_THEME_VERSION, 
				true
			);
			
			// Other stuff
			
			wp_register_script(
				'high-contrast', 
				FS_THEME_URL . '/js/high-contrast.js', 
				array('jquery'), 
				FS_THEME_VERSION, 
				true
			);
			// Passer les URLs des images au script JS
			wp_localize_script('high-contrast', 'contrastVars', array(
				'contrastOn' => FS_THEME_URL . '/img/ui/contrast-on.svg',
				'contrastOff' => FS_THEME_URL . '/img/ui/contrast-off.svg',
				'restoreContrast' => __('Restore contrast', 'from-scratch'),
				'highContrast' => __('Toggle high contrast', 'from-scratch')
			));
			
			wp_register_script(
				'cookie', 
				FS_THEME_URL . '/js/jquery.cookie.js', 
				array('jquery'), 
				FS_THEME_VERSION, 
				true
			);
			
			wp_register_script(
				'focus-visible', 
				FS_THEME_URL . '/js/focus-visible.min.js', 
				array(), 
				FS_THEME_VERSION, 
				true
			);
			
			wp_register_script(
				'skiplink-focus-fix', 
				FS_THEME_URL . '/js/skip-link-focus-fix.js', 
				array(), 
				FS_THEME_VERSION, 
				true
			);
			
			// Main
			
		    wp_register_script( 
		    	'main', 
		    	FS_THEME_URL . '/js/main.js',
		    	array('jquery'), 
		    	FS_THEME_VERSION, 
		    	true
		    );
			
			
		// Register CSS
		// ------------------------
			
			wp_register_style( 'back2top', 
				FS_THEME_URL . '/css/back2top.css',
				array(), 
				FS_THEME_VERSION, 
				'screen' 
			);
			
			// Fancybox
			
			wp_register_style( 
				'fancybox-css', 
				FS_THEME_URL . '/css/jquery.fancybox.min.css',
				array(), 
				null, 
				'screen' 
			);
			
			
		// Enqueue JS
		// ------------------------
			
			wp_enqueue_script( 'jquery' );
			
			if ( get_theme_mod('use_fancybox') == true ) {
				wp_enqueue_script( 'fancybox' );
				wp_enqueue_script( 'fancybox-fs-init' );
			}
			if ( get_theme_mod('use_ias') == true ) {
				$has_pages = get_the_posts_pagination();
				if (! empty( $has_pages) ) {
					if ( is_home() || is_archive() || is_search() || is_tax() ) {
						wp_enqueue_script( 'ias' );
						wp_enqueue_script( 'ias-fs-init' );
					}
				}
			}
			
			if ( get_theme_mod('use_scrollout') == true ) {
				wp_enqueue_script( 'scrollout' );
				function fs_scrollout_js() {
					print '
					<script>
						ScrollOut({
							targets: "section, .post-block, hr, .wpcf7-form",
							once: true,
						});
					</script>
					';
				}
				add_action('wp_footer', 'fs_scrollout_js', 100);
			}
			
			if ( get_theme_mod('contrast') == true ) {
				wp_enqueue_script( 'high-contrast' );
				wp_enqueue_script( 'cookie' );
			}
			if ( get_theme_mod('back2top') == true ) {
				wp_enqueue_script( 'back2top' );
			}
			if ( get_theme_mod('stickynav') == true ) {
				wp_enqueue_script( 'stickynav' );
			}
		    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
				wp_enqueue_script( 'comment-reply' );
			}
			
			//wp_enqueue_script( 'focus-visible' );
			wp_enqueue_script( 'skiplink-focus-fix' );
			wp_enqueue_script( 'main' );			
			
			
		// Enqueue CSS
		// ------------------------
			
			
			// Fancybox
			if ( get_theme_mod('use_fancybox') == true ) {
				wp_enqueue_style( 'fancybox-css' );
			}
			
			// Back to top
			if ( get_theme_mod('back2top') == true ) {
				wp_enqueue_style( 'back2top' );
			}
			
			// Deregister Fuckin Bullshit
			wp_dequeue_style( 'global-styles' );
			wp_deregister_style( 'global-styles' );
			
	}
}    
add_action( 'wp_enqueue_scripts', 'fs_scripts_load' );


// Main stylesheet

function fs_main_style() {
		
		wp_register_style( 
			'from-scratch-style', 
			get_stylesheet_uri(), 
			array(), 
			FS_THEME_VERSION, 
			'screen'
		);
		
		wp_enqueue_style( 'from-scratch-style' );
}
add_action( 'wp_enqueue_scripts', 'fs_main_style' );


// Security fix

add_feed('rss2', 'fs_my_custom_feed');
function fs_my_custom_feed() {  
	load_template( FS_THEME_DIR . '/feed-rss2.php');  
}


// ------------------------
// Theme Stuff
// ------------------------


// Customizer

require FS_THEME_DIR . '/inc/customizer.php';


// Colors

if ( get_theme_mod('disable_colors') != true ) {
	include_once( FS_THEME_DIR . '/inc/color-palettes.php' );
}

// Font sizes

if ( get_theme_mod('disable_fontsizes') != true ) {
	include_once( FS_THEME_DIR . '/inc/font-sizes.php' );
}

// Register Navigation Menus

function fs_custom_nav_menus() {

	$locations = array(
		'toolbar_menu' =>  esc_html__( 'Toolbar Menu', 'from-scratch' ),
		'main_menu' =>  esc_html__( 'Main Menu', 'from-scratch' ),
		'footer_menu' => esc_html__( 'Footer Menu', 'from-scratch' ),
		'social_menu' => esc_html__( 'Social Menu', 'from-scratch' )
	);
	register_nav_menus( $locations );

}
add_action( 'init', 'fs_custom_nav_menus' );

// Subpages menu

function fs_subpages_menu() {
	global $post;

	// Get post ancestors 
	$post_ancestors = get_post_ancestors($post);

	// Check if a page has any parent pages
	if ($post_ancestors) {

		//get the top page id
		$top_page = $post_ancestors ? end($post_ancestors) : $post->ID;

		// How many ancestors does this page have? Counts the array adds one.
		$n = count($post_ancestors) + 1;

		// Get the pages children, if it has any
		$pages = get_pages();
		$page_children = get_page_children($post->ID, $pages);

		// Checks if a page has children
		if (!empty($page_children)) {
			$children = wp_list_pages("title_li=&child_of=". $top_page ."&echo=0&sort_column=menu_order&depth=" . $n);
		} else { // If the page doesn't have children
			$children = wp_list_pages("title_li=&child_of=". $top_page ."&echo=0&sort_column=menu_order&depth=" . ($n - 1));
		}
		
	} else {
		$children = wp_list_pages("title_li=&child_of=". $post->ID ."&echo=0&sort_column=menu_order&depth=1");
	}

	// Only show child navigation if there are children
	if ( $children ) {
		$menu = '<nav class="sub-pages" aria-label="'.__("Secondary navigation","from-scratch").'">';
		$menu .= '<ul class="subpages-list">';
		$menu .= $children;
		$menu .= '</ul>';
		$menu .= '</nav>';
	} else {
		$menu = null;
	}
	print $menu;
}

// Nav highlights fix

function fs_nav_classes( $classes, $item ) {
    
	$blogpage = get_option( 'page_for_posts' );
	$blogpage_content = get_post( $blogpage );
	
	if (is_404()) {
		$itemname = esc_html__( 'Oops! That page can&rsquo;t be found', 'from-scratch' );
	} else {
		$itemname = $blogpage_content->post_title;
	}
	
	// Remove active state on page for posts
    if( ( is_post_type_archive() || is_tax() || is_404() || is_search() || is_singular() ) && $item->title == $itemname ) {
        $classes = array_diff( $classes, array( 'current_page_parent' ) );
    }
    return $classes;
}
add_filter( 'nav_menu_css_class', 'fs_nav_classes', 10, 2 );


// CPT highlights

function fs_custom_active_item_classes($classes = array(), $menu_item = false) {            
        global $post;
		if ( is_singular() ) {
        	$classes[] = ($menu_item->url == get_post_type_archive_link($post->post_type)) ? 'current-menu-item' : '';
		}
        return $classes;
    }
add_filter( 'nav_menu_css_class', 'fs_custom_active_item_classes', 10, 2 );


// Nav tag for widget menus

function fs_modify_nav_menu_args( $args ) {

	if( empty ( $args['theme_location'] ) ) {
		$args['container'] = 'nav';
	}
	return $args;
}
add_filter( 'wp_nav_menu_args', 'fs_modify_nav_menu_args' );


// Sub-menus Walker

include_once( FS_THEME_DIR . '/inc/subnav-walker.php' );


// Extended Search

include_once( FS_THEME_DIR . '/inc/fs-extended-search.php' );


// Archives titles

function fs_theme_archive_title( $title ) {
	
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
}
add_filter( 'get_the_archive_title', 'fs_theme_archive_title', 10, 2 );


// Excerpts lenght

function fs_custom_excerpt_length( $length ) {
	$words = get_theme_mod('ex_lenght', 24);
	return $words;
}
add_filter( 'excerpt_length', 'fs_custom_excerpt_length', 999 );


// Excerpt link

function fs_excerpt_more( $more ) {
    return sprintf( '&hellip; <a class="read-more" href="%1$s" rel="nofollow">%2$s</a>',
        get_permalink( get_the_ID() ),
        __( 'Read More', 'from-scratch' ) . ' <span class="a11y-hidden">'.__( 'of ', 'from-scratch' ).get_the_title().'</span>'
    );
}
add_filter( 'excerpt_more', 'fs_excerpt_more' );


// Custom excerpt
// https://gist.github.com/samjbmason/4050714

function fs_share_excerpt($count, $post_id){
  $permalink = get_permalink($post_id);
  $excerpt = get_post($post_id);
  $excerpt = $excerpt->post_content;
  $excerpt = strip_tags($excerpt);
  $excerpt = substr($excerpt, 0, $count);
  $excerpt = substr($excerpt, 0, strripos($excerpt, " "));

  $excerpt = $excerpt.'...';
  return $excerpt;
}


// Image Sizes

add_image_size( 'thumbnail-hd', 320, 320, true );
add_image_size( 'medium-hd', 640, 640, false );
add_image_size( 'large-hd', 2048, 2048, false );
add_image_size( 'screen-md', 720, 450, true );
add_image_size( 'screen-hd', 1440, 900, true );
// add_image_size( 'video-md', 960, 540, true );
// add_image_size( 'video-hd', 1920, 1080, true );

function fs_custom_sizes( $sizes ) {
    return array_merge( $sizes, array(
        'thumbnail-hd'	=> __( 'Thumbnail x2', 'from-scratch' ),
        'medium-hd'		=> __( 'Medium x2', 'from-scratch' ),
        'large-hd'		=> __( 'Large x2', 'from-scratch' ),
        'screen-md'		=> __( 'Screen Medium', 'from-scratch' ),
        'screen-hd'		=> __( 'Screen Full', 'from-scratch' ),
        // 'video-md'		=> __( 'Video Medium', 'from-scratch' ),
        // 'video-hd'		=> __( 'Video Full', 'from-scratch' ),
    ) );
}
add_filter( 'image_size_names_choose', 'fs_custom_sizes' );


// Background image

function fs_bg_img() {
	
	$default = get_theme_mod('bg_default');
	$blog = get_theme_mod('bg_blog');
	$error = get_theme_mod('bg_404');
	
	if ( is_404() && $error ) {
		$bg = ' data-bg="has-bg" style="background-image: url('.$error.')"';
	
	} else if ( ( is_home() || is_category() ) && $blog ) {
		$bg = ' data-bg="has-bg" style="background-image: url('.$blog.')"';
		
	} else if ( '' != get_the_post_thumbnail() ) {
		$img_url = wp_get_attachment_image_src( get_post_thumbnail_id(), 'large-hd' );
		$bg = ' data-bg="has-bg" style="background-image: url('.$img_url[0].')"';
	
	} else if ( $default ) {
		$bg = ' data-bg="has-bg" style="background-image: url('.$default.')"';
	
	} else {
		$bg = null;
	}
	
	echo $bg;
}

// Widgets

function fs_widgets_init() {
	register_sidebar(array(
		'name'			=>	esc_html__( 'Blog Widgets', 'from-scratch' ),
		'id'			=>	'widgets_area1',
		'description' 	=> 	'',
		'before_widget' => 	'<div id="%1$s" class="widget-container %2$s">',
		'after_widget' 	=> 	'</div>',
		'before_title' 	=> 	'<p class="widget-title">',
		'after_title' 	=> 	'</p>',
	));
	register_sidebar(array(
		'name'			=>	esc_html__( 'Footer Widgets #1', 'from-scratch' ),
		'id'			=>	'widgets_footer1',
		'description' 	=> 	'',
		'before_widget' => 	'<div id="%1$s" class="widget-container %2$s">',
		'after_widget' 	=> 	'</div>',
		'before_title' 	=> 	'<p class="widget-title">',
		'after_title' 	=> 	'</p>',
	));
	register_sidebar(array(
		'name'			=>	esc_html__( 'Footer Widgets #2', 'from-scratch' ),
		'id'			=>	'widgets_footer2',
		'description' 	=> 	'',
		'before_widget' => 	'<div id="%1$s" class="widget-container %2$s">',
		'after_widget' 	=> 	'</div>',
		'before_title' 	=> 	'<p class="widget-title">',
		'after_title' 	=> 	'</p>',
	));
	register_sidebar(array(
		'name'			=>	esc_html__( 'Footer Widgets #3', 'from-scratch' ),
		'id'			=>	'widgets_footer3',
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
    <label class="a11y-hidden" for="s">' . __( 'Search for:', 'from-scratch' ) . '</label>
    <input type="search" value="' . get_search_query() . '" name="s" id="s">
    <input type="submit" class="action-btn" id="searchsubmit" value="'. esc_attr__( 'Search', 'from-scratch' ) .'">
    </form>';
 
    return $form;
}
add_filter( 'get_search_form', 'fs_search_form' );


// Custom comment HTML

function fs_custom_comments($comment, $args, $depth) {
   $GLOBALS['comment'] = $comment; ?>
   
   <li <?php comment_class(); ?> id="li-comment-<?php comment_ID() ?>">
		<article id="comment-<?php comment_ID(); ?>" class="comment">
			<div class="comment-author avatar">
				<?php
					echo get_avatar( $comment, 192 );
				?>
			</div>
			
			<div class="comment-content">
				<div class="comment-author-name">
					<?php 
						printf( '<span class="fn">%s</span>', get_comment_author_link() );
					?>
				</div>
				<div class="comment-date">
					<?php 
						printf( '<a href="%1$s"><time pubdate datetime="%2$s">%3$s</time></a>',
							esc_url( get_comment_link( $comment->comment_ID ) ),
							get_comment_time( 'c' ),
							sprintf( __( '%1$s at %2$s', 'from-scratch' ), get_comment_date(), get_comment_time() )
						);
					?>
				</div>
				<div class="comment-author-text">
					<?php if ($comment->comment_approved == '0') : ?>
						<em class="pending"><?php esc_html_e('Your comment is awaiting moderation.', 'from-scratch') ?></em>
					<?php endif; ?>
					
					<?php comment_text(); ?>
				</div>
			</div>
			
			<div class="reply">
				<?php comment_reply_link( array_merge($args, array(
				    'reply_text' => __('Reply', 'from-scratch'),
				    'depth'      => $depth,
				    'max_depth'  => $args['max_depth']
				    )
				)); ?>
			</div>
			<?php edit_comment_link( __( 'Edit', 'from-scratch' ), '<span class="edit-link">', '</span>' ); ?>
			
		</article>
		
<?php }


// Custom loops 

// function fs_showall_loop( $query ) {
// 	if ( is_admin() || ! $query->is_main_query() )
// 		return;
// 
// 	if ( is_post_type_archive( 'project' ) ) {
// 		$query->set( 'posts_per_page', -1 );
// 		$query->set( 'orderby', 'title' );
// 		$query->set( 'order', 'ASC' );
// 		return;
// 	}
// }
// add_action( 'pre_get_posts', 'fs_showall_loop', 1 );



// ------------------------
// ACF
// ------------------------


if( class_exists('acf') ) {

	// Remove the WP Custom Fields meta box
	
	add_filter('acf/settings/remove_wp_meta_box', '__return_true');		
	
	// Custom blocks

	// $my_blocks = array_diff( scandir(FS_THEME_DIR . '/blocks'), array('..', '.', '.DS_Store') );
	// 
	// foreach( $my_blocks as $block ) {
	// 	include_once 'blocks/'. $block .'/'. $block .'.php';
	// 	include_once 'blocks/'. $block .'/'. $block .'-fields.php';
	// }	
	
	// Front-End ACF Functions
	/*
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
	*/

	// Social Menu icons
	
	require_once( FS_THEME_DIR . '/inc/acf/social-icons-fields.php' );
	
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
	
	
	// Widgets
	/*
	add_filter('dynamic_sidebar_params', 'fs_dynamic_sidebar_footer');
	
	function fs_dynamic_sidebar_footer( $params ) {
		
		$widget_id = $params[0]['widget_id'];
		
		$icon = get_field('icon', 'widget_' . $widget_id);
		
		if( $icon ) {
			
			$params[0]['before_title'] = '<img class="icon" src="' . $icon['url'] . '" alt="">' . $params[0]['before_title'];
			$params[0]['before_widget'] = preg_replace( '/class="widget-/', '/class="has-icon widget-', $params[0]['before_widget'], 1 );		
		}
		
		// return
		return $params;
	}
	*/

	//	ACF Options page
	/*
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
				'page_title' 	=> esc_html__( 'Archives Customizer', 'from-scratch'),
				'menu_title' 	=> esc_html__( 'Archives Customizer', 'from-scratch'),
				'parent_slug' 	=> $parent['menu_slug'],
				'menu_slug'		=> 'options-site-archives'
			));	
			acf_add_options_sub_page(array(
				'page_title' 	=> esc_html__( 'Social Networks', 'from-scratch'),
				'menu_title' 	=> esc_html__( 'Social Networks', 'from-scratch'),
				'parent_slug' 	=> $parent['menu_slug'],
				'menu_slug'		=> 'options-site-social'
			));
			
		}
	}
	*/
	
	// Translate ACF fields
	/*	
	function fs_custom_acf_settings_localization($localization){
	  return true;
	}
	add_filter('acf/settings/l10n', 'fs_custom_acf_settings_localization');
	
	function fs_custom_acf_settings_textdomain($domain){
	  return 'from-scratch';
	}
	add_filter('acf/settings/l10n_textdomain', 'fs_custom_acf_settings_textdomain');
	*/
}

// Koko 

if ( class_exists('KokoAnalytics\Plugin') ) {
	function fs_koko() {
		$role = get_role('editor');
		$role->add_cap('view_koko_analytics', true);
	}
	add_action('init', 'fs_koko', 12);
}


// ------------------------
// Auto-Updater
// ------------------------

// Remove these lines and dependencies for your theme

require 'inc/plugin-update-checker/plugin-update-checker.php';
use YahnisElsts\PluginUpdateChecker\v5\PucFactory;

$myUpdateChecker = PucFactory::buildUpdateChecker(
	'https://github.com/anybodesign/from-scratch',
	__FILE__,
	'from-scratch'
);
$myUpdateChecker->setBranch('master');
