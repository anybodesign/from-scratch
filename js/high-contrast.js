jQuery(document).ready(function($) {
	
// Contrast

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