//
(function ($) {
"use strict";
	// Define your library strictly...
	jQuery(document).ready( function ($) {
		/* ------------------------------------- */
		if ( $.isFunction($.fn.flexslider) ) {
			jQuery(".flexslider").flexslider({
				animation: "fade",
				controlsContainer: ".flex-container",
				slideshow: true,
				slideshowSpeed: 3000,
				animationSpeed: 1200,
				directionNav: true,
				controlNav: false,
				mousewheel: false,
				smoothHeight :false,
			    prevText: " ",           //String: Set the text for the "previous" directionNav item
			    nextText: " ",               //String: Set the text for the "next" directionNav item
				start: function(slider) {
					jQuery(".total-slides").text(slider.count);
					jQuery(".flex-active-slide").find(".flex-caption").addClass("flex-caption-anim");
				},
				before: function(slider){
					  jQuery(slider).find(".flex-active-slide").each(function(){
						jQuery(".flex-active-slide").find(".flex-caption").removeClass("flex-caption-anim");
					  });
				},
				after: function(slider){
				  jQuery(".flex-active-slide").find(".flex-caption").addClass("flex-caption-anim");
				}
			});
		}

		/* ------------------------------------- */
		if ( $.isFunction($.fn.prettyPhoto) ) {
			$("a[data-rel^='prettyPhoto']").prettyPhoto({
				theme: 'pp_default',
				social_tools: false,
				deeplinking : false,
			});
		}
		/* Footer Branches   	  */
		/* ====================== */
		$('.footer-branches').hide();
		$( ".at-footer-branches" ).on('click', function(e) {
			e.preventDefault();
 			$(this).toggleClass('at-toggleOpen');
			$( ".footer-branches" ).slideToggle(500);
		  	$('html, body').animate({
          		scrollTop: $(document).height()
      		}, 500);
		});

		/* Tooltip                */
		/* ====================== */
		$('.labora_tip,.iva_tip').hover(function () {
			var ivaWidth = $(this).outerWidth();
			var tooltipWidth = $(this).find('span.ttip').outerWidth();
			var left = (ivaWidth - tooltipWidth) / 2;
			$(this).find('span.ttip').css('left', left).fadeIn();
		}, function () {
			$(this).find('span.ttip').fadeOut();
		});

		/* Vidoe Resize Fitvids   */
		/* ====================== */
		if ( $.fn.fitVids) {
			$('.video-frame,.boxcontent,.video-stage,.video,.post,.iva_map').fitVids();
		}

		/* BacktoTop Scroll       */
		/* ====================== */

		// hide #back-top first
		$("#back-top").hide();

		// fade in #back-top
		$(function () {
			$(window).scroll(function () {
				if ($(this).scrollTop() > 100) {
					$('#back-top').fadeIn();
				} else {
					$('#back-top').fadeOut();
				}
			});

			// scroll body to 0px on click
			$('#back-top a').click(function () {
				$('body,html').animate({
					scrollTop: 0
				}, 800);

			   return false;
			});
		});

		/* Fixed Header           */
		/* ====================== */

		$(window).scroll(function() {
			var scroll = $(window).scrollTop();
			if (scroll >= 80) {
				$("#fixedheader").addClass("fixed-header");
				if ($(window).width() > 1024) {
						$('#fixedheader.fixed-header').css({'top':'0'});
						$('.logo img').css({'transform':'scale(0.85)'});
					}
			} else {
				$("#fixedheader").removeClass("fixed-header");
				$('.logo img').css({'transform':'scale(1)'});
			}
		});

		/* Searchbar Pop-up       */
		/* ====================== */

		$('#ivaSearch').on("click", function(e) {
			if ($(e.srcElement).closest('#ivaSearchbar').length) return;
			$('#ivaSearchbar').slideDown(300);
			$('#ivaSearchbar input[type=text]').focus();
			return false;
		});

		$('.search-close').on("click", function(e) {
			jQuery('#ivaSearchbar').slideUp(300);
		});

		$('body').on("click", function(e){
			var target = $(e.target);
			if(!target.is(".ivaInput")) {
				jQuery('#ivaSearchbar').slideUp(300);
			}
		})

		if ( $.isFunction($.fn.superfish) ) {
			$(".sf-menu").superfish({
				cssArrows: false,
			});
		}

		// Adds custom class to datepicker ui
		jQuery(".ui-datepicker").addClass("iva-date-ui");

		// Stickybar Toggler
		jQuery("#trigger").click(function () {
	        jQuery(this).next("#sticky").slideToggle({
	        	duration: 300
	        });
	    });

		var $wpAdminBar = $('#wpadminbar');
		var tarrow, sticky_adminbar;

		if ( $wpAdminBar.length ) {
			sticky_adminbar = $wpAdminBar.height() + 5;
			tarrow = $('.tarrow').css({ top: sticky_adminbar });
		} else {
			sticky_adminbar = 5;
			tarrow = $('.tarrow').css({top: sticky_adminbar });
		}

		// Stickybar Toggler
		jQuery("#trigger").toggle(function () {
	        jQuery(this)
				.animate({ top: sticky_adminbar }, 50)
				.animate({ top: sticky_adminbar }, 50)
				.animate({ top: sticky_adminbar }, 800).children().addClass("fa-arrow-circle-o-up");
	    }, function () {
	        jQuery(this)
				.animate({ top: sticky_adminbar }, 50)
				.animate({ top: sticky_adminbar }, 50)
				.animate({ top: sticky_adminbar }, 800).children().removeClass("fa-arrow-circle-o-up");
		});

		// Easing
		jQuery.extend( jQuery.easing,{
			easeIn: function (x, t, b, c, d) {
				return jQuery.easing.easeInQuad(x, t, b, c, d);
			},
			easeOut: function (x, t, b, c, d) {
				return jQuery.easing.easeOutQuad(x, t, b, c, d);
			},
			easeInOut: function (x, t, b, c, d) {
				return jQuery.easing.easeInOutQuad(x, t, b, c, d);
			},
			expoin: function(x, t, b, c, d) {
				return jQuery.easing.easeInExpo(x, t, b, c, d);
			},
			expoout: function(x, t, b, c, d) {
				return jQuery.easing.easeOutExpo(x, t, b, c, d);
			},
			expoinout: function(x, t, b, c, d) {
				return jQuery.easing.easeInOutExpo(x, t, b, c, d);
			},
			bouncein: function(x, t, b, c, d) {
				return jQuery.easing.easeInBounce(x, t, b, c, d);
			},
			bounceout: function(x, t, b, c, d) {
				return jQuery.easing.easeOutBounce(x, t, b, c, d);
			},
			bounceinout: function(x, t, b, c, d) {
				return jQuery.easing.easeInOutBounce(x, t, b, c, d);
			},
			elasin: function(x, t, b, c, d) {
				return jQuery.easing.easeInElastic(x, t, b, c, d);
			},
			elasout: function(x, t, b, c, d) {
				return jQuery.easing.easeOutElastic(x, t, b, c, d);
			},
			elasinout: function(x, t, b, c, d) {
				return jQuery.easing.easeInOutElastic(x, t, b, c, d);
			},
			backin: function(x, t, b, c, d) {
				return jQuery.easing.easeInBack(x, t, b, c, d);
			},
			backout: function(x, t, b, c, d) {
				return jQuery.easing.easeOutBack(x, t, b, c, d);
			},
			backinout: function(x, t, b, c, d) {
				return jQuery.easing.easeInOutBack(x, t, b, c, d);
			}
		});
	});
})();

	/* -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
		Testimonials Slider
	-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=- */
	function MySlider( interval, id ) {
		'use strict';

		var slides,cnt,amount,i;

		function run() {
			// hiding previous image and showing next
			jQuery(slides[i]).fadeOut('slow', function () {
				// Animation complete.
				i++;
				if (i >= amount) i = 0;
				jQuery(slides[i]).fadeIn('slow');

				// updating counter
				cnt.text(i + 1 + ' / ' + amount);
			});
			// loop
			setTimeout(run, interval);
		}
		slides  = jQuery('#' + id + ' .testimonials > li');
		cnt 	= jQuery('#counter');
		amount  = slides.length;
		i = 0;

		// updating counter
		cnt.text(i + 1 + ' / ' + amount);
		if (amount > 1) setTimeout(run, interval);
	}
	// Mobile menu Jquery
	jQuery(document).ready(function($) {
		'use strict';
		$('#iva-mobile-nav-icon').click(function(){
			$(this).toggleClass('open');
			$('.iva-mobile-menu').slideToggle(500);
			return false;
		});
		// Child Menu Toggle
		jQuery('.iva-children-indenter').click(function(){
			$(this).parent().parent().toggleClass('iva-menu-open');
			$(this).parent().parent().find('> ul').slideToggle();

			return false;
		});

		resizemobile();
	});

	// On Window Resize
	function resizemobile(){
		// show meun starting from iPad Portrait
		if( window.innerWidth < 959 ){
			jQuery('.header #menuwrap').hide();
			jQuery('.header .iva-light-logo').hide();
			jQuery('.header .iva-dark-logo').show();
		}else {
			jQuery('.header #menuwrap').show();
			jQuery('.iva-mobile-menu').hide();
			jQuery('.header .iva-light-logo').show();
			jQuery('.header .iva-dark-logo').hide();
		}
	}
