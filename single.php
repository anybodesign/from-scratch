<?php if ( !defined('ABSPATH') ) die();
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
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
	
					<?php while (have_posts()) : the_post(); ?>
			
						<?php get_template_part( 'template-parts/post', 'content' ); ?>
			
					<?php endwhile; ?>
			
	  				<?php if ( comments_open() || get_comments_number() ) : ?>
	  					<?php comments_template(); ?>
					<?php endif;?>
						
					</div>
					
					<div class="page-sidebar">
						<?php get_sidebar(); ?>
					</div>	
									
				</div>
				
<?php get_footer(); ?>