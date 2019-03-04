jQuery(document).ready(function($) {
	
	// Sticky Nav (Option)

    var head = $('#site_head').height();
	
	$(window).scroll( function() {
	    
	    var topscreen = $(this).scrollTop();
	    
	    if ( topscreen >= head ) {
	        
			$('body').addClass('sticky-nav');
			$('body').css('padding-top', head);
							
	    } else {
	        
	        $('body').removeClass('sticky-nav');
	        $('body').css('padding-top', 0);
	    }
	});
	
});