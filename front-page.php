<?php if ( !defined('ABSPATH') ) die();
/**
 * The front page template file.
 *
 * @link http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage From_Scratch
 * @since 1.0
 * @version 1.0
 */
get_header(); ?>

				<div class="page-wrap">
					<?php 
						get_template_part( 'template-parts/page', 'content' ); 
					?>					
				</div>

<?php get_footer(); ?>