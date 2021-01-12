<?php if ( !defined('ABSPATH') ) die();
/**
 * The front page template file.
 *
 * @link http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage From_Scratch
 * @since 1.0
 * @version 1.0
 */
get_header(); ?>

				<div class="page-wrap">
					
					<?php get_template_part( 'template-parts/page', 'content' ); ?>					
					
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
					
					<div class="page-content">
										
						<?php while ($query->have_posts()) : $query->the_post(); ?>
					
							<?php get_template_part( 'template-parts/post', 'content' ); ?>

						<?php endwhile; ?>
					
					</div>
					
					<?php endif; ?>
					<?php wp_reset_postdata(); ?>
									
				</div>

<?php get_footer(); ?>