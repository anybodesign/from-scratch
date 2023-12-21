<?php if ( !defined('ABSPATH') ) die(); ?>
			
					<form role="search" method="get" id="searchform" class="searchform" action="<?php echo home_url( '/' ); ?>">
						<input type="search" value="<?php echo get_search_query(); ?>" name="s" id="s" placeholder="<?php esc_attr_e( 'Enter keyword', 'from-scratch' ); ?>">
						<label for="s"><?php esc_html_e( 'Search for', 'from-scratch' ); ?></label>
						<input type="submit" class="action-btn" id="searchsubmit" value="<?php esc_attr_e( 'Search', 'from-scratch' ); ?>">
					</form>