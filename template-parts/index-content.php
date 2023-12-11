<?php if ( !defined('ABSPATH') ) die(); ?>

					<div class="page-content">
						<?php 
							if ( have_posts() ) : 
							
							get_template_part( 'template-parts/page', 'filters');
							get_template_part( 'template-parts/index', 'loop');
							get_template_part( 'template-parts/post', 'pagination' );
							
							else:
								get_template_part( 'template-parts/nothing' );
							endif; 
						?>
					</div>