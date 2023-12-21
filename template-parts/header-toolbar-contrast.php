<?php if ( !defined('ABSPATH') ) die(); ?>
			
					<div class="contrast-switch">
						<button class="toggle-highcontrast" type="button" title="<?php esc_attr_e('Toggle high contrast', 'from-scratch'); ?>">
							<img src="<?php echo FS_THEME_URL; ?>/img/ui/contrast-on.svg" alt="">
							<span><?php esc_html_e('High contrast', 'from-scratch'); ?></span>
						</button>
						<button class="toggle-remove" type="button" title="<?php esc_attr_e('Restore contrast', 'from-scratch'); ?>">
							<img src="<?php echo FS_THEME_URL; ?>/img/ui/contrast-off.svg" alt="">
							<span><?php esc_html_e('Restore contrast', 'from-scratch'); ?></span>
						</button>
					</div>