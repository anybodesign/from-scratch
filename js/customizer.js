(function($) {
    
	// Site title and description
	wp.customize( 'blogname', function( value ) {
		value.bind( function( to ) {
			$( '.site-title a', '.site-title' ).text( to );
		});
	});
	wp.customize( 'blogdescription', function( value ) {
		value.bind( function( to ) {
			$( '.site-desc' ).text( to );
		});
	});

	// Tagline
    wp.customize('hide_tagline', function( value ) {
        value.bind( function( to ) {
            if( to ) {
                $( '.site-desc' ).hide();
            }
            else {
                $( '.site-desc' ).show();
            }
        });
    });
    
    // WP Credits
    wp.customize('display_wp', function( value ){
        value.bind( function( to ) {
            if( to ) {
                $( '.wp-love' ).show();
            }
            else {
                $( '.wp-love' ).hide();
            }
        });
    });
    
    // Footer text
    wp.customize('footer_text', function(value) {
        value.bind( function( text ) {
            $('.footer-copyright').text( text );
        });
    });
    
})(jQuery);