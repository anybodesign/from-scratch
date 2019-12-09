jQuery(document).ready(function($) {

	function hhead() {
    	var vw = $(window).width();

		if ( vw > 959 ) {
			head = $('#site_head').height();
		} else {
			head = 0;
		}
    }

    $(window).on('load',function() {		
		hhead();
	});
	$(window).on('resize',function() {		
		hhead();
	});
	
	function stickyhead() {
	    var topscreen = $(this).scrollTop();
	    
	    if ( topscreen >= head ) {
	        
			$('body').addClass('sticky-nav');
			$('body').css('padding-top', head);
							
	    } else {
	        
	        $('body').removeClass('sticky-nav');
	        $('body').css('padding-top', 0);
	    }
	}
				
	$(window).on('scroll',function() {		
		stickyhead();
	});	

});