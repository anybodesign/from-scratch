<?php if ( !defined('ABSPATH') ) die(); ?>

			<?php // The Logo & Site Titles ?>
			
			<div class="site-brand">
				
				<?php if ( is_front_page() ) { ?>
				<h1 class="site-title">
					<?php get_template_part('template-parts/header', 'brand-logo'); ?>
				</h1>
				
				<?php } else { ?>
				
				<p class="site-title">
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php esc_html_e('Go to Home Page', 'from-scratch'); ?>">
					<?php get_template_part('template-parts/header', 'brand-logo'); ?>
					</a>
				</p>
				<?php } ?>
	
				<?php 
					$site_desc = get_bloginfo( 'description', 'display' );
					if ( $site_desc ) { ?>
					<p class="site-desc<?php if (get_theme_mod( 'hide_tagline' )) { echo esc_attr(' screen-reader-text'); } ?>"><?php echo esc_html($site_desc); ?></p>
				<?php } ?>
							
			</div>