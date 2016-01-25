<?php if ( !defined('ABSPATH') ) die();
/**
 * The category template file.
 *
 * @package WordPress
 * @subpackage From_Scratch
 * @since From Scratch 1.0
 */

get_header(); ?>
					<div class="col-12">
						<h1 class="page-title"><?php single_cat_title(); ?></h1>
						<?php if ( category_description() ) : ?>
						<p><?php echo category_description(); ?></p>
						<?php endif; ?>				
					</div>	


					<?php if (have_posts()) : ?>
					<div class="col-12">
					<?php while (have_posts()) : the_post(); ?>
						
						<article class="post">
							<figure class="post-figure">
								<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('large'); ?></a>
							</figure>
							<h2 class="post-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
							<?php the_excerpt(); ?>
						</article>
						
					<?php endwhile; ?>
					</div>	
					
					<div class="col-12" id="navigation">
						<p class="prev"><?php previous_posts_link( __( 'Previous page','fromscratch') ); ?></p>
						<p class="next"><?php next_posts_link( __( 'Next page','fromscratch') ); ?></p>
					</div>
					
					<?php else:  ?>
					<p><?php _e( 'Sorry! Couldn’t find any post!' ); ?></p>

					<?php endif; ?>

<?php get_footer(); ?>
