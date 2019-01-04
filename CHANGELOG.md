#Smashing Magazine

##Changelog

### 6.3.5
* Temporary update: changed sidebar `producs.php` and `adblock-content.php` plus disabled `single-editors-note.php`.

### 6.3.4
* Fixed empty email for sponsorship in "sidebar-a" template.

### 6.3.3
* Updated email for sponsorship

### 6.3.2
* Disable conference sidebar widget.

### 6.3.1
* Fix tags for pages support affect secondary queries

### 6.3.0
* Added tag support for pages

### 6.2.0
* Added excerpt support for pages
* Introduced "Homepage page" template for pages that have to be listed on homepage
* Fix name of function called, `disable_emojis_tinymce` instead of `smash_disable_emojis_tinymce`

### 6.1.0
* updated `mc-counter.svg`.

### 6.0.6
* update for SmashingConf contents: replaced Freiburg with Barcelona or removed where applicable

### 6.0.5
* added an ID to the degreed button container, so Adblock can wipe it when enabled

### 6.0.4
* optimized two theme images (PNG -> TinyPNG)
* enqueued the tablesaw stylesheet also on pages
* new hierarchy for headings below the `<h4>` inside articles
* reintegration of the degreed button

### 6.0.3
* Improve management of "Removing Ads" Logic

### 6.0.2
* Added `title_reply`, `title_reply_to` and `title_after` args to `comment_form()` call in `comments.php`.
* Updated the `mc-counter.svg`
* Adjusted styling for responsive tables with the class `.article-table`
* Added in the script from degreed for their share button (currently removed)
* Created the CSS to make the degreed button somehow behave in our environment (currently removed)
* Adjusted the CSS for the comment form
* moved the Service Worker script, docs, template and documentation to the related plugin repository
* moved the `gruntfile.js` tasks and `package.json` parts from the theme to the plugin
* added a name to the `#` in the back to top link in order to fix an accessibility issue found at tenon.io ( https://tenon.io/testNow.php?url=https://www.smashingmagazine.com )
* replaced `.cur` for current pagination page with WP native `.current`, adjusted the CSS accordingly

### 6.0.1
* Added RSS-ad to theme.
* Added `composer.json` and `gitignore` file.
* after Florian Sander removed the falsy additional `<span>` I will fix the float issue with the ad for old articles
* added the "Inclusive Design Patterns" product to the sidebar

### 6.0.0
* splitting main stylesheet into several smaller ones. new structure:
  * above-the-fold.less
  * archive-pages.less
  * articles-only.less
  * below-articles.less
  * comments.less
  * contact.less
  * main.less (integrating above-the-fold.less)
  * search-results.less
* cleaning up some mistakes in main and above-the-fold CSS
* created a README for the split-up of our CSS

### 5.0.5
* splitting main stylesheet into several smaller ones. new structure:
  * above-the-fold.less
  * archive-pages.less
  * articles-only.less
  * below-articles.less
  * comments.less
  * contact.less
  * main.less (integrating above-the-fold.less)
  * search-results.less
* cleaning up some mistakes in main and above-the-fold CSS
* created a README for the split-up of our CSS

### 5.0.4
* Bugfix with the Service Worker not having the newest version for the assets

### 5.0.3
* Added `window.onload` to `smash_wp_footer_prerender_first_post`.
* Update for Mailchimp Subscribers Counter
* adding `touch-action: none` for all `<iframe>` elements
* first block of ads in the sidebar now has only one line (two small or one big banner) of banners
* replaced `<div>` with `<section>` for sidebar containers and the search container
* removed top padding from `<p>` tags inside the banner-wrapping containers
* ad-preloading container set to display: none
* reCaptcha out, Honeypot field in
* integrated preload for asnychronous stylesheet loading

### 5.0.2
* Added "inlineJS" as filter for "Smashing ServiceWorker".
* Updated Stream to 3.0.6.
* Editor's note anpassen
* Adblock Message anpassen
* Serviceworker Update

### 5.0.1
* Service worker post-deployment tweaks

### 5.0.0
* Serviceworker Integration

### 4.0.3
* fixed some IE8 bugs with non-displaying icons and displaying mobile headline on desktop
* sidebar conf update: Barcelona in. NY out.
* adding in notes on Advertisement spots in our sidebar per request by Markus
* optimizing SVGs and making them more accessible, fixing CSS background-images for IE
* removed unused SVG files
* updated the number of newsletter subscribers in the text
* moved Cody image from above-the-fold to main CSS as images are asynchronous by nature

### 4.0.2
* something's broken with the minifier or our contactform has issues. replacing attribute selector with class selector

### 4.0.1
* adding autocomplete attributes and values to the contactform input fields ([Autofill](https://html.spec.whatwg.org/multipage/forms.html#autofill))
* Prism now supports a few more languages
* `<b>` tag now supported (had no bold font-styling)
* lowered specificty for commentform container which had two IDs
* adding class "reason" to newsletterpage `<span>` element. had only an ID before.
* using class instead of ID for mailchimp newsletter signup styling
* using class instead of ID for commentform label styling
* removed all IDs not related to ads and replaced with classes for less specificity
* removed another pack of IDs partially related to ads
* Added missing `comment-reply`-script to theme
* fixing non-displaying icons for date in postmetadata (contact and 404 templates)
* fixing misaligned radiobuttons on contactform

### 4.0.0
* changing the classname for the release-date metadata for articles as it interferes with the class on the `<body>` element on date-archive pages
* preconnect and dns-prefetch happens earlier now
* as the link to the HTML5 shiv died we're self-hosting it now
* Added check for blocked `ads.js` to avoid `ReferenceError`.
* Changed the `prism.js` script. Removed the `DOMContentLoaded`-Event-Callback in script and called `Prism.highlightAll()` at bottom, because we load the script-file async and on `DOMContentLoaded`-Event.
* added codepen-embed.md as a readme (how to embed)
* changing the way we display images in articles because captions should run the whole width of articles
* merged #467 by Markus: update for mailchimp counter SVG
* adding in some styling for tablesaw tables
* added tablesaw documentation

### 3.9.9
* Updated User Role Editor Plugin.
* Updated Compress JPEG & PNG images.
* fixed a non-displaying border for article-table
* started integration of a fallback-mechanism for broken images

### 3.9.8
* Temporarily rempved WP Rocket.
* Updated Yoast SEO Premium to 3.2.1.
* Moved `prism.js` to `is_singular` condition.
* Removed `onload`-Event for `prism.js` and added just `async`.
* Removed `return false;` from `onclick`-Handler on share-links.

###3.9.7
* Updated Broken Link Checker to 1.11.2.
* Updated Compress JPEG & PNG images to 1.7.1.
* Updated Stream to 3.0.5.
* Updated User Role Editor to 4.25.
* Updated Yoast SEO Premium to 3.1.3.
* Fixed grammar mistake in Editor's note. "Hold on, Tiger!" makes more sense than "Hold on tiger".
* Replacing SFO Conf with Freiburg Conf advertisement
* added new version of Prism.js without onload-support (will need to be loaded with loadJS)

###3.9.6
* Replaced adblock and editors-note San Francisco contents with NY Contents
* Replaced broken new prism.js with old prism.js but added in the new languages - hopefully fixes the issue with code not being highlighted

###3.9.5
* Merged Pull-Request: Updated Mailchimp Counter SVG
* Updated prism.js to support more languages
* Fixed the position of social-share-links on small screens, float: right switch at 500px already
* Fixed an odd bug when jumping to `#top` where the top 10-15 pixels of the site would be cut off

### 3.9.4
* Fixed typo in `comments.php` before comment-form.
* Added `clicky.log()` to social share links.
* Adjusted styling of social-share-links (now button-ish-looking) beneath articles
* Documentation
* Update for Adblock Content
* Update for editor's note
* Update for the sidebar conf block
* Fixing SVG on mobile for newsletter page.
* Fixing alignment for the "Thanks for voting" message beneath comments

### 3.9.3
* Added reCaptcha to Smashing contact Form.

### 3.9.2

* added `touch-action: manipulate` to prevent the 300ms delay on tap
* linking newsletter-subscribers-counter in the sidebar to the newsletterpage
* removing text-shadow from codeexamples
* replaced sprite with single images for the meta-icons

### 3.9.1

* meta-icons are too big for Vitaly – scaling down

### 3.9
* added `above-the-fold.less` to `main.less`.
* Removed `loadCSS()` from print-Stylesheet.
* Moved `fastclick`, `codepen` and `lazy-images` to own files.
* Loaded `fastclick` and `lazy-images` via npm.
* Moved `localStorage`-Polyfill to `blocked.js`
* Added to `script.php` the single scripts for better loading via HTTP/2.
* Removed test-system from `Ads.js`.
* removed base64 encoded icons from meta – replaced with SVG sprite
* integrating sidebar-product and footer-product imagery into the theme
* again updated the message of `adblock-content.php`.
* added http-protocol to URL in prefetch and preconnect `<link>` tags

### 3.8.3

* Updated message of `adblock-content.php`.

### 3.8.2
* HTML minification in `comment.php`.
* Improved check for disabled Ads by testing for `window.SmashingAds`.
* Updated message of `adblock-content.php`.
* Added `Beacon`-class to `ads.js` to print out all beacon-only nodes within `OA_output`.

### 3.8.1

* Added `<link rel="prerender" />` to wp_footer for late loading the first article within archives/font_page.
* CommentRating
  * moved JavaScript-files back to Plugin for http/2 asset delivery.
  * improved nonces.
  * added escaping.
  * improved loading of script.
  * added nonces to every action.
  * added polyfills for Promise and XHR.
  * improved execution time.

###3.8
* Implemented "Blocked"-Script which detects activated AdBlock-Addon's and shows some notices for a while.
* added new testing ad url for test.smashing, added "extractTrackingPixel"-function, added babel.js to grunt
* removed whitespace from comments.php
* Updated User Role Editor to 4.23.2
* role="search" for searchforms
* bringing back the footnotes plugin
* bringing back the adblock content
* bigger font-size for comment-text
* not displaying the post-thumbs on small viewports / display: block at 610px vw (38.125em)
* added Mailchimpcounter to the theme-imagery
* adjusted the editor's note template

###3.7.8
* Updated User Role Editor to 4.22.
* Installed Broken Link Checker.
* Installed WPRocket.
* fixed grammar mistake in conf sidebar block
* Added a php block to the single-editors-note ad to make it disappear when a customfield is set

###3.7.7
* Updated Compress JPEG & PNG images from 1.5.0 to 1.6.0.
* Updated User Role Editor from 4.20.1 to 4.21.1.
* Added `smash_filter_wp_default_scripts_add_loadJS_to_embed()` to `wp_default_scripts` to load `wp-embed`-handle via `loadJS()`.
* fixed grammar mistake
* numbers in socialmedia nav adjusted
* remove prerender from head
* added an image to the sidebar block for the newsletter signup form (needs updates every 2 weeks)

###3.7.6
* removed hardcoded links.
* Added https-URL to Newsletter-Form.

###3.7.5
* Comment Submit Button lacks font-size (doesn't inherit from body) -> Fix
* altered the look of the editor's note (values by vf)
* raised the font-size for `<h5>` headings
* adjusted the font-size for code-examples (values by vf)

###3.7.4
* real fix for Skolar Italic. Possibly found the issue, if not revert to 3.7.3

###3.7.3
* Skolar Italic died in live and on smashingconf, works in test environment. reintegrating settings from before for only this font

###3.7.2
* addressed an error in minification process with webfonts.css

###3.7.1
* changes to the text in sidebar conf block

###3.7
* removed .eot and .ttf from webfonts.css -> new webfonts.min.css
* cleaned up above-the-fold less files
* cleaned up main less files
* added a link to our "Datenschutzerklärung" to the footer
* adjusted spacing for replies in comment-section to keep links below comment clickable
* added a template for the "Editor's Note" below articles
* integrated inline styles from "Editor's note" in main stylesheet
* fixed spacing around image in "Editor's note"
* fixed the line-height for comment-author's names
* removed all box-shadow from "post-thumbnails" (featured images on archive pages)
* removed library and mobile web handbook in `/sidebar/products.php`
* added Hardboiled Webdesign 2 to `/sidebar/products.php`
* added San Francisco Promo to `/sidebar/conf.php`
* created new set of banners `/ad/sidebar-d.php`
* moved two lines of banners from `/ad/sidebar-a.php` to `/ad/sidebar-d.php`
* removed error-causing ampersand from totalcache.php in W3TC Plugin
* removed gradient from longtags below articles in favor of solid color

###3.6.5
* excluded the sidebarblock "newsletter" from the page "the-smashing-newsletter" due to a double ID

###3.6.4
* Removed date from `is_page()` within `post/meta.php`-part.
* Improved check for `smash_get_term_list()` to avoid empty `<li>`-Tags.
* Removed break-word to stop code examples from wrapping in Chrome and other webkit

###3.6.3
* Some changes in Ads.js to execute JavaScript-Code within ads.

###3.6.2
* Re-added the Beacons in Ads.js for impression logging.

###3.6.1
* Updated WordPress SEO Premium to 3.0.6.
* Updated TinyPNG to 1.5.0.

###3.6
* Updated WordPress SEO Premium to 3.0.5.
* Complete Refactor of ads.js.
* added information regarding comment-editing-options (code examples and such)
* fixed a bug where full-width-images stayed at 500px width because the selector was overwritten
* raised the font-size for code examples to 1em from .9em
* adding support for the `<mark>` element in our CSS

###3.5.6
* removed double-entry for prerender
* added the print stylesheet to the noscript block
* fixing font-size and contrast-ratio for table headers on books page

###3.5.5
* bugfix: labels in contactform are working again. added missing id to input fields.
* #401 // fixed `<link rel="prerender"` urls for `is_front_page();` and `is_singular()`.
* bugfix: submit buttons are smaller in font-size than text-inputs

###3.5.4
* Updated WordPress SEO Premium to 3.0.3.
* Updated User Role Editor to 4.20.1.
* Testing the impact of loading page2 in the pagination with prerender
* changing the style for targeted headlines
* remove superflous asterisk from comment-form
* added a note to the text before the comment-form regarding required fields
* added HTML5 required attribute for feedback to users not reading the note
* because of accessibility reasons I darkened the color for form fields on focus (when typing)
* raised the font-size for form-fields and added padding to the textarea
* removed unused class being loaded with PHP (killed related code as well)

###3.5.3
* #398 // Changed time for cad-middle from 20 to 15.
* #398 // Improved RegEx for adding `id`-Attributes to headlines withing post_content.

###3.5.2
* Second logo in the main nav for desktop... having two instances.. argh

###3.5.1
* Assets from CSS were delivered via http -> now https
* The SVG version of our logo will now be delivered via https as well

###3.5
* Added new Sidebar banners "Sidebar Special 4" and "Sidebar 3" to theme.
* Added a new block for additional ads to the sidebar below the conference block
* Moved `loadCSS()`, `loadLocalStorageCSS()`, `loadOnloadJS()`, `loadJS()` from theme to own plugin.
* Fixed the margin between child-lis in the comment-section
* Fixed the font-size for child-uls
* Lowered the font-size for `<code>` examples in articles
* removed text-shadow from selected text
* update to the contact-form receivers
* fixed a spacing-issue for banners in the sidebar
* fixed another spacing-issue currently being fixed with inline-styles by Commindo
* removing all instances of sideblog references from the less-files
* removed a few superflous .less files

###3.4.7
* Changed CAD-Middle ad-zone from 22 to 110.

###3.4.6
* Fixed broken "cad-middle"-Ad in content before 3. <h3>.
* Updated "User Role Editor" from 4.19.2 to 4.19.3.
* Updated "Compress JPEG & PNG images" from 1.3.2 to 1.4.0.

###3.4.5
* Adjusting (raising) the font-size for body copy
* Added pinned site icon for Safari9 to the header metadata
* Optimized rel-attribute for preconnecting and dns-prefetching
* Removed preconnect for analytics - unneeded overhead
* Updated sidebar contents for conf.php -> Oxford 2016

###3.4.4
* Updated antispam-bee from 2.6.7 to 2.6.8.
* Updated tiny-compress-images from 1.3.1 to 1.3.2.
* Updated user-role-editor from 4.19 to 4.19.2.
* Removed roost.js from onload.js
* Added an invisible label to the newsletter signup form in the sidebar (accessibility)
* Added the counter to the ID of search-forms as we had duplicates
* Removed title-attribute matching the link text (screenreader reads both)
* Removed role="button" from mobile-nav and -search togglelinks as they're links and not buttons
* Removed role="button" from closing links for mobile-nav and -search

###3.4.3
* fixed include of `tablesaw.js`.

###3.4.2
* fixed non-existing .min-Version of `prism.js`.

###3.4.1
* skipping 3.4.1 because FAIL =D

###3.4
* added loadJS and improved loading of `onload.js` and `prism.js`.
* Introduced new `loadCSS`-data attribute on styles.
* Introduced new `loadJS`- and `loadOnloadJS`-data attribute on scripts.
* fixing img spacing when rounded-corners are enabled with a class
* getting rid of advertisement-link being displayed when adblock is on

###3.3.9
* revert to onload.js and footer.js of version 3.3.4 with some enhancements of 3.3.5.
* included additionally loadCSS.js for easier loading of Stylesheets in footer.

###3.3.8
* lazyloading footer-/sidebar-images apart from Newsletter and productimagery, as that's above the fold and does not require lazy-loading
* fixed the logo being unclickable when the mobile-nav/-search had been active

###3.3.7
* re-added json_encode fix for W3TC

###3.3.6
* Fixed broken protocol for CommentRating on live system.

###3.3.5
* added an SVG version of our logo with srcset/now also in the desktop-header
* updating the way `<sup>` and `<sub>` are aligned - destroyed the line-height of the line they are on because of `vertical-align` being used instead of relative positioning
* Cleanup of extended-comments.js
* Fixed unused FastClick.js
* Added i18n to strings in Theme template.
* Implemented JS-enhancements for toggleButtons in theme.
* Improved loading of JavaScript
* Removed some old functions in style.php and script.php, moved helpers to helper.php,
* Renamend onload.js to smashing-addons.js
* Added prism.js to smashing-addons.js.
* Improved style loading handling by removing duplicated code and introduced [loadCSS()](https://github.com/filamentgroup/loadCSS).

###3.3.4
* better structure: h2 instead of h5 for the mobile nav headlines

###3.3.3
* replacing fake headlines for the mobile navigation with real `<h5>`s
* adjusting the CSS related to the changes in the markup

###3.3.2
* Smaller logo in mobile and tablet view

###3.3.1
* Fixing vertical spacing between comments

###3.3
* Fixing the position of comment-numbers
* raising the padding values for comment paragraphs according to vf's wishes
* fixing the related articles separator
* replaced the old CDN URL with the new one where needed

###3.2.1
* Testing performance helpers like `preconnect` and `dns-prefetch` in order to serve third-party contents faster. This could come very handy with our ad-banners, which are our tightest bottleneck.

###3.2
* Allowed `unfilterd_html` for Editors in MultiSite environment.
* Fixed iPhone LazyLoading for Gravatar's with 2x size.

###3.1.2
* adjusted the icon size for deeplinked headlines as vf finds them to be too big
* moved styles from above-the-fold to the main stylesheet - improved rendering-time
* fixed invisible-text bug happening when invisible text elements have padding

###3.1.1
* removed `.h` from IE8 stylesheet as it crashes the layout

###3.1
* added date to contact form subject for unique mails.
* added link element to anchor headlines for generating permalinks.
* added icon for link element on anchor headlines in PNG and SVG format.
* styled the link icon for deeplinked headlines
* lowered the padding for labels in the contact form
* added styles for a "sold out" sign on the _Tickets_ page
* updated WordPress SEO to 2.3.4.

###3.0.2
* deep-linked headlines are visually enhanced when jumped to
* fixed line-height for `br + em` and `figcaption`.

###3.0.1
* ads - fixed broken the_content ads to work properly with the new anchors and headlines.

###3.0
* added id's to headline tags on `is_single()` for better anchor usage.

###2.9.3
* text in sidebar again

###2.9.2
* crunched a few images in the assets folder after replacing some of the Win8 icons
* text in the sidebar block got replaced bcs Smashing Book 5 arrived

###2.9.1
* fixed non-existing author, when author has no posts.
* adjusted values for Smashing Workshops Page

###2.9
* removed output of webfonts via `<noscript>`-Tag.
* removed old unused Plugins.
* added `WP_Date_Query`-support to "remove-old-revisions"-Plugin.
* added "remove blog slug" as mu-plugin.
* Moved all comments from Post 54491 to 53248.
* removed height: auto from iframes. we have a standard height of 400px for codepen embeds and the aspect-ratio hack-fix-trick for all embedded videos

###2.8.2
* re-added gray color for striked-through prices above buy-buttons

###2.8.1
* need to add a border to popular tags due to removal of surrounding p-tag

###2.8
* switched a recepient's email address for the contactform
* altered and added styles for Vitaly (Announcement Articles)
* changed the markup for popular tags on category archive pages in order to reduce complexity in the CSS
* gathered selectors with the same color to reduce filesize for stylesheets, needs refinement but good for now
* removed width: auto from .sn li a which had an !important and didn't do anything O_o wtf
* removed other styles from the sections nav, which were repeating
* removed class from h3 in term.php for popular tags. wasn't used after all.
* further removed styles unneeded (legacy code)

###2.7.1
* adjusted font-size for smashing-workshops page

###2.7
* removed optimus.
* added [Compress JPEG & PNG images](https://wordpress.org/plugins/tiny-compress-images/).
* removed general touch-action: none rule from links and buttons as it prevents scrolling in most mobile browsers
* added styles for Vitaly (workshops-page)

###2.6
* first huge heap editorial styles is integrated and inline-styles can finally be removed from the articles

###2.5.8
* workshop announcement styles added to the main stylesheet

###2.5.7
* added more styles provided by vf to tables
* cleaned up the CSS for the buy-buttons (too many superflous attributes)

###2.5.6
* added more padding to article-table tds (vf suggested the values to improve readability)

###2.5.5
* Content update in the sidebar conference block

###2.5.4
* adjusted a top-margin for the buy buttons

###2.5.3
* hotfix for padding

###2.5.1
* kicking webfonts.css when JS is not an option
* added lazyloaded images to the sidebar where applicable
* integration of reusable styles (e.g. toggle-table, buy-buttons etc.)

###2.5
* re-added the img.js script (s. comment in the file)
* added a max-width to iframes
* Fixed ID-Bug in post-pagination.
* added class .rh for red-colored-headings
* fixed the sections navigation padding values
* updated the products.php for the sidebar.
* fixed links in the sidebar due to new assets folder structure

###2.4.2
* Updated the conf.php for the sidebar with Barcelona contents

###2.4.1
* Fixed the sixteenpixels template. Uploaded related files to /uploads dir on the server.

###2.4
* Improved folder-structure for parts and page-templates.
* Added LazyLoading to footer products and related articles.
* Fixed a bug with the mobile menu being visible on desktop

###2.3.1
* Improved folder-structure for theme functions by separating frontend-scripts into own folder.

###2.3
* Improved Grunt tasks.
* Added JavaScript and JavaScript-Testing Grunt tasks.
* Moved assets to own folder "assets".
* Removed tabindex on comment form.
* Removed tabindex.js.
* Added CSS-class .fwi for full-width-images with centered figcaption.
* Added CSS-class .bull for Imprint Page Bullet Points
* Fixed double-use of property for microdata in article headlines
* Implemented LazyLoading for Gravatars.

###2.2.3 HOTFIX!
* Fixed a spacing-issue with child-comments
(only changed main.min.css and style.css on the server via FTP,
version in style.css back to 2.2.2 locally)

###2.2.2
* enabled "Advertise with us" to be adblocked (needs class ed-us)

###2.2.1
* fixed false positioning of post-thumbnails

###2.2
* ad-cleanup
* updated numbers of subscribers/followers/friends for newsletter, twitter and facebook accounts
* updated search script for integrated Google Search
* New Search Results Page
* Commented the sideblog out of the main-loop
* padding for conference block in the sidebar adjusted
* fixed an issue with the label for the new ad-banner before h3s
* fixed an issue with "Advertise with us" in the sidebar not being clickable
* fixed an issue with borders having different values in the sidebar
* updated the print stylesheet in order to fix issues with the new markup and the display value of tags
* removed em units from line-height in favor of number values

###2.1.1
* removed Crazyegg from footer.php

###2.1
* Updated AntispamBee 2.6.6 to 2.6.7.
* Commented out the sideblog
* added crazyegg analytics to footer.php until Monday

###2.0.3
* corrected the filename for webfonts.css (before: web-fonts.css)
* added footnotes to the display: none rule

###2.0.2
* label position in desktop view corrected

###2.0.1
* corrections because of customfonts

###2.0
* new mobile navigation and search

###1.9
* implemented auto-ad for articles which are at least 20 days old and have more than three `<h3>` headings
* applied styling to the new ad-banner
* new version of ads.js
* corrected a falsey link in the footer

###1.8.5
* removed a falsey box-shadow from the logo container

###1.8.4
* updated productlink in sidebar and footer

###1.8.3
* Problem with Wordpress SEO Premium -> you're out!

###1.8.2
* style.css version
* added small fix to load Vimeo oEmbed with correct width and height params

###1.8.1 haz fail

###1.8
* updated Antispam Bee from 2.6.5 to 2.6.6
* updated User Role Editor from 4.18.3 to 4.18.4
* updated WordPress SEO from 1.7.4 to 2.1.1
* Added [codepen_embed %settings% caption="{text}"] shortcode to theme

###1.7.2
* Added touch-action: none for links
* removed border from logo list-item at 90.625em mediaquery

###1.7.1
* Text in Conference Sidebarblock updated

###1.7
* Removed Emoji which are delivered automatically in WordPress 4.2
* Corrected the code for IE<=9 Favicon
* Corrected hover-behaviour for current-page nav-items (books, ebooks...)

###1.6.5
* Links in Sidebar and Footer now pointing at the shop
* Installed Optimus for automated image compression (test)

###1.6.4
* content update in the footer

###1.6.3
* fixed a link in the sidebar

###1.6.2
* added support for big and small images in related articles
* added Smashing Book #5 contents to the sidebar, removed Smashing Book #4
* moved Mobile Web Handbook down one step

###1.6.1
* changed text-content in the sidebar for Smashing Conference

###1.6
* deleted WP-Markdown
* added sanitizing for msg-input-field
* added new "inpsyde-related-posts"-Plugin
* updated Antispam Bee from 2.6.4 to 2.6.5
* updated WordPress SEO from 1.7.3.3 to 1.7.4

###1.5.3
* temp fix for not working CDN-urls in `wp_localize_script`
* updated Plugin: W3TC
* updated Plugin: wordpress-seo
* updated Plugin: user-role-editor

###1.5.2
* hotfix release
* moved localstorage.js to `wp_head`-Hook
* added missing <noscript> for webfonts.css


###1.5.1
* hotfix release
* fixed broken onload.min.js for lazyloading gravatars
* added missing <noscript> for main.css

###1.5
* added missing wp-css classes
* fixed related article links
* improved 404 error page
* improved loading of above-the-fold.css via `wp_enqueue_style()`

###1.2.1 (2015.1.2.1)
* fixed related article permalinks
* fixed broken twitter link text

###1.2 (2015.1.2)
* fixed broken custom loop widget
* added new ads in sidebar
* replaced obsolete old implementation of main-classes with `body_class()`
* further optimizations of templates

###1.1 (2015.1.1)
* removed obsolete, hardcoded and unused code
* removed comments popup-template
* removed old not used archive and tag-templates
* removed deprecated.php
* added new template_parts
* merged article templates to one template
* removed static javascript calls from footer to `wp_footer`-Hook
* improved code styling
* improved code docs
* improved css selectors
* improved js
* improved ad loading in templates


###1.0 (2015.1.0)
* Init commit 2015
* removed stable and introduced tags
