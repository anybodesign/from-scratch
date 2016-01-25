<?php if ( !defined('ABSPATH') ) die();
/**
 * The main template file.
 *
 * @package WordPress
 * @subpackage From_Scratch
 * @since From Scratch 1.0
 */
get_header(); ?>
					<div class="col-12">
					<?php while (have_posts()) : the_post(); ?>
						
						<h1 class="post-title"><?php post_type_archive_title(); ?></h1>
						<?php if ( 'page' == get_option('show_on_front') && get_option('page_for_posts') && is_home() ) : the_post(); $page_for_posts_id = get_option('page_for_posts'); setup_postdata(get_page($page_for_posts_id)); ?>
						<?php the_content(); ?>
						<?php rewind_posts(); endif; ?>
						
					<?php endwhile; ?>
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
					
					<?php endif; ?>

<?php get_footer(); ?>