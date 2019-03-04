<?php if ( !defined('ABSPATH') ) die();
/**
 * The template for displaying 404 pages (Not Found).
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package WordPress
 * @subpackage From_Scratch
 * @since 1.0
 * @version 1.0
 */

get_header(); ?>
					
				<div class="row inner">
					<div class="site-content">
	
						<section class="error-404 not-found">
							
							<header class="page-header">
								<h1 class="page-title"><?php esc_html_e( 'Oops! That page can&rsquo;t be found', 'from-scratch' ); ?></h1>
							</header>
							
							<p><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try a search?', 'from-scratch' ); ?></p>
							<?php get_search_form(); ?>		
							
						</section>
												
					</div>					
				</div>

<?php get_footer(); ?>