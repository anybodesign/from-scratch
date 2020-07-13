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
?>
		</main> <?php // END content ?>
		
	<?php if ( ! is_page_template( 'pagecustom-maintenance.php' ) ) { ?>

		<footer role="contentinfo" id="site_foot">
			
			<div class="row inner">
				<div class="footer-content">				
					
					<?php // The credit/copyright line, settings in the Customizer ?>
					
					<p class="footer-copyright">
						<?php if(get_theme_mod('footer_text')) {
							echo esc_html(get_theme_mod('footer_text', '')); 
						} else {
							echo esc_html('&copy;'); echo date(' Y '); echo esc_html(bloginfo('name')).'.'; 	
						} ?>
						
						<a class="wp-love<?php if ( get_theme_mod('display_wp' ) == false ) { echo esc_attr(' out-of-reach'); } ?>" href="//wordpress.org"><?php esc_html_e('Powered by WordPress!', 'from-scratch'); ?></a>
					</p>
					
					<?php // The footer menu location ?>
					
					<?php if ( has_nav_menu( 'footer_menu' ) ) : ?>
					<nav class="footer-nav" role="navigation" aria-label="<?php esc_html_e('Footer Menu', 'from-scratch'); ?>">
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

		<?php if(get_theme_mod('back2top') == true) { ?>
			<button id="back2top" title="<?php esc_html_e('Back to top','from-scratch'); ?>">
				<img src="<?php echo FS_THEME_URL; ?>/img/ui/back-to-top.svg" alt="">
			</button>
		<?php } ?>

	<?php } ?>	
		
</div> <?php // END wrapper ?>

<?php wp_footer(); ?>

</body>
</html>
