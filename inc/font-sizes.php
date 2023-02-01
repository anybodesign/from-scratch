<?php defined('ABSPATH') or die();


add_theme_support( 'editor-font-sizes', array(
    array(
        'name' => __( 'Small', 'from-scratch' ),
        'size' => 14,
        'slug' => 'small'
    ),
	array(
        'name' => __( 'Regular', 'from-scratch' ),
        'size' => 16,
        'slug' => 'regular'
    ),
	array(
        'name' => __( 'Medium', 'from-scratch' ),
        'size' => 18,
        'slug' => 'medium'
    ),
    array(
        'name' => __( 'Large', 'from-scratch' ),
        'size' => 22,
        'slug' => 'large'
    ),
));

add_theme_support( 'disable-custom-font-sizes' );