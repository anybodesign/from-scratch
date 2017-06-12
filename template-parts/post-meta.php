<?php
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
?>

							<div class="post-meta">
								<p class="meta-infos">
									<?php _e( 'Posted on&nbsp;', 'from-scratch' ); ?><?php echo the_time( get_option('date_format') ); ?>
									<?php _e( 'by&nbsp;', 'from-scratch' ); ?><?php the_author(); ?>
									<?php _e( 'in&nbsp;', 'from-scratch' ); ?><?php the_category(', '); ?>
								</p>
								
								<?php if ( ! get_comments_number()==0 ) : ?>
								<p class="meta-comments">
									<a href="<?php the_permalink() ?>#comments"><?php comments_number('0', '1', '%'); ?> <?php _e( 'Comment(s)', 'from-scratch' ); ?></a>
								</p>
		    					<?php endif; ?>
							</div>