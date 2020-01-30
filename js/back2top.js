jQuery(document).ready(function($) {
	
	// Back2top (Option)
	
	$('#back2top').click(function() {
		$('body,html').animate({ scrollTop: '1px' });
		return false;
	});


	function back2top() {
	    var topscreen = $(this).scrollTop();

	    if ( topscreen >= 250 ) {
			$('body').addClass('back2top-btn');
	    } else {
	        $('body').removeClass('back2top-btn');
	    }
	}
				
	$(window).on('scroll',function() {		
		back2top();
	});	
	
});