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
?>
					<div class="page-banner"<?php fs_bg_img(); ?>>
						<div class="inner">

							<h1 class="page-title">
							<?php 	
								if ( is_home() && ! is_front_page() ) {
									single_post_title();
								} else if ( is_archive() ) {
									the_archive_title();
								} else if ( is_search() ) {
									printf( esc_html__( 'Search Results for: %s', 'from-scratch' ), '<span class="search-term">' . get_search_query() . '</span>' );
								} else if ( is_404() ) {
									esc_html_e( 'Oops! That page can&rsquo;t be found', 'from-scratch' );
								} else {
									the_title(); 
								}
							?>
							</h1>
							
							<?php 
								if ( is_page_template( 'pagecustom-maintenance.php' ) ) {
									the_content(); 
								} 
								if ( is_archive() ) {
									the_archive_description( '<div class="archive-desc">', '</div>' );
								}
								if ( is_single() ) {
									get_template_part('template-parts/post', 'meta');							
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