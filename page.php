<?php if ( !defined('ABSPATH') ) die();
/**
 * The template for displaying all pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage From_Scratch
 * @since 1.0
 * @version 1.0
 */	
	
	$in_sidebar = get_theme_mod('child_pages') == 'sidebar';
	 
	$parent = $post->post_parent;
	if ( $parent ) {
		$children = wp_list_pages("title_li=&child_of=".$parent."&echo=0");
	} else {
		$children = wp_list_pages("title_li=&child_of=".$post->ID."&echo=0");
	}
	if ( is_page() && $children && $in_sidebar ) {
		$sidebar = true;
	} else {
		$sidebar = false;
	} 
get_header(); ?>

				<?php get_template_part( 'template-parts/page', 'banner' ); ?>
				
				<div class="page-wrap<?php if ($sidebar) { echo ' has-sidebar'; } ?>">					
					<?php 
						if ($sidebar) { 					
							get_template_part( 'template-parts/sidebar', 'burger' );
							get_sidebar();						
						}
						get_template_part( 'template-parts/page', 'content' ); 
					?>
				</div>
				
<?php get_footer(); ?>