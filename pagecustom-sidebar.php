<?php if ( !defined('ABSPATH') ) die();
/**
 * Template Name: Custom page template with Sidebar
 *
 * @package WordPress
 * @subpackage From_Scratch
 * @since From Scratch 1.0
 */
get_header(); ?>

				<div class="row inner">
					
					<div class="col-9">
	
					<?php while ( have_posts() ) : the_post(); ?>
		
						<?php get_template_part( 'template-parts/content', 'page' ); ?>
		
					<?php endwhile; ?>


					<?php 
						
						// Custom Tax Query Loop Example
						
						$args = array(
							'posts_per_page' 	=> 4,
							'post_type' 		=> 'your-post-type',
							'orderby'			=> 'title',
							'order'				=> 'ASC',
							'tax_query' => array(
								array(
									'taxonomy' => 'your-taxonomy',
									'terms' => 'your-term',
									'field' => 'slug',
								),
							),

						);
						$query = new WP_Query($args);
					?>						
				
					<?php if ($query->have_posts()) : ?>
										
						<?php while ($query->have_posts()) : $query->the_post(); ?>
					
							<?php get_template_part( 'template-parts/content' ); ?>

						<?php endwhile; ?>

					<?php endif; ?>
					<?php wp_reset_postdata(); ?>

					</div>
					
					
					<div class="col-3">
						<?php get_sidebar(); ?>
					</div>
					
				</div>	
						
<?php get_footer(); ?>