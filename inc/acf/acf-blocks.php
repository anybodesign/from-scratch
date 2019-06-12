<?php if ( !defined('ABSPATH') ) die();
	
add_filter( 'block_categories', 'fs_block_categories', 10, 2 );
function fs_block_categories( $categories, $post ) {

    return array_merge(
        $categories,
        array(
            array(
                'slug' 	=> 'fs-blocks',
                'title' => __( 'FS Blocks', 'from-scratch' ),
                //'icon'  => 'lightbulb',
            ),
        )
    );
}


add_action('acf/init', 'fs_acf_blocks_init');
function fs_acf_blocks_init() {
	global $fs_blocks;
	
	if( function_exists('acf_register_block') ) {
		
		// text block
		acf_register_block(array(
			'name'				=> 'text',
			'title'				=> __('Rich Text', 'from-scratch'),
			//'description'		=> __('A text block with columns.', 'from-scratch'),
			'render_callback'	=> 'fs_acf_block_render_callback',
			'category'			=> 'fs-blocks',
			'icon'				=> 'text',
            'mode'				=> 'auto',
            'supports'			=> array( 'align' => false, 'mode' => false),
            'keywords'			=> array( 'text', 'texte' ),
            'enqueue_style' 	=> FS_THEME_URL . '/template-parts/acf/block-text.css',
		));
		
		// textimg block
		acf_register_block(array(
			'name'				=> 'textimg',
			'title'				=> __('Text and Image', 'from-scratch'),
			'render_callback'	=> 'fs_acf_block_render_callback',
			'category'			=> 'fs-blocks',
			'icon'				=> '<svg width="100%" height="100%" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><g><rect x="13.927" y="6.942" width="10.045" height="2" style="fill:#555d66;"/><rect x="13.927" y="14.827" width="7.49" height="2" style="fill:#555d66;"/><rect x="13.927" y="10.885" width="5.005" height="2" style="fill:#555d66;"/><rect x="0.027" y="6.058" width="11.8" height="11.885" style="fill:#555d66;"/><path d="M10.01,15.827l0.012,-5.913l-8.102,5.913l8.09,0Zm-6.086,-7.885c1.105,0 2.003,0.884 2.003,1.972c0,1.088 -0.898,1.971 -2.003,1.971c-1.106,0 -2.004,-0.883 -2.004,-1.971c0,-1.088 0.898,-1.972 2.004,-1.972Z" style="fill:#fff;"/></g></svg>',
            'mode'				=> 'auto',
            'supports'			=> array( 'align' => array( 'full' ), 'mode' => false),
            'keywords'			=> array( 'text', 'texte', 'image' ),
            'enqueue_style' 	=> FS_THEME_URL . '/template-parts/acf/block-textimg.css',
		));
		
		// photo gallery block
		acf_register_block(array(
			'name'				=> 'gallery',
			'title'				=> __('Photo gallery', 'from-scratch'),
			'render_callback'	=> 'fs_acf_block_render_callback',
			'category'			=> 'fs-blocks',
			'icon'				=> '<svg width="100%" height="100%" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><g><rect x="6" y="6" width="12" height="12" style="fill:#555d66;"/><path d="M16.39,16.289l0.011,-5.971l-8.238,5.971l8.227,0Zm-6.428,-8.386c1.125,0 2.038,0.892 2.038,1.99c0,1.099 -0.913,1.991 -2.038,1.991c-1.124,0 -2.037,-0.892 -2.037,-1.991c0,-1.098 0.913,-1.99 2.037,-1.99Z" style="fill:#fff;"/><rect x="20" y="8" width="4" height="8" style="fill:#555d66;"/><rect x="0" y="8" width="4" height="8" style="fill:#555d66;"/></g></svg>',
            'mode'				=> 'auto',
            'supports'			=> array( 'align' => array( 'full' ), 'mode' => false),
            'keywords'			=> array( 'photo', 'gallery', 'galerie' ),
            'enqueue_style' 	=> FS_THEME_URL . '/template-parts/acf/block-gallery.css',
		));
		
		// content gallery block
		acf_register_block(array(
			'name'				=> 'content',
			'title'				=> __('Content gallery', 'from-scratch'),
			'render_callback'	=> 'fs_acf_block_render_callback',
			'category'			=> 'fs-blocks',
			'icon'				=> '<svg width="100%" height="100%" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><g><rect x="20.12" y="7.841" width="3.88" height="8.085" style="fill:#555d66;"/><rect x="0" y="7.841" width="3.88" height="8.085" style="fill:#555d66;"/><rect x="6" y="6" width="12" height="12" style="fill:#555d66;"/><path d="M13.872,11.882l-0.464,0.349c-0.465,0.464 -0.581,1.277 -0.233,1.858l-0.929,0.929l-1.277,-1.278l-1.51,1.51c-0.232,0.232 -1.858,1.51 -2.09,1.278c-0.232,-0.233 1.045,-1.858 1.277,-2.091l1.51,-1.509l-1.277,-1.278l0.929,-0.929c0.58,0.349 1.393,0.349 1.858,-0.232l0.348,-0.348c0.581,-0.581 0.581,-1.394 0.232,-1.975l0.929,-0.929l3.484,3.368l-0.929,0.929c-0.555,-0.222 -1.322,-0.232 -1.858,0.348Z" style="fill:#fff;"/></g></svg>',
            'mode'				=> 'auto',
            'supports'			=> array( 'align' => array( 'full' ), 'mode' => false),
            'keywords'			=> array( 'content', 'contenu', 'gallery', 'galerie' ),
			'enqueue_assets' => function(){
				wp_enqueue_style( 'gallery-css', FS_THEME_URL . '/template-parts/acf/block-gallery.css' );
				wp_enqueue_style( 'content-css', FS_THEME_URL . '/template-parts/acf/block-content.css' );
			},
		));
		
		// CTA block
		acf_register_block(array(
			'name'				=> 'cta',
			'title'				=> __('CTA', 'from-scratch'),
			'render_callback'	=> 'fs_acf_block_render_callback',
			'category'			=> 'fs-blocks',
			'icon'				=> '<svg width="100%" height="100%" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><g><rect x="0.014" y="5" width="23.973" height="14" style="fill:#555d66;"/><path d="M16.01,13.11l0,2l-8.02,0l0,-2l8.02,0Zm3.963,-3.955l0,2l-15.946,0l0,-2l15.946,0Z" style="fill:#fff;"/></g></svg>',
            'mode'				=> 'auto',
            'supports'			=> array( 'align' => array( 'full' ), 'mode' => false),
            'keywords'			=> array( 'cta', 'call to action' ),
            'enqueue_style' 	=> FS_THEME_URL . '/template-parts/acf/block-cta.css',
		));
		
	}
}



function fs_acf_block_render_callback( $block ) {
	
	// convert name ("acf/testimonial") into path friendly slug ("testimonial")
	$slug = str_replace('acf/', '', $block['name']);
	
	// include a template part from within the "template-parts/block" folder
	if( file_exists( get_theme_file_path("/template-parts/acf/block-{$slug}.php") ) ) {
		include( get_theme_file_path("/template-parts/acf/block-{$slug}.php") );
	}
}	