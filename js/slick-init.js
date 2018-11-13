jQuery(document).ready(function($) {

	var $slick_slider;
	var settings;
	
	$slick_slider = $('.slick-slider');
	settings = {
		speed: 1000,
  		slidesToShow: 1,
		slidesToScroll: 1,
		arrows: false,
		dots: true,
		infinite: false,
		pauseOnHover: true,
		nextArrow: '<button type="button" class="slick-next slick-arrow" aria-label="Panneau suivant"> › </button>',
		prevArrow: '<button type="button" class="slick-prev slick-arrow" aria-label="Panneau précédent"> ‹ </button>',
		mobileFirst: true,
		responsive: [
		    {
		      breakpoint: 720,
		      settings: {
		        slidesToShow: 2,
		        slidesToScroll: 1,
		      }
		    },
		    {
		      breakpoint: 960,
		      settings: "unslick"
		    }
		]
	};
	$slick_slider.slick(settings);

	// Reslick only if it's not slick()

	$(window).on('resize',function() {
		if ($(window).width() > 959) {
			if ($slick_slider.hasClass('slick-initialized')) {
				$slick_slider.slick('unslick');
				$('.post-bloc, .post-bloc a').removeAttr('tabindex');
			}
			return;
		}
		if (!$slick_slider.hasClass('slick-initialized')) {
			return $slick_slider.slick(settings);
		}
		return;
	});		


	// Tab Index

	$('.slick-slide, .slick-slide a').removeAttr('tabindex');
	
	
	$(window).on('load',function() {
		$('.slick-slide').removeAttr('tabindex');
	});
	
	$(window).on('resize',function() {
		if ($(window).width() > 720) {
			$('.slick-slide').removeAttr('tabindex');
		}
	});	
	
	
	// A11Y Dots
	
	$('.slick-dots li button').prepend("Panneau ");



	// Play/Pause
	
	$('.slicky-pause').on('click',function() {
		var parent = $(this).closest('.slicky-options');
		var target = parent.data('target');
		
		$('.' + target).slick('slickPause');
		$(this).hide();
		parent.find('.slicky-play').show();
	});
	$('.slicky-play').on('click',function() {
		var parent = $(this).closest('.slicky-options');
		var target = parent.data('target');
		
		$('.' + target).slick('slickPlay');
		$(this).hide();
		parent.find('.slicky-pause').show();
	});

});