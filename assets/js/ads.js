(function e(t,n,r){function s(o,u){if(!n[o]){if(!t[o]){var a=typeof require=="function"&&require;if(!u&&a)return a(o,!0);if(i)return i(o,!0);var f=new Error("Cannot find module '"+o+"'");throw f.code="MODULE_NOT_FOUND",f}var l=n[o]={exports:{}};t[o][0].call(l.exports,function(e){var n=t[o][1][e];return s(n?n:e)},l,l.exports,e,t,n,r)}return n[o].exports}var i=typeof require=="function"&&require;for(var o=0;o<r.length;o++)s(r[o]);return s})({1:[function(require,module,exports){
/**
 * Class AdManager
 *
 * Managing ads and sponsors.
 */
'use strict';

exports.__esModule = true;

function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError('Cannot call a class as a function'); } }

var AdManager = (function () {
	function AdManager(Ads, Sponsors, Beacons) {
		_classCallCheck(this, AdManager);

		this.Ads = Ads;
		this.Sponsors = Sponsors;
		this.Beacons = Beacons;

		this.foundBeacons = [];
		window.onload = (function () {
			this.moveAds();
		}).bind(this);
	}

	/**
  * init the resize event for all mediaQueries.matches to re-render the ads.
  *
  * @deprecated we can't use the resize event, because some ads are delivering <script>-Tags which has to be executed by document.write, which is only available before DOMContentLoaded-event.
  */

	AdManager.prototype.initializeResize = function initializeResize() {

		var matches = this.Ads.mediaQueries.matches;
		for (var type in matches) {
			var mq = undefined;

			if (!matches.hasOwnProperty(type)) {
				continue;
			}

			mq = matches[type];
			mq.addListener((function (e) {
				if (e.matches) {
					this.render(OA_output);
				}
			}).bind(this));
		}
	};

	/**
  * Loading ads via inserting <script>-tag into footer.
  */

	AdManager.prototype.loadAds = function loadAds() {
		document.write('<script src="' + this.buildHttpUrl() + '"></script>');
	};

	/**
  * Moving the ads after rendering them into their container.
  */

	AdManager.prototype.moveAds = function moveAds() {
		this.Ads.moveAds();
		this.Sponsors.moveAds();
	};

	/**
  * Callback to prePrender the Ads.
  *
  * @param zones
  */

	AdManager.prototype.render = function render(zones) {
		zones = this.cleanupZones(zones);

		// we've to wrap the pre-rendered output into an element
		// to move the output later to there target container.
		document.write('<div id="ads__banner">');
		this.Ads.render(zones);
		this.Sponsors.render(zones);
		document.write('</div>');

		// rendering all found trackingPixel-only nodes into the end of <body>.
		this.Beacons.render(this.foundBeacons);
	};

	/**
  * Creating the Script-URL to load all Ads.
  *
  * @return string
  */

	AdManager.prototype.buildHttpUrl = function buildHttpUrl() {

		var random = Math.floor(Math.random() * 99999999),
		    url = undefined;

		url = AdManager.getEndpoint();
		url += "?zones=" + AdManager.getZoneHttpValue(this.Ads.data) + AdManager.getZoneHttpValue(this.Sponsors.data);
		url += "&nz=1";
		url += "&r=" + random;
		url += "&block=1";
		url += "&blockcampaign=1";
		url += "&withtext=1";

		if (document.charset) {
			url += "&charset=" + document.charset;
		} else if (document.characterSet) {
			url += "&charset=" + document.characterSet;
		}

		if (window.location) {
			url += "&loc=" + window.location;
		}
		if (document.referrer) {
			url += "&referer=" + document.referrer;
		}

		return url;
	};

	/**
  * Removes empty zones.
  *
  * @param zones
  *
  * @returns Array cleanedZones
  */

	AdManager.prototype.cleanupZones = function cleanupZones(zones) {
		var cleanedZones = [];

		for (var _name in zones) {

			if (!zones.hasOwnProperty(_name)) {
				continue;
			}

			if (zones[_name].length < 1) {
				continue;
			}

			// detect slots with only a tracking pixel.
			if (this.Beacons.isTrackingPixelOnly(zones[_name])) {
				this.foundBeacons.push(zones[_name]);
				continue;
			}

			cleanedZones[_name] = zones[_name];
		}

		return cleanedZones;
	};

	/**
  * Generating the ?zones={zone-http-value} for requesting the Ads.
  * @param data
  *
  * @return string
  */

	AdManager.getZoneHttpValue = function getZoneHttpValue(data) {
		var string = '';
		[].forEach.call(data, function (ad) {
			string += ad.name + '=' + ad.zone + "|";
		});
		return string;
	};

	/**
  * @return string
  */

	AdManager.getEndpoint = function getEndpoint() {
		return '//auslieferung.commindo-media-ressourcen.de/www/delivery/spc.php';
	};

	return AdManager;
})();

exports['default'] = AdManager;
module.exports = exports['default'];

},{}],2:[function(require,module,exports){
'use strict';

exports.__esModule = true;

function _interopRequireWildcard(obj) { if (obj && obj.__esModule) { return obj; } else { var newObj = {}; if (obj != null) { for (var key in obj) { if (Object.prototype.hasOwnProperty.call(obj, key)) newObj[key] = obj[key]; } } newObj['default'] = obj; return newObj; } }

function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError('Cannot call a class as a function'); } }

