<?php if ( !defined('ABSPATH') ) die();
/**
 * Template part for the Logo.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage From_Scratch
 * @since 1.0
 * @version 1.0
 */
?>
					<?php if ( get_theme_mod('site_logo') && get_theme_mod('site_logo_mobile') ) { ?>
					<img class="logo-mobile" src="<?php echo esc_url(get_theme_mod('site_logo_mobile', 'none')); ?>" alt="">
					<?php } ?>
					<?php if ( get_theme_mod('site_logo') ) { ?>
					<img class="logo<?php if ( get_theme_mod('site_logo_mobile') ) { echo esc_attr(' has-mobile-logo'); } ?>" src="<?php echo esc_url(get_theme_mod('site_logo', 'none')); ?>" alt="">
					<?php } ?>
					
					<span class="site-name<?php if (get_theme_mod( 'hide_sitetitle' )) { echo esc_attr(' screen-reader-text'); } ?>"><?php echo esc_html(bloginfo('name')); ?></span>