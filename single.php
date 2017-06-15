<?php if ( !defined('ABSPATH') ) die();
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package WordPress
 * @subpackage From_Scratch
 * @since 1.0
 * @version 1.0
 */
get_header(); ?>
					
				<div class="row inner">
					<div class="col-9">
	
					<?php while (have_posts()) : the_post(); ?>
			
						<?php get_template_part( 'template-parts/content', get_post_format() ); ?>
			
					<?php endwhile; ?>
			
	  				<?php if ( comments_open() || get_comments_number() ) : ?>
	  					<?php comments_template(); ?>
					<?php endif;?>
						
					</div>
					
					<div class="col-3">
						<?php get_sidebar(); ?>
					</div>					
				</div>
				
<?php get_footer(); ?>