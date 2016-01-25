<?php if ( !defined('ABSPATH') ) die();
/**
 * The template for displaying Search Results pages.
 *
 * @package WordPress
 * @subpackage From_Scratch
 * @since From Scratch 1.0
 */
get_header(); ?>
					<div class="col-12">
						<h1 class="page-title"><?php _e('Search results' , 'fromscratch'); ?></h1>
					</div>	
	

					<div class="col-12">
					<?php if (have_posts()) : ?>
					<?php while (have_posts()) : the_post(); ?>
						
						<article class="post">
							<figure class="post-figure">
								<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('large'); ?></a>
							</figure>
							<h2 class="post-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
							<?php the_excerpt(); ?>
						</article>
						
					<?php endwhile; ?>
					<?php endif; ?>
					</div>	

<?php get_footer(); ?>