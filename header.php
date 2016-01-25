<?php if ( !defined('ABSPATH') ) die();
/**
 * The header for our theme.
 *
 * @package WordPress
 * @subpackage From_Scratch
 * @since From Scratch 1.0
 */
?><!DOCTYPE html>
<!--[if IE 8]><html class="ie8" <?php language_attributes(); ?>><![endif]-->
<!--[if IE 9]><html class="ie9" <?php language_attributes(); ?>><![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html <?php language_attributes(); ?>><!--<![endif]-->
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<?php if ( is_singular() && pings_open( get_queried_object() ) ) : ?>
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<?php endif; ?>
	<?php wp_head(); ?>
	<!--[if lt IE 9]><script src="<?php bloginfo('template_directory'); ?>/js/html5.js"></script><![endif]-->
</head>

<body <?php body_class(); ?>>

<div id="wrapper">
<!--[if lte IE 9]><div id="ie"><div><p><?php _e('Your browser should be <a href="http://browsehappy.com">updated</a> to improve your experience.', 'fromscratch'); ?></p></div></div><![endif]-->
	
		
	<header id="site_head" class="row" role="banner">
		
		<nav class="col-12  skiplinks-nav" role="navigation">
			<ul class="skiplinks-menu">
				<li><a href="#menu"><?php _e('Go to main menu', 'fromscratch'); ?></a></li>
				<li><a href="#content"><?php _e('Go to main content	', 'fromscratch'); ?></a></li>
			</ul>
		</nav>


		<div class="col-12 site-brand">
			<?php if ( is_front_page() && is_home() ) { ?>
			<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php _e('Go to Home Page', 'fromscratch'); ?>"><?php bloginfo( 'name' ); ?></a></h1>
			<?php } else { ?>
			<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php _e('Go to Home Page', 'fromscratch'); ?>"><?php bloginfo( 'name' ); ?></a></p>
			<?php } ?>

			<?php 
				$site_desc = get_bloginfo( 'description', 'display' );
				if ( $site_desc || is_customize_preview() ) { ?>
				<p class="site-desc"><?php echo $site_desc; ?></p>
			<?php } ?>
						
		</div>
	
		<nav id="menu" class="col-12" role="navigation">
			<button id="menu-toggle" title="<?php _e('Unfold navigation menu', 'fromscratch'); ?>"><?php _e('Menu', 'fromscratch'); ?><span></span></button>
			<?php wp_nav_menu( array(
				'theme_location'	=> 	'main_menu',
				'menu_class'		=>	'main-menu',
				'container'			=>	false
				));
			?>
		</nav>
		
	</header>
	
		
		<div id="content">