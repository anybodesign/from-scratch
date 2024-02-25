jQuery(document).ready(function($) {
	
	$().fancybox({
		selector : '.fancypop',
		buttons : [
			'close'
		],
		beforeShow: function(){
			$('body').css({'overflow-y':'hidden'});
		},
		afterClose: function(){
			$('body').css({'overflow-y':'visible'});
		}
	});
	
	$('.page-wrap').find('figure a[href*=".jpeg"]').addClass('fancypop');
	$('.page-wrap').find('figure a[href*=".jpg"]').addClass('fancypop');
	$('.page-wrap').find('figure a[href*=".png"]').addClass('fancypop');
	$('.page-wrap').find('figure a[href*=".webp"]').addClass('fancypop');
});