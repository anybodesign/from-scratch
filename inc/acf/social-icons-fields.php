<?php defined('ABSPATH') or die(); 

function fs_social_icons_fields() {

if( function_exists('acf_add_local_field_group') ):

acf_add_local_field_group(array(
	'key' => 'group_60d9dbda8cc54',
	'title' => __('Social icons', 'from-scratch'),
	'fields' => array(
		array(
			'key' => 'field_60d9dbff46b84',
			'label' => __('Icon', 'from-scratch'),
			'name' => 'icon',
			'type' => 'image',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'return_format' => 'array',
			'preview_size' => 'medium',
			'library' => 'all',
			'min_width' => '',
			'min_height' => '',
			'min_size' => '',
			'max_width' => '',
			'max_height' => '',
			'max_size' => '',
			'mime_types' => '',
		),
	),
	'location' => array(
		array(
			array(
				'param' => 'nav_menu_item',
				'operator' => '==',
				'value' => 'location/social_menu',
			),
		),
	),
	'menu_order' => 0,
	'position' => 'normal',
	'style' => 'default',
	'label_placement' => 'top',
	'instruction_placement' => 'label',
	'hide_on_screen' => '',
	'active' => true,
	'description' => '',
));

endif;

}
add_action('acf/init', 'fs_social_icons_fields');