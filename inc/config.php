<?php
/**
 * @package    WordPress
 * @subpackage SmashingMagazine_Theme
 * @maintainer Smashing Media <admin@smashing-media.com>
 */

date_default_timezone_set( 'Europe/Berlin' );

// page_posts_network.php: Anzahl Beitraege pro Seite
define( 'AMOUNT_POSTS_NETWORK_PER_PAGE', 14 );

// Position des Banners homepagepremedtargetwrapper auf home.php in der Liste mit den Network-Teasern
define( 'AD_HOMEPAGE_PREMIUM_ADTARGET_POSITION', 2 );

// Medium-Rectangle-Werbung nicht fuer Posts mit den folgenden IDs anzeigen
define( 'AD_MEDIUM_RECTANGLE_EXCLUDE', "/^(48484|36814|32669|8197|19849|26065)$/" );

// Google Search-Params - used in search-form.php, parts/search-mobile.php and inc/search.php for redirects
define( 'SMASH_SEARCH_CX',  'partner-pub-6779860845561969:5884617103' );
define( 'SMASH_SEARCH_COF', 'FORID:10' );
