<?php if ( !defined('ABSPATH') ) die(); ?>

				<?php 
					$site_desc = get_bloginfo( 'description', 'display' );
					if ( $site_desc ) {
				?>
					<p class="site-desc<?php if (get_theme_mod( 'hide_tagline' )) { echo esc_attr(' a11y-hidden'); } ?>">
						<?php echo esc_html($site_desc); ?>
					</p>
				<?php 
					} 
				?>