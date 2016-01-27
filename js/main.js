jQuery(document).ready(function() {
	
	
	// Responsive Menu
	
	jQuery('#menu-toggle').click(function() {
		jQuery('.main-menu').slideToggle();
		jQuery(this).toggleClass('menu-opened');
		return false;
	});

		jQuery(window).resize(function() {
			if (jQuery(window).width() > 768) {
		    	jQuery('.main-menu').show();
		    	jQuery('#menu-toggle').removeClass('menu-opened').removeAttr('style');
			}
		});
	
	
	// Sub-levels
	
	jQuery('.sub-menu-unfold').click(function() {
		jQuery(this).parent().parent().find('ul').slideToggle();
		jQuery(this).toggleClass('sub-menu-opened');
		return false;
	});

	

});