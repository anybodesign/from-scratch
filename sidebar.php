<?php if ( !defined('ABSPATH') ) die();
/**
 * The sidebar containing the main widget area.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 * 
 * @package WordPress
 * @subpackage From_Scratch
 * @since 1.0
 * @version 1.0
 */
?>
					<div class="page-sidebar">
						<aside class="widget-area" role="complementary">
							
							<?php // Sidebar example
								
								if ( is_active_sidebar( 'widgets_area1' ) ) { 
									dynamic_sidebar( 'widgets_area1' ); 
								} 
							?>
							
						</aside>
					</div>