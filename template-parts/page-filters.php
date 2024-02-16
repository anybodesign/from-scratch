<?php if ( !defined('ABSPATH') ) die(); 
	
	$cats = get_theme_mod('cat_dropdown');
?>

						<?php if ( $cats && ( is_home() ) ) { ?>
						
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
								var siteUrl = '<?php echo site_url(); ?>';
								document.getElementById('cat').onchange = function(){
									if( this.value !== '-1' ){
										window.location=siteUrl +'/?cat='+this.value
									}
								}
							</script>
						</div>
						
						<?php } ?>