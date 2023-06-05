<?php if ( !defined('ABSPATH') ) die(); ?>
						<div class="page-filters">
							<label for="cat">
								<?php _e('Categories', 'from-scratch'); ?>
							</label>
							<div class="formfield-select--container">
								<?php
									$args = array(
										'show_option_all' => __( 'All categories', 'from-scratch' ),
									);
									wp_dropdown_categories( $args ); 
								?>
							</div>
							<script>
								var siteUrl = '<?php esc_url(bloginfo('url')); ?>';
								document.getElementById('cat').onchange = function(){
									if( this.value !== '-1' ){
										window.location=siteUrl +'/?cat='+this.value
									}
								}
							</script>
						</div>				