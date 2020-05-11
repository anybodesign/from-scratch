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
					<img class="logo-mobile" src="<?php echo(get_theme_mod('site_logo_mobile', 'none')); ?>" alt="">
					<?php } ?>
					<?php if ( get_theme_mod('site_logo') ) { ?>
					<img class="logo<?php if ( get_theme_mod('site_logo_mobile') ) { echo ' has-mobile-logo'; } ?>" src="<?php echo(get_theme_mod('site_logo', 'none')); ?>" alt="">
					<?php } else {
						echo esc_url(bloginfo('name')); 
					} ?>