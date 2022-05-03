<?php if ( !defined('ABSPATH') ) die(); 
		
		$header_white = get_theme_mod('header_white_text');
?>
	
	<header role="banner" id="site_head"<?php if ( $header_white ) { echo ' class="white-text"'; } ?>>
		<div class="row inner">	
		<?php 
			get_template_part('template-parts/header', 'toolbar'); 
			get_template_part('template-parts/header', 'brand'); 
			
			if ( ! is_page_template( 'pagecustom-maintenance.php' ) ) {
				get_template_part('template-parts/header', 'nav');
			}
		?>
		</div>
	</header>