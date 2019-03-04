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

					<div class="row inner has-sidebar">
						
						<div class="site-content">
		
						<?php if ( have_posts() ) : ?>
				
							<header class="page-header">
								<?php
									the_archive_title( '<h1 class="page-title">', '</h1>' );
									the_archive_description( '<div class="taxonomy-desc">', '</div>' );
								?>
							</header>				
				
							<?php while ( have_posts() ) : the_post(); ?>
				
								<?php get_template_part( 'template-parts/post-content', get_post_format() ); ?>
				
							<?php endwhile; ?>
				
							<?php the_posts_navigation(); ?>
				
						<?php else : ?>
		
							<?php get_template_part( 'template-parts/nothing' ); ?>
					
						<?php endif; ?>	
		
						</div>

						<div class="site-sidebar">
							<?php get_sidebar(); ?>
						</div>
											
					</div>
				
<?php get_footer(); ?>