<?php
/**
 * Template part for displaying page content in page.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage From_Scratch
 * @since From Scratch 1.0
 */
?>
					<div class="page-content">
						
						<h1 class="page-title"><?php the_title(); ?></h1>
						
						<div class="post-content">
							<?php the_content(); ?>
						</div>

						<?php if ( 'from-scratch' != get_the_post_thumbnail() ) { ?>
						<figure class="post-figure">
							<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('large'); ?></a>
						</figure>
						<?php } ?>
												
					</div>