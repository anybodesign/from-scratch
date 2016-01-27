<?php if ( !defined('ABSPATH') ) die();
/**
 * Template part for displaying results in search pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage From_Scratch
 * @since From Scratch 1.0
 */
?>

					<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
						
						<?php if ( '' != get_the_post_thumbnail() ) { ?>
						<figure class="post-figure">
							<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('large'); ?></a>
						</figure>
						<?php } ?>
						
						<header class="post-header">
							<?php the_title(sprintf( '<h2 class="post-title"><a href="%s">', esc_url( get_permalink() ) ), '</a></h2>'); ?>
							
							<?php get_template_part('template-parts/post', 'meta'); ?>
						</header>
						
						<div class="post-content">
							<?php the_excerpt(); ?>
						</div>

						<?php 
							wp_link_pages(array(
								'before' => '<footer class="post-footer"><div class="page-links">' . esc_html__( 'Pages:', 'fromscratch' ),
								'after'  => '</div></footer>',
							));
						?>
						
					</article>