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
				<div class="page-wrap">
					
					<?php get_template_part( 'template-parts/page', 'banner' ); ?>
					
					<div class="page-content">
						<?php echo get_template_part( 'template-parts/nothing' ); ?>	
					</div>	
					
				</div>

<?php get_footer(); ?>