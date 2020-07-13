<?php if ( !defined('ABSPATH') ) die();

	$field = get_field('field');

	if( !empty($block['align']) ) {
	    $align = ' align' . $block['align'];
	} else {
		$align = null;
	}						
?>
						
			<section class="acf-block--custom<?php echo esc_attr($align); ?>">
				<div class="acf-block-container">

					<?php if ( $field ) { ?>
					<div class="acf-block-something">
						<?php echo esc_html($field); ?>
					</div>
					<?php } ?>
										
				</div>
			</section>