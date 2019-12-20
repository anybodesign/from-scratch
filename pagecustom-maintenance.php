<?php if ( !defined('ABSPATH') ) die();
/**
 * Template Name: Maintenance
 *
 * @package WordPress
 * @subpackage From_Scratch
 * @since 3.1
 * @version 1.0
 */
get_header(); ?>

				<div class="page-wrap">
					<?php 
						while ( have_posts() ) : the_post();
							get_template_part( 'template-parts/page', 'banner' );
						endwhile;					
					?>
				</div>	
						
<?php get_footer(); ?>