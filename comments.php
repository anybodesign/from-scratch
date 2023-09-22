<?php if ( !defined('ABSPATH') ) die();
/**
 * The template for displaying comments
 *
 * @package WordPress
 * @subpackage From_Scratch
 * @since 1.0
 * @version 1.0
 */

if ( post_password_required() ) {
	return;
}
?>

					<div id="comments" class="comments-area">
					
					<?php if ( have_comments() ) : ?>
						<h3 class="comments-title"><?php esc_html_e('They talk about it','from-scratch'); ?></h3>
						
						<ol class="comment-list">
							<?php
								wp_list_comments( array(
								    'callback' => 'fs_custom_comments',
								));
							?>
						</ol>
						
						<div>
							<?php paginate_comments_links(); ?>
						</div>
						
					<?php endif;?>
					
					<?php if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) : ?>
						<p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'from-scratch' ); ?></p>
					<?php endif; ?>
					
					<?php
					$comments_args = array(
				       	//'comment_notes_after' => 'from-scratch',
				        //'logged_in_as' => 'from-scratch',
				        'title_reply' => __('Do we talk about it?', 'from-scratch'),
				        'label_submit' => __('Add my comment!', 'from-scratch')
					);
					
					comment_form($comments_args);
					?>
				
				</div>