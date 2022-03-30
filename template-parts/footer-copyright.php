<?php if ( !defined('ABSPATH') ) die(); ?>
			
				<div class="footer-copyright">				
					
					<p>
						<?php if(get_theme_mod('footer_text')) {
							echo esc_html(get_theme_mod('footer_text', '')); 
						} else {
							echo esc_html('&copy;'); echo date(' Y '); echo esc_html(bloginfo('name')).'.'; 	
						} ?>
						
						<a class="wp-love<?php if ( get_theme_mod('display_wp' ) == false ) { echo esc_attr(' out-of-reach'); } ?>" href="//wordpress.org"><?php esc_html_e('Powered by WordPress!', 'from-scratch'); ?></a>
					</p>
					
					<?php if ( has_nav_menu( 'footer_menu' ) ) : ?>
					<nav role="navigation" aria-label="<?php esc_attr_e('Footer Menu', 'from-scratch'); ?>">
					<?php wp_nav_menu( array(
							'theme_location'	=> 	'footer_menu',
							'menu_class'		=>	'footer-menu',
							'container'			=>	false
							));
					?>
					</nav>
					<?php endif; ?>
					
				</div>