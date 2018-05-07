<?php if ( !defined('ABSPATH') ) die();
/**
 * @package WordPress
 * @subpackage From_Scratch
 * @since 1.0
 * @version 1.0
 */
?>
					<?php 
						$right = get_sub_field('right');
						$img = get_sub_field('picture');
						$text = get_sub_field('text');
					?>
						
					<section class="builder-section builder-textimg">
						<div class="builder-section-container<?php if ($right) { echo ' right'; } ?>">
							
						<?php if ( $img ) { ?>
							<div class="builder-textimg-picture">
								<figure>
									<img src="<?php echo $img['url']; ?>" alt="<?php echo $img['alt']; ?>">
									<?php if ( $img['caption'] ) { ?>
									<figcaption>
										<?php echo $img['caption']; ?>
									</figcaption>
									<?php } ?>
								</figure>
							</div>
						<?php } ?>

						<?php if ( $text ) { ?>
							<div class="builder-textimg-text">
								<?php echo $text; ?>
							</div>
						<?php } ?>
												
						</div>
					</section>