<?php if ( !defined('ABSPATH') ) die(); 
		
		$header_white = get_theme_mod('header_white_text');
		$nav_group = get_theme_mod('nav_group');
		
		$class = '';
		if ( $header_white ) {
			$class .= 'white-text ';
		}
		if ( $nav_group ) {
			$class .= 'has-nav-group';
		}
?>
	
	<header role="banner" id="site_head" class="<?php echo esc_attr($class); ?>">
		<div class="row inner">	
		<?php 
			if ( ! $nav_group ) {
				get_template_part('template-parts/header', 'toolbar');
			} 
			get_template_part('template-parts/header', 'brand'); 
			
			if ( ! $nav_group ) {
				get_template_part('template-parts/header', 'nav');
			} else if ( $nav_group ) {
				get_template_part('template-parts/header', 'nav-alt');
			} else if ( ! is_page_template( 'pagecustom-maintenance.php' ) ) {
				// Nada :)
			}
		?>
		</div>
	</header>