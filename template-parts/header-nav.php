<?php if ( !defined('ABSPATH') ) die(); ?>

			<?php // The main menu location ?>
			
			<?php if ( has_nav_menu( 'main_menu' ) ) : ?>
			<nav class="site-nav" role="navigation" aria-label="<?php _e('Main Menu', 'from-scratch'); ?>" id="site_nav">
				<button id="menu-toggle" type="button"><?php _e('Menu', 'from-scratch'); ?><span></span></button>
				<?php wp_nav_menu( array(
					'theme_location'	=> 	'main_menu',
					'menu_class'		=>	'main-menu',
					'container'			=>	false,
					'walker'			=>	new fs_subnav_walker()
					));
				?>
			</nav>
			<?php endif; ?>