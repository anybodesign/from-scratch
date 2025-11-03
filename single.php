<?php if ( !defined('ABSPATH') ) die();
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package WordPress
 * @subpackage From_Scratch
 * @since 1.0
 * @version 1.0
 */	
 	if ( get_theme_mod('post_sidebar') == false ) {
		$sidebar = false;
	} else if ( get_theme_mod('post_sidebar') != false || get_theme_mod('post_sidebar') == null ) {
		$sidebar = true;
	} else {
		$sidebar = false;
	}
	
	$no_comment = get_theme_mod('disable_comments');
	
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
				
				<?php if ($no_comment != true) {
					if ( comments_open() || get_comments_number() ) {
						comments_template();
					}
				} ?>
				
<?php get_footer(); ?>