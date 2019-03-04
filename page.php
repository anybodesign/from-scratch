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

				<div class="row inner">
					<div class="site-content">
	
					<?php while ( have_posts() ) : the_post(); ?>
		
						<?php get_template_part( 'template-parts/page', 'content' ); ?>
		
					<?php endwhile; ?>

						
						<?php // Just for testing typographic styles, then remove this part ?>
						<div class="page-content">
							<?php get_template_part('template-parts/temp','typo'); ?>
						</div>
						
					</div>					
				</div>
				
<?php get_footer(); ?>