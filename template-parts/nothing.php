<?php if ( !defined('ABSPATH') ) die();
/**
 * Template part for displaying a message that posts cannot be found.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage From_Scratch
 * @since 1.0
 * @version 1.0
 */
?>
					<?php if ( is_home() && current_user_can( 'publish_posts' ) ) : ?>
						
						<h2><?php esc_html_e( 'No post for now', 'from-scratch' ); ?></h2>
						<p><?php printf( wp_kses( __( 'Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'from-scratch' ), array( 'a' => array( 'href' => array() ) ) ), esc_url( admin_url( 'post-new.php' ) ) ); ?></p>
						
					<?php elseif ( is_search() ) : ?>
						
						<h2><?php esc_html_e( 'Nothing found', 'from-scratch' ); ?></h2>
						<p><?php esc_html_e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'from-scratch' ); ?></p>
						
						<?php get_search_form(); ?>
						
					<?php elseif ( is_404() ) : ?>
						
						<h2><?php esc_html_e( '404 error', 'from-scratch' ); ?></h2>
						<p><?php esc_html_e( 'It seems that page or post doesn’t exists anymore. Or maybe the URL is wrong or has changed… Perhaps searching can help.', 'from-scratch' ); ?></p>
						
						<?php get_search_form(); ?>
						
					<?php else : ?>
						
						<p><?php esc_html_e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'from-scratch' ); ?></p>
						
						<?php get_search_form(); ?>
						
					<?php endif; ?>