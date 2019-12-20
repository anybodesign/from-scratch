<?php defined('ABSPATH') or die(); 

function custom_block_fields() {

if( function_exists('acf_add_local_field_group') ):

acf_add_local_field_group(array(
	'key' => 'group_5dfcda2cab29b',
	'title' => __('Block Custom', 'from-scratch'),
	'fields' => array(
		array(
			'key' => 'field_5dfcda3344dbd',
			'label' => __('Field', 'from-scratch'),
			'name' => 'field',
			'type' => 'text',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'placeholder' => '',
			'prepend' => '',
			'append' => '',
			'maxlength' => '',
		),
	),
	'location' => array(
		array(
			array(
				'param' => 'block',
				'operator' => '==',
				'value' => 'acf/block',
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
add_action('acf/init', 'custom_block_fields');