//Init
jQuery(window).resize(resizemobile);

//Wait for window load
jQuery(window).load(function() {
	jQuery('.labora_page_loader').fadeOut(1000);
});

/*
**	Plugin for counter shortcode
*/
(function ($) {
	$.fn.countTo = function (options) {
		options = options || {};

		return $(this).each(function () {
			// set options for current element
			var settings = $.extend({}, $.fn.countTo.defaults, {
				from:            $(this).data('from'),
				to:              $(this).data('to'),
				speed:           $(this).data('speed'),
				refreshInterval: $(this).data('refresh-interval'),
				decimals:        $(this).data('decimals')
			}, options);

			// how many times to update the value, and how much to increment the value on each update
			var loops = Math.ceil(settings.speed / settings.refreshInterval),
				increment = (settings.to - settings.from) / loops;
			// references & variables that will change with each update
			var self = this,
				$self = $(this),
				loopCount = 0,
				value = settings.from,
				data = $self.data('countTo') || {};

			$self.data('countTo', data);
			// if an existing interval can be found, clear it first
			if (data.interval) {
				clearInterval(data.interval);
			}
			data.interval = setInterval(updateTimer, settings.refreshInterval);
			// initialize the element with the starting value
			render(value);
			function updateTimer() {
				value += increment;
				loopCount++;
				render(value);
				if (typeof(settings.onUpdate) == 'function') {
					settings.onUpdate.call(self, value);
				}
				if (loopCount >= loops) {
					// remove the interval
					$self.removeData('countTo');
					clearInterval(data.interval);
					value = settings.to;

					if (typeof(settings.onComplete) == 'function') {
						settings.onComplete.call(self, value);
					}
				}
			}
			function render(value) {
				var formattedValue = settings.formatter.call(self, value, settings);
				$self.html(formattedValue);
			}
		});
	};
	$.fn.countTo.defaults = {
		from: 0,               // the number the element should start at
		to: 0,                 // the number the element should end at
		speed: 1000,           // how long it should take to count between the target numbers
		refreshInterval: 100,  // how often the element should be updated
		decimals: 0,           // the number of decimal places to show
		formatter: formatter,  // handler for formatting the value before rendering
		onUpdate: null,        // callback method for every time the element is updated
		onComplete: null       // callback method for when the element finishes updating
	};
	function formatter(value, settings) {
		return value.toFixed(settings.decimals);
	}
}(jQuery));

