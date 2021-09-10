/**
 * demo.js
 * http://www.codrops.com
 *
 * Licensed under the MIT license.
 * http://www.opensource.org/licenses/mit-license.php
 * 
 * Copyright 2016, Codrops
 * http://www.codrops.com
 */
;(function(window) {

	'use strict';

	// taken from mo.js demos
	function isIOSSafari() {
		var userAgent;
		userAgent = window.navigator.userAgent;
		return userAgent.match(/iPad/i) || userAgent.match(/iPhone/i);
	};

	// taken from mo.js demos
	function isTouch() {
		var isIETouch;
		isIETouch = navigator.maxTouchPoints > 0 || navigator.msMaxTouchPoints > 0;
		return [].indexOf.call(window, 'ontouchstart') >= 0 || isIETouch;
	};
	
	// taken from mo.js demos
	var isIOS = isIOSSafari(),
		clickHandler = isIOS || isTouch() ? 'touchstart' : 'click';

	function extend( a, b ) {
		for( var key in b ) { 
			if( b.hasOwnProperty( key ) ) {
				a[key] = b[key];
			}
		}
		return a;
	}

	function Animocon(el, options) {
		this.el = el;
		this.options = extend( {}, this.options );
		extend( this.options, options );

		this.checked = false;

		this.timeline = new mojs.Timeline();
		
		for(var i = 0, len = this.options.tweens.length; i < len; ++i) {
			this.timeline.add(this.options.tweens[i]);
		}

		var self = this;
		this.el.addEventListener(clickHandler, function() {
			if( self.checked ) {
				self.options.onUnCheck();
			}
			else {
				self.options.onCheck();
				self.timeline.replay();
			}
			self.checked = !self.checked;
		});
	}

	Animocon.prototype.options = {
		tweens : [
			new mojs.Burst({})
		],
		onCheck : function() { return false; },
		onUnCheck : function() { return false; }
	};

	// grid items:
	var items = [].slice.call(document.querySelectorAll('ol.grid > .grid__item'));

	function init() {
		
	
		
		// bursts when hovering the mo.js link
		var molinkEl = document.querySelector('.special-link'),
			moTimeline = new mojs.Timeline(),
			moburst1 = new mojs.Burst({
				parent: 			molinkEl,
				count: 				6,
				left: 				'0%',
				top:  				'-50%',
				radius: 			{0:60},
				children: {
					fill : 			[ '#fff', '#fff', '#fff', '#fff', '#fff', '#fff' ],
					duration: 	1300,
					easing: 		mojs.easing.bezier(0.1, 1, 0.3, 1)
				}
			}),
			moburst2 = new mojs.Burst({
				parent: 	molinkEl,
				left: '-100%', top: '-20%',
				count: 		14,
				radius: 		{0:120},
				children: {
					fill: 			[ '#fff', '#fff', '#fff', '#fff', '#fff', '#fff' ],
					duration: 	1600,
					delay: 			100,
					easing: 		mojs.easing.bezier(0.1, 1, 0.3, 1)
				}
			}),
			moburst3 = new mojs.Burst({
				parent: 			molinkEl,
				left: '130%', top: '-70%',
				count: 				8,
				radius: 			{0:90},
				children: {
					fill: 			[ '#fff', '#fff', '#fff', '#fff', '#fff', '#fff' ],
					duration: 	1500,
					delay: 			200,
					easing: 		mojs.easing.bezier(0.1, 1, 0.3, 1)
				}
			}),
			moburst4 = new mojs.Burst({
				parent: molinkEl,
				left: '-20%', top: '-150%',
				count: 		14,
				radius: 	{0:60},
				children: {
					fill: 			[ '#fff', '#fff', '#fff', '#fff', '#fff', '#fff' ],
					duration: 	2000,
					delay: 			300,
					easing: 		mojs.easing.bezier(0.1, 1, 0.3, 1)
				}
			}),
			moburst5 = new mojs.Burst({
				parent: 	molinkEl,
				count: 		12,
				left: '30%', top: '-100%',
				radius: 		{0:60},
				children: {
					fill: 			[ '#fff', '#fff', '#fff', '#fff', '#fff', '#fff' ],
					duration: 	1400,
					delay: 			400,
					easing: 		mojs.easing.bezier(0.1, 1, 0.3, 1)
				}
			});

		moTimeline.add(moburst1, moburst2, moburst3, moburst4, moburst5);
		molinkEl.addEventListener('mouseenter', function() {
			moTimeline.replay();
		});
	}
	
	init();

})(window);