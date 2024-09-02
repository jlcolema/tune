// remap jQuery to $

(function($){})(window.jQuery);

/* trigger when page is ready */

$(document).ready(function (){

	$(".contact-form .more").click(function(){
		$(this).toggleClass("active");
		$(this).next('.gform_wrapper').slideToggle();
	});

	$("td.service strong").click(function(){
		$(this).toggleClass("active");
		$(this).next('span').toggleClass("active");
	});
  
	$('#footer nav').clone().attr('class', 'top').insertAfter('header .inner-wrap');

	// Slides

	var options = {
		nextButton: true,
		prevButton: true,
		animateStartingFrameIn: true,
		reverseAnimationsWhenNavigatingBackwards: true,
		swipeNavigation: false,
		preloadTheseFrames: [1],
		preloadTheseImages: [
			"/tune-content/themes/tune/-/images/work/three-sixty-group.jpg",
			"/tune-content/themes/tune/-/images/work/bluelock.png",
			"/tune-content/themes/tune/-/images/work/smarter-remarketer.png"
		]
	};

	var sequence = $("#sequence").sequence(options).data("sequence");

	// Flexslider
	
	if ($('.flexslider').length) {
	
		// clone slider
		$('.flexslider').clone().attr('class', 'slideshow').insertAfter('.flexslider');
		
		// init slideshow
		$('.flexslider').flexslider({
			animation: "fade",
			controlsContainer: ".flex-container"
		});
		
		// create nav container
		$('.flex-direction-nav').wrap('<div class="flex-direction-wrapper" />');
		
		function navDimensions(thisContainer, thisImg, thisDiv) {
		
			thisContainer = $(thisContainer);
			thisImg = $(thisImg);
			thisDiv = $(thisDiv);
			
			var maxHeight = 0;
			var maxWidth = 0;
			thisContainer.each(function() {
				if ( thisImg.height() > 0 ) {
					thisDiv.height(thisImg.height());
					thisDiv.width(thisImg.height()*1265/893);
					return;
				} else if ( thisImg.width() > 0 ) {
					thisDiv.height(thisImg.width()/1265*893);
					thisDiv.width(thisImg.width());
					return;
				}
				
			});
		}
		function setNavDimensions() {
			if ($(window).width() > 600) {
				navDimensions('.flexslider .slides > li.flex-active-slide', '.flexslider .slides > li.flex-active-slide img', '.flex-direction-wrapper');
			}
		}
		setNavDimensions();
		$(window).bind('resize', setNavDimensions);	
		setNavDimensions();	
	}

	/* Set Equal Heights for Footer Columns */

	//jQuery

	$.fn.equalHeights = function() {

		if ($(window).width() > 860) {
			this.each(function(){
				var sizeTo = 0;
				$(this).find('.widget-container').each(function(){
					$(this).height('auto')
					if ($(this).height() > sizeTo) { 
						sizeTo = $(this).height();
					}
				});
				$(this).find('.widget-container').height(sizeTo);
			});
	
			return this;
		} else {
			$('.inner-inner-wrap .widget-container').css('height', 'auto');
		}

	};

	// Call Equal Heights

	$(function(){
		$('.inner-inner-wrap').equalHeights()
		$(window).bind( "resize", function(e) {
			$('.inner-inner-wrap').equalHeights()
		});
	});

	/* pinterest */	
    $("#pinit").click(function(){
        $("#pinmarklet").remove();
        var e = document.createElement('script');
        e.setAttribute('type','text/javascript');
        e.setAttribute('charset','UTF-8');
        e.setAttribute('id','pinmarklet');
        e.setAttribute('src','http://assets.pinterest.com/js/pinmarklet.js?r='+Math.random()*99999999);document.body.appendChild(e);
    });

    // Fixed Navigation

	$(function() {
	
		// grab the initial top offset of the navigation 

		var sticky_navigation_offset_top = $('nav.top').offset().top;
	
		// our function that decides weather the navigation bar should have "fixed" css position or not.

		var sticky_navigation = function(){

			var scroll_top = $(window).scrollTop(); // our current vertical position from the top
	
			// if we've scrolled more than the navigation, change its position to fixed to stick to top, otherwise change it back to relative

			if (scroll_top > sticky_navigation_offset_top) { 

				$('nav.top').addClass('fixed');
				$('body').addClass('fixed');

			} else {
	
				$('nav.top').removeClass('fixed');
				$('body').removeClass('fixed');
	
			}   
	
		};
	
		// run our function on load

		sticky_navigation();
	
		// and run it again every time you scroll

		$(window).scroll(function() {
		
			sticky_navigation();
	
		});
	
	});

});

$(window).load(function() {

	$("body").removeClass("preload");

	// $(".section").delay(10).slideDown('slow');
	// $(".section").css("opacity", "1");
	// $(".section").css("animation", "slide 0.5s");
	// $(".section").css("-webkit-animation", "slide 0.5s");
	// $(".section").css("-moz-animation", "slide 0.5s");
	

});

/* optional triggers

$(window).resize(function() {
	
});

*/