function labora_animation( items, trigger ) {
  	items.each( function() {
    	var aw_element = jQuery(this),
        	aw_animationclass = aw_element.attr('data-animation'),
        	aw_animationdelay = aw_element.attr('data-animation-delay');

		if( typeof( aw_animationclass ) !== 'undefined'){
	        aw_element.css({
		        '-webkit-animation-delay':  aw_animationdelay,
		        '-moz-animation-delay': aw_animationdelay,
		        'animation-delay': aw_animationdelay,
	        });
			var aw_trigger = ( trigger ) ? trigger : aw_element;
        	aw_trigger.waypoint(function() {
	        	aw_element.addClass('animate').addClass( 'animated  ' + aw_animationclass + '');
	        },{
	            triggerOnce: true,
	            offset: '90%'
	        });
		}
	});
}
jQuery(document).ready(function($){
	labora_animation( jQuery('.iva_anim') );
});

/* Testimonials Slider */
function labora_mySlider(interval, id) {
	var slides;
	var cnt;
	var amount;
	var i;

	function run() {
		// hiding previous image and showing next
		jQuery(slides[i]).fadeOut('slow', function () {
			// Animation complete.
			i++;
			if (i >= amount) i = 0;
			jQuery(slides[i]).fadeIn('slow');

			// updating counter
			cnt.text(i + 1 + ' / ' + amount);
		});
		// loop
		setTimeout(run, interval);
	}
	//slides = $('.testimonials > li');
	slides = jQuery('#' + id + ' .testimonials > li');
	cnt = jQuery('#counter');
	amount = slides.length;
	i = 0;
	// updating counter
	cnt.text(i + 1 + ' / ' + amount);
	if (amount > 1) setTimeout(run, interval);
}

/* Progressbar */
function labora_progressbar() {
    jQuery('.at-prgress-bar-color').each(function () {
        var percent = jQuery(this).attr('data-width');
		jQuery(this).animate({
            width: percent +'%'
        }, 2200);
		jQuery(this).parent().parent().find('.at-progress-num').countTo({
			from: 0,
			to: parseFloat( percent ),
			speed: 1500,
			refreshInterval: 50
		});
	});
}

/* Fun Fact */
function labora_funfact() {
	jQuery('.funfact-number').each(function() {
		var $this = jQuery(this);
		var parts = $this.text().match(/^(\d+)(.*)/);
		if (parts.length < 2) return;
		var scale = 20;
		var delay = 50;
		var end = 0+parts[1];
		var next = 0;
		var suffix = parts[2];
		var runUp = function() {
			var show = Math.ceil(next);
			$this.text(''+show+suffix);
			if (show == end) return;
			next = next + (end - next) / scale;
			window.setTimeout(runUp, delay);
		}
		runUp();
	});
}

/* Accordion */
function labora_accordion() {
  	jQuery('.ac_wrap ').each(function () {
        tabid = jQuery(this).attr('id');
        jQuery("#" + tabid + " .ac_content:not('.active')").hide();
    });
	jQuery(".ac_wrap .ac_title").click(function () {
		jQuery(this).next(".ac_content").slideToggle(400, 'swing').siblings(".ac_content:visible").slideUp(400, 'swing');
		jQuery(this).toggleClass("active");
		jQuery(this).siblings(".ac_title").removeClass("active");
	});
}

/* Toggle */
function labora_toggle() {
	jQuery(".toggle-title").click(function () {
		jQuery(this).next(".toggle_content").slideToggle({
			duration: 200
		});
	});

	jQuery(".toggle-title").click(function () {
		jQuery(this).toggleClass('active');
	});
}

