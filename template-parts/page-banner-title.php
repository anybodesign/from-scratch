<?php if ( !defined('ABSPATH') ) die(); ?>

						<h1 class="page-title">
							<?php	
								if ( is_home() && ! is_front_page() ) {
									single_post_title();
								} else if ( is_archive() ) {
									the_archive_title();
								} else if ( is_search() ) {
									printf( esc_html__( 'Search Results for: %s', 'from-scratch' ), '<span class="search-term">' . get_search_query() . '</span>' );
								} else if ( is_404() ) {
									esc_html_e( 'Oops! That page can&rsquo;t be found', 'from-scratch' );
								} else {
									the_title(); 
								}
							?>
						</h1>