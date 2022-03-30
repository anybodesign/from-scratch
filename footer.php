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
				<?php
					get_template_part( 'template-parts/footer', 'content' );
				?>
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