/* Tabs */
function labora_tabs(){
	jQuery('.systabspane').each(function() {
		tabid = jQuery(this).attr('id');
		jQuery("#" + tabid + " .tab_content").hide(); // Hide all tab conten divs by default
		if(document.location.hash && jQuery(this).find("ul.iva-tabs li a[href='"+document.location.hash+"']").length >= 1) {
			jQuery(this).find("ul.iva-tabs li a[href='"+document.location.hash+"']").parent().addClass("current");
			jQuery(this).find(document.location.hash+".tab_content").show();
		}else{
			jQuery("#" + tabid + " .tab_content:first").show(); // Show the first div of tab content by default
			jQuery("#" + tabid + " ul.iva-tabs li:first").addClass("current"); // Show the current by default
		}
		jQuery("ul.iva-tabs li a").click(function(e) {
				e.preventDefault();
		});
	});
	jQuery("ul.iva-tabs li").click(function () { //Fire the click event
		tab_id = jQuery(this).parents('.systabspane').attr("id");
		var activeTab = jQuery(this).attr("id"); // Catch the click link
		jQuery("#" + tab_id + " ul li").removeClass("current"); // Remove pre-highlighted link
		jQuery(this).addClass("current"); // set clicked link to highlight state
		jQuery("#" + tab_id + " .tab_content").hide(); // hide currently visible tab content div
		jQuery(activeTab).fadeIn(600); // show the target tab content div by matching clicked link.
	});
}

/* Button*/
function labora_buttondata(){
	jQuery("a.btn").hover(function () {
		var hoverBg = jQuery(this).attr('data-btn-hoverBg');
		var hoverColor = jQuery(this).attr('data-btn-hoverColor');
		var borderhoverColor = jQuery(this).attr('data-btn-hoverborder');
		var iconhoverColor = jQuery(this).find('.btn-icon i').attr('data-btn-hovericon');

		if (hoverBg !== undefined) {
			jQuery(this).css('background-color', hoverBg);
		}
		if (borderhoverColor !== undefined) {
			jQuery(this).css('border-color', borderhoverColor);
		} else {}
		if (iconhoverColor !== undefined ) {
			jQuery(this).find('.btn-icon i').css('color', iconhoverColor );
		} else {}
		if (hoverColor !== undefined) {
			jQuery(this).css('color', hoverColor);
		} else {}
	}, function () {
		var btnbg = jQuery(this).attr('data-btn-bg');
		var btncolor = jQuery(this).attr('data-btn-color');
		var btnborder = jQuery(this).attr('data-btn-border');
		var btnicon = jQuery(this).find('.btn-icon i').attr('data-btn-icon');
		if (btnbg !== undefined) {
			jQuery(this).css('background-color', btnbg);
		} else {
				//jQuery(this).css('background-color', 'transparent');
		}
		if (btncolor !== undefined) {
			jQuery(this).css('color', btncolor);
		}
		if (btnicon !== undefined) {
			jQuery(this).find('.btn-icon i').css('color', btnicon);
		}
		if (btnborder !== undefined) {
			jQuery(this).css('border-color', btnborder);
		}
	});
}
/* Message close*/
function labora_messagebox_close(){
	jQuery("span.close").click(function () {
		jQuery(this).hide();
		jQuery(this).parent().parent().animate({
			opacity : '0'
		}).slideUp(400);
	});
}
function labora_parallax_bg(){
	jQuery('.parallaxsection').each(function($){
		var id = jQuery(this).attr('id');
		jQuery('#'+id + ".parallaxsection").parallax("50%", 0.4);
	});
}
function labora_hoverimage() {
	jQuery('.thumbs_hover').animate({opacity: 0});
	jQuery(".hoverimg").hover(function() {
		jQuery(this).find('.thumbs_hover').css({display:'block'}).animate({
			opacity: 1,
			bottom: (jQuery('.port_img, .hoverimg').height())/2 - 20+'px'}, 200, 'swing');
			jQuery(this).find('img').fadeTo(300,0.4);

	},function() {
		jQuery(this).find('.thumbs_hover').animate({
			opacity: 0,
			bottom: '100%'}, 200, 'swing', function() {
			jQuery(this).css({'bottom':'0'});
			});
			jQuery(this).find('img').fadeTo(300,1);
	});
}
// function labora_tabNav() {
// 	// Tabbed Section
// 	var $wpAdminBar = jQuery('#wpadminbar');
// 	var tabs_NavPosition;
// 	var	fixedHeader = jQuery('#fixedheader').outerHeight();
// 	if ( $wpAdminBar.length ) {
// 		fixedHeader = jQuery('#fixedheader').outerHeight() + $wpAdminBar.height();
// 	}
//
// 	if (jQuery('#fixedheader').length) {
// 		tabs_NavPosition = jQuery('#fixedheader').outerHeight() + jQuery('.iva_tabsWrap').outerHeight();
// 	} else {
// 		tabs_NavPosition = jQuery('.iva_tabsWrap').outerHeight();
// 	}
// 	jQuery('.iva_tabNav a').on('click', function( event ) {
// 		var $anchorid =jQuery(this);
//
// 		jQuery(".iva_tabsWrap ul li").removeClass("current");
// 		jQuery(this).parent('li').addClass("current");
//
// 		jQuery('html, body').stop().animate({
// 			scrollTop : jQuery(  $anchorid.attr( 'href' ) ).offset().top - tabs_NavPosition
// 		}, 500, '');
// 		event.preventDefault();
// 	});
//
// 	if (jQuery('#fixedheader').length) {
// 		jQuery(".iva_tabsWrap").sticky({ topSpacing: fixedHeader });
// 	} else {
// 		jQuery(".iva_tabsWrap").sticky({ topSpacing: 0 });
// 	}
//
// }
function labora_expandable(){
	jQuery(".at-expand-action-text").click(function () {
    $at_expand_label_text = jQuery(this);

    jQuery(".at-expand-content-outer").slideToggle(800, function () {
        $at_expand_label_text.text(function () {
            return jQuery(".at-expand-content-outer").is(":visible") ?jQuery(".at-expand-action-text").attr('data-less-label') : jQuery(".at-expand-action-text").attr('data-more-label');
        });
    });

});
	// jQuery(".morelabel").click(function(){
	// 	var less_label =jQuery(this).attr('data-less-label');
	// 	jQuery(this).html(less_label);
	// 	jQuery('.at-expand-content-outer').toggle();
	// });
}

