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
	$has_bg = get_theme_mod('has_bg');
	$in_banner = get_theme_mod('child_pages') == 'banner';
	$show_banner_desc = get_theme_mod('show_desc'); 
?>
					<div class="page-banner"<?php if ( $has_bg ) { fs_bg_img(); } ?>>
						<div class="inner">
							<?php 
								get_template_part( 'template-parts/page-banner', 'title' );
								if ($in_banner) { 
									get_template_part( 'template-parts/page-banner', 'subnav' );
								} 
								if ($show_banner_desc) {
									get_template_part( 'template-parts/page-banner', 'desc' );
								}
							?>
						</div>
					</div>
					
					<?php if ( function_exists('bcn_display') ) { ?>
					<div class="breadcrumbs-nav">
						<nav class="inner">
							<?php bcn_display(); ?>					
						</nav>
					</div>
					<?php } ?>						