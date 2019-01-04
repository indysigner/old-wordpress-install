import * as Util from './utils';

/**
 * class Sponsors
 *
 * To use sponsors, just add some markup to your html:
 *
 *      <div id="{unique-id}" class="oa_zone---sponsor" data-sponsor-lines="{int}" data-sponsor-media="{media}"></div>
 *
 */
class Sponsors {

	constructor( mediaQueries, areas ) {
		this.mediaQueries = mediaQueries;

		/**
		 * Contains all ad areas which can be requested.
		 */
		this.areas = areas;

		/**
		 * contains the data which will be rendered
		 */
		this.data = [];
		this.generateData( this.areas );

		this.elements = [];
		[].forEach.call( document.getElementsByClassName( 'oa_zone--sponsor' ), this.addSponsor.bind( this ) );
	}

	/**
	 * Callback while looping through all sponsors and storing them into {this.elements}
	 *
	 * @param $sponsor
	 */
	addSponsor( $sponsor ) {
		let id = $sponsor.hasAttribute( 'id' ) ? $sponsor.getAttribute( 'id' ) : '',
			lines = $sponsor.getAttribute( 'data-sponsor-lines' ),
			media = $sponsor.getAttribute( 'data-sponsor-media' ) || this.mediaQueries.defaultType;

		this.elements.push( {
			'id'   : id,
			'lines': parseInt( lines ),
			'elem' : $sponsor,
			'media': media
		} );
	}

	/**
	 * generating sponsor-data by the given areas.
	 *
	 * @param areas
	 */
	generateData( areas ) {

		for ( let id in areas ) {

			if ( !areas.hasOwnProperty( id ) ) {
				continue;
			}

			let area = areas[ id ];

			for ( let i = 1; i <= area.count; i++ ) {
				let name = id + ' ' + i;
				this.data.push( {
					'name': name,
					'area': id,
					'zone': area.zone
				} );

			}
		}

	}

	/**
	 * Rendering the Sponsor data by the given zones.
	 *
	 * @param zones
	 */
	render( zones ) {
		let index = 0,
			data = [];

		data = this.mergeZonesWithData( zones );
		data = this.shuffleData( data );

		for ( let i = 0, len = this.elements.length; i < len; i++ ) {
			let element = this.elements[ i ],
				markup = '',
				id;

			for ( let j = 0; j < element.lines; index++ ) {

				let sponsor = data.shift(),
					name,
					cssClass = '',
					sponsorSize,
					hasSizeFull,
					hasSizeHalf;

				if ( !sponsor ) {
					break;
				}

				if ( !this.mediaQueries.hasMatched( sponsor.media ) ) {
					continue;
				}

				sponsorSize = this.getAreaSize( sponsor.area );

				hasSizeFull = this.hasSponsorWithSize( data, 1 );
				hasSizeHalf = this.hasSponsorWithSize( data, 0.5 );

				// do we currently exceed the max lines
				// and we have another teaser with size=1 or the current teaser has size=1
				// and wie have not other teasers with 0.5
				// .. than break and go to next element
				if (
					(
						j + sponsorSize
					) > element.lines
					&& (
						hasSizeFull || sponsorSize === 1
					)
					&& !hasSizeHalf
				) {
					data.push( sponsor );
					break;
				}

				// current sponsorSize = 1 and we're on a x.5 position
				// and we still have other items left in data with sponsorSize 0.5
				// ...than try next item
				if ( sponsorSize === 1 && j % 1 !== 0 && hasSizeHalf ) {
					data.push( sponsor );
					continue;
				}

				name = sponsor.name;
				if ( !zones.hasOwnProperty( name ) ) {
					continue;
				}

				if ( this.areas[ sponsor.area ].hasOwnProperty( 'class' ) ) {
					cssClass = ' class="' + this.areas[ sponsor.area ].class + '"';
				}
				markup += '<li' + cssClass + '>' + zones[ name ] + '</li>';

				j += sponsorSize;
			}

			if ( markup.length > 0 ) {

				id = 'source-' + element.id;

				// we've to use document.write, because the ads containing <script>-Tags which will not be
				// executed by innerHTML.
				document.write( '<div id="' + id + '"><ul class="bnnr-list">' + markup + '</ul></div>' );

				// reset the current html
				element.elem.innerHTML = "";

				// assign the Id to the element for later re-fetching it.
				element.adId = id;
			}
		}
	}

	/**
	 * function to move all ads to its container after they are rendered.
	 */
	moveAds() {

		for ( let i = 0, len = this.elements.length; i < len; i++ ) {
			let element = this.elements[ i ],
				$ad;

			// reset the current html
			element.elem.innerHTML = "";

			if ( !element.hasOwnProperty( 'adId' ) ) {
				continue;
			}

			$ad = document.getElementById( element.adId );
			if ( $ad ) {
				element.elem.appendChild( $ad );
				let $parent = element.elem.parentNode;
				$parent.insertBefore( Util.getDeclareNote(), $parent.firstChild );
			}
		}

	}

	/**
	 * Helper function which detects, if for a given collection of data the size is available.
	 *
	 * @param data
	 * @param size
	 * @returns {boolean}
	 */
	hasSponsorWithSize( data, size ) {
		let has = false;

		for ( let i = 0, len = data.length; i < len; i++ ) {
			let sponsor = data[ i ];
			if ( this.getAreaSize( sponsor.area ) === size ) {
				has = true;
				break;
			}

		}

		return has;
	}

	/**
	 * Merging the {this.data} with {zones} and removing empty areas.
	 *
	 * @param zones
	 *
	 * @return object mergedData
	 */
	mergeZonesWithData( zones ) {

		let mergedData = [],
			mergedZones = {};

		for ( let i = 0, len = this.data.length; i < len - 1; i++ ) {
			let area = this.data[ i ],
				name = area.name;

			if ( !zones.hasOwnProperty( name ) ) {
				continue;
			}

			mergedData.push( area );
			mergedZones[ name ] = zones[ name ];

		}

		return mergedData;
	}

	/**
	 * Returns the size of a sponsor-teaser within the area
	 *
	 * @param area
	 *
	 * return int
	 */
	getAreaSize( area ) {
		if ( !this.areas.hasOwnProperty( area ) ) {
			return 1;
		}

		return this.areas[ area ].size;
	}

	/**
	 * Shuffle this.data to get some random teasers
	 */
	shuffleData( data ) {
		for ( let n = 0, len = data.length; n < len - 1; n++ ) {
			let k = n + Math.floor( Math.random() * (
							len - n
						) ),
				temp = data[ k ];
			data[ k ] = data[ n ];
			data[ n ] = temp;
		}
		return data;
	}

}

export default Sponsors;