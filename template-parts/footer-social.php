<?php if ( !defined('ABSPATH') ) die(); ?>
			
				<?php if ( has_nav_menu( 'social_menu' ) ) : ?>
				<div class="footer-social">
					<nav role="navigation" aria-label="<?php esc_attr_e('Social Networks', 'from-scratch'); ?>">
						<?php wp_nav_menu( array(
								'theme_location'	=> 	'social_menu',
								'menu_class'		=>	'social-menu',
								'container'			=>	false
								));
						?>
					</nav>
				</div>
				<?php endif; ?>