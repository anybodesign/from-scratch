<?php if ( !defined('ABSPATH') ) die();
/**
 * The main template file.
 *
 * @link http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage From_Scratch
 * @since From Scratch 1.0
 */
get_header(); ?>
				<div class="row inner">
					
					<div class="col-9">
	
					<?php if ( have_posts() ) : ?>
			
						<?php if ( is_home() && ! is_front_page() ) { ?>
							<header>
								<h1 class="page-title"><?php single_post_title(); ?></h1>
							</header>
						<?php } ?>
			
			
						<?php while ( have_posts() ) : the_post(); ?>
			
							<?php get_template_part( 'template-parts/content', get_post_format() ); ?>
			
						<?php endwhile; ?>
			
						<?php the_posts_pagination(array(
								'prev_text'          => __( 'Previous page', 'from-scratch' ),
								'next_text'          => __( 'Next page', 'from-scratch' ),
								'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'from-scratch' ) . ' </span>',
							)); ?>
			
					<?php else : ?>
	
						<?php get_template_part( 'template-parts/content', 'none' ); ?>
				
					<?php endif; ?>	
						
	
					</div>

					<div class="col-3">
						<?php get_sidebar(); ?>
					</div>
										
				</div>

<?php get_footer(); ?>