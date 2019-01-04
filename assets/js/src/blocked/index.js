/**
 *
 * localStorage-polyfill is in onload.js. Maybe we should extract it and delivery the polyfill on its own.
 *
 * @issue https://github.com/inpsyde/smashing-magazin/issues/413
 */
import Blocked from './Blocked';
import './LocalStorage';

const blocked = new Blocked( window.localStorage );
blocked.maybeShow();