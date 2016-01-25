<?php if ( !defined('ABSPATH') ) die();
/**
 * The template for displaying comments
 *
 * @package WordPress
 * @subpackage From_Scratch
 * @since From Scratch 1.0
 */

if ( post_password_required() ) {
	return;
}
?>

					<div id="comments" class="comments-area">

					<?php if ( have_comments() ) : ?>
						<h3 class="comments-title"><?php _e('They talk about it','fromscratch'); ?></h3>
				
						<ol class="comment-list">
							<?php
								wp_list_comments();
							?>
						</ol>
				
					<?php endif;?>
				
					<?php if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) : ?>
						<p class="no-comments"><?php _e( 'Comments are closed.', 'fromscratch' ); ?></p>
					<?php endif; ?>
					
					<?php
					$comments_args = array(
				        'comment_notes_after' => '',
				        'logged_in_as' => '',
				        'title_reply' => __("Do we talk about it?","fromscratch"),
				        'label_submit' => __("Add my comment!","fromscratch")
					);
					
					comment_form($comments_args);
					?>
				
				</div>