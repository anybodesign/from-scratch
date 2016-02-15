<?php if ( !defined('ABSPATH') ) die();
/**
 * Template Name: Custom page template with Sidebar
 *
 * @package WordPress
 * @subpackage From_Scratch
 * @since From Scratch 1.0
 */
get_header(); ?>

				<div id="primary" class="content-area has-sidebar" role="main">
					
					<div class="row">
						<div class="col-12">
		
						<?php while ( have_posts() ) : the_post(); ?>
			
							<?php get_template_part( 'template-parts/content', 'page' ); ?>
			
						<?php endwhile; ?>
						
						
						<?php if ( comments_open() || get_comments_number() ) : ?>
					  		<?php comments_template(); ?>
						<?php endif;?>
							
						</div>					
					</div>
					

					
					<?php 
						
						// Custom Tax Query Loop
						
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
										
					<div class="row">
						<div class="col-12">

							<?php while ($query->have_posts()) : $query->the_post(); ?>
						
								<?php get_template_part( 'template-parts/content' ); ?>

							<?php endwhile; ?>

						</div>					
					</div>

					<?php endif; ?>
					<?php wp_reset_postdata(); ?>
				
				</div> <?php // END primary ?>
	
	
				<?php get_sidebar(); ?>


<?php get_footer(); ?>