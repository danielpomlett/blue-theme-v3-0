jQuery(document).ready(function(){//Spaceroom core theme footer js
	jQuery('input[type=submit]').addClass('button');//add ui to inputs
	jQuery('textarea, select, input[type=text], input[type=email], input[type=password]').addClass('formElement');
	jQuery('body').addClass('loaded');
	jQuery('.owl-carousel').owlCarousel({
		nav:true,
        dots:true,
        items:1,
        merge:true,
        loop:true,
        margin:10,
        video:true,
        lazyLoad:true,
        center:true,
        autoplay:true,
        autoplayTimeout:7000,
        navText: ["<span class='icon-arrow_left icon'></span>","<span class='icon-arrow_right icon'></span>"]
    });

	jQuery("#contentWrapper").fitVids();
	
	//home page intro nav pin
	var cbpAnimatedHeader = (function() {
    var docElem = document.documentElement,
        header = document.querySelector( '.headerWrapper' ),
        didScroll = false;

    function init() {
        window.addEventListener( 'scroll', function( event ) {
            if( !didScroll ) {
                didScroll = true;
				setTimeout( scrollPage, 1 );
            }
        }, false );
    } 
    function scrollPage() {
    	if(jQuery('body').hasClass('home') && jQuery('.mobileWrapper').hasClass('navigationWrapperClosed')){
    	if (window.innerWidth > 1119){
			var addFixOn = window.innerHeight-68;
			var changeHeaderOn = window.innerHeight-67;
		} else {
			var addFixOn = window.innerHeight-46;
			var changeHeaderOn = window.innerHeight-45;
		}
	}else {
		var addFixOn = 0;
		var changeHeaderOn = 50;
	}
       var sy = scrollY();
        if ( sy >= changeHeaderOn ) {
            jQuery('.headerWrapper').addClass('header-small');
            if(jQuery('.mobileNavWrapper').height() > 30) {
		     	jQuery('.headerWrapper').addClass('hideLogo');
		     }
        }
        else {
            jQuery('.headerWrapper').removeClass('header-small');
            jQuery('.headerWrapper').removeClass('hideLogo');
        }
        if ( sy >= addFixOn ) {
            jQuery('.headerWrapper, #navMobile').addClass('header-fixed');
        }
        else {
            jQuery('.headerWrapper, #navMobile').removeClass('header-fixed');
        }

        var scrollTop = jQuery(window).scrollTop();
		var offset = addFixOn *2;
		var rgbaOpacity = (scrollTop/offset)+.3;
		var copyOpacity = scrollTop/(offset/3);
		var copyOpacity = 1-copyOpacity;

        didScroll = false;
    }

	    function scrollY() {
	        return window.pageYOffset || docElem.scrollTop;
	    }
	    init();
	})();
	if(jQuery(window).scrollTop() > 50) {
     jQuery('.headerWrapper').addClass('header-small');
     if(jQuery('.mobileNavWrapper').height() > 30) {
     	jQuery('.headerWrapper').addClass('hideLogo');
     }
   } 
	jQuery('a[href*="#"]')
	// Remove links that don't actually link to anything
	.not('[href="#"]')
	.not('[href="#0"]')
	.click(function(event) {
	  // On-page links
	  if (
	    location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') 
	    && 
	    location.hostname == this.hostname
	    &&
	    window.innerWidth > 1119
	  ) {
	    // Figure out element to scroll to
	    var target = jQuery(this.hash);
	    target = target.length ? target : jQuery('[name=' + this.hash.slice(1) + ']');
	    // Does a scroll target exist?
	    if (target.length) {
	      // Only prevent default if animation is actually gonna happen
	      event.preventDefault();
	      jQuery('html, body').animate({
	        scrollTop: target.offset().top
	      }, 500, function() {
	        // Callback after animation
	        // Must change focus!
	        var jQuerytarget = jQuery(target);
	        jQuerytarget.focus();
	        if (jQuerytarget.is(":focus")) { // Checking if the target was focused
	          return false;
	        } else {
	          jQuerytarget.attr('tabindex','-1'); // Adding tabindex for elements not focusable
	          jQuerytarget.focus(); // Set focus again
	        };
	      });
	    }
	  }
	});
	// Mobile menu
	jQuery('.mobileCloser').click(function() {
		jQuery('.headerWrapper, .mobileHeaderWrapper').addClass('navigationWrapperClosed');
		jQuery('#contentWrapper').removeClass('navigationWrapperOpen');
	});
	jQuery('.mobileButton').click(function() {
		if(!jQuery('.navWrapper').hasClass('navigationOpen')){
			jQuery('.navWrapper').addClass('navigationOpen');
			jQuery('body').addClass('navFix');
		}else {
			jQuery('.navWrapper').removeClass('navigationOpen');
			jQuery('body').removeClass('navFix');
		}
		jQuery(this).toggleClass('open');
	});
	jQuery('.menu a').click(function() {
		jQuery('.navWrapper').removeClass('navigationOpen');
		jQuery('body').removeClass('navFix');
	});

	jQuery('.section').scrollPoint({
	    offsetUp   : jQuery(window).height() /2,
	});
	jQuery(document).on('scrollPointMove', '.section', function(e) {
		var func = e.isIn ? "addClass" : "removeClass";
		jQuery(this)[func]('activeSection');
		setNav();
	});
	setNav();
	function setNav() {
		var currentSection = jQuery('.activeSection').attr('id');
		if(!jQuery('.'+currentSection).hasClass('activeSection')){
			jQuery('.page_item').removeClass('active');
			jQuery('.'+currentSection).addClass('active');
		}
		if(jQuery('.activeSection').hasClass('dark')) {
    		jQuery('.nextPrev,.scrollMenu,.headerWrapper').each(function(){
    			jQuery(this).addClass('dark');
    		});
    	}else{
    		jQuery('.nextPrev,.scrollMenu,.headerWrapper').each(function(){
    			jQuery(this).removeClass('dark');
    		});
    	}
	}
    jQuery('.page_item').click(function(){
    	jQuery('.page_item').removeClass('active');
    	jQuery(this).addClass('active');
    });
    jQuery(function() {
        jQuery('.lazy').Lazy({
        	effect: 'fadeIn',
        });
    });
    jQuery('.section').inviewport({
	  threshold: 25, 
	  className: 'animating'
	})
});