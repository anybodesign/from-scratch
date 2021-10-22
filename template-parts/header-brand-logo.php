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
					<?php if ( get_theme_mod('site_logo') && get_theme_mod('site_logo_mobile') ) { 
						$logo_h2 = get_theme_mod('site_logo_mobile_height');
						if ( $logo_h2 ) { $height2 = $logo_h2/10; };
					?>
					<img class="logo-mobile" src="<?php echo esc_url(get_theme_mod('site_logo_mobile', 'none')); ?>" alt=""<?php if ($logo_h2) { echo ' style="max-height:'.$height2.'rem"'; } ?>>
					<?php } ?>
					<?php if ( get_theme_mod('site_logo') ) { 
						$logo_h1 = get_theme_mod('site_logo_height');
						if ( $logo_h1 ) { $height1 = $logo_h1/10; };
					?>
					<img class="logo<?php if ( get_theme_mod('site_logo_mobile') ) { echo esc_attr(' has-mobile-logo'); } ?>" src="<?php echo esc_url(get_theme_mod('site_logo', 'none')); ?>" alt=""<?php if ($logo_h1) { echo ' style="max-height:'.$height1.'rem"'; } ?>>
					<?php } ?>					
					
					<span class="site-name<?php if (get_theme_mod( 'hide_sitetitle' )) { echo esc_attr(' a11y-hidden'); } ?>"><?php echo esc_html(bloginfo('name')); ?></span>