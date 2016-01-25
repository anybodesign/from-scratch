<?php if ( !defined('ABSPATH') ) die();
/**
 * The front page template file.
 *
 * @package WordPress
 * @subpackage From_Scratch
 * @since From Scratch 1.0
 */

get_header(); ?>
					<div class="col-12">
					<?php while (have_posts()) : the_post(); ?>
		
						<h1 class="page-title"><?php the_title(); ?></h1>
						<?php the_content(); ?>
				
					<?php endwhile; ?>
					<?php wp_reset_postdata(); ?>
					</div>
					
					
					
					<div class="col-12">

					<?php // Custom Post type Loop
						$args = array(
							'posts_per_page' 	=> 4,
							'post_type' 		=> 'revue',
							'meta_key'			=> 'publication_number',
							'orderby'			=> 'meta_value',
							'order'				=> 'DESC',
							'paged'				=> $paged
						);
						$query = new WP_Query($args);
					?>						
				
					<?php if ($query->have_posts()) : ?>
					<?php while ($query->have_posts()) : $query->the_post(); ?>
				
						<?php the_title(); ?>
						<?php the_content(); ?>
						<?php the_permalink(); ?>
					
						<?php the_post_thumbnail('large'); ?>
				
					<?php endwhile; ?>
					<?php endif; ?>
				
					<?php wp_reset_postdata(); ?>
					
					</div>	

<?php get_footer(); ?>