jQuery(document).ready(function($){
	labora_progressbar();
	labora_tabs();
	labora_accordion();
	labora_mySlider();
	labora_toggle();
	labora_buttondata();
	labora_messagebox_close();
  	labora_parallax_bg();
	//labora_tabNav();
	labora_hoverimage();
	labora_funfact();
	labora_expandable();
	labora_hoverimage();

	/* Twenty Twenty Before After Image*/
	if ($.isFunction($.fn.twentytwenty)) {
		jQuery(window).load(function($){
		    jQuery(".twentytwenty-container").twentytwenty({default_offset_pct: 0.5});
		});
	}

});

/* -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
	     Sticky Bar
-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=- */

jQuery(document).ready(function(){
	//Scroll Animation

	$('#sidebar .sticky-sidebar ul li a').click(function(event){
		event.preventDefault();
		var hlink = $(this).attr("href");
		$("body,html").animate({
		scrollTop: $(hlink).offset().top
		},500);
	});

	//Scroll Color Change
	$(window).scroll(function(){
		var scrollTop = $(document).scrollTop();
		$(".box").each(function(){
		var id = $(this).attr("id");
		var boxHeight = $(this).outerHeight();
		var oTop = $(this).offset().top - 20;
		if(scrollTop > oTop && scrollTop < oTop + boxHeight) {
		$("a[href='#" + id + "']").parent().addClass('current_page_item');
		}
		else {
		$("a[href='#" + id + "']").parent().removeClass('current_page_item');
		}
		});
	});

});


$( document ).ready(function() {

  var $sticky = $('.sticky-sidebar');
  var $stickyrStopper = $('.sticky-stopper');
  if (!!$sticky.offset()) { // make sure ".sticky" element exists

    var generalSidebarHeight = $sticky.outerHeight();
    var stickyTop = $sticky.offset().top;
    var stickOffset = 0;
    var stickyStopperPosition = $stickyrStopper.offset().top;
    var stopPoint = stickyStopperPosition - generalSidebarHeight;
    var diff = stopPoint + stickOffset;
    $(window).scroll(function(event){ // scroll event
	event.preventDefault(event);
	var windowTop = $(window).scrollTop(); // returns number

      if (stopPoint < windowTop) {
          $sticky.css({ position: 'absolute', top: diff });
      } else if (stickyTop < windowTop+stickOffset) {
          $sticky.css({ position: 'fixed', top: stickOffset });
      } else {
          $sticky.css({position: 'absolute', top: 'initial'});
      }
    });

  }
});


/* -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
	H O V E R  I M A G E
-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=- */
function labora_hoverimage() {
	jQuery('.hover_type').animate({opacity: 0});

	jQuery(".port_img, .sort_img").hover(function() {
		jQuery(this).find('.hover_type').css({display:'block'}).animate({
			opacity: 1,
			bottom: (jQuery('.port_img, .sort_img').height())/2 - 20+'px'}, 200, 'swing');

		jQuery(this).find('img').fadeTo(300,0.4);

	},function() {
		jQuery(this).find('.hover_type').animate({
			opacity: 0,
			bottom: '100%'}, 200, 'swing', function() {
			jQuery(this).css({'bottom':'0'});
		});
		jQuery(this).find('img').fadeTo(300,1);
	});
}

/**
 * jQuery.ScrollTo - Easy element scrolling using jQuery.
 * Copyright (c) 2007-2009 Ariel Flesler - aflesler(at)gmail(dot)com | http://flesler.blogspot.com
 * Dual licensed under MIT and GPL.
 * Date: 5/25/2009
 * @author Ariel Flesler
 * @version 1.4.2
 *
 * http://flesler.blogspot.com/2007/10/jqueryscrollto.html
 */
