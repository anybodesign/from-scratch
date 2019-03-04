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
	
	$wp_customize->add_section('fs_options_section', array(
		'title' 		=> __('Theme Options', 'from-scratch'),
		'priority'		=> 20,
	));
	$wp_customize->add_section('fs_pictures_section', array(
		'title' 		=> __('Theme Pictures', 'from-scratch'),
		'description' 	=> __('Pictures customisation', 'from-scratch'),
		'priority'		=> 40,
	));
	


	// Colors
	// -
	// + + + + + + + + + + 
	
		
		// Primary color
		
		$wp_customize->add_setting('primary_color', array(
			'default'			=> '9c0',
			'sanitize_callback'	=> 'sanitize_hex_color',
			'capability'		=> 'edit_theme_options',
			'type'				=> 'theme_mod',
			'transport'			=> 'refresh', 
		));
		$wp_customize->add_control( new WP_Customize_Color_control($wp_customize, 'primary_color_ctrl', array(
			'label'		=> __('Primary color', 'from-scratch'),
			'section'	=> 'colors',
			'settings'	=> 'primary_color',
		)));
		
		
		// Secondary color
		
		$wp_customize->add_setting('secondary_color', array(
			'default'			=> '606060',
			'sanitize_callback'	=> 'sanitize_hex_color',
			'capability'		=> 'edit_theme_options',
			'type'				=> 'theme_mod',
			'transport'			=> 'refresh', 
		));
		$wp_customize->add_control( new WP_Customize_Color_control($wp_customize, 'secondary_color_ctrl', array(
			'label'		=> __('Secondary color', 'from-scratch'),
			'section'	=> 'colors',
			'settings'	=> 'secondary_color',
		)));



	// Site identity
	// -
	// + + + + + + + + + + 


		// Site logo
		
		$wp_customize->add_setting('site_logo', array(
			'default'				=> '',
			'sanitize_callback'		=> 'esc_url_raw'
		));
		
		$wp_customize->add_control( new WP_Customize_Image_control($wp_customize, 'site_logo_ctrl', array(
			'label'			=> __('Site Logo', 'from-scratch'),
			'section'		=> 'title_tagline',
			'settings'		=> 'site_logo',
		)));
			
	
		// Footer text
		
		$wp_customize->add_setting('footer_text', array(
			'default'				=> '',
			'sanitize_callback'		=> 'sanitize_text_field'
		));
		$wp_customize->add_control('footer_text_ctrl', array(
			'label'			=> __('Custom footer text', 'from-scratch'),
			'description'	=> __('Add a custom text instead of the year and blog name.', 'from-scratch'),
			'section'		=> 'title_tagline',
			'settings'		=> 'footer_text',
		));	
		
		
		// WP Credits
		
		$wp_customize->add_setting('display_wp', array(
			'default'			=> false,
			'sanitize_callback'	=> 'fs_customizer_sanitize_checkbox',		
		));
		
		$wp_customize->add_control('display_wp_ctrl', array(
			'type'			=> 'checkbox',
			'label'			=> __('Display WordPress Link', 'from-scratch'),
			'section'		=> 'title_tagline',
			'settings'		=> 'display_wp',
		));


	// Theme Options
	// -
	// + + + + + + + + + + 
	
	
		// Back to top
	
		$wp_customize->add_setting('back2top', array(
			'default'			=> false,
			'sanitize_callback'	=> 'fs_customizer_sanitize_checkbox',		
		));
		
		$wp_customize->add_control('back2top_ctrl', array(
			'type'			=> 'checkbox',
			'label'			=> __('Display a Back to top button', 'from-scratch'),
			'section'		=> 'fs_options_section',
			'settings'		=> 'back2top',
		));

			
		// Sticky Nav
		
		$wp_customize->add_setting('stickynav', array(
			'default'			=> false,
			'sanitize_callback'	=> 'fs_customizer_sanitize_checkbox',		
		));
		
		$wp_customize->add_control('stickynav_ctrl', array(
			'type'			=> 'checkbox',
			'label'			=> __('Make the header sticky', 'from-scratch'),
			'section'		=> 'fs_options_section',
			'settings'		=> 'stickynav',
		));


	// Theme Pictures
	// -
	// + + + + + + + + + + 

	
		// 404 Image
		
		$wp_customize->add_setting('bg_404', array(
			'sanitize_callback'		=> 'esc_url_raw'
		));
		
		$wp_customize->add_control( new WP_Customize_Image_control($wp_customize, 'bg_404_ctrl', array(
			'label'			=> __('404 error', 'from-scratch'),
			'description'	=> __('Choose a picture for the 404 error page. (2048 x 625 pixels max.)', 'from-scratch'),		
			'section'		=> 'fs_pictures_section',
			'settings'		=> 'bg_404',
		)));	
		
	
	
	
	 
}
add_action('customize_register', 'fs_customize_register');


// Sanitize

function fs_customizer_sanitize_checkbox( $input ) {
	if ( $input === true || $input === '1' ) {
		return '1';
	}
	return '';
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
