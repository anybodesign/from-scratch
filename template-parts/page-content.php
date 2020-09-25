<?php if ( !defined('ABSPATH') ) die();
/**
 * Template part for displaying page content in page.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage From_Scratch
 * @since 1.0
 * @version 1.0
 */
?>
					<div class="page-content">
						
						<?php the_content(); ?>

						<?php if ( '' != get_the_post_thumbnail() ) { ?>
						<div class="page-figure">
							<?php the_post_thumbnail('large-hd'); ?>
						</div>
						<?php } ?>
												
					</div>