;(function(d){var k=d.scrollTo=function(a,i,e){d(window).scrollTo(a,i,e)};k.defaults={axis:'xy',duration:parseFloat(d.fn.jquery)>=1.3?0:1};k.window=function(a){return d(window)._scrollable()};d.fn._scrollable=function(){return this.map(function(){var a=this,i=!a.nodeName||d.inArray(a.nodeName.toLowerCase(),['iframe','#document','html','body'])!=-1;if(!i)return a;var e=(a.contentWindow||a).document||a.ownerDocument||a;return d.browser.safari||e.compatMode=='BackCompat'?e.body:e.documentElement})};d.fn.scrollTo=function(n,j,b){if(typeof j=='object'){b=j;j=0}if(typeof b=='function')b={onAfter:b};if(n=='max')n=9e9;b=d.extend({},k.defaults,b);j=j||b.speed||b.duration;b.queue=b.queue&&b.axis.length>1;if(b.queue)j/=2;b.offset=p(b.offset);b.over=p(b.over);return this._scrollable().each(function(){var q=this,r=d(q),f=n,s,g={},u=r.is('html,body');switch(typeof f){case'number':case'string':if(/^([+-]=)?\d+(\.\d+)?(px|%)?$/.test(f)){f=p(f);break}f=d(f,this);case'object':if(f.is||f.style)s=(f=d(f)).offset()}d.each(b.axis.split(''),function(a,i){var e=i=='x'?'Left':'Top',h=e.toLowerCase(),c='scroll'+e,l=q[c],m=k.max(q,i);if(s){g[c]=s[h]+(u?0:l-r.offset()[h]);if(b.margin){g[c]-=parseInt(f.css('margin'+e))||0;g[c]-=parseInt(f.css('border'+e+'Width'))||0}g[c]+=b.offset[h]||0;if(b.over[h])g[c]+=f[i=='x'?'width':'height']()*b.over[h]}else{var o=f[h];g[c]=o.slice&&o.slice(-1)=='%'?parseFloat(o)/100*m:o}if(/^\d+$/.test(g[c]))g[c]=g[c]<=0?0:Math.min(g[c],m);if(!a&&b.queue){if(l!=g[c])t(b.onAfterFirst);delete g[c]}});t(b.onAfter);function t(a){r.animate(g,j,b.easing,a&&function(){a.call(this,n,b)})}}).end()};k.max=function(a,i){var e=i=='x'?'Width':'Height',h='scroll'+e;if(!d(a).is('html,body'))return a[h]-d(a)[e.toLowerCase()]();var c='client'+e,l=a.ownerDocument.documentElement,m=a.ownerDocument.body;return Math.max(l[h],m[h])-Math.min(l[c],m[c])};function p(a){return typeof a=='object'?a:{top:a,left:a}}})(jQuery);
/*
Plugin: jQuery Parallax
Version 1.1.3
Author: Ian Lunn
Twitter: @IanLunn
Author URL: http://www.ianlunn.co.uk/
Plugin URL: http://www.ianlunn.co.uk/plugins/jquery-parallax/

Dual licensed under the MIT and GPL licenses:
http://www.opensource.org/licenses/mit-license.php
http://www.gnu.org/licenses/gpl.html
*/

(function( $ ){
	var $window = $(window);
	var windowHeight = $window.height();

	$window.resize(function () {
		windowHeight = $window.height();
	});

	$.fn.parallax = function(xpos, speedFactor, outerHeight) {

		var $this = $(this);
		var getHeight;
		var firstTop;
		var paddingTop = 0;

		//get the starting position of each element to have parallax applied to it
		$this.each(function(){
			firstTop = $this.offset().top;
		});

		if (outerHeight) {
			getHeight = function(jqo) {
				return jqo.outerHeight(true);
			};
		} else {
			getHeight = function(jqo) {
				return jqo.height();
			};
		}

		// setup defaults if arguments aren't specified
		if (arguments.length < 1 || xpos === null) xpos = "50%";
		if (arguments.length < 2 || speedFactor === null) speedFactor = 0.1;
		if (arguments.length < 3 || outerHeight === null) outerHeight = true;

		// function to be called whenever the window is scrolled or resized
		function update(){
			var pos = $window.scrollTop();

			$this.each(function(){
				var $element = $(this);
				var top = $element.offset().top;
				var height = getHeight($element);

				// Check if totally above or totally below viewport
				if (top + height < pos || top > pos + windowHeight) {
					return;
				}

				$this.css('backgroundPosition', xpos + " " + Math.round((firstTop - pos) * speedFactor) + "px");
			});
		}
		$window.bind('scroll', update).resize(update);
		update();
	};
})(jQuery);