var _utils = require('./utils');

var Util = _interopRequireWildcard(_utils);

/**
 * Class Ads
 *
 * To use the Ads, just add some markup to your html:
 *
 *  <div class="oa_zone--ad" id="{unique-id}" data-ad-name="{name}" data-ad-zone="{zone-id}" data-ad-media="{media}"></div>
 *
 */

var Ads = (function () {
	function Ads(mediaQueries) {
		_classCallCheck(this, Ads);

		this.mediaQueries = mediaQueries;
		this.data = [];

		[].forEach.call(document.getElementsByClassName('oa_zone--ad'), this.parseAd.bind(this));
	}

	/**
  * Callback on forEach to parse ads in DOM.
  *
  * @param  $ad
  */

	Ads.prototype.parseAd = function parseAd($ad) {
		var id = $ad.hasAttribute('id') ? $ad.getAttribute('id') : '',
		    name = $ad.getAttribute('data-ad-name'),
		    zone = $ad.getAttribute('data-ad-zone'),
		    media = $ad.getAttribute('data-ad-media') || this.mediaQueries.defaultType;

		if (!name) {
			return;
		}
		if (!id) {
			return;
		}
		if (!zone) {
			return;
		}

		// remove whitespaces before and after name
		name = name.trim();

		// store in internal var for reuse.
		this.data.push({
			'name': name,
			'media': media,
			'id': id,
			'zone': zone,
			'elem': $ad
		});
	};

	/**
  * moving ads into their container.
  */

	Ads.prototype.moveAds = function moveAds() {
		for (var _name in this.data) {
			var ad = this.data[_name],
			    $ad = undefined;

			if (!ad.hasOwnProperty('adId')) {
				continue;
			}

			// reset the current innerHTML.
			ad.elem.innerHTML = "";

			$ad = document.getElementById(ad.adId);
			if ($ad) {
				ad.elem.appendChild($ad);
				var $parent = ad.elem.parentNode;
				$parent.insertBefore(Util.getDeclareNote(), $parent.firstChild);
			}
		}
	};

	/**
  * Rendering all Ads by the given zones.
  *
  * @param zones
  */

	Ads.prototype.render = function render(zones) {

		for (var _name2 in this.data) {

			var ad = this.data[_name2],
			    id = undefined;

			if (!zones.hasOwnProperty(ad.name)) {
				continue;
			}

			if (!this.mediaQueries.hasMatched(ad.media)) {
				continue;
			}
			// we've to use document.write, because the ads containing <script>-Tags which will not be
			// executed by innerHTML.
			id = 'source-' + ad.id;
			document.write('<div id="' + id + '">' + zones[ad.name] + '</div>');

			ad.adId = id;
		}
	};

	return Ads;
})();

exports['default'] = Ads;
module.exports = exports['default'];

},{"./utils":7}],3:[function(require,module,exports){
/**
 * Class Beacons
 *
 * The new ad-delivery of Commindo returns for empty Banner- and Sponsor-Slots a tracking pixel.
 * The Pixel has to be rendered somewhere.
 *
 * @issue https://github.com/inpsyde/smashing-magazin/issues/429
 */
'use strict';

exports.__esModule = true;

function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError('Cannot call a class as a function'); } }

