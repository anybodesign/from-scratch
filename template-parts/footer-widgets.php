<?php if ( !defined('ABSPATH') ) die(); ?>
			
				<div class="footer-widgets">
					<?php if ( is_active_sidebar( 'widgets_footer1' ) ) { ?>
					<div class="widgets-area">
						<?php dynamic_sidebar( 'widgets_footer1' ); ?>
					</div>
					<?php } ?>
					
					<?php if ( is_active_sidebar( 'widgets_footer2' ) ) { ?>
					<div class="widgets-area">
						<?php dynamic_sidebar( 'widgets_footer2' ); ?>
					</div>
					<?php } ?>
					
					<?php if ( is_active_sidebar( 'widgets_footer3' ) ) { ?>
					<div class="widgets-area">
						<?php dynamic_sidebar( 'widgets_footer3' ); ?>
					</div>
					<?php } ?>					
				</div>