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

	// Site title
    wp.customize('hide_sitetitle', function( value ) {
        value.bind( function( to ) {
            if( to ) {
                $( '.site-title span' ).hide().addClass('screen-reader-text');
            }
            else {
                $( '.site-title span' ).show().removeClass('screen-reader-text');
            }
        });
    });
    
    // Tagline
    wp.customize('hide_tagline', function( value ) {
        value.bind( function( to ) {
            if( to ) {
                $( '.site-desc' ).hide().addClass('screen-reader-text');
            }
            else {
                $( '.site-desc' ).show().removeClass('screen-reader-text');
            }
        });
    });
	
	// Logo height
	wp.customize( 'site_logo_height', function( value ) {
		value.bind( function( to ) {
			if( to ) {
				$height1 = to/10;
				$( '.site-title img.logo' ).attr( 'style', 'max-height:'+$height1+'rem' );
			} 
			else {
				$( '.site-title img.logo' ).removeAttr( 'style' );
			}
		});
	});
	
	wp.customize( 'site_logo_mobile_height', function( value ) {
		value.bind( function( to ) {
			if( to ) {
				$height2 = to/10;
				$( '.site-title img.logo-mobile' ).attr( 'style', 'max-height:'+$height2+'rem' );
			} 
			else {
				$( '.site-title img.logo-mobile' ).removeAttr( 'style' );
			}
		});
	});


    // Colors // if using CSS vars
    
	var rootCustomProperty = function( setting ) {
		var bStyle = document.createElement( 'style' );
		document.head.appendChild( bStyle );
		setting.bind( function( newval ) {
			bStyle.innerHTML = ':root { --' + setting.id + ': ' + newval + ' }';
		} );
	};
    wp.customize( 'primary_color', rootCustomProperty );
    wp.customize( 'secondary_color', rootCustomProperty );
    wp.customize( 'accent_color', rootCustomProperty );
    wp.customize( 'text_color', rootCustomProperty );
    wp.customize( 'bg_color', rootCustomProperty );
    wp.customize( 'page_color', rootCustomProperty );
    wp.customize( 'header_color', rootCustomProperty );
    wp.customize( 'footer_color', rootCustomProperty );
	
	// Header text
    wp.customize('header_white_text', function( value ) {
        value.bind( function( to ) {
            if( to ) {
                $( '#site_head' ).addClass('white-text');
            }
            else {
                $( '#site_head' ).removeClass('white-text');
            }
        });
    });
	// Footer text
    wp.customize('footer_white_text', function( value ) {
        value.bind( function( to ) {
            if( to ) {
                $( '#site_foot' ).addClass('white-text');
            }
            else {
                $( '#site_foot' ).removeClass('white-text');
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