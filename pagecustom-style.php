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
					
					<div class="page-content">

						<h1 class="page-title">
							<?php the_title(); ?>
						</h1>
						
						<?php get_template_part('template-parts/temp','styleguide'); ?>
					</div>
					
				</div>	
						
<?php get_footer(); ?>