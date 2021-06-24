jQuery(document).ready(function($) {
	
	
// Contrast

// https://stackoverflow.com/questions/19401633/how-to-fire-an-event-on-class-change-using-jquery

var $div = $("body");
var observer = new MutationObserver(function(mutations) {

	mutations.forEach(function(mutation) {
    
    if (mutation.attributeName === "class") {

		var attributeValue = $(mutation.target).prop(mutation.attributeName);
      
			if ( attributeValue === 'highcontrast' ) {
				
				$('.main-title img').attr('src','img/logo-black.svg');
				$('.infographie').attr('src','img/infographie-nb.jpg');
				$('.next-btn').attr('src','img/slider-btn-black.svg');
			
			} else if ( attributeValue === 'highcontrast fixed-nav' ) {
				
				$('.main-title img').attr('src','img/logo-white.svg');
			
			} else {
				
				$('.main-title img').attr('src','img/logo-ux-a11y.svg');
				$('.infographie').attr('src','img/infographie-color.jpg'); 
				$('.next-btn').attr('src','img/slider-btn.svg');
			} 
			
			console.log("Class attribute changed to:", attributeValue);
	}


    
	});
});




observer.observe(
	$div[0], {attributes: true}
);


    // Check (onLoad) if the cookie is there and set the class if it is
 

    if ($.cookie('highcontrast') === "yes") {
        $("body").addClass("high-contrast");
    }
    
    
    // When the element is clicked
   
    $(".toggle-highcontrast").click(function () {
        
        if ($.cookie('highcontrast') === "undefined" || $.cookie('highcontrast') === "no") {
           
            $.cookie('highcontrast', 'yes', {
                expires: 7,
                path: '/'
            });
            $("body").addClass("high-contrast");
        
        } else {

            $.cookie('highcontrast', 'yes', {
                expires: 7,
                path: '/'
            });
            $("body").addClass("high-contrast");
            
        }
    });
    
    $(".toggle-remove").click(function () {
        $('body').removeClass('high-contrast');
		
        if ($.cookie('highcontrast') === "yes") {
            $.cookie("highcontrast", null, {
                path: '/'
            });
        }
    });	
	
	

});