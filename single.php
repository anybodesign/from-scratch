<?php if ( !defined('ABSPATH') ) die();
/**
 * The Template for displaying articles.
 *
 * @package WordPress
 * @subpackage From_Scratch
 * @since From Scratch 1.0
 */
get_header(); ?>
					<div class="col-12">
					<?php while (have_posts()) : the_post(); ?>
						
						<article class="post">
							<figure class="post-figure">
								<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('large'); ?></a>
							</figure>
							<h1 class="post-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
							<?php the_content(); ?>
						</article>
						
					<?php endwhile; ?>
					</div>	


	  				<?php if ( comments_open() ) : ?>
	  					<?php comments_template('', true ); ?>
					<?php endif;?>


<?php get_footer(); ?>