<?php if ( !defined('ABSPATH') ) die();
/**
 * @package WordPress
 * @subpackage From_Scratch
 * @since 1.0
 * @version 1.0
 */
 
 $blog_excerpt = get_theme_mod('blog_excerpt');
?>
						<?php 
							if ( is_page_template( 'pagecustom-maintenance.php' ) ) {
								the_content(); 
							} 
							if ( is_archive() ) {
								the_archive_description();
							}
							if ( is_home() && $blog_excerpt ) {
								echo '<p>'.esc_html($blog_excerpt).'</p>';
							}
							if ( is_single() ) {
								while ( have_posts() ) : the_post();
								get_template_part('template-parts/post', 'meta');
								endwhile;							
							}
							 
						?>