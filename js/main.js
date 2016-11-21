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
			if (jQuery(window).width() > 640) {
		    	jQuery('.main-menu').show().removeAttr('style').removeAttr('aria-expanded');
		    	jQuery('.sub-menu').show().removeAttr('style');
		    	jQuery('#menu-toggle').removeClass('menu-opened');
			}
		});
	
	
	// Sub-Menus Toggle Button
	
	jQuery('.sub-menu-unfold').click(function() {
		
		jQuery(this).next('.sub-menu').slideToggle();
		jQuery(this).toggleClass('sub-menu-opened');
			
			if (jQuery(this).hasClass('sub-menu-opened')) {
				jQuery(this).attr('aria-expanded','true');
			} else {
				jQuery(this).attr('aria-expanded','false');
			}
			
		return false;
	});
	

});