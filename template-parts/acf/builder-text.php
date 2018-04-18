<?php if ( !defined('ABSPATH') ) die();
/**
 * @package WordPress
 * @subpackage From_Scratch
 * @since 1.0
 * @version 1.0
 */
?>
					<?php 
						$layout = get_sub_field('layout');
						
						$text1 = get_sub_field('text_1');
						$text2 = get_sub_field('text_2');
						$text3 = get_sub_field('text_3');
					?>
						
					<section class="builder-text">
						<div class="builder-section-container">

							<div class="builder-text--<?php echo $layout; ?>">
							<?php if ( $layout == '1col' ) { ?>
					        	
					        	<div class="builder-text-column">
						        	<?php echo $text1;?>
					        	</div>
					        	
							<?php } elseif ( $layout == '2col' || $layout == '2-1col' || $layout == '1-2col' ) { ?>
					      
					        	<div class="builder-text-column">
						        	<?php echo $text1;?>
					        	</div>
					        	<div class="builder-text-column">
						        	<?php echo $text2;?>
					        	</div>
					
							<?php } elseif ( $layout == '3col' ) { ?>
							
								<div class="builder-text-column">
						        	<?php echo $text1;?>
					        	</div>
					        	<div class="builder-text-column">
						        	<?php echo $text2;?>
					        	</div>
					        	<div class="builder-text-column">
						        	<?php echo $text3;?>
					        	</div>
					        	
							<?php } ?>
							</div>
						
						</div>
					</section>