/*jshint browser:true */
/*!
* FitVids 1.1
*
* Copyright 2013, Chris Coyier - http://css-tricks.com + Dave Rupert - http://daverupert.com
* Credit to Thierry Koblentz - http://www.alistapart.com/articles/creating-intrinsic-ratios-for-video/
* Released under the WTFPL license - http://sam.zoy.org/wtfpl/
*
*/
!function(t){"use strict";t.fn.fitVids=function(e){var i={customSelector:null,ignore:null};if(!document.getElementById("fit-vids-style")){var r=document.head||document.getElementsByTagName("head")[0],a=".fluid-width-video-wrapper{width:100%;position:relative;padding:0;}.fluid-width-video-wrapper iframe,.fluid-width-video-wrapper object,.fluid-width-video-wrapper embed {position:absolute;top:0;left:0;width:100%;height:100%;}",d=document.createElement("div");d.innerHTML='<p>x</p><style id="fit-vids-style">'+a+"</style>",r.appendChild(d.childNodes[1])}return e&&t.extend(i,e),this.each(function(){var e=['iframe[src*="player.vimeo.com"]','iframe[src*="youtube.com"]','iframe[src*="youtube-nocookie.com"]','iframe[src*="kickstarter.com"][src*="video.html"]',"object","embed"];i.customSelector&&e.push(i.customSelector);var r=".fitvidsignore";i.ignore&&(r=r+", "+i.ignore);var a=t(this).find(e.join(","));a=a.not("object object"),a=a.not(r),a.each(function(){var e=t(this);if(!(e.parents(r).length>0||"embed"===this.tagName.toLowerCase()&&e.parent("object").length||e.parent(".fluid-width-video-wrapper").length)){e.css("height")||e.css("width")||!isNaN(e.attr("height"))&&!isNaN(e.attr("width"))||(e.attr("height",9),e.attr("width",16));var i="object"===this.tagName.toLowerCase()||e.attr("height")&&!isNaN(parseInt(e.attr("height"),10))?parseInt(e.attr("height"),10):e.height(),a=isNaN(parseInt(e.attr("width"),10))?e.width():parseInt(e.attr("width"),10),d=i/a;if(!e.attr("name")){var o="fitvid"+t.fn.fitVids._count;e.attr("name",o),t.fn.fitVids._count++}e.wrap('<div class="fluid-width-video-wrapper"></div>').parent(".fluid-width-video-wrapper").css("padding-top",100*d+"%"),e.removeAttr("height").removeAttr("width")}})})},t.fn.fitVids._count=0}(window.jQuery||window.Zepto);

// Sticky Plugin v1.0.4 for jQuery
// =============
// Author: Anthony Garand
// Improvements by German M. Bravo (Kronuz) and Ruud Kamphuis (ruudk)
// Improvements by Leonardo C. Daronco (daronco)
// Created: 02/14/2011
// Date: 07/20/2015
// Website: http://stickyjs.com/
// Description: Makes an element on the page stick on the screen as you scroll
//              It will only set the 'top' and 'position' of your element, you
//              might need to adjust the width in some cases.

(function (factory) {
    if (typeof define === 'function' && define.amd) {
        // AMD. Register as an anonymous module.
        define(['jquery'], factory);
    } else if (typeof module === 'object' && module.exports) {
        // Node/CommonJS
        module.exports = factory(require('jquery'));
    } else {
        // Browser globals
        factory(jQuery);
    }
}(function ($) {
    var slice = Array.prototype.slice; // save ref to original slice()
    var splice = Array.prototype.splice; // save ref to original slice()

  var defaults = {
      topSpacing: 0,
      bottomSpacing: 0,
      className: 'is-sticky',
      wrapperClassName: 'sticky-wrapper',
      center: false,
      getWidthFrom: '',
      widthFromWrapper: true, // works only when .getWidthFrom is empty
      responsiveWidth: false,
      zIndex: 'auto'
    },
    $window = $(window),
    $document = $(document),
    sticked = [],
    windowHeight = $window.height(),
    scroller = function() {
      var scrollTop = $window.scrollTop(),
        documentHeight = $document.height(),
        dwh = documentHeight - windowHeight,
        extra = (scrollTop > dwh) ? dwh - scrollTop : 0;

      for (var i = 0, l = sticked.length; i < l; i++) {
        var s = sticked[i],
          elementTop = s.stickyWrapper.offset().top,
          etse = elementTop - s.topSpacing - extra;

        //update height in case of dynamic content
        s.stickyWrapper.css('height', s.stickyElement.outerHeight());

        if (scrollTop <= etse) {
          if (s.currentTop !== null) {
            s.stickyElement
              .css({
                'width': '',
                'position': '',
                'top': '',
                'z-index': ''
              });
            s.stickyElement.parent().removeClass(s.className);
            s.stickyElement.trigger('sticky-end', [s]);
            s.currentTop = null;
          }
        }
        else {
          var newTop = documentHeight - s.stickyElement.outerHeight()
            - s.topSpacing - s.bottomSpacing - scrollTop - extra;
          if (newTop < 0) {
            newTop = newTop + s.topSpacing;
          } else {
            newTop = s.topSpacing;
          }
          if (s.currentTop !== newTop) {
            var newWidth;
            if (s.getWidthFrom) {
                newWidth = $(s.getWidthFrom).width() || null;
            } else if (s.widthFromWrapper) {
                newWidth = s.stickyWrapper.width();
            }
            if (newWidth == null) {
                newWidth = s.stickyElement.width();
            }
            s.stickyElement
              .css('width', newWidth)
              .css('position', 'fixed')
              .css('top', newTop)
              .css('z-index', s.zIndex);

            s.stickyElement.parent().addClass(s.className);

            if (s.currentTop === null) {
              s.stickyElement.trigger('sticky-start', [s]);
            } else {
              // sticky is started but it have to be repositioned
              s.stickyElement.trigger('sticky-update', [s]);
            }

            if (s.currentTop === s.topSpacing && s.currentTop > newTop || s.currentTop === null && newTop < s.topSpacing) {
              // just reached bottom || just started to stick but bottom is already reached
              s.stickyElement.trigger('sticky-bottom-reached', [s]);
            } else if(s.currentTop !== null && newTop === s.topSpacing && s.currentTop < newTop) {
              // sticky is started && sticked at topSpacing && overflowing from top just finished
              s.stickyElement.trigger('sticky-bottom-unreached', [s]);
            }

            s.currentTop = newTop;
          }

          // Check if sticky has reached end of container and stop sticking
          var stickyWrapperContainer = s.stickyWrapper.parent();
          var unstick = (s.stickyElement.offset().top + s.stickyElement.outerHeight() >= stickyWrapperContainer.offset().top + stickyWrapperContainer.outerHeight()) && (s.stickyElement.offset().top <= s.topSpacing);

          if( unstick ) {
            s.stickyElement
              .css('position', 'absolute')
              .css('top', '')
              .css('bottom', 0)
              .css('z-index', '');
          } else {
            s.stickyElement
              .css('position', 'fixed')
              .css('top', newTop)
              .css('bottom', '')
              .css('z-index', s.zIndex);
          }
        }
      }
    },
    resizer = function() {
      windowHeight = $window.height();

      for (var i = 0, l = sticked.length; i < l; i++) {
        var s = sticked[i];
        var newWidth = null;
        if (s.getWidthFrom) {
            if (s.responsiveWidth) {
                newWidth = $(s.getWidthFrom).width();
            }
        } else if(s.widthFromWrapper) {
            newWidth = s.stickyWrapper.width();
        }
        if (newWidth != null) {
            s.stickyElement.css('width', newWidth);
        }
      }
    },
    methods = {
      init: function(options) {
        return this.each(function() {
          var o = $.extend({}, defaults, options);
          var stickyElement = $(this);

          var stickyId = stickyElement.attr('id');
          var wrapperId = stickyId ? stickyId + '-' + defaults.wrapperClassName : defaults.wrapperClassName;
          var wrapper = $('<div></div>')
            .attr('id', wrapperId)
            .addClass(o.wrapperClassName);

          stickyElement.wrapAll(function() {
            if ($(this).parent("#" + wrapperId).length == 0) {
                    return wrapper;
            }
});

          var stickyWrapper = stickyElement.parent();

          if (o.center) {
            stickyWrapper.css({width:stickyElement.outerWidth(),marginLeft:"auto",marginRight:"auto"});
          }

          if (stickyElement.css("float") === "right") {
            stickyElement.css({"float":"none"}).parent().css({"float":"right"});
          }

          o.stickyElement = stickyElement;
          o.stickyWrapper = stickyWrapper;
          o.currentTop    = null;

          sticked.push(o);

          methods.setWrapperHeight(this);
          methods.setupChangeListeners(this);
        });
      },

      setWrapperHeight: function(stickyElement) {
        var element = $(stickyElement);
        var stickyWrapper = element.parent();
        if (stickyWrapper) {
          stickyWrapper.css('height', element.outerHeight());
        }
      },

      setupChangeListeners: function(stickyElement) {
        if (window.MutationObserver) {
          var mutationObserver = new window.MutationObserver(function(mutations) {
            if (mutations[0].addedNodes.length || mutations[0].removedNodes.length) {
              methods.setWrapperHeight(stickyElement);
            }
          });
          mutationObserver.observe(stickyElement, {subtree: true, childList: true});
        } else {
          if (window.addEventListener) {
            stickyElement.addEventListener('DOMNodeInserted', function() {
              methods.setWrapperHeight(stickyElement);
            }, false);
            stickyElement.addEventListener('DOMNodeRemoved', function() {
              methods.setWrapperHeight(stickyElement);
            }, false);
          } else if (window.attachEvent) {
            stickyElement.attachEvent('onDOMNodeInserted', function() {
              methods.setWrapperHeight(stickyElement);
            });
            stickyElement.attachEvent('onDOMNodeRemoved', function() {
              methods.setWrapperHeight(stickyElement);
            });
          }
        }
      },
      update: scroller,
      unstick: function(options) {
        return this.each(function() {
          var that = this;
          var unstickyElement = $(that);

          var removeIdx = -1;
          var i = sticked.length;
          while (i-- > 0) {
            if (sticked[i].stickyElement.get(0) === that) {
                splice.call(sticked,i,1);
                removeIdx = i;
            }
          }
          if(removeIdx !== -1) {
            unstickyElement.unwrap();
            unstickyElement
              .css({
                'width': '',
                'position': '',
                'top': '',
                'float': '',
                'z-index': ''
              })
            ;
          }
        });
      }
    };

  // should be more efficient than using $window.scroll(scroller) and $window.resize(resizer):
  if (window.addEventListener) {
    window.addEventListener('scroll', scroller, false);
    window.addEventListener('resize', resizer, false);
  } else if (window.attachEvent) {
    window.attachEvent('onscroll', scroller);
    window.attachEvent('onresize', resizer);
  }

  $.fn.sticky = function(method) {
    if (methods[method]) {
      return methods[method].apply(this, slice.call(arguments, 1));
    } else if (typeof method === 'object' || !method ) {
      return methods.init.apply( this, arguments );
    } else {
      $.error('Method ' + method + ' does not exist on jQuery.sticky');
    }
  };

  $.fn.unstick = function(method) {
    if (methods[method]) {
      return methods[method].apply(this, slice.call(arguments, 1));
    } else if (typeof method === 'object' || !method ) {
      return methods.unstick.apply( this, arguments );
    } else {
      $.error('Method ' + method + ' does not exist on jQuery.sticky');
    }
  };
  $(function() {
    setTimeout(scroller, 0);
  });
}));
