<?php if ( !defined('ABSPATH') ) die(); ?>

					<div id="posts_list" class="the-posts" >
						<?php 
							while ( have_posts() ) : the_post();
								get_template_part( 'template-parts/post', 'block' ); 
							endwhile;
						?>
					</div>