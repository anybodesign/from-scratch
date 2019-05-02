<?php
if( !function_exists('fs_get_cpt_items') ):
	function fs_get_cpt_items( $cpt, $orderby = 'name', $order = 'ASC', $nb = -1, $taxo = false, $term_id = false ) {
			global $wpdb;
			
			$args = array(
				'posts_per_page'	=> (int) $nb,
				'post_type'  		=> $cpt,
				'orderby'    		=> $orderby,
				'order'      		=> $order,
			);
			
			if( $taxo && $term_id ){
				$args['tax_query'][] = array(
					'taxonomy'	=> $taxo,
					'field'		=> 'term_id',
					'terms'		=> $term_id
				);
			}
			
			
			$items = get_posts( $args );
		
			if( $items ) {
				return $items;
			}else{
				return false;
			}
	}
endif;