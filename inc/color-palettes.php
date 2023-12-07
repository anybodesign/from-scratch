<?php defined('ABSPATH') or die();

// COLORS 

$primary = get_theme_mod('primary_color', '#23252b');
$secondary = get_theme_mod('secondary_color', '#606060');
$accent = get_theme_mod('accent_color', '#ceff00');
$text_color = get_theme_mod('text_color', '#23252b');
$bg = get_theme_mod('bg_color', '#f0f0f0');

if ( ! function_exists( 'fs_palette_setup' ) ) :
function fs_palette_setup() {
	
	global $primary;
	global $secondary;
	global $accent;
	global $text_color;
	global $bg;
	
	add_theme_support( 'editor-color-palette', array(
	    
	    // Customizer colors
	    
	    array(
	        'name' => esc_html__( 'Primary color', 'from-scratch' ),
	        'slug' => 'primary',
	        'color' => $primary,
	    ),
	    array(
	        'name' => esc_html__( 'Secondary color', 'from-scratch' ),
	        'slug' => 'secondary',
	        'color' => $secondary,
	    ),
	    array(
	        'name' => esc_html__( 'Accent color', 'from-scratch' ),
	        'slug' => 'accent',
	        'color' => $accent,
	    ),
		array(
			'name' => esc_html__( 'Text color', 'from-scratch' ),
			'slug' => 'text-color',
			'color' => $text_color,
		),
	    array(
	        'name' => esc_html__( 'Background color', 'from-scratch' ),
	        'slug' => 'bg',
	        'color' => $bg,
	    ),
		array(
	        'name' => esc_html__( 'White', 'from-scratch' ),
	        'slug' => 'white',
	        'color' => '#fff',
	    ),
	    
	));	
	
	add_theme_support( 'disable-custom-colors' );
	
}
endif;
add_action( 'after_setup_theme', 'fs_palette_setup' );


// ACF 

if( class_exists('acf') ) {

	// ACF colors

	add_action('acf/input/admin_footer', 'fs_acf_colors_script');	

	function fs_acf_colors_script() {

		global $primary;
		global $secondary;
		global $accent;
		global $text_color;
		global $bg;
				
		$colors = ' "'.$primary.'", "'.$secondary.'", "'.$accent.'", "'.$text_color.'", "'.$bg.'" ';
	 ?>
	    <script type="text/javascript">
	    (function($){
	        
			acf.add_filter('color_picker_args', function( args, field ){
			
			    args.palettes = [ <?php echo $colors; ?> ]
			
			    return args;
			
			});	
	        
	    })(jQuery);
	    </script>
	    <?php
	}
	
}