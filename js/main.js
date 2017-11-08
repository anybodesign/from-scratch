jQuery(document).ready(function($) {
	
	
	// Responsive Main Menu

	$('#menu-toggle').click(function() {
		$('.main-menu').slideToggle();
		$(this).toggleClass('menu-opened');
			
			if ($(this).hasClass('menu-opened')) {
				$(this).attr('aria-expanded','true');
				$('.main-menu').attr('aria-hidden','false');
			} else {
				$(this).attr('aria-expanded','false');
				$('.main-menu').attr('aria-hidden','true');
			}
			
		return false;
	});

		$(window).resize(function() {
			if ($(window).width() > 640) {
		    	$('.main-menu').show().removeAttr('style').removeAttr('aria-hidden');
		    	$('.sub-menu').show().removeAttr('style');
		    	$('#menu-toggle').removeClass('menu-opened').removeAttr('aria-expanded');
			}
		});
	
	
	// Sub-Menus Toggle Button
	
	$('.sub-menu-unfold').click(function() {
		
		    if($(this).hasClass('sub-menu-opened')) {
		        $(this).removeClass('sub-menu-opened').attr('aria-expanded','false');
				$(this).next('.sub-menu').slideUp().attr('aria-hidden','true');
		    
		    } else {
	
				$(this).parent().parent().find('.sub-menu-opened').removeClass('sub-menu-opened');
				$('.sub-menu').slideUp();
		        $(this).addClass('sub-menu-opened').attr('aria-expanded','true');
		        $(this).next('.sub-menu').slideDown().attr('aria-hidden','false');
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