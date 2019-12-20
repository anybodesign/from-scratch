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

					<?php if ( get_theme_mod('site_logo') ) { ?>
					<img class="logo" src="<?php echo(get_theme_mod('site_logo', 'none')); ?>" alt="<?php echo esc_url(bloginfo('name')); ?>">
					<?php } else {
						echo esc_url(bloginfo('name')); 
					} ?>