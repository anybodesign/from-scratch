<?php if ( !defined('ABSPATH') ) die();
/**
 * The template for displaying all pages.
 *
 * @package WordPress
 * @subpackage From_Scratch
 * @since From Scratch 1.0
 */
get_header(); ?>
					<div class="col-12">
					<?php while (have_posts()) : the_post(); ?>
		
						<h1 class="page-title"><?php the_title(); ?></h1>
						<?php the_content(); ?>
				
					<?php endwhile; ?>
					</div>	
	
<?php get_footer(); ?>