var Beacons = (function () {
	function Beacons() {
		_classCallCheck(this, Beacons);
	}

	/**
  * Rendering all TrackingPixels by the given data-Array.
  *
  * @param data
  */

	Beacons.prototype.render = function render(data) {
		var $output = document.createElement('div');
		$output.id = 'ads__Beacons';
		$output.innerHTML = data.join("\n");
		document.body.appendChild($output);
	};

	/**
  * Test if the current markup only contains a tracking pixel.
  *
  * @param markup
  *
  * @returns boolean
  */

	Beacons.prototype.isTrackingPixelOnly = function isTrackingPixelOnly(markup) {
		var pattern = /^\s*<div id='beacon_[^>]*><img [^>]*><\/div>\s*$/;
		return pattern.test(markup);
	};

	/**
  * Extracting the id="beacon_{id}" from ads.
  *
  * @deprecated this function was used in cleanupZones(), but it seems it removes the impression-logging.
  *
  * @param markup
  *
  * @return string markup
  */

	Beacons.prototype.extractBeacon = function extractBeacon(markup) {
		var pattern = /\<div(?:\s+[^>]*)*\s+id\=('|")beacon_[a-z-0-9]+\1(?:\s+[^>]*\s*)*>[\s\S]*?\<\/div>/g;
		return markup.replace(pattern, '');
	};

	return Beacons;
})();

exports['default'] = Beacons;
module.exports = exports['default'];

},{}],4:[function(require,module,exports){
/**
 * class MediaQueries
 */
'use strict';

exports.__esModule = true;

function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError('Cannot call a class as a function'); } }

var MediaQueries = (function () {

	/**
  * @param types     contains all types for displaying mapped to a media query
  * @param defaultType
  */

	function MediaQueries(types, defaultType) {
		_classCallCheck(this, MediaQueries);

		this.defaultType = defaultType || 'desktop';
		this.types = types;

		if (!this.types.hasOwnProperty('all')) {
			this.types['all'] = 'all';
		}

		this.initializeMatcher();
	}

	MediaQueries.matchMediaExists = function matchMediaExists() {
		return window.matchMedia || window.msMatchMedia;
	};

	/**
  * Generate mapping in {this.matches} for all available types.
  */

	MediaQueries.prototype.initializeMatcher = function initializeMatcher() {

		// is window.matchMedia supported?
		var matchMediaExists = MediaQueries.matchMediaExists();

		/**
   * Contains all types mapped to "matchMedia" by excecuting the media query from this.types
   */
		this.matches = {};
		for (var type in this.types) {

			if (!this.types.hasOwnProperty(type)) {
				continue;
			}

			var query = this.types[type],
			    matches = true;
			if (matchMediaExists) {
				matches = window.matchMedia(query);
			}

			this.matches[type] = matches;
		}
	};

	/**
  * Function to detect if the given type is Visible.
  *
  * @return bool
  */

	MediaQueries.prototype.hasMatched = function hasMatched(type) {
		if (!this.matches[type]) {
			type = this.defaultType;
		}
		return this.matches[type].matches;
	};

	return MediaQueries;
})();

exports['default'] = MediaQueries;
module.exports = exports['default'];

},{}],5:[function(require,module,exports){
'use strict';

exports.__esModule = true;

function _interopRequireWildcard(obj) { if (obj && obj.__esModule) { return obj; } else { var newObj = {}; if (obj != null) { for (var key in obj) { if (Object.prototype.hasOwnProperty.call(obj, key)) newObj[key] = obj[key]; } } newObj['default'] = obj; return newObj; } }

function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError('Cannot call a class as a function'); } }

var _utils = require('./utils');

var Util = _interopRequireWildcard(_utils);

/**
 * class Sponsors
 *
 * To use sponsors, just add some markup to your html:
 *
 *      <div id="{unique-id}" class="oa_zone---sponsor" data-sponsor-lines="{int}" data-sponsor-media="{media}"></div>
 *
 */

