// Layzr is installed via npm dependency
// @link https://github.com/callmecavs/layzr.js/tree/master#npm
//
import Layzr from 'layzr.js';

const options = {
	normal: 'data-src',
	retina: 'data-src-retina',
	threshold: 0
};
Layzr(options)
	.update()           // track initial elements
	.check()            // check initial elements
	.handlers(true);     // bind scroll and resize handlers
