jQuery(document).ready(function($) {
	
	// Back2top (Option)
	
	$('#back2top').click(function() {
		$('body,html').animate({ scrollTop: '1px' });
		return false;
	});
	
});