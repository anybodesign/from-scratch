<?php if ( !defined('ABSPATH') ) die();
/**
 * The sidebar for the blog.
 *
 * @package WordPress
 * @subpackage From_Scratch
 * @since From Scratch 1.0
 */
?>
									<?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('Primary Widgets Area') ) : ?>
									<?php endif; ?>