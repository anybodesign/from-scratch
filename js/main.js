jQuery(document).ready(function($) {
	
	
	// Responsive Main Menu

	$('#menu-toggle').click(function() {
		$('.main-menu').slideToggle();
		$(this).toggleClass('menu-opened');
			
			if ($(this).hasClass('menu-opened')) {
				$('.main-menu').attr('aria-expanded','true');
			} else {
				$('.main-menu').attr('aria-expanded','false');
			}
			
		return false;
	});

		$(window).resize(function() {
			if ($(window).width() > 640) {
		    	$('.main-menu').show().removeAttr('style').removeAttr('aria-expanded');
		    	$('.sub-menu').show().removeAttr('style');
		    	$('#menu-toggle').removeClass('menu-opened');
			}
		});
	
	
	// Sub-Menus Toggle Button
	
	$('.sub-menu-unfold').click(function() {
		
		    if($(this).hasClass('sub-menu-opened')) {
		        $(this).removeClass('sub-menu-opened');
				$(this).next('.sub-menu').slideUp();
		    
		    } else {
	
				$(this).parent().parent().find('.sub-menu-opened').removeClass('sub-menu-opened');
				$('.sub-menu').slideUp();
		        $(this).addClass('sub-menu-opened');
		        $(this).next('.sub-menu').slideDown();
		    }
	});
	

	// Responsive Video Players (Youtube, Vimeo)
			
	$(window).on('load',function() {
		
		$("iframe").each(function() {
			
			if($(this).is("[src*=youtube], [src*=vimeo]")) {
				var yt_width = $(this).width();
				$( this ).attr('style','height: '+yt_width/1.77+'px');
			}
		});
		
	});	

	$(window).on('resize',function() {

		$("iframe").each(function() {
			if($(this).is("[src*=youtube], [src*=vimeo]")) {
				var yt_width = $(this).width();
				$( this ).attr('style','height: '+yt_width/1.77+'px');
			}
		});
		
	});	
	
	

});