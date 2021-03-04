<?php if ( !defined('ABSPATH') ) die(); ?>
			
			<?php if ( has_nav_menu( 'toolbar_menu' ) || get_theme_mod('searchbar') ) : ?>
			<div class="site-toolbar<?php if ( get_theme_mod('searchbar') ) { echo ' has-search'; } ?>">
				
				<?php if ( has_nav_menu( 'toolbar_menu' ) ) { ?>
				<nav role="navigation" aria-label="<?php esc_html_e('Toolbar Menu', 'from-scratch'); ?>">
					<?php wp_nav_menu( array(
						'theme_location'	=> 	'toolbar_menu',
						'menu_class'		=>	'toolbar-menu',
						'container'			=>	false,
						));
					?>
				</nav>
				<?php } ?>
				
				<?php if ( get_theme_mod('searchbar') ) { ?>
				<form role="search" method="get" id="searchform" class="searchform" action="<?php echo home_url( '/' ); ?>">
				    <input type="search" value="<?php echo get_search_query(); ?>" name="s" id="s" placeholder="<?php esc_html_e( 'Enter keyword', 'from-scratch' ); ?>">
				    <label for="s"><?php esc_html_e( 'Search for', 'from-scratch' ); ?></label>
					<input type="submit" class="action-btn" id="searchsubmit" value="<?php esc_attr_e( 'Search', 'from-scratch' ); ?>">
			    </form>
				<?php } ?>
			
			</div>	
			<?php endif; ?>	