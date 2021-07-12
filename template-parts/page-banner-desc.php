<?php if ( !defined('ABSPATH') ) die();
/**
 * @package WordPress
 * @subpackage From_Scratch
 * @since 1.0
 * @version 1.0
 */
?>
						<?php 
							if ( is_page_template( 'pagecustom-maintenance.php' ) ) {
								the_content(); 
							} 
							if ( is_archive() ) {
								the_archive_description();
							}
							if ( is_singular('post') ) {
								while ( have_posts() ) : the_post();
								get_template_part('template-parts/post', 'meta');
								endwhile;							
							}
							 
						?>