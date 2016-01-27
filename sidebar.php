<?php if ( !defined('ABSPATH') ) die();
/**
 * The sidebar containing the main widget area.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 * 
 * @package WordPress
 * @subpackage From_Scratch
 * @since From Scratch 1.0
 */
?>
				<aside id="secondary" class="widget-area" role="complementary">
					<div class="row">
						<div class="col-12">
							
							<?php if ( is_active_sidebar( 'widgets_area1' ) ) { dynamic_sidebar( 'widgets_area1' ); } ?>
							
						</div>
					</div>
				</aside>