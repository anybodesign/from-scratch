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

				<div id="primary" class="content-area has-sidebar" role="main">

					<div class="row">
						<div class="col-12">
		
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
									'prev_text'          => __( 'Previous page', 'fromscratch' ),
									'next_text'          => __( 'Next page', 'fromscratch' ),
									'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'fromscratch' ) . ' </span>',
								)); ?>
				
						<?php else : ?>
		
							<?php get_template_part( 'template-parts/content', 'none' ); ?>
					
						<?php endif; ?>	
							
		
						</div>					
					</div>
				
				</div> <?php // END site_main ?>
				
				<?php get_sidebar(); ?>

<?php get_footer(); ?>