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