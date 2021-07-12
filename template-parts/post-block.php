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

					<article id="post-<?php the_ID(); ?>" <?php post_class('post-block'); ?>>
						
						<?php if ( '' != get_the_post_thumbnail() ) {
							$img_id = get_post_thumbnail_id();
							$img_url = wp_get_attachment_image_src( $img_id, 'screen-md' );
							$img_alt = get_post_meta($img_id, '_wp_attachment_image_alt', true);
						?>
						<div class="post-figure">
							<a href="<?php the_permalink(); ?>" rel="nofollow">
							<img src="<?php echo $img_url[0]; ?>" alt="<?php echo $img_alt; ?>">
							</a>
						</div>
						<?php } ?>
						
						<div class="post-content">
							<header class="post-header">
								<h2 class="post-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
								<?php get_template_part('template-parts/post', 'meta'); ?>							
							</header>
							<div class="post-excerpt">
								<?php the_excerpt(); ?>
							</div>
						</div>
						
					</article>