var Sponsors = (function () {
	function Sponsors(mediaQueries, areas) {
		_classCallCheck(this, Sponsors);

		this.mediaQueries = mediaQueries;

		/**
   * Contains all ad areas which can be requested.
   */
		this.areas = areas;

		/**
   * contains the data which will be rendered
   */
		this.data = [];
		this.generateData(this.areas);

		this.elements = [];
		[].forEach.call(document.getElementsByClassName('oa_zone--sponsor'), this.addSponsor.bind(this));
	}

	/**
  * Callback while looping through all sponsors and storing them into {this.elements}
  *
  * @param $sponsor
  */

	Sponsors.prototype.addSponsor = function addSponsor($sponsor) {
		var id = $sponsor.hasAttribute('id') ? $sponsor.getAttribute('id') : '',
		    lines = $sponsor.getAttribute('data-sponsor-lines'),
		    media = $sponsor.getAttribute('data-sponsor-media') || this.mediaQueries.defaultType;

		this.elements.push({
			'id': id,
			'lines': parseInt(lines),
			'elem': $sponsor,
			'media': media
		});
	};

	/**
  * generating sponsor-data by the given areas.
  *
  * @param areas
  */

	Sponsors.prototype.generateData = function generateData(areas) {

		for (var id in areas) {

			if (!areas.hasOwnProperty(id)) {
				continue;
			}

			var area = areas[id];

			for (var i = 1; i <= area.count; i++) {
				var _name = id + ' ' + i;
				this.data.push({
					'name': _name,
					'area': id,
					'zone': area.zone
				});
			}
		}
	};

	/**
  * Rendering the Sponsor data by the given zones.
  *
  * @param zones
  */

	Sponsors.prototype.render = function render(zones) {
		var index = 0,
		    data = [];

		data = this.mergeZonesWithData(zones);
		data = this.shuffleData(data);

		for (var i = 0, len = this.elements.length; i < len; i++) {
			var element = this.elements[i],
			    markup = '',
			    id = undefined;

			for (var j = 0; j < element.lines; index++) {

				var sponsor = data.shift(),
				    _name2 = undefined,
				    cssClass = '',
				    sponsorSize = undefined,
				    hasSizeFull = undefined,
				    hasSizeHalf = undefined;

				if (!sponsor) {
					break;
				}

				if (!this.mediaQueries.hasMatched(sponsor.media)) {
					continue;
				}

				sponsorSize = this.getAreaSize(sponsor.area);

				hasSizeFull = this.hasSponsorWithSize(data, 1);
				hasSizeHalf = this.hasSponsorWithSize(data, 0.5);

				// do we currently exceed the max lines
				// and we have another teaser with size=1 or the current teaser has size=1
				// and wie have not other teasers with 0.5
				// .. than break and go to next element
				if (j + sponsorSize > element.lines && (hasSizeFull || sponsorSize === 1) && !hasSizeHalf) {
					data.push(sponsor);
					break;
				}

				// current sponsorSize = 1 and we're on a x.5 position
				// and we still have other items left in data with sponsorSize 0.5
				// ...than try next item
				if (sponsorSize === 1 && j % 1 !== 0 && hasSizeHalf) {
					data.push(sponsor);
					continue;
				}

				_name2 = sponsor.name;
				if (!zones.hasOwnProperty(_name2)) {
					continue;
				}

				if (this.areas[sponsor.area].hasOwnProperty('class')) {
					cssClass = ' class="' + this.areas[sponsor.area]['class'] + '"';
				}
				markup += '<li' + cssClass + '>' + zones[_name2] + '</li>';

				j += sponsorSize;
			}

			if (markup.length > 0) {

				id = 'source-' + element.id;

				// we've to use document.write, because the ads containing <script>-Tags which will not be
				// executed by innerHTML.
				document.write('<div id="' + id + '"><ul class="bnnr-list">' + markup + '</ul></div>');

				// reset the current html
				element.elem.innerHTML = "";

				// assign the Id to the element for later re-fetching it.
				element.adId = id;
			}
		}
	};

	/**
  * function to move all ads to its container after they are rendered.
  */

	Sponsors.prototype.moveAds = function moveAds() {

		for (var i = 0, len = this.elements.length; i < len; i++) {
			var element = this.elements[i],
			    $ad = undefined;

			// reset the current html
			element.elem.innerHTML = "";

			if (!element.hasOwnProperty('adId')) {
				continue;
			}

			$ad = document.getElementById(element.adId);
			if ($ad) {
				element.elem.appendChild($ad);
				var $parent = element.elem.parentNode;
				$parent.insertBefore(Util.getDeclareNote(), $parent.firstChild);
			}
		}
	};

	/**
  * Helper function which detects, if for a given collection of data the size is available.
  *
  * @param data
  * @param size
  * @returns {boolean}
  */

	Sponsors.prototype.hasSponsorWithSize = function hasSponsorWithSize(data, size) {
		var has = false;

		for (var i = 0, len = data.length; i < len; i++) {
			var sponsor = data[i];
			if (this.getAreaSize(sponsor.area) === size) {
				has = true;
				break;
			}
		}

		return has;
	};

	/**
  * Merging the {this.data} with {zones} and removing empty areas.
  *
  * @param zones
  *
  * @return object mergedData
  */

	Sponsors.prototype.mergeZonesWithData = function mergeZonesWithData(zones) {

		var mergedData = [],
		    mergedZones = {};

		for (var i = 0, len = this.data.length; i < len - 1; i++) {
			var area = this.data[i],
			    _name3 = area.name;

			if (!zones.hasOwnProperty(_name3)) {
				continue;
			}

			mergedData.push(area);
			mergedZones[_name3] = zones[_name3];
		}

		return mergedData;
	};

	/**
  * Returns the size of a sponsor-teaser within the area
  *
  * @param area
  *
  * return int
  */

	Sponsors.prototype.getAreaSize = function getAreaSize(area) {
		if (!this.areas.hasOwnProperty(area)) {
			return 1;
		}

		return this.areas[area].size;
	};

	/**
  * Shuffle this.data to get some random teasers
  */

	Sponsors.prototype.shuffleData = function shuffleData(data) {
		for (var n = 0, len = data.length; n < len - 1; n++) {
			var k = n + Math.floor(Math.random() * (len - n)),
			    temp = data[k];
			data[k] = data[n];
			data[n] = temp;
		}
		return data;
	};

	return Sponsors;
})();

exports['default'] = Sponsors;
module.exports = exports['default'];

},{"./utils":7}],6:[function(require,module,exports){
'use strict';

function _interopRequireDefault(obj) { return obj && obj.__esModule ? obj : { 'default': obj }; }

var _MediaQueries = require('./MediaQueries');

var _MediaQueries2 = _interopRequireDefault(_MediaQueries);

var _AdManager = require('./AdManager');

var _AdManager2 = _interopRequireDefault(_AdManager);

var _Ads = require('./Ads');

var _Ads2 = _interopRequireDefault(_Ads);

var _Sponsors = require('./Sponsors');

var _Sponsors2 = _interopRequireDefault(_Sponsors);

var _Beacons = require('./Beacons');

var _Beacons2 = _interopRequireDefault(_Beacons);

var sponsorAreas = {
	'Sponsor XXL': { // name of the area.
		'zone': 77, // ad-zone.
		'count': 5, // count of requested sponsors.
		'size': 1, // size of a sponsor-banner. 1 == full, 0.5 == half
		'media': 'desktop', // in which mediaQuery the data is available.
		'class': 'double' // class name which will be added to sponsor element
	},
	'VIS': {
		'zone': 70,
		'count': 5,
		'size': 0.5,
		'media': 'desktop',
		'class': ''
	},
	'spnsr ROS': {
		'zone': 24,
		'count': 10,
		'size': 0.5,
		'media': 'desktop'
	}
};

var mediaQueries = new _MediaQueries2['default']({
	'desktop': 'screen and (min-width: 63.75em)'
});

/**
 * @global SmashingAds
 * @type {AdManager}
 */
window.SmashingAds = new _AdManager2['default'](new _Ads2['default'](mediaQueries), new _Sponsors2['default'](mediaQueries, sponsorAreas), new _Beacons2['default']());

},{"./AdManager":1,"./Ads":2,"./Beacons":3,"./MediaQueries":4,"./Sponsors":5}],7:[function(require,module,exports){
/**
 * Creates the declare notice for Ads/Sponsors.
 *
 * @returns String|Element
 */
'use strict';

exports.__esModule = true;
var getDeclareNote = function getDeclareNote() {

	if (!AdsI18N) {
		return '';
	}

	var $declare = document.createElement('p');
	$declare.className = 'declare';
	$declare.appendChild(document.createTextNode(AdsI18N['Advertisement']));

	return $declare;
};
exports.getDeclareNote = getDeclareNote;

},{}]},{},[6]);
