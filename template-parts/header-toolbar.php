<?php if ( !defined('ABSPATH') ) die(); ?>
			
			<?php if ( has_nav_menu( 'toolbar_menu' ) || get_theme_mod('searchbar') ) : ?>
			<div class="site-toolbar<?php if ( get_theme_mod('searchbar') ) { echo ' has-search'; } ?>">
					
				<?php if ( has_nav_menu( 'toolbar_menu' ) ) { ?>
				<nav role="navigation" aria-label="<?php esc_attr_e('Toolbar Menu', 'from-scratch'); ?>">
					<?php wp_nav_menu( array(
						'theme_location'	=> 	'toolbar_menu',
						'menu_class'		=>	'toolbar-menu',
						'container'			=>	false,
						));
					?>
				</nav>
				<?php } ?>
				
				<?php if ( get_theme_mod('searchbar') || get_theme_mod('contrast') ) { ?>
				<div class="toolbar-widgets">
					<?php 
						if ( get_theme_mod('searchbar') ) {
							get_template_part( 'template-parts/header','toolbar-search');
						} 
						if ( get_theme_mod('contrast') == true ) {
							get_template_part( 'template-parts/header','toolbar-contrast');
						} 
					?>
				</div>
				<?php } ?>
					
			</div>	
			<?php endif; ?>	
