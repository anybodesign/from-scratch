<?php if ( !defined('ABSPATH') ) die();
/**
 * The header for our theme.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage From_Scratch
 * @since 1.0
 * @version 1.0
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<?php if ( is_singular() && pings_open( get_queried_object() ) ) : ?>
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<?php endif; ?>
	<?php wp_head(); ?>
<?php 
	$layout1 = get_theme_mod('layout_option') == 'version1';
	$layout2 = get_theme_mod('layout_option') == 'version2';
	$has_bg = get_theme_mod('has_bg'); 
	
	if ( $layout2 ) { $layout = 'layout-v2'; }
	else { $layout = 'layout-v1'; }
	if ( $has_bg ) { $banner = ' banner-has-bg'; }
	else { $banner = null; }
?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<div id="wrapper" class="<?php echo $layout; echo $banner; ?>">

	<?php 
		if ( ! is_page_template( 'pagecustom-maintenance.php' ) ) {
			get_template_part('template-parts/header', 'skiplinks');
		}
	?>
	
	<header role="banner" id="site_head">
		<div class="row inner">	
		<?php 
			get_template_part('template-parts/header', 'toolbar'); 
			get_template_part('template-parts/header', 'brand'); 
			
			if ( ! is_page_template( 'pagecustom-maintenance.php' ) ) {
				get_template_part('template-parts/header', 'nav');
			}
		?>
		</div>
	</header>

	<main class="content-area" role="main" id="site_main">