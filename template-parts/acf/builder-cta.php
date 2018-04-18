<?php if ( !defined('ABSPATH') ) die();
/**
 * @package WordPress
 * @subpackage From_Scratch
 * @since 1.0
 * @version 1.0
 */
?>
					<?php 
						$text = get_sub_field('text');
						$link = get_sub_field('link');
						
						$style = get_sub_field('style');
						
						$color = $style['white_text'];
						$bgimg = $style['bg_image'];
						$bgcolor = $style['bg_color'];
						$over = $style['overlay'];
						
						if ($bgcolor) {
							$has_bgcolor = ' style="background-color: '.$bgcolor.'"';
						} else {
							$has_bgcolor = null;
						} 
						if ($bgimg) {
							$has_bgimg = ' style="background-image: url('.$bgimg['url'].')"';
						} else {
							$has_bgimg = null;
						} 
					?>

					<section class="builder-section builder-cta<?php if($color) { echo ' white-text'; } if( $over) { echo ' cta-overlay'; } ?>"<?php echo $has_bgcolor; echo $has_bgimg; ?>>
						<div class="builder-section-container">
						
							<?php if( $text ) { ?>
							<div class="builder-cta-text">
								<?php echo $text; ?>
							</div>
							<?php } ?>
						
							<?php if( $link ) : ?>
							<div class="builder-cta-btn">
								<a href="<?php echo $link['url']; ?>" class="action-btn"<?php if($link['target']) { echo ' target="'.$link['target'].'"'; } ?>>
									<?php echo $link['title']; ?>
								</a>
							</div>
							<?php endif; ?>

						</div>
					</section>