/**
 * IE10 fix in snap mode
 *
 * see http://timkadlec.com/2013/01/windows-phone-8-and-device-width/
 */
if (navigator.userAgent.match(/IEMobile\/10\.0/)) {
	var msViewportStyle = document.createElement("style");
	msViewportStyle.appendChild(
		document.createTextNode(
			"@-ms-viewport{width:auto!important}"
		)
	);
	document.getElementsByTagName("head")[0].
		appendChild(msViewportStyle);
}

/**
 * This snippets gets all <img> elements, selects their
 * parent nodes if they are an 'a' and adds a zero border to it
 *
 * <p><a><img> results in a border on the link element
 * <X><a><img> does not have a border on the link element
 *
 */
(
	function( doc ) {
		if ( !doc.querySelectorAll ) {
			return;
		}
		var images = doc.querySelectorAll( 'a img' ),
			i = 0,
			len = images.length;
		for ( ; i < len; i++ ) {
			var $image = images[ i ];
			if ( $image.parentNode.tagName == 'A' ) {
				$image.parentNode.style.border = '0';
			}
		}
	}
)( document );
/**
 * iOS orientationchange fix
 *
 * see https://github.com/scottjehl/iOS-Orientationchange-Fix
 */
/*! A fix for the iOS orientationchange zoom bug.
 Script by @scottjehl, rebound by @wilto.
 MIT / GPLv2 License.
 */
(function(w){

	// This fix addresses an iOS bug, so return early if the UA claims it's something else.
	var ua = navigator.userAgent;
	if( !( /iPhone|iPad|iPod/.test( navigator.platform ) && /OS [1-5]_[0-9_]* like Mac OS X/i.test(ua) && ua.indexOf( "AppleWebKit" ) > -1 ) ){
		return;
	}

	var doc = w.document;

	if( !doc.querySelector ){ return; }

	var meta = doc.querySelector( "meta[name=viewport]" ),
		initialContent = meta && meta.getAttribute( "content" ),
		disabledZoom = initialContent + ",maximum-scale=1",
		enabledZoom = initialContent + ",maximum-scale=10",
		enabled = true,
		x, y, z, aig;

	if( !meta ){ return; }

	function restoreZoom(){
		meta.setAttribute( "content", enabledZoom );
		enabled = true;
	}

	function disableZoom(){
		meta.setAttribute( "content", disabledZoom );
		enabled = false;
	}

	function checkTilt( e ){
		aig = e.accelerationIncludingGravity;
		x = Math.abs( aig.x );
		y = Math.abs( aig.y );
		z = Math.abs( aig.z );

		// If portrait orientation and in one of the danger zones
		if( (!w.orientation || w.orientation === 180) && ( x > 7 || ( ( z > 6 && y < 8 || z < 8 && y > 6 ) && x > 5 ) ) ){
			if( enabled ){
				disableZoom();
			}
		}
		else if( !enabled ){
			restoreZoom();
		}
	}

	w.addEventListener( "orientationchange", restoreZoom, false );
	w.addEventListener( "devicemotion", checkTilt, false );

})( this );

/**
 * This script searches for the tables with the class 'reporttable'
 * so that each element in this table can act like an accordeon
 *
 * See www.smashingmagazine.com/books/
 */
(
	function( doc ) {
		var ttocs = doc.querySelectorAll( '.ttoc' ),
			len = ttocs.length;
		for ( var i = 0; i < len; i++ ) {

			// get the id of the current table
			var table_id = ttocs[ i ].id,
				trs = doc.querySelectorAll( '#' + table_id + ' tr' );

			// walk through the tr elements
			for ( var tri = 0; tri < trs.length; tri++ ) {

				// the element
				var element = trs[ tri ];

				// check if tri is even or odd
				if ( tri % 2 == 0 && tri != 0 ) {
					// hide all elements exept the first
					element.style.display = 'none';
				} else {
					// add the odd classes to the odd elements
					var element_classes = element.className;
					element.className = element.className + ' odd';

					// set the onclick event on the tr element
					// to expand the next tr with the infotext
					// for this chapter
					element.onclick = function() {

						// get the sibling
						var sibling = this.nextSibling;
						while ( sibling && sibling.nodeName != 'TR' ) {
							sibling = sibling.nextSibling
						}

						// toggle view
						if ( sibling.style.display == 'none' ) {
							sibling.style.display = 'table-row';
						} else {
							sibling.style.display = 'none';
						}

						// change arrow
						var arrow = this.querySelector( '.arrow' );
						var arrow_classes = arrow.className;
						if ( arrow_classes.indexOf( 'up' ) == -1 ) {
							arrow.className = arrow_classes + ' up';
						} else {
							arrow.className = arrow_classes.replace( 'up', '' );
						}
					}
				}
			}
		}
	}
)( document );