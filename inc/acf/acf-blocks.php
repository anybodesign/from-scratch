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
			'icon'				=> 'align-left',
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
			'icon'				=> 'images-alt2',
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
			'icon'				=> 'layout',
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
			'icon'				=> 'align-center',
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