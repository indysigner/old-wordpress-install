(function e(t,n,r){function s(o,u){if(!n[o]){if(!t[o]){var a=typeof require=="function"&&require;if(!u&&a)return a(o,!0);if(i)return i(o,!0);var f=new Error("Cannot find module '"+o+"'");throw f.code="MODULE_NOT_FOUND",f}var l=n[o]={exports:{}};t[o][0].call(l.exports,function(e){var n=t[o][1][e];return s(n?n:e)},l,l.exports,e,t,n,r)}return n[o].exports}var i=typeof require=="function"&&require;for(var o=0;o<r.length;o++)s(r[o]);return s})({1:[function(require,module,exports){
'use strict';

exports.__esModule = true;

function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError('Cannot call a class as a function'); } }

var SELECTORS = {
	// the target is within /parts/ads/adblock-content.php
	target: 'blocked'
};

// localStorage keys.
var STORAGE_KEYS = {
	timestamp: 'blocked_timestamp',
	viewCount: 'blocked_viewCount'
};

var Blocked = (function () {
	function Blocked(storage) {
		_classCallCheck(this, Blocked);

		this.storage = storage;

		this.maxViewCount = 14;
		this.timestampNow = new Date().getTime();

		// 14 days * 24 hours * 60 minutes * 60 seconds * 1000
		this.timestampDiff = 14 * 24 * 60 * 60 * 1000;
		this.$target = document.getElementById(SELECTORS.target);
	}

	Blocked.prototype.registerEvents = function registerEvents() {

		var anchors = this.$target.getElementsByTagName('a');
		[].forEach.call(anchors, (function ($anchor) {
			$anchor.addEventListener('click', (function () {
				// + 1 month
				var newTimestamp = this.timestampNow + 30 * 24 * 60 * 60 * 1000;
				this.storage.setItem(STORAGE_KEYS.timestamp, newTimestamp);
			}).bind(this));
		}).bind(this));
	};

	Blocked.prototype.maybeShow = function maybeShow() {
		var viewCount = this.getViewCount();

		// nothing to do if Adblock is disabled.
		if (!this.isBlocked()) {
			return;
		}

		// show banner only {n} times, than stop for {n} days.
		if (viewCount >= this.maxViewCount) {
			// we've reached the maxViewCount, so ...
			// ... dont' show banner
			// ... reset viewCount to 0.
			this.setTimestamp(this.timestampNow + this.timestampDiff);
			this.setViewCount(0);
			return;
		}

		// don't show banner for {n} days.
		if (this.getTimestamp() > this.timestampNow) {
			return;
		}

		// otherwise set viewCount += 1 and show the $target.
		viewCount++;
		this.setViewCount(viewCount);
		this.$target.style.display = 'block';

		// only register events if the container is visible.
		this.registerEvents();
	};

	Blocked.prototype.setViewCount = function setViewCount(count) {
		this.storage.setItem(STORAGE_KEYS.viewCount, count);
	};

	Blocked.prototype.getViewCount = function getViewCount() {
		var viewCount = this.storage.getItem(STORAGE_KEYS.viewCount);
		return viewCount === null ? 0 : viewCount;
	};

	Blocked.prototype.setTimestamp = function setTimestamp(timestamp) {
		this.storage.setItem(STORAGE_KEYS.timestamp, timestamp);
	};

	Blocked.prototype.getTimestamp = function getTimestamp() {
		var timestamp = this.storage.getItem(STORAGE_KEYS.timestamp);
		return timestamp === null ? this.timestampNow : timestamp;
	};

	/**
  * Function to test if the ads.js-Script is loaded and window.SmashingAds is defined.
  * @returns {boolean}
  */

	Blocked.prototype.isBlocked = function isBlocked() {
		return !window.SmashingAds;
	};

	return Blocked;
})();

exports['default'] = Blocked;
module.exports = exports['default'];

},{}],2:[function(require,module,exports){
// LocalStorage Polyfill ___________________________
// @link https://gist.github.com/remy/350433
//
'use strict';

if (typeof window.localStorage == 'undefined' || typeof window.sessionStorage == 'undefined') (function () {

	var Storage = function Storage(type) {
		function createCookie(name, value, days) {
			var date, expires;

			if (days) {
				date = new Date();
				date.setTime(date.getTime() + days * 24 * 60 * 60 * 1000);
				expires = "; expires=" + date.toGMTString();
			} else {
				expires = "";
			}
			document.cookie = name + "=" + value + expires + "; path=/";
		}

		function readCookie(name) {
			var nameEQ = name + "=",
			    ca = document.cookie.split(';'),
			    i,
			    c;

			for (i = 0; i < ca.length; i++) {
				c = ca[i];
				while (c.charAt(0) == ' ') {
					c = c.substring(1, c.length);
				}

				if (c.indexOf(nameEQ) == 0) {
					return c.substring(nameEQ.length, c.length);
				}
			}
			return null;
		}

		function setData(data) {
			data = JSON.stringify(data);
			if (type == 'session') {
				window.name = data;
			} else {
				createCookie('localStorage', data, 365);
			}
		}

		function clearData() {
			if (type == 'session') {
				window.name = '';
			} else {
				createCookie('localStorage', '', 365);
			}
		}

		function getData() {
			var data = type == 'session' ? window.name : readCookie('localStorage');
			return data ? JSON.parse(data) : {};
		}

		// initialise if there's already data
		var data = getData();

		return {
			length: 0,
			clear: function clear() {
				data = {};
				this.length = 0;
				clearData();
			},
			getItem: function getItem(key) {
				return data[key] === undefined ? null : data[key];
			},
			key: function key(i) {
				// not perfect, but works
				var ctr = 0;
				for (var k in data) {
					if (ctr == i) return k;else ctr++;
				}
				return null;
			},
			removeItem: function removeItem(key) {
				delete data[key];
				this.length--;
				setData(data);
			},
			setItem: function setItem(key, value) {
				data[key] = value + ''; // forces the value to a string
				this.length++;
				setData(data);
			}
		};
	};

	if (typeof window.localStorage == 'undefined') window.localStorage = new Storage('local');
	if (typeof window.sessionStorage == 'undefined') window.sessionStorage = new Storage('session');
})();

},{}],3:[function(require,module,exports){
/**
 *
 * localStorage-polyfill is in onload.js. Maybe we should extract it and delivery the polyfill on its own.
 *
 * @issue https://github.com/inpsyde/smashing-magazin/issues/413
 */
'use strict';

function _interopRequireDefault(obj) { return obj && obj.__esModule ? obj : { 'default': obj }; }

var _Blocked = require('./Blocked');

var _Blocked2 = _interopRequireDefault(_Blocked);

require('./LocalStorage');

var blocked = new _Blocked2['default'](window.localStorage);
blocked.maybeShow();

},{"./Blocked":1,"./LocalStorage":2}]},{},[3]);
