<?php if ( !defined('ABSPATH') ) die();
/**
 * Template Name: Style Guide
 *
 * @package WordPress
 * @subpackage From_Scratch
 * @since 1.0
 * @version 1.0
 */
get_header(); ?>

				
				<div class="page-wrap">
					<?php 
						while ( have_posts() ) : the_post();
							get_template_part( 'template-parts/page', 'banner' );
						endwhile;					
					?>
					<div class="page-content">
						<?php 
							get_template_part('template-parts/temp','styleguide'); 
						?>
					</div>
					
				</div>	
						
<?php get_footer(); ?>