<?php if ( !defined('ABSPATH') ) die();
/**
 * The template for displaying archive pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage From_Scratch
 * @since 1.0
 * @version 1.0
 */ 
get_header(); ?>

				<div class="page-wrap has-sidebar">

					<?php 
						get_template_part( 'template-parts/page', 'banner' ); 
					?>
					
					<div class="page-content">
	
					<?php if ( have_posts() ) : ?>
			
						<?php while ( have_posts() ) : the_post(); ?>
			
							<?php get_template_part( 'template-parts/post', 'block' ); ?>
			
						<?php endwhile; ?>
			
						<?php the_posts_navigation(); ?>
			
					<?php else : ?>
	
						<?php get_template_part( 'template-parts/nothing' ); ?>
				
					<?php endif; ?>	
	
					</div>
					

					<div class="page-sidebar">
						<?php get_sidebar(); ?>
					</div>
										
				</div>
				
<?php get_footer(); ?>