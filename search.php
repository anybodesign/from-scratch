<?php if ( !defined('ABSPATH') ) die();
/**
 * The template for displaying Search Results pages.
 *
 * @package WordPress
 * @subpackage From_Scratch
 * @since 1.0
 * @version 1.0
 */
get_header(); ?>

				<div class="row inner has-sidebar">
					
					<div class="site-content">
	
					<?php if ( have_posts() ) : ?>
			
						<header class="page-header">
							<h1 class="page-title"><?php printf( esc_html__( 'Search Results for: %s', 'from-scratch' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
						</header>				
			
						<?php while ( have_posts() ) : the_post(); ?>
			
							<?php get_template_part( 'template-parts/search', 'content' ); ?>
			
						<?php endwhile; ?>
			
						<?php the_posts_navigation(); ?>
			
					<?php else : ?>
	
						<?php get_template_part( 'template-parts/nothing' ); ?>
				
					<?php endif; ?>	
						
	
					</div>

					<div class="site-content">
						<?php get_sidebar(); ?>
					</div>					
										
				</div>
			
<?php get_footer(); ?>