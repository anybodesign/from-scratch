<?php if ( !defined('ABSPATH') ) die();
/**
 * The template for displaying the footer.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage From_Scratch
 * @since From Scratch 1.0
 */
?>
		</div> <?php // END content ?>
		

			<footer id="site_foot" class="row" role="contentinfo">
				<div class="col-12">				
					
					<p class="footer-copyright">
						&copy; <?php echo date(' Y '); if (get_option( 'from_scratch_settings' )['from_scratch_copyright']) { echo get_option( 'from_scratch_settings' )['from_scratch_copyright']; } else { echo esc_url( bloginfo( 'name' ) ); } ?>
					</p>
					
					<?php if ( has_nav_menu( 'footer_menu' ) ) : ?>
					<nav class="footer-nav">
					<?php wp_nav_menu( array(
							'theme_location'	=> 	'footer_menu',
							'menu_class'		=>	'footer-menu',
							'container'			=>	false
							));
					?>
					</nav>
					<?php endif; ?>
					
				</div>
			</footer>

		
	</div> <?php // END container ?>
</div> <?php // END wrapper ?>

<?php wp_footer(); ?>

</body>
</html>
