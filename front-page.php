<?php if ( !defined('ABSPATH') ) die();
/**
 * The front page template file.
 *
 * @link http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage From_Scratch
 * @since From Scratch 1.0
 */

get_header(); ?>

				<div class="row inner">
					
					<div class="col-12">
	
					<?php while ( have_posts() ) : the_post(); ?>
		
						<?php get_template_part( 'template-parts/content', 'page' ); ?>
		
					<?php endwhile; ?>
					
					</div>
					
					
					<?php 
						
						// Custom Post type Loop Example
						
						$args = array(
							'posts_per_page' 	=> 4,
							'post_type' 		=> 'your-post-type',
							'meta_key'			=> 'your-meta-key',
							'orderby'			=> 'meta_value',
							'order'				=> 'DESC'
						);
						$query = new WP_Query($args);
					?>						
				
					<?php if ($query->have_posts()) : ?>
					
					<div class="col-12">
										
						<?php while ($query->have_posts()) : $query->the_post(); ?>
					
							<?php get_template_part( 'template-parts/content' ); ?>

						<?php endwhile; ?>
					
					</div>
					
					<?php endif; ?>
					<?php wp_reset_postdata(); ?>
									
				</div>

<?php get_footer(); ?>