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

					<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
						
						<?php if ( '' != get_the_post_thumbnail() ) { ?>
						<figure class="post-figure">
							<a href="<?php the_permalink(); ?>" rel="nofollow">
							<?php the_post_thumbnail('medium-hd'); ?>
							</a>
						</figure>
						<?php } ?>
						
						<div class="post-content">
							<header class="post-header">
								<h2 class="post-title"><a href="<?php the_permalink(); ?> "><?php the_title(); ?></a></h2>
								<?php get_template_part('template-parts/post', 'meta'); ?>							
							</header>
							<div class="post-excerpt">
								<p><?php the_excerpt(); ?></p>
							</div>
						</div>
						
					</article>