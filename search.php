<?php if ( !defined('ABSPATH') ) die();
/**
 * The template for displaying Search Results pages.
 *
 * @package WordPress
 * @subpackage From_Scratch
 * @since From Scratch 1.0
 */
get_header(); ?>

				<div class="row">
					
					<div class="col-9">
	
					<?php if ( have_posts() ) : ?>
			
						<header class="page-header">
							<h1 class="page-title"><?php printf( esc_html__( 'Search Results for: %s', 'from-scratch' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
						</header>				
			
						<?php while ( have_posts() ) : the_post(); ?>
			
							<?php get_template_part( 'template-parts/content', 'search' ); ?>
			
						<?php endwhile; ?>
			
						<?php the_posts_navigation(); ?>
			
					<?php else : ?>
	
						<?php get_template_part( 'template-parts/content', 'none' ); ?>
				
					<?php endif; ?>	
						
	
					</div>

					<div class="col-3">
						<?php get_sidebar(); ?>
					</div>					
										
				</div>
			
<?php get_footer(); ?>