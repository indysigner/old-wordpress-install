import MediaQueries from './MediaQueries';
import AdManager from './AdManager';
import Ads from './Ads';
import Sponsors from './Sponsors';
import Beacons from './Beacons';

const sponsorAreas = {
	'Sponsor XXL': {        // name of the area.
		'zone' : 77,        // ad-zone.
		'count': 5,         // count of requested sponsors.
		'size' : 1,         // size of a sponsor-banner. 1 == full, 0.5 == half
		'media': 'desktop', // in which mediaQuery the data is available.
		'class': 'double'   // class name which will be added to sponsor element
	},
	'VIS'        : {
		'zone' : 70,
		'count': 5,
		'size' : 0.5,
		'media': 'desktop',
		'class': ''
	},
	'spnsr ROS'  : {
		'zone' : 24,
		'count': 10,
		'size' : 0.5,
		'media': 'desktop'
	}
};

const mediaQueries = new MediaQueries( {
	'desktop': 'screen and (min-width: 63.75em)'
} );

/**
 * @global SmashingAds
 * @type {AdManager}
 */
window.SmashingAds = new AdManager(
	new Ads( mediaQueries ),
	new Sponsors( mediaQueries, sponsorAreas ),
	new Beacons()
);