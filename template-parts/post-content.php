<?php if ( !defined('ABSPATH') ) die();
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage From_Scratch
 * @since 1.0
 * @version 1.0
 */
?>

					<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
						
						<?php if ( '' != get_the_post_thumbnail() ) { ?>
						<figure class="post-figure">
							<?php if (is_single()) { ?><a href="<?php the_permalink(); ?>"><?php } ?>
							<?php the_post_thumbnail('large'); ?>
							<?php if (is_single()) { ?></a><?php } ?>
						</figure>
						<?php } ?>
						
						<?php if ( !is_single() ) { ?>
						<header class="post-header">
							<h2 class="post-title"><a href="<?php the_permalink(); ?> "><?php the_title(); ?></a></h2>
							
							<?php get_template_part('template-parts/post', 'meta'); ?>							
						</header>
						<?php } ?>
						
						<div class="post-content">
							<?php
								the_content(sprintf(
									
									wp_kses( __( 'Continue reading %s', 'from-scratch' ), array( 'span' => array( 'class' => array() ) ) ),
									the_title( '<span class="screen-reader-text">"', '"</span>', false )
								));
							?>
						</div>
						
						<footer class="post-footer">
							<?php $posttags = get_the_tags(); if ($posttags) { ?>
							  	<div class="tag-links">
									<p><?php _e( 'Tagged with:', 'from-scratch' ); ?></p>
									<?php the_tags('<ul><li>', '</li><li>', '</li></ul>'); ?>
							  	</div>
							<?php } ?>					
							
							<?php 
								wp_link_pages(array(
									'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'from-scratch' ),
									'after'  => '</div>',
								));
							?>
						</footer>
						
																		
					</article>