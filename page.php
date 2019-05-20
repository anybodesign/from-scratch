<?php if ( !defined('ABSPATH') ) die();
/**
 * The template for displaying all pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
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
							get_template_part( 'template-parts/page', 'content' );
						endwhile;					
					?>
					
					
					<?php // ACF Builder output ?>
					
					<div class="builder-content">
						<?php get_template_part('template-parts/acf/builder'); ?>
					</div>
										
				</div>
				
<?php get_footer(); ?>