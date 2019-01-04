import * as Util from './utils';

/**
 * Class Ads
 *
 * To use the Ads, just add some markup to your html:
 *
 *  <div class="oa_zone--ad" id="{unique-id}" data-ad-name="{name}" data-ad-zone="{zone-id}" data-ad-media="{media}"></div>
 *
 */
class Ads {

	constructor( mediaQueries ) {
		this.mediaQueries = mediaQueries;
		this.data = [];

		[].forEach.call( document.getElementsByClassName( 'oa_zone--ad' ), this.parseAd.bind( this ) );
	}

	/**
	 * Callback on forEach to parse ads in DOM.
	 *
	 * @param  $ad
	 */
	parseAd( $ad ) {
		let id = $ad.hasAttribute( 'id' ) ? $ad.getAttribute( 'id' ) : '',
			name = $ad.getAttribute( 'data-ad-name' ),
			zone = $ad.getAttribute( 'data-ad-zone' ),
			media = $ad.getAttribute( 'data-ad-media' ) || this.mediaQueries.defaultType;

		if ( !name ) {
			return;
		}
		if ( !id ) {
			return;
		}
		if ( !zone ) {
			return;
		}

		// remove whitespaces before and after name
		name = name.trim();

		// store in internal var for reuse.
		this.data.push( {
			'name' : name,
			'media': media,
			'id'   : id,
			'zone' : zone,
			'elem' : $ad
		} );
	}

	/**
	 * moving ads into their container.
	 */
	moveAds() {
		for ( let name in this.data ) {
			let ad = this.data[ name ],
				$ad;

			if ( !ad.hasOwnProperty( 'adId' ) ) {
				continue;
			}

			// reset the current innerHTML.
			ad.elem.innerHTML = "";

			$ad = document.getElementById( ad.adId );
			if ( $ad ) {
				ad.elem.appendChild( $ad );
				let $parent = ad.elem.parentNode;
				$parent.insertBefore( Util.getDeclareNote(), $parent.firstChild );
			}
		}
	}

	/**
	 * Rendering all Ads by the given zones.
	 *
	 * @param zones
	 */
	render( zones ) {

		for ( let name in this.data ) {

			let ad = this.data[ name ],
				id;

			if ( !zones.hasOwnProperty( ad.name ) ) {
				continue;
			}

			if ( !this.mediaQueries.hasMatched( ad.media ) ) {
				continue;
			}
			// we've to use document.write, because the ads containing <script>-Tags which will not be
			// executed by innerHTML.
			id = 'source-' + ad.id;
			document.write( '<div id="' + id + '">' + zones[ ad.name ] + '</div>' );

			ad.adId = id;
		}
	}

}

export default Ads;