/**
 * Class Beacons
 *
 * The new ad-delivery of Commindo returns for empty Banner- and Sponsor-Slots a tracking pixel.
 * The Pixel has to be rendered somewhere.
 *
 * @issue https://github.com/inpsyde/smashing-magazin/issues/429
 */
class Beacons {

	constructor(  ) {

	}

	/**
	 * Rendering all TrackingPixels by the given data-Array.
	 *
	 * @param data
	 */
	render( data ) {
		let $output = document.createElement('div');
		$output.id = 'ads__Beacons';
		$output.innerHTML = data.join( "\n" );
		document.body.appendChild($output);
	}

	/**
	 * Test if the current markup only contains a tracking pixel.
	 *
	 * @param markup
	 *
	 * @returns boolean
	 */
	isTrackingPixelOnly( markup ) {
		let pattern = /^\s*<div id='beacon_[^>]*><img [^>]*><\/div>\s*$/;
		return pattern.test( markup );
	}

	/**
	 * Extracting the id="beacon_{id}" from ads.
	 *
	 * @deprecated this function was used in cleanupZones(), but it seems it removes the impression-logging.
	 *
	 * @param markup
	 *
	 * @return string markup
	 */
	extractBeacon( markup ) {
		let pattern = /\<div(?:\s+[^>]*)*\s+id\=('|")beacon_[a-z-0-9]+\1(?:\s+[^>]*\s*)*>[\s\S]*?\<\/div>/g;
		return markup.replace( pattern, '' );
	}


}

export default Beacons;