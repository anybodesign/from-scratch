<?php defined('ABSPATH') or die();


/**
 * Theme colors
 */

function fs_get_colors() {

	return array(

		'primary'   => get_theme_mod('primary_color', '#23252b'),
		'secondary' => get_theme_mod('secondary_color', '#606060'),
		'accent'    => get_theme_mod('accent_color', '#ceff00'),
		
		'text'      => get_theme_mod('text_color', '#23252b'),
		
		'background'=> get_theme_mod('bg_color', '#f0f0f0'),
		'page'      => get_theme_mod('page_color', '#ffffff'),

	);

}



/**
 * Theme fonts
 */

function fs_get_fonts() {

	$font = get_theme_mod('webfont', 'barlow');


	switch ($font) {
		
		
		case 'bebas':
			
			return array(
				
				'title'      => 'Title-Bebas',
				'regular'    => 'Regular-Bebas',
				'italic'     => 'Italic-Bebas',
				'bold'       => 'Bold-Bebas',
				'bolditalic' => 'BoldItalic-Bebas',
				
			);



		case 'playfair':

			return array(

				'title'      => 'Title-Playfair',
				'regular'    => 'Regular-Playfair',
				'italic'     => 'Italic-Playfair',
				'bold'       => 'Bold-Playfair',
				'bolditalic' => 'BoldItalic-Playfair',

			);



		case 'luciole':

			return array(

				'title'      => 'Title-Luciole',
				'regular'    => 'Regular-Luciole',
				'italic'     => 'Italic-Luciole',
				'bold'       => 'Bold-Luciole',
				'bolditalic' => 'BoldItalic-Luciole',

			);



		case 'miriam':

			return array(

				'title'      => 'Title-Miriam',
				'regular'    => 'Regular-Miriam',
				'italic'     => 'Italic-Miriam',
				'bold'       => 'Bold-Miriam',
				'bolditalic' => 'BoldItalic-Miriam',

			);



		default:

			return array(

				'title'      => 'Title',
				'regular'    => 'Regular',
				'italic'     => 'Italic',
				'bold'       => 'Bold',
				'bolditalic' => 'BoldItalic',

			);

	}

}