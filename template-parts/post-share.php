<?php if ( !defined('ABSPATH') ) die(); 
	$id = get_the_id();
?>

						<div class="share-box">
							<p><?php esc_html_e('Share this post', 'from-scratch'); ?></p>
							<nav role="navigation" aria-label="<?php esc_attr_e('Share this post', 'from-scratch'); ?>">
								<ul class="share-items">
									<li><a target="_blank" rel="nofollow" title="<?php esc_attr_e('Share on Facebook', 'from-scratch'); ?>" href="https://www.facebook.com/sharer/sharer.php?t=<?php the_title(); ?>&amp;u=<?php the_permalink(); ?>">
										<img src="<?php echo FS_THEME_URL; ?>/img/icons/share/facebook.svg" alt="Facebook">
									</a></li>
									<li><a target="_blank" rel="nofollow" title="<?php esc_attr_e('Share on X', 'from-scratch'); ?>" href="https://twitter.com/intent/tweet?text=<?php the_title(); ?>&amp;url=<?php the_permalink(); ?>">
										<img src="<?php echo FS_THEME_URL; ?>/img/icons/share/twitter-x.svg" alt="X">
									</a></li>
									<li><a target="_blank" rel="nofollow" title="<?php esc_attr_e('Share on LinkedIn', 'from-scratch'); ?>" href="https://www.linkedin.com/shareArticle?mini=true&url=<?php the_permalink(); ?>&title=<?php the_title(); ?>&summary=<?php echo fs_share_excerpt(124, $id); ?>&source=<?php echo esc_html(bloginfo('name')); ?>">
										<img src="<?php echo FS_THEME_URL; ?>/img/icons/share/linkedin.svg" alt="LinkedIn">
									</a></li>
									<li><a target="_blank" rel="nofollow" title="<?php esc_attr_e('Share by e-mail', 'from-scratch'); ?>" href="mailto:?subject=<?php the_title(); ?>&amp;body=<?php echo fs_share_excerpt(124, $id); ?> %0D%0D <?php the_permalink(); ?>">
										<img src="<?php echo FS_THEME_URL; ?>/img/icons/share/email.svg" alt="E-mail">
									</a></li>
								</ul>
							</nav>
						</div>