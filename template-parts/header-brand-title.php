<?php if ( !defined('ABSPATH') ) die(); ?>

				<?php if ( is_front_page() ) { ?>
				<h1 class="site-title">
					<?php get_template_part('template-parts/header', 'brand-logo'); ?>
				</h1>
				
				<?php } else { ?>
				
				<span class="site-title">
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php esc_attr_e('Go to Home Page', 'from-scratch'); ?>">
					<?php get_template_part('template-parts/header', 'brand-logo'); ?>
					</a>
				</span>
				<?php } ?>