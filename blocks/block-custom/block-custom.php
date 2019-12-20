<?php if ( !defined('ABSPATH') ) die();
						
// ACF Blocks

add_action('acf/init', 'block_custom_init');
function block_custom_init() {

	if( function_exists('acf_register_block') ) {

		// Custom block Text
		
		acf_register_block(array(
			'name'				=> 'block',
			'title'				=> __('Block', 'from-scratch'),
			'description'		=> __('Block description.', 'from-scratch'),
			'category'			=> 'ad-blocks',
			'icon'				=> '<svg width="100%" height="100%" viewBox="0 0 24 24" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xml:space="preserve" xmlns:serif="http://www.serif.com/" style="fill-rule:evenodd;clip-rule:evenodd;stroke-linejoin:round;stroke-miterlimit:2;"><path d="M22.08,0c1.06,0 1.92,0.86 1.92,1.92l0,20.16c0,1.06 -0.86,1.92 -1.92,1.92l-20.16,0c-1.06,0 -1.92,-0.86 -1.92,-1.92l0,-20.16c0,-1.06 0.86,-1.92 1.92,-1.92l20.16,0Zm-0.88,2l-18.4,0c-0.442,0 -0.8,0.359 -0.8,0.8l0,18.4c0,0.442 0.358,0.8 0.8,0.8l18.4,0c0.442,0 0.8,-0.358 0.8,-0.8l0,-18.4c0,-0.441 -0.358,-0.8 -0.8,-0.8Z" style="fill:#555d66;"/></svg>',
            'mode'				=> 'auto',
            'supports'			=> array( 'align' => array( 'wide', 'full' ), 'mode' => false),
            'keywords'			=> array( 'block', 'block' ),
            'render_template'   => FS_THEME_DIR . '/blocks/block-custom/templates/block-custom.php',
            'enqueue_assets'	=> function() {
										wp_enqueue_style( 'block-custom', FS_THEME_URL . '/blocks/block-custom/css/block-custom.css' );
										wp_enqueue_script( 'block-custom', FS_THEME_URL . '/blocks/block-custom/js/block-custom.js', array('jquery'), '', true );
									},
		));
		
	}	
}


// Load ACF fields (PHP)

require_once( FS_THEME_DIR . '/blocks/block-custom/block-custom-fields.php' );