( function () {
	function apply() {
		var iframe = document.querySelector( 'iframe[name="editor-canvas"]' );
		var doc = iframe && iframe.contentDocument;
		if ( ! doc || ! doc.head ) {
			return;
		}
		if ( doc.getElementById( 'fs-theme-root-fontsize' ) ) {
			return;
		}
		var style = doc.createElement( 'style' );
		style.id = 'fs-theme-root-fontsize';
		style.textContent = 'html { font-size: 62.5% !important; }';
		doc.head.appendChild( style );
	}
	setInterval( apply, 300 );
} )();