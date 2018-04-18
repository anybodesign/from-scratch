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
						$content = get_sub_field('gallery');
					?>

					<section class="builder-content">
						<div class="builder-section-container">
					
							<?php if( $text ) { ?>
							<div class="builder-gallery-text">
								<?php echo $text; ?>
							</div>
							<?php } ?>
							
							<?php if( $content ): ?>
							<div class="builder-gallery-pictures">
								
						        <?php foreach( $content as $c ): ?>
						        <div class="gallery-item-<?php echo $cols; ?>">
							        
							        <figure class="builder-gallery-figure">
							            <a href="<?php echo get_permalink( $c->ID ); ?>" title="<?php _e('Read ', 'from-scratch'); echo get_the_title( $c->ID ); ?>">
								            <?php 
									            if ( has_post_thumbnail( $c->ID ) ) { 
								            		echo get_the_post_thumbnail( $c->ID, 'thumbnail-hd'); 
												} else {
													echo '<img src="' . get_bloginfo('template_directory') .'/img/fallback.png" alt="">'; 
									        } ?>
									        
											<figcaption class="builder-gallery-caption">
												<span class="builder-gallery-caption-title"><?php echo get_the_title( $c->ID ); ?></span>
											</figcaption>
								        </a>
								    </figure>
								    
						        </div>
						        <?php endforeach; ?>
						        
							</div>
							<?php endif; ?>	
						
						</div>
					</section>