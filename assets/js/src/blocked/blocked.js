const SELECTORS = {
	// the target is within /parts/ads/adblock-content.php
	target: 'blocked'
};

// localStorage keys.
const STORAGE_KEYS = {
	timestamp: 'blocked_timestamp',
	viewCount: 'blocked_viewCount'
};

class Blocked {

	constructor( storage ) {

		this.storage = storage;

		this.maxViewCount = 14;
		this.timestampNow = new Date().getTime();

		// 14 days * 24 hours * 60 minutes * 60 seconds * 1000
		this.timestampDiff = 14 * 24 * 60 * 60 * 1000;
		this.$target = document.getElementById( SELECTORS.target );
	}

	registerEvents() {

		let anchors = this.$target.getElementsByTagName( 'a' );
		[].forEach.call( anchors, function( $anchor ) {
			$anchor.addEventListener( 'click', function() {
				// + 1 month
				let newTimestamp = this.timestampNow + 30 * 24 * 60 * 60 * 1000;
				this.storage.setItem( STORAGE_KEYS.timestamp, newTimestamp );
			}.bind( this ) );
		}.bind( this ) );
	}

	maybeShow() {
		let viewCount = this.getViewCount();

		// nothing to do if Adblock is disabled.
		if ( !this.isBlocked() ) {
			return;
		}

		// show banner only {n} times, than stop for {n} days.
		if ( viewCount >= this.maxViewCount ) {
			// we've reached the maxViewCount, so ...
			// ... dont' show banner
			// ... reset viewCount to 0.
			this.setTimestamp( this.timestampNow + this.timestampDiff );
			this.setViewCount( 0 );
			return;
		}

		// don't show banner for {n} days.
		if ( this.getTimestamp() > this.timestampNow ) {
			return;
		}

		// otherwise set viewCount += 1 and show the $target.
		viewCount++;
		this.setViewCount( viewCount );
		this.$target.style.display = 'block';

		// only register events if the container is visible.
		this.registerEvents();
	}

	setViewCount( count ) {
		this.storage.setItem( STORAGE_KEYS.viewCount, count );
	}

	getViewCount() {
		let viewCount = this.storage.getItem( STORAGE_KEYS.viewCount );
		return viewCount === null ? 0 : viewCount;
	}

	setTimestamp( timestamp ) {
		this.storage.setItem( STORAGE_KEYS.timestamp, timestamp );
	}

	getTimestamp() {
		let timestamp = this.storage.getItem( STORAGE_KEYS.timestamp );
		return timestamp === null ? this.timestampNow : timestamp;
	}

	/**
	 * Function to test if the ads.js-Script is loaded and window.SmashingAds is defined.
	 * @returns {boolean}
	 */
	isBlocked() {
		return !window.SmashingAds;
	}
}

export default Blocked;