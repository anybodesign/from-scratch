<?php if ( !defined('ABSPATH') ) die();
/**
 * The main template file.
 *
 * @link http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage From_Scratch
 * @since 1.0
 * @version 1.0
 */ 
get_header(); ?>

				<?php get_template_part( 'template-parts/page', 'banner' ); ?>
				
				<div class="page-wrap has-sidebar">
					
					<div class="page-content">
						
						<?php if ( have_posts() ) : // The Loop ?>		
						<div id="posts_list" class="the-posts" >
							<?php 
								while ( have_posts() ) : the_post();
									get_template_part( 'template-parts/post', 'block' ); 
								endwhile;
							?>
						</div>
						
						<?php get_template_part( 'template-parts/post', 'pagination' ); ?>
						
						<?php
						else:
							get_template_part( 'template-parts/nothing' );
						endif; 
						?>
					</div>
					
					<?php get_sidebar(); ?>
					
				</div>

<?php get_footer(); ?>