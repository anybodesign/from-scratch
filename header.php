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
</head>

<body <?php body_class(); ?>>

<div id="wrapper">


	<?php // The Skiplinks ?>
	
	<div class="skiplinks">
		<a href="#site_content"><?php _e('Go to main content', 'from-scratch'); ?></a>
		<a href="#site_nav"><?php _e('Go to main menu', 'from-scratch'); ?></a>
	</div>
	
	
	<header role="banner" id="site_head">
		
		<div class="row inner">
			
			<div class="col-12 site-brand">
				<?php if ( is_front_page() ) { ?>
				<h1 class="site-title">
					<?php get_template_part('template-parts/header', 'logo'); ?>
				</h1>
				<?php } else { ?>
				<p class="site-title">
					<?php get_template_part('template-parts/header', 'logo'); ?>
				</p>
				<?php } ?>
	
				<?php 
					$site_desc = get_bloginfo( 'description', 'display' );
					if ( $site_desc || is_customize_preview() ) { ?>
					<p class="site-desc"><?php echo $site_desc; ?></p>
				<?php } ?>
							
			</div>
			
			<?php // The main menu location ?>
			
			<?php if ( has_nav_menu( 'main_menu' ) ) : ?>
			<nav class="col-12" role="navigation" id="site_nav" aria-label="<?php _e('Main menu', 'from-scratch'); ?>">
				<button id="menu-toggle" type="button"><?php _e('Menu', 'from-scratch'); ?><span></span></button>
				<?php wp_nav_menu( array(
					'theme_location'	=> 	'main_menu',
					'menu_class'		=>	'main-menu',
					'container'			=>	false,
					'walker'			=>	new from_scratch_subnav_walker()
					));
				?>
			</nav>
			<?php endif; ?>

		</div>

	</header>
	
	
	
		<main class="content-area" role="main" id="site_content">