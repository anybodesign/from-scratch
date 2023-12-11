<?php if ( !defined('ABSPATH') ) die();
/**
 * The main template file.
 *
 * @link http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage From_Scratch
 * @since 1.0
 * @version 1.0
 */ 
	 if ( is_search() || is_post_type_archive() ) {
		$sidebar = false;
	} else if ( get_theme_mod('blog_sidebar') == false ) {
		$sidebar = false;
	} else if ( get_theme_mod('blog_sidebar') != false || get_theme_mod('blog_sidebar') == null ) {
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
						get_template_part( 'template-parts/index', 'content' );
					?>	
					
				</div>

<?php get_footer(); ?>