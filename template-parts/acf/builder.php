<?php if ( !defined('ABSPATH') ) die();
/**
 * @package WordPress
 * @subpackage From_Scratch
 * @since 1.0
 * @version 1.0
 */
?>

		<?php if ( have_rows('fs_builder') ) : ?>
		<div class="fs-builder">

			<?php while ( have_rows('fs_builder') ) : the_row(); ?>

				<?php get_template_part( 'template-parts/acf/builder', fs_get_row_layout( get_row_layout() ) ); ?>
				
			<?php endwhile; ?>
			
		</div>
		<?php endif; ?>