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
					<div class="col-12">
	
					<?php while ( have_posts() ) : the_post(); ?>
		
						<?php get_template_part( 'template-parts/content', 'page' ); ?>
		
					<?php endwhile; ?>
						
					</div>					
				</div>
				
<?php get_footer(); ?>