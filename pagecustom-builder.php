<?php if ( !defined('ABSPATH') ) die();
/**
 * Template Name: Page builder
 *
 * @package WordPress
 * @subpackage From_Scratch
 * @since 1.0
 * @version 1.0
 */
get_header(); ?>

				<div class="row inner">
					
					<div class="site-content">
					<?php while ( have_posts() ) : the_post(); ?>
		
						<?php get_template_part( 'template-parts/page', 'content' ); ?>
		
					<?php endwhile; ?>
					</div>
					
					<div class="site-content">
						<?php get_template_part('template-parts/acf/builder'); ?>
					</div>
					
				</div>	
						
<?php get_footer(); ?>