<?php defined('ABSPATH') or die();
/**
 * From Scratch Customizer functionality
 *
 * @package WordPress
 * @subpackage From_Scratch
 * @since 1.0
 * @version 1.0
 */

// Customizer JS

add_action( 'customize_preview_init', 'fs_customizer_scripts' );
function fs_customizer_scripts() {
	wp_enqueue_script(
		'fs-customizer',
	    	FS_THEME_URL . '/js/customizer.js',
	    	array( 'customize-preview' ), 
	    	false, 
	    	true
	);
}

// Customizer Settings
 
function fs_customize_register($fs_customize) {

	// Title and Description
	// -
	// + + + + + + + + + + 
	
	$fs_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$fs_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';

	if ( isset( $fs_customize->selective_refresh ) ) {
		$fs_customize->selective_refresh->add_partial( 'blogname', array(
			'selector'        => array('.site-title', '.site-title a'),
			'render_callback' => 'fs_customize_partial_blogname',
		) );
		$fs_customize->selective_refresh->add_partial( 'blogdescription', array(
			'selector'        => '.site-desc',
			'render_callback' => 'fs_customize_partial_blogdescription',
		) );
	}	 

	// Create Some Sections
	// -
	// + + + + + + + + + + 
	
	$fs_customize->add_section(
		'fs_header_section',
		array(
			'title'			=> __('Header Options', 'from-scratch'),
			'priority'		=> 40,
		)
	);
	$fs_customize->add_section(
		'fs_footer_section',
		array(
			'title'			=> __('Footer Options', 'from-scratch'),
			'priority'		=> 40,
		)
	);
	$fs_customize->add_section(
		'fs_options_section',
		array(
			'title'			=> __('Theme Options', 'from-scratch'),
			'priority'		=> 50,
		)
	);
	$fs_customize->add_section(
		'fs_layout_section', 
		array(
			'title' 		=> __('Layout Options', 'from-scratch'),
			'description' 	=> __('Choose the layout of the site header and main navigation.', 'from-scratch'),
			'priority'		=> 50,
		)
	);
	$fs_customize->add_section(
		'fs_pictures_section', 
		array(
			'title' 		=> __('Theme Pictures', 'from-scratch'),
			'description' 	=> __('Select default banner pictures.', 'from-scratch'),
			'priority'		=> 50,
		)
	);
	$fs_customize->add_section(
		'fs_fonts_section', 
		array(
			'title' 		=> __('Theme Fonts', 'from-scratch'),
			'description' 	=> __('Choose a font combination for the site.', 'from-scratch'),
			'priority'		=> 60,
		)
	);


	// Colors
	// -
	// + + + + + + + + + + 
		
		// Primary color
		
		$fs_customize->add_setting(
			'primary_color', 
			array(
				'default'			=> '',
				'sanitize_callback'	=> 'sanitize_hex_color',
				'capability'		=> 'edit_theme_options',
				'type'				=> 'theme_mod',
				'transport'			=> 'refresh', 
			)
		);
		$fs_customize->add_control(
			new WP_Customize_Color_control(
				$fs_customize, 
				'primary_color', 
				array(
					'label'		=> __('Primary color', 'from-scratch'),
					'section'	=> 'colors',
					'settings'	=> 'primary_color',
				)
			)
		);
				
		// Secondary color
		
		$fs_customize->add_setting(
			'secondary_color', 
			array(
				'default'			=> '',
				'sanitize_callback'	=> 'sanitize_hex_color',
				'capability'		=> 'edit_theme_options',
				'type'				=> 'theme_mod',
				'transport'			=> 'refresh', 
			)
		);
		$fs_customize->add_control( 
			new WP_Customize_Color_control(
				$fs_customize, 
				'secondary_color', 
				array(
					'label'		=> __('Secondary color', 'from-scratch'),
					'section'	=> 'colors',
					'settings'	=> 'secondary_color',
				)
			)
		);
				
		// Accent color
		
		$fs_customize->add_setting(
			'accent_color', 
			array(
				'default'			=> '',
				'sanitize_callback'	=> 'sanitize_hex_color',
				'capability'		=> 'edit_theme_options',
				'type'				=> 'theme_mod',
				'transport'			=> 'refresh', 
			)
		);
		$fs_customize->add_control( new WP_Customize_Color_control($fs_customize, 'accent_color', array(
					'label'		=> __('Contrast color', 'from-scratch'),
					'section'	=> 'colors',
					'settings'	=> 'accent_color',
				)
			)
		);



	// Header Options
	// -
	// + + + + + + + + + + 

		// Site logo
		
		$fs_customize->add_setting(
			'site_logo', 
			array(
				'sanitize_callback'	=> 'esc_url_raw'
			)
		);
		$fs_customize->add_control(
			new WP_Customize_Image_control(
				$fs_customize, 
				'site_logo', 
				array(
					'label'			=> __('Site Logo', 'from-scratch'),
					'description'	=> __('Your logo, displayed instead of the website title.', 'from-scratch'),
					'section'		=> 'fs_header_section',
					'settings'		=> 'site_logo',
				)
			)
		);
		
		// Site logo - Mobile
		
		$fs_customize->add_setting(
			'site_logo_mobile', array(
				'sanitize_callback'		=> 'esc_url_raw'
			)
		);
		$fs_customize->add_control( 
			new WP_Customize_Image_control(
				$fs_customize, 
				'site_logo_mobile', 
				array(
					'label'			=> __('Site Logo - Mobile', 'from-scratch'),
					'description'	=> __('Specific version of the logo for mobile devices. If none, the default logo will be used.', 'from-scratch'),
					'section'		=> 'fs_header_section',
					'settings'		=> 'site_logo_mobile',
				)
			)
		);

		// Hide site name
		
		$fs_customize->add_setting(
			'hide_sitetitle', 
			array(
				'default'			=> false,
				'transport'			=> 'postMessage',
				'sanitize_callback'	=> 'fs_customizer_sanitize_checkbox',		
			)
		);
		$fs_customize->add_control(
			'hide_sitetitle', 
			array(
				'type'			=> 'checkbox',
				'label'			=> __('Hide the site title', 'from-scratch'),
				'section'		=> 'fs_header_section',
				'settings'		=> 'hide_sitetitle',
			)
		);

		// Hide tagline
		
		$fs_customize->add_setting(
			'hide_tagline', 
			array(
				'default'			=> false,
				'transport'			=> 'postMessage',
				'sanitize_callback'	=> 'fs_customizer_sanitize_checkbox',		
			)
		);
		$fs_customize->add_control(
			'hide_tagline', 
			array(
				'type'			=> 'checkbox',
				'label'			=> __('Hide the website tagline', 'from-scratch'),
				'section'		=> 'fs_header_section',
				'settings'		=> 'hide_tagline',
			)
		);
	

	// Footer Options
	// -
	// + + + + + + + + + + 
	
		
		// Footer text
		
		$fs_customize->add_setting(
			'footer_text', 
			array(
				'default'				=> '',
				'transport'				=> 'postMessage',				
				'sanitize_callback'		=> 'sanitize_text_field'
			)
		);
		$fs_customize->add_control(
			'footer_text', 
			array(
				'label'			=> __('Custom footer text', 'from-scratch'),
				'description'	=> __('Add a custom text instead of the year and blog name.', 'from-scratch'),
				'section'		=> 'fs_footer_section',
				'settings'		=> 'footer_text',
			)
		);
		
		
		// WP Credits
		
		$fs_customize->add_setting(
			'display_wp', 
			array(
				'default'			=> false,
				'transport'			=> 'postMessage',				
				'sanitize_callback'	=> 'fs_customizer_sanitize_checkbox',		
			)
		);
		$fs_customize->add_control(
			'display_wp', 
			array(
				'type'			=> 'checkbox',
				'label'			=> __('Display WordPress Link', 'from-scratch'),
				'section'		=> 'fs_footer_section',
				'settings'		=> 'display_wp',
			)
		);


	// Theme Options
	// -
	// + + + + + + + + + + 
		
		// Back to top
	
		$fs_customize->add_setting(
			'back2top', 
			array(
				'default'			=> false,
				'sanitize_callback'	=> 'fs_customizer_sanitize_checkbox',		
			)
		);
		$fs_customize->add_control(
			'back2top', 
			array(
				'type'			=> 'checkbox',
				'label'			=> __('Display a Back to top button', 'from-scratch'),
				'section'		=> 'fs_options_section',
				'settings'		=> 'back2top',
			)
		);
			
		// Sticky Nav
		
		$fs_customize->add_setting(
			'stickynav', 
			array(
				'default'			=> false,
				'sanitize_callback'	=> 'fs_customizer_sanitize_checkbox',		
			)
		);
		$fs_customize->add_control(
			'stickynav', 
			array(
				'type'			=> 'checkbox',
				'label'			=> __('Make the header sticky', 'from-scratch'),
				'section'		=> 'fs_options_section',
				'settings'		=> 'stickynav',
			)
		);
		
		// Post metas
		
		$fs_customize->add_setting(
			'meta_author', 
			array(
				'default'			=> true,
				'sanitize_callback'	=> 'fs_customizer_sanitize_checkbox',		
			)
		);
		$fs_customize->add_control(
			'meta_author', 
			array(
				'type'			=> 'checkbox',
				'label'			=> __('Show the author in post meta', 'from-scratch'),
				'section'		=> 'fs_options_section',
				'settings'		=> 'meta_author',
			)
		);
		$fs_customize->add_setting(
			'meta_category', 
			array(
				'default'			=> true,
				'sanitize_callback'	=> 'fs_customizer_sanitize_checkbox',		
			)
		);
		$fs_customize->add_control(
			'meta_category', 
			array(
				'type'			=> 'checkbox',
				'label'			=> __('Show the category in post meta', 'from-scratch'),
				'section'		=> 'fs_options_section',
				'settings'		=> 'meta_category',
			)
		);


	// Theme Layout
	// -
	// + + + + + + + + + + 

		// Header & Main nav

		$fs_customize->add_setting(
			'layout_option', 
			array(
				'default' => 'version1',
				'sanitize_callback' => 'fs_customizer_sanitize_radio_layout',
			)
		);
		
		$fs_customize->add_control(
			'layout_option', 
			array(
				'type' => 'radio',
				'label' => __( 'Layout version', 'from-scratch' ),
				'section' => 'fs_layout_section',
				'choices' => array(
					'version1' => __( 'Version 1', 'from-scratch' ),
					'version2' => __( 'Version 2', 'from-scratch' ),
					'version3' => __( 'Version 3', 'from-scratch' ),
				),
			)
		);


	// Theme Pictures
	// -
	// + + + + + + + + + + 

	
		// 404 Image
		
		$fs_customize->add_setting(
			'bg_404', 
			array(
				'sanitize_callback'	=> 'esc_url_raw'
			)
		);
		$fs_customize->add_control( 
			new WP_Customize_Image_control(
				$fs_customize, 
				'bg_404', 
				array(
					'label'			=> __('404 error', 'from-scratch'),
					'description'	=> __('Choose a picture for the 404 error page. (2048 x 625 pixels max.)', 'from-scratch'),
					'section'		=> 'fs_pictures_section',
					'settings'		=> 'bg_404',
				)
			)
		);	

}
add_action('customize_register', 'fs_customize_register');


// Callbacks + Sanitize

function fs_customize_partial_blogname() {
	bloginfo( 'name' );
}
function fs_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

function fs_customizer_sanitize_checkbox( $input ) {
	if ( $input === true || $input === '1' ) {
		return '1';
	}
	return '';
}
function fs_customizer_sanitize_radio_layout( $input ) {
    if( !in_array( $input, array( 'version1', 'version2', 'version3' ) ) ) {
        $input = 'version1';
    }
    return $input;
}


// Customizer Colors Output

function fs_colors() {
	?>
	<style>
		/* If using CSS vars
			
		:root {
			--primary_color: <?php echo esc_attr(get_theme_mod('primary_color', '#FF0055')); ?>; 
			--secondary_color: <?php echo esc_attr(get_theme_mod('title_color', '#23252B')); ?>;
			--accent_color: <?php echo esc_attr(get_theme_mod('sidebar_color', '#FBFF00')); ?>;
		}
		*/
	</style>
	<?php
}
add_action('wp_head','fs_colors');
