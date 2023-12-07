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
						
						<?php 
							the_content();
							
							wp_link_pages(
								array(
									'before'      => '<nav class="post-nav-links" aria-label="' . esc_attr__( 'Page', 'from-scratch' ) . '"><span class="label">' . __( 'Pages:', 'from-scratch' ) . '</span>',
									'after'       => '</nav>',
									'link_before' => '<span class="page-number">',
									'link_after'  => '</span>',
									'aria_current'     => 'page',
        							'next_or_number'   => 'number',
									'separator'        => ' ',
									'nextpagelink'     => __( 'Next page', 'from-scratch' ),
									'previouspagelink' => __( 'Previous page', 'from-scratch' ),
        							'pagelink'         => '%',
								)
							); 
						    
							if ( is_single() && get_theme_mod('share_box') == true ) {
								get_template_part( 'template-parts/post', 'share' );
							}
						?>
						
					<?php endwhile; ?>
					</div>