<?php if ( !defined('ABSPATH') ) die();
/**
 * The template for displaying custom taxonomy archive pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage From_Scratch
 * @since From Scratch 1.0
 */

get_header(); ?>

				<div id="primary" class="content-area has-sidebar" role="main">
					
					<div class="row">
						<div class="col-12">
		
						<?php if ( have_posts() ) : ?>
				
							<header class="page-header">
								<?php
									the_archive_title( '<h1 class="page-title">', '</h1>' );
									the_archive_description( '<div class="taxonomy-desc">', '</div>' );
								?>
							</header>				
				
							<?php while ( have_posts() ) : the_post(); ?>
				
								<?php get_template_part( 'template-parts/content', get_post_format() ); ?>
				
							<?php endwhile; ?>
				
							<?php the_posts_navigation(); ?>
				
						<?php else : ?>
		
							<?php get_template_part( 'template-parts/content', 'none' ); ?>
					
						<?php endif; ?>	
							
		
						</div>					
					</div>
				
				</div> <? // END site_main ?>
				
				<?php get_sidebar(); ?>


<?php get_footer(); ?>