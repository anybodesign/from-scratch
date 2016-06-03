jQuery(document).ready(function() {
	
	
	// Responsive Main Menu
	
	jQuery('#menu-toggle').click(function() {
		jQuery('.main-menu').slideToggle();
		jQuery(this).toggleClass('menu-opened');

			if (jQuery(this).hasClass('menu-opened')) {
				jQuery('.main-menu').attr('aria-expanded','true');
			} else {
				jQuery('.main-menu').attr('aria-expanded','false');
			}
		
		return false;
	});

		jQuery(window).resize(function() {
			if (jQuery(window).width() < 768) {
				jQuery('.main-menu').attr('aria-expanded','false');
			} else {
				jQuery('.main-menu').removeAttr('aria-expanded');
			}
			if (jQuery(window).width() > 768) {
		    	jQuery('.main-menu').show();
		    	jQuery('#menu-toggle').removeClass('menu-opened').removeAttr('style');
			}
		});
	
	
	
	// Sub-Menus Toggle Button
	
	jQuery('.sub-menu-unfold').click(function() {
		
		jQuery(this).parent().parent().find('ul').slideToggle();
		jQuery(this).toggleClass('sub-menu-opened');
			
			if (jQuery(this).hasClass('sub-menu-opened')) {
				jQuery(this).attr('aria-expanded','true');
			} else {
				jQuery(this).attr('aria-expanded','false');
			}
			
		return false;
	});

	

});