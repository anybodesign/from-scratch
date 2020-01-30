<?php defined('ABSPATH') or die();
/**
 * From Scratch Customizer functionality
 *
 * @package WordPress
 * @subpackage From_Scratch
 * @since 1.0
 * @version 1.0
 */
 
 
 // Customizer Settings
 
function fs_customize_register($wp_customize) {
	 

	// Create Some Sections
	// -
	// + + + + + + + + + + 
	
	$wp_customize->add_section(
		'fs_options_section',
		array(
			'title'			=> __('Theme Options', 'from-scratch'),
			'priority'		=> 20,
		)
	);
	$wp_customize->add_section(
		'fs_layout_section', 
		array(
			'title' 		=> __('Layout Options', 'from-scratch'),
			'description' 	=> __('Choose the layout of the site header and main navigation.', 'from-scratch'),
			'priority'		=> 30,
		)
	);
	$wp_customize->add_section(
		'fs_fonts_section', 
		array(
			'title' 		=> __('Theme Fonts', 'from-scratch'),
			'description' 	=> __('Choose a font combination for the site.', 'from-scratch'),
			'priority'		=> 40,
		)
	);
	$wp_customize->add_section(
		'fs_pictures_section', 
		array(
			'title' 		=> __('Theme Pictures', 'from-scratch'),
			'description' 	=> __('Select default banner pictures.', 'from-scratch'),
			'priority'		=> 50,
		)
	);


	// Colors
	// -
	// + + + + + + + + + + 
		
		// Primary color
		
		$wp_customize->add_setting(
			'primary_color', 
			array(
				'default'			=> '',
				'sanitize_callback'	=> 'sanitize_hex_color',
				'capability'		=> 'edit_theme_options',
				'type'				=> 'theme_mod',
				'transport'			=> 'refresh', 
			)
		);
		$wp_customize->add_control(
			new WP_Customize_Color_control(
				$wp_customize, 
				'primary_color', 
				array(
					'label'		=> __('Primary color', 'from-scratch'),
					'section'	=> 'colors',
					'settings'	=> 'primary_color',
				)
			)
		);
				
		// Secondary color
		
		$wp_customize->add_setting(
			'secondary_color', 
			array(
				'default'			=> '',
				'sanitize_callback'	=> 'sanitize_hex_color',
				'capability'		=> 'edit_theme_options',
				'type'				=> 'theme_mod',
				'transport'			=> 'refresh', 
			)
		);
		$wp_customize->add_control( 
			new WP_Customize_Color_control(
				$wp_customize, 
				'secondary_color', 
				array(
					'label'		=> __('Secondary color', 'from-scratch'),
					'section'	=> 'colors',
					'settings'	=> 'secondary_color',
				)
			)
		);
				
		// Third color
		
		$wp_customize->add_setting(
			'third_color', 
			array(
				'default'			=> '',
				'sanitize_callback'	=> 'sanitize_hex_color',
				'capability'		=> 'edit_theme_options',
				'type'				=> 'theme_mod',
				'transport'			=> 'refresh', 
			)
		);
		$wp_customize->add_control( new WP_Customize_Color_control($wp_customize, 'third_color', array(
					'label'		=> __('Contraste color', 'from-scratch'),
					'section'	=> 'colors',
					'settings'	=> 'third_color',
				)
			)
		);



	// Site identity
	// -
	// + + + + + + + + + + 

		// Site logo
		
		$wp_customize->add_setting(
			'site_logo', 
			array(
				'sanitize_callback'	=> 'esc_url_raw'
			)
		);
		$wp_customize->add_control(
			new WP_Customize_Image_control(
				$wp_customize, 
				'site_logo', 
				array(
					'label'			=> __('Site Logo', 'from-scratch'),
					'description'	=> __('Your logo, displayed instead of the website title.', 'from-scratch'),
					'section'		=> 'title_tagline',
					'settings'		=> 'site_logo',
				)
			)
		);
		
		// Site logo - Mobile
		
		$wp_customize->add_setting(
			'site_logo_mobile', array(
				'sanitize_callback'		=> 'esc_url_raw'
			)
		);
		$wp_customize->add_control( 
			new WP_Customize_Image_control(
				$wp_customize, 
				'site_logo_mobile', 
				array(
					'label'			=> __('Site Logo - Mobile', 'from-scratch'),
					'description'	=> __('Specific version of the logo for mobile devices. If none, the default logo will be used.', 'from-scratch'),
					'section'		=> 'title_tagline',
					'settings'		=> 'site_logo_mobile',
				)
			)
		);


		// Hide tagline
		
		$wp_customize->add_setting(
			'hide_tagline', 
			array(
				'default'			=> false,
				'sanitize_callback'	=> 'fs_customizer_sanitize_checkbox',		
			)
		);
		$wp_customize->add_control(
			'hide_tagline', 
			array(
				'type'			=> 'checkbox',
				'label'			=> __('Hide the website tagline', 'from-scratch'),
				'section'		=> 'title_tagline',
				'settings'		=> 'hide_tagline',
			)
		);
	
	
		// Footer text
		
		$wp_customize->add_setting(
			'footer_text', 
			array(
				'default'				=> '',
				'sanitize_callback'		=> 'sanitize_text_field'
			)
		);
		$wp_customize->add_control(
			'footer_text', 
			array(
				'label'			=> __('Custom footer text', 'from-scratch'),
				'description'	=> __('Add a custom text instead of the year and blog name.', 'from-scratch'),
				'section'		=> 'title_tagline',
				'settings'		=> 'footer_text',
			)
		);
		
		
		// WP Credits
		
		$wp_customize->add_setting(
			'display_wp', 
			array(
				'default'			=> false,
				'sanitize_callback'	=> 'fs_customizer_sanitize_checkbox',		
			)
		);
		$wp_customize->add_control(
			'display_wp', 
			array(
				'type'			=> 'checkbox',
				'label'			=> __('Display WordPress Link', 'from-scratch'),
				'section'		=> 'title_tagline',
				'settings'		=> 'display_wp',
			)
		);


	// Theme Options
	// -
	// + + + + + + + + + + 
		
		// Back to top
	
		$wp_customize->add_setting(
			'back2top', 
			array(
				'default'			=> false,
				'sanitize_callback'	=> 'fs_customizer_sanitize_checkbox',		
			)
		);
		$wp_customize->add_control(
			'back2top', 
			array(
				'type'			=> 'checkbox',
				'label'			=> __('Display a Back to top button', 'from-scratch'),
				'section'		=> 'fs_options_section',
				'settings'		=> 'back2top',
			)
		);
			
		// Sticky Nav
		
		$wp_customize->add_setting(
			'stickynav', 
			array(
				'default'			=> false,
				'sanitize_callback'	=> 'fs_customizer_sanitize_checkbox',		
			)
		);
		$wp_customize->add_control(
			'stickynav', 
			array(
				'type'			=> 'checkbox',
				'label'			=> __('Make the header sticky', 'from-scratch'),
				'section'		=> 'fs_options_section',
				'settings'		=> 'stickynav',
			)
		);


	// Theme Layout
	// -
	// + + + + + + + + + + 

		// Header & Main nav

		$wp_customize->add_setting(
			'layout_option', 
			array(
				'default' => 'version1',
				'sanitize_callback' => 'fs_customizer_sanitize_radio_layout',
			)
		);
		
		$wp_customize->add_control(
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
		
		$wp_customize->add_setting(
			'bg_404', 
			array(
				'sanitize_callback'	=> 'esc_url_raw'
			)
		);
		$wp_customize->add_control( 
			new WP_Customize_Image_control(
				$wp_customize, 
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


// Sanitize

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
		.something { 
			background-color: <?php echo get_theme_mod('primary_color', '#9c0'); ?> 
		}
		
		.something { 
			color: <?php echo get_theme_mod('primary_color', '#9c0'); ?> 
		}
		
		.something {
			background-color: <?php echo get_theme_mod('secondary_color', '#606060'); ?>
		}
		.something {
			color: <?php echo get_theme_mod('secondary_color', '#606060'); ?>
		}
	</style>
	<?php
}
add_action('wp_head','fs_colors');
