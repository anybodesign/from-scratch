<?php if ( !defined('ABSPATH') ) die();

function fs_section_exists( $post_ID, $section_ID ){
	
	if( $post_ID && $section_ID ) {
		foreach( get_field('fs_builder', $post_ID ) as $section ){
			if( $section_ID == $section['acf_fc_layout'] ) {
				return true;
			}
		}
		return false;
	}
}

function fs_get_row_layout( $row_layout ) {
	return str_replace( 'fs_builder_', '',  $row_layout );
}