<?php if ( !defined('ABSPATH') ) die();
/**
 * The template for displaying the footer.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage From_Scratch
 * @since 1.0
 * @version 1.0
 */
 $footer_white = get_theme_mod('footer_white_text');
?>
	</main> <?php // END content ?>
		
	<?php if ( ! is_page_template( 'pagecustom-maintenance.php' ) ) { ?>
		
		<footer role="contentinfo" id="site_foot"<?php if ( $footer_white ) { echo ' class="white-text"'; } ?>>
			<div class="row inner">
				
				<?php if ( has_nav_menu( 'social_menu' ) ) : ?>
				<div class="footer-social">
					<nav role="navigation" aria-label="<?php esc_html_e('Social Networks', 'from-scratch'); ?>">
						<?php wp_nav_menu( array(
								'theme_location'	=> 	'social_menu',
								'menu_class'		=>	'social-menu',
								'container'			=>	false
								));
						?>
					</nav>
				</div>
				<?php endif; ?>
				
				
				<div class="footer-widgets">
					<?php if ( is_active_sidebar( 'widgets_footer1' ) ) { ?>
					<div class="widgets-area">
						<?php dynamic_sidebar( 'widgets_footer1' ); ?>
					</div>
					<?php } ?>
					
					<?php if ( is_active_sidebar( 'widgets_footer2' ) ) { ?>
					<div class="widgets-area">
						<?php dynamic_sidebar( 'widgets_footer2' ); ?>
					</div>
					<?php } ?>
					
					<?php if ( is_active_sidebar( 'widgets_footer3' ) ) { ?>
					<div class="widgets-area">
						<?php dynamic_sidebar( 'widgets_footer3' ); ?>
					</div>
					<?php } ?>					
				</div>
				
				
				<div class="footer-copyright">				
					
					<p>
						<?php if(get_theme_mod('footer_text')) {
							echo esc_html(get_theme_mod('footer_text', '')); 
						} else {
							echo esc_html('&copy;'); echo date(' Y '); echo esc_html(bloginfo('name')).'.'; 	
						} ?>
						
						<a class="wp-love<?php if ( get_theme_mod('display_wp' ) == false ) { echo esc_attr(' out-of-reach'); } ?>" href="//wordpress.org"><?php esc_html_e('Powered by WordPress!', 'from-scratch'); ?></a>
					</p>
					<?php if ( has_nav_menu( 'footer_menu' ) ) : ?>
					<nav role="navigation" aria-label="<?php esc_html_e('Footer Menu', 'from-scratch'); ?>">
					<?php wp_nav_menu( array(
							'theme_location'	=> 	'footer_menu',
							'menu_class'		=>	'footer-menu',
							'container'			=>	false
							));
					?>
					</nav>
					<?php endif; ?>
					
				</div>
				
			</div>
		</footer>
		
		<?php if(get_theme_mod('back2top') == true) {
			get_template_part( 'template-parts/footer', 'back2top' );
		} ?>
		
	<?php } ?>	

</div> <?php // END wrapper ?>

<?php wp_footer(); ?>

</body>
</html>