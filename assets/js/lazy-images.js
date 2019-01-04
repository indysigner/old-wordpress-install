(function e(t,n,r){function s(o,u){if(!n[o]){if(!t[o]){var a=typeof require=="function"&&require;if(!u&&a)return a(o,!0);if(i)return i(o,!0);var f=new Error("Cannot find module '"+o+"'");throw f.code="MODULE_NOT_FOUND",f}var l=n[o]={exports:{}};t[o][0].call(l.exports,function(e){var n=t[o][1][e];return s(n?n:e)},l,l.exports,e,t,n,r)}return n[o].exports}var i=typeof require=="function"&&require;for(var o=0;o<r.length;o++)s(r[o]);return s})({1:[function(require,module,exports){
// Layzr is installed via npm dependency
// @link https://github.com/callmecavs/layzr.js/tree/master#npm
//
'use strict';

function _interopRequireDefault(obj) { return obj && obj.__esModule ? obj : { 'default': obj }; }

var _layzrJs = require('layzr.js');

var _layzrJs2 = _interopRequireDefault(_layzrJs);

var options = {
	normal: 'data-src',
	retina: 'data-src-retina',
	threshold: 0
};
_layzrJs2['default'](options).update() // track initial elements
.check() // check initial elements
.handlers(true); // bind scroll and resize handlers

},{"layzr.js":2}],2:[function(require,module,exports){
/*!
 * Layzr.js 2.2.1 - A small, fast, and modern library for lazy loading images.
 * Copyright (c) 2016 Michael Cavalea - http://callmecavs.github.io/layzr.js/
 * License: MIT
 */
!function(t,e){"object"==typeof exports&&"undefined"!=typeof module?module.exports=e():"function"==typeof define&&define.amd?define(e):t.Layzr=e()}(this,function(){"use strict";var t={};t["extends"]=Object.assign||function(t){for(var e=1;e<arguments.length;e++){var n=arguments[e];for(var r in n)Object.prototype.hasOwnProperty.call(n,r)&&(t[r]=n[r])}return t};var e=function(){function e(t,e){return c[t]=c[t]||[],c[t].push(e),this}function n(t,n){return n._once=!0,e(t,n),this}function r(t){var e=arguments.length<=1||void 0===arguments[1]?!1:arguments[1];return e?c[t].splice(c[t].indexOf(e),1):delete c[t],this}function i(t){for(var e=this,n=arguments.length,i=Array(n>1?n-1:0),o=1;n>o;o++)i[o-1]=arguments[o];var s=c[t]&&c[t].slice();return s&&s.forEach(function(n){n._once&&r(t,n),n.apply(e,i)}),this}var o=arguments.length<=0||void 0===arguments[0]?{}:arguments[0],c={};return t["extends"]({},o,{on:e,once:n,off:r,emit:i})},n=function(){function t(){return window.scrollY||window.pageYOffset}function n(){d=t(),r()}function r(){l||(requestAnimationFrame(function(){return u()}),l=!0)}function i(t){return t.getBoundingClientRect().top+d}function o(t){var e=d,n=e+v,r=i(t),o=r+t.offsetHeight,c=m.threshold/100*v;return o>=e-c&&n+c>=r}function c(t){if(w.emit("src:before",t),p&&t.hasAttribute(m.srcset))t.setAttribute("srcset",t.getAttribute(m.srcset));else{var e=g>1&&t.getAttribute(m.retina);t.setAttribute("src",e||t.getAttribute(m.normal))}w.emit("src:after",t),[m.normal,m.retina,m.srcset].forEach(function(e){return t.removeAttribute(e)}),a()}function s(t){var e=t?"addEventListener":"removeEventListener";return["scroll","resize"].forEach(function(t){return window[e](t,n)}),this}function u(){return v=window.innerHeight,h.forEach(function(t){return o(t)&&c(t)}),l=!1,this}function a(){return h=Array.prototype.slice.call(document.querySelectorAll("["+m.normal+"]")),this}var f=arguments.length<=0||void 0===arguments[0]?{}:arguments[0],d=t(),l=void 0,h=void 0,v=void 0,m={normal:f.normal||"data-normal",retina:f.retina||"data-retina",srcset:f.srcset||"data-srcset",threshold:f.threshold||0},p=document.body.classList.contains("srcset")||"srcset"in document.createElement("img"),g=window.devicePixelRatio||window.screen.deviceXDPI/window.screen.logicalXDPI,w=e({handlers:s,check:u,update:a});return w};return n});
},{}]},{},[1]);
