/**
 * Creates the declare notice for Ads/Sponsors.
 *
 * @returns String|Element
 */
export const getDeclareNote = () => {

	if ( !AdsI18N ) {
		return '';
	}

	let $declare = document.createElement( 'p' );
	$declare.className = 'declare';
	$declare.appendChild( document.createTextNode( AdsI18N['Advertisement'] ) );

	return $declare;
};