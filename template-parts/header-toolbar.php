<?php if ( !defined('ABSPATH') ) die(); ?>

			<?php if ( has_nav_menu( 'toolbar_menu' ) ) : ?>
				<nav class="site-toolbar" role="navigation" aria-label="<?php esc_html_e('Toolbar Menu', 'from-scratch'); ?>">
					<?php wp_nav_menu( array(
						'theme_location'	=> 	'toolbar_menu',
						'menu_class'		=>	'toolbar-menu',
						'container'			=>	false,
						));
					?>
				</nav>
			<?php endif; ?>	