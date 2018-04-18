<?php if ( !defined('ABSPATH') ) die();
/**
 * @package WordPress
 * @subpackage From_Scratch
 * @since 1.0
 * @version 1.0
 */
?>
					<?php 
						$intro = get_sub_field('intro');
						$text = get_sub_field('text');
						$cols = get_sub_field('columns');
						$images = get_sub_field('gallery');
					?>

					<section class="builder-gallery">
						<div class="builder-section-container">

							<?php if( $text ) { ?>
							<div class="builder-gallery-text">
								<?php echo $text; ?>
							</div>
							<?php } ?>
							
							<?php if( $images ): ?>
							<div class="builder-gallery-pictures">
								
						        <?php foreach( $images as $image ): ?>
						        <div class="gallery-item-<?php echo $cols; ?>">
							        
							        <figure class="builder-gallery-figure">
							            <a href="<?php echo $image['url']; ?>" title="<?php _e('Enlarge picture', 'from-scratch'); ?>">
								            <img src="<?php echo $image['sizes']['thumbnail-hd']; ?>" alt="<?php echo $image['alt']; ?>">
											<?php if ( $image['caption'] ) { ?>
											<figcaption class="builder-gallery-caption">
												<span class="builder-gallery-caption-title"><?php echo $image['caption']; ?></span>
											</figcaption>
											<?php } ?>
								        </a>
								    </figure>
								    
						        </div>
						        <?php endforeach; ?>
						        
							</div>
							<?php endif; ?>							
						
						</div>
					</section>