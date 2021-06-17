<?php if ( !defined('ABSPATH') ) die(); ?>

			<?php // The main menu location ?>
			
			<?php if ( has_nav_menu( 'main_menu' ) ) : ?>
			<nav class="site-nav" role="navigation" aria-label="<?php esc_html_e('Main Menu', 'from-scratch'); ?>" id="site_nav">
				<button class="burger" id="menu_toggle" type="button">
					<span>
						<span class="burger-title"><?php esc_html_e('Menu', 'from-scratch'); ?></span>
					</span>
				</button>
				<?php wp_nav_menu( array(
					'theme_location'	=> 	'main_menu',
					'menu_class'		=>	'main-menu',
					'container'			=>	false,
					'walker'			=>	new fs_subnav_walker()
					));
				?>
			</nav>
			<?php endif; ?>