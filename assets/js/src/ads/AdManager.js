/**
 * Class AdManager
 *
 * Managing ads and sponsors.
 */
class AdManager {

	constructor( Ads, Sponsors, Beacons ) {
		this.Ads = Ads;
		this.Sponsors = Sponsors;
		this.Beacons = Beacons;

		this.foundBeacons = [];
		window.onload = function() {
			this.moveAds()
		}.bind( this );
	}

	/**
	 * init the resize event for all mediaQueries.matches to re-render the ads.
	 *
	 * @deprecated we can't use the resize event, because some ads are delivering <script>-Tags which has to be executed by document.write, which is only available before DOMContentLoaded-event.
	 */
	initializeResize() {

		let matches = this.Ads.mediaQueries.matches;
		for ( let type in matches ) {
			let mq;

			if ( !matches.hasOwnProperty( type ) ) {
				continue;
			}

			mq = matches[ type ];
			mq.addListener( function( e ) {
				if ( e.matches ) {
					this.render( OA_output );
				}
			}.bind( this ) );
		}

	}

	/**
	 * Loading ads via inserting <script>-tag into footer.
	 */
	loadAds() {
		document.write( '<script src="' + this.buildHttpUrl() + '"></script>' );
	}

	/**
	 * Moving the ads after rendering them into their container.
	 */
	moveAds() {
		this.Ads.moveAds();
		this.Sponsors.moveAds();
	}

	/**
	 * Callback to prePrender the Ads.
	 *
	 * @param zones
	 */
	render( zones ) {
		zones = this.cleanupZones( zones );

		// we've to wrap the pre-rendered output into an element
		// to move the output later to there target container.
		document.write( '<div id="ads__banner">' );
		this.Ads.render( zones );
		this.Sponsors.render( zones );
		document.write( '</div>' );

		// rendering all found trackingPixel-only nodes into the end of <body>.
		this.Beacons.render( this.foundBeacons );
	}

	/**
	 * Creating the Script-URL to load all Ads.
	 *
	 * @return string
	 */
	buildHttpUrl() {

		let random = Math.floor( Math.random() * 99999999 ),
			url;

		url = AdManager.getEndpoint();
		url += "?zones=" + AdManager.getZoneHttpValue( this.Ads.data ) + AdManager.getZoneHttpValue( this.Sponsors.data );
		url += "&nz=1";
		url += "&r=" + random;
		url += "&block=1";
		url += "&blockcampaign=1";
		url += "&withtext=1";

		if ( document.charset ) {
			url += "&charset=" + document.charset;
		} else if ( document.characterSet ) {
			url += "&charset=" + document.characterSet
		}

		if ( window.location ) {
			url += "&loc=" + window.location;
		}
		if ( document.referrer ) {
			url += "&referer=" + document.referrer;
		}

		return url;
	}

	/**
	 * Removes empty zones.
	 *
	 * @param zones
	 *
	 * @returns Array cleanedZones
	 */
	cleanupZones( zones ) {
		let cleanedZones = [];

		for ( let name in zones ) {

			if ( !zones.hasOwnProperty( name ) ) {
				continue;
			}

			if ( zones[ name ].length < 1 ) {
				continue;
			}

			// detect slots with only a tracking pixel.
			if ( this.Beacons.isTrackingPixelOnly( zones[ name ] ) ) {
				this.foundBeacons.push( zones[ name ] );
				continue;
			}

			cleanedZones[ name ] = zones[ name ];
		}

		return cleanedZones;
	}

	/**
	 * Generating the ?zones={zone-http-value} for requesting the Ads.
	 * @param data
	 *
	 * @return string
	 */
	static getZoneHttpValue( data ) {
		let string = '';
		[].forEach.call( data, function( ad ) {
			string += ad.name + '=' + ad.zone + "|";
		} );
		return string;
	}

	/**
	 * @return string
	 */
	static getEndpoint() {
		return '//auslieferung.commindo-media-ressourcen.de/www/delivery/spc.php';
	}

}

export default AdManager;