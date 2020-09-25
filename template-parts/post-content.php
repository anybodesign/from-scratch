<?php if ( !defined('ABSPATH') ) die();
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage From_Scratch
 * @since 1.0
 * @version 1.0
 */
?>
				<?php if ( '' != get_the_post_thumbnail() ) { ?>
				<div class="post-figure">
					<?php the_post_thumbnail('large-hd'); ?>
				</div>
				<?php } ?>
				
				<?php the_content(); ?>