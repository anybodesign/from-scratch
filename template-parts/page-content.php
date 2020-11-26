<?php if ( !defined('ABSPATH') ) die();
/**
 * Template part for displaying page or post content.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage From_Scratch
 * @since 1.0
 * @version 1.0
 */
?>
					<div class="page-content">
					<?php while ( have_posts() ) : the_post(); ?>
						
						<?php if ( '' != get_the_post_thumbnail() ) { ?>
						<div class="post-figure">
							<?php the_post_thumbnail('large-hd'); ?>
						</div>
						<?php } ?>
						
						<?php 
							the_content();
							
							wp_link_pages(
								array(
									'before'      => '<nav class="post-nav-links" aria-label="' . esc_attr__( 'Page', 'from-scratch' ) . '"><span class="label">' . __( 'Pages:', 'from-scratch' ) . '</span>',
									'after'       => '</nav>',
									'link_before' => '<span class="page-number">',
									'link_after'  => '</span>',
								)
							); 
						 
							if ( comments_open() || get_comments_number() ) {
								comments_template();
							}
						?>
						
					<?php endwhile; ?>
					</div>					