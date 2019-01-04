/**
 * class MediaQueries
 */
class MediaQueries {

	/**
	 * @param types     contains all types for displaying mapped to a media query
	 * @param defaultType
	 */
	constructor( types, defaultType ) {
		this.defaultType = defaultType || 'desktop';
		this.types = types;

		if ( !this.types.hasOwnProperty( 'all' ) ) {
			this.types[ 'all' ] = 'all';
		}

		this.initializeMatcher();
	}

	static matchMediaExists() {
		return (
			window.matchMedia || window.msMatchMedia
		);
	}

	/**
	 * Generate mapping in {this.matches} for all available types.
	 */
	initializeMatcher() {

		// is window.matchMedia supported?
		let matchMediaExists = MediaQueries.matchMediaExists();

		/**
		 * Contains all types mapped to "matchMedia" by excecuting the media query from this.types
		 */
		this.matches = {};
		for ( let type in this.types ) {

			if ( !this.types.hasOwnProperty( type ) ) {
				continue;
			}

			let query = this.types[ type ],
				matches = true;
			if ( matchMediaExists ) {
				matches = window.matchMedia( query );
			}

			this.matches[ type ] = matches;
		}

	}

	/**
	 * Function to detect if the given type is Visible.
	 *
	 * @return bool
	 */
	hasMatched( type ) {
		if ( !this.matches[ type ] ) {
			type = this.defaultType;
		}
		return this.matches[ type ].matches;
	}
}

export default MediaQueries;