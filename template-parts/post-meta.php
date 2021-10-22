<?php if ( !defined('ABSPATH') ) die();
/**
 * Template part for displaying the post meta.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage From_Scratch
 * @since 1.0
 * @version 1.0
 */
	$date = get_theme_mod('meta_date', true);
	$author = get_theme_mod('meta_author', true);
	$cat = get_theme_mod('meta_category', true);
	
	$type = get_post_type( $post->ID );
?>
							<div class="post-meta">
								
								<?php if ( $date != false || $author != false || $cat != false ) { ?>
								<p class="meta-infos">
									<?php esc_html_e( 'Posted ', 'from-scratch' ); ?>
									<?php if ( $date != false ) { 
										esc_html_e( 'on&nbsp;', 'from-scratch' ); 
										echo the_time( get_option('date_format') ); 
									} ?>
									<?php if ( $author != false  && $type == 'post' ) {
										esc_html_e( 'by&nbsp;', 'from-scratch' ); the_author(); 
									} ?>
									<?php if ( $cat != false  && $type == 'post' ) {
										esc_html_e( 'in&nbsp;', 'from-scratch' ); the_category(', '); 
									} ?>
								</p>
								<?php } ?>
								
								<?php $comment = get_comments_number(); if ( $comment > 0 ) : ?>
								<p class="meta-comments">
									<a href="<?php the_permalink() ?>#comments">
										<?php printf( _n( '%s comment', '%s comments', $comment, 'from-scratch' ), $comment ); ?>
									</a>
								</p>
		    					<?php endif; ?>
							</div>