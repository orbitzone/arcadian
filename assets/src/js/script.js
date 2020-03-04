

/**********************

Custom.js
=============

Author:  KlbTheme
Template: Movify - Movies, Series & Cinema WordPress Theme
Version: 1.0

Author URI: klbtheme.com
***************************/

jQuery.noConflict();
(function ($) {
    "use strict";
    function setVisted() {
      var idArray = $.cookie('idCookie').split(',');
      for (var x=0; x<idArray.length; x++) {
        jQuery('#' + idArray[x]).css('background', '#ff0000');
      }
    }
    jQuery('.play-video').click(function(){
      saveId(jQuery(this).attr('id'));
      setVisited();
    });



    /*----------------------------------------------------
      LOADING PAGE
    ----------------------------------------------------*/
    $(window).on('load', function () {
        var loading = $('.loading');
        loading.delay(1000).fadeOut(1000);
    }); // end of window load function




    $(document).ready(function () {

        /*----------------------------------------------------
          STICKY HEADER
        ----------------------------------------------------*/
        if ( $('header').hasClass('sticky') ) {

            $("header.sticky").clone(true).addClass('cloned').insertAfter("header.sticky").removeClass('header-transparent text-white');

            var stickyHeader = document.querySelector(".sticky.cloned");
            var stickyHeaderHeight = $("header.sticky").height();

            var headroom = new Headroom(stickyHeader, {
                "offset": stickyHeaderHeight + 100,
                "tolerance": 0
            });

            // disabling on devices
            $(window).bind("load resize", function (e) {

                var winWidth = $(window).width();

                if (winWidth > 1200) {
                    headroom.init();
                } else if (winWidth < 1200) {
                    headroom.destroy();
                }
            });

        }




        /*----------------------------------------------------
           MAIN MENU FOR RESPONSIVE MODE
         ----------------------------------------------------*/
        if ($("nav#main-mobile-nav").length > 0) {
            function mmenuInit() {
                if ( $(window).width() <= '1024' ) {

                    // Clone the main menu, remove all unneeded classes and insert on top
                    $("#main-menu").clone().addClass("mmenu-init").prependTo("#main-mobile-nav").removeAttr('id').removeClass('navbar-nav mx-auto').find('li').removeAttr('class').find('a').removeAttr('class data-toggle aria-haspopup aria-expanded').siblings('ul.dropdown-menu').removeAttr('class');

                    var main_menu = $( 'nav#main-mobile-nav' );

                    main_menu.mmenu({
                        extensions: [ 'fx-menu-zoom', 'position-right' ],
                        counters: true
                    }, {
                        offCanvas: {
                            //pageNodetype: "main",
                            pageSelector: ".wrapper"
                        }
                    });


                    var menu_toggler = $("#mobile-nav-toggler");
                    var menu_API = main_menu.data( "mmenu" );

                    menu_toggler.on( "click", function() {
                       menu_API.open();
                    });

                    menu_API.bind( "open:finish", function() {
                       setTimeout(function() {
                          menu_toggler.addClass( "is-active" );
                       }, 100);
                    });

                    menu_API.bind( "close:finish", function() {
                       setTimeout(function() {
                          menu_toggler.removeClass( "is-active" );
                       }, 100);
                    });
                }
            }


            mmenuInit();

            $(window).resize(function () {
                mmenuInit();
            });
        }




        /*----------------------------------------------------
           BUTTON EFFECT
         ----------------------------------------------------*/
        var button = $('.btn-effect');

        $(button).on('click', function (e) {

            // Remove any old one
            $('.ripple').remove();

            // Setup
            var posX = $(this).offset().left,
                posY = $(this).offset().top,
                buttonWidth = $(this).width(),
                buttonHeight = $(this).height();

            // Add the element
            $(this).prepend("<span class='ripple'></span>");


            // Make it round!
            if (buttonWidth >= buttonHeight) {
                buttonHeight = buttonWidth;
            } else {
                buttonWidth = buttonHeight;
            }

            // Get the center of the element
            var x = e.pageX - posX - buttonWidth / 2;
            var y = e.pageY - posY - buttonHeight / 2;


            // Add the ripples CSS and start the animation
            $('.ripple').css({
                width: buttonWidth,
                height: buttonHeight,
                top: y + 'px',
                left: x + 'px'
            }).addClass("rippleEffect");
        });




        /*----------------------------------------------------
           BACK TO TOP
         ----------------------------------------------------*/
        var pxShow=100;
        var scrollSpeed=500;

        $(window).scroll(function () {
            if ($(window).scrollTop() >= pxShow) {
                $("#backtotop").addClass('visible');
            } else {
                $("#backtotop").removeClass('visible');
            }
        });

        $('#backtotop a').on('click', function () {
            $('html, body').animate({
                scrollTop: 0
            }, scrollSpeed);
            return false;
        });




        /*----------------------------------------------------
          GENERAL SEARCH FORM
        ----------------------------------------------------*/
        var search_btn = $( '.extra-nav .toggle-search' );
        var general_searchform = $( '.general-search-wrapper' );
        var search_close = $( '.general-search-wrapper .toggle-search' );

        search_btn.on( 'click', function(){
            general_searchform.addClass('open');
        });

        search_close.on( 'click', function(){
            general_searchform.removeClass('open');
        });

        /*----------------------------------------------------
          POPUP FORMS
        ----------------------------------------------------*/
        $(".signUpClick").on('click' , function() {
            $('.signin-wrapper, .forgetpassword-wrapper').fadeOut(300);
            $('.signup-wrapper').delay(300).fadeIn();
        });

        $(".signInClick").on('click' , function() {
            $('.forgetpassword-wrapper, .signup-wrapper').fadeOut(300);
            $('.signin-wrapper').delay(300).fadeIn();
        });

        $(".forgetPasswordClick").on('click' , function() {
            $('.signup-wrapper, .signin-wrapper').fadeOut(300);
            $('.forgetpassword-wrapper').delay(300).fadeIn();
        });

        $(".cancelClick").on('click' , function() {
            $('.forgetpassword-wrapper, .signup-wrapper').fadeOut(300);
            $('.signin-wrapper').delay(300).fadeIn();
        });




        /*----------------------------------------------------
          MAGNIFIC POP UP
        ----------------------------------------------------*/
        $('body').magnificPopup({
            type: 'image',
            delegate: 'a.mfp-gallery',

            fixedContentPos: true,
            fixedBgPos: true,

            overflowY: 'auto',

            closeBtnInside: true,
            preloader: true,

            removalDelay: 0,
            mainClass: 'mfp-fade',

            gallery:{
                enabled:true
            },

            callbacks: {
                buildControls: function() {
                     this.contentContainer.append(this.arrowLeft.add(this.arrowRight));
                }
            }
        });


        // Init for popup-with-zoom-anim class
        $('.popup-with-zoom-anim').magnificPopup({
            type: 'inline',

            fixedContentPos: false,
            fixedBgPos: true,

            overflowY: 'auto',

            closeBtnInside: true,
            preloader: false,

            midClick: true,
            removalDelay: 300,
            mainClass: 'my-mfp-zoom-in'
        });


        // Init for images
        $('.mfp-image').magnificPopup({
            type: 'image',
            closeOnContentClick: true,
            mainClass: 'mfp-fade',
            image: {
                verticalFit: true
            }
        });


        // Init for image gallery
        $('.image-gallery').magnificPopup({
            delegate: 'a',
            type: 'image',
            fixedContentPos: true,
            gallery: {
                enabled: true
            },
            removalDelay: 300,
            mainClass: 'mfp-fade',
            retina: {
                ratio: 1,
                replaceSrc: function (item, ratio) {
                    return item.src.replace(/\.\w+$/, function (m) {
                        return '@2x' + m;
                    });
                }
            }

        });


        // Init for youtube, vimeo and google maps
        $('.play-video, .popup-gmaps').magnificPopup({
            disableOn: false,
            type: 'iframe',
            mainClass: 'mfp-fade',
            removalDelay: 160,
            preloader: false,

            fixedContentPos: false
        });




        /*----------------------------------------------------
          OWL CAROUSEL
        ----------------------------------------------------*/



        /***** Latest TV Shows *****/

        var latest_tvshows = $( 'section.latest-tvshows .latest-tvshows-slider');

        latest_tvshows.owlCarousel({
            loop: true,
            margin: 15,
            autoplay: false, //change this to true if you want the slider to auto play
            nav: false,
            dots: true,
            responsive:{
                0:{
                    items: 1,
                    stagePadding: 10
                },
                600:{
                    items: 3
                },
                1000:{
                    items: 4
                }
            }
        });


        /***** Latest Releases *****/

        var latest_releases = $( '.latest-releases-slider');

        latest_releases.owlCarousel({
            loop: true,
            margin: 30,
            stagePadding: 20,
            autoplay: false, //change this to true if you want the slider to auto play
            nav: false,
            dots: false,
            responsive:{
                0:{
                    items: 1,
                },
                600:{
                    items: 2,
                },
                1000:{
                    items: 3,
                },
                1200:{
                    items: 4,
                },
                1500:{
                    items: 5,
                }
            }
        });


        /***** Recommended Movies & TV Shows *****/

        var recommended = $( 'section.recommended-movies .recommended-slider');

        recommended.owlCarousel({
            loop: false,
            margin: 15,
            autoplay: false, //change this to true if you want the slider to auto play
            nav: false,
            dots: true,
            responsive:{
                0:{
                    items: 1,
                    stagePadding: 10
                },
                600:{
                    items: 3
                },
                1000:{
                    items: 4
                }
            }
        });


        /***** Testimonials *****/

        var testimonials = $( '.testimonial-slider');

        testimonials.owlCarousel({
            loop: true,
            margin: 15,
            autoplay: true, //change this to true if you want the slider to auto play
            nav: false,
            dots: true,
            items: 1,
        });

        /*----------------------------------------------------
          INITIALIZE COUNT UP
        ----------------------------------------------------*/
        var counter_up = $('.klb-counter');

        counter_up.on('inview', function (event, visible, visiblePartX, visiblePartY) {
            if (visible) {
                $(this).find('.counter-item').each(function () {
                    var $this = $(this);
                    $('.counter-item').countTo({
                        speed: 3000,
                        refreshInterval: 50
                    });
                });
                $(this).unbind('inview');
            }
        });




        /*----------------------------------------------------
          PARALLAX
        ----------------------------------------------------*/
        if("ontouchstart"in window){
            document.documentElement.className=document.documentElement.className+" touch";
        }

        function parallaxBG() {
            $('.parallax').prepend('<div class="parallax-overlay"></div>');

            $(".parallax").each(function () {
                var attrImage = $(this).attr('data-background');
                var attrColor = $(this).attr('data-color');
                var attrOpacity = $(this).attr('data-color-opacity');
                if (attrImage !== undefined) {
                    $(this).css('background-image', 'url(' + attrImage + ')');
                }
                if (attrColor !== undefined) {
                    $(this).find(".parallax-overlay").css('background-color', '' + attrColor + '');
                }
                if (attrOpacity !== undefined) {
                    $(this).find(".parallax-overlay").css('opacity', '' + attrOpacity + '');
                }
            });
        }
        parallaxBG();

        if (!$("html").hasClass("touch")) {
            $(".parallax").css("background-attachment", "fixed");
        }

        function backgroundResize() {
            var windowH = $(window).height();
            $(".parallax").each(function (i) {
                var path = $(this);
                var contW = path.width();
                var contH = path.height();
                var imgW = path.attr("data-img-width");
                var imgH = path.attr("data-img-height");
                var ratio = imgW / imgH;
                var diff = 100;
                diff = diff ? diff : 0;
                var remainingH = 0;

                if (path.hasClass("parallax") && !$("html").hasClass("touch")) {
                    remainingH = windowH - contH;
                }
                imgH = contH + remainingH + diff;
                imgW = imgH * ratio;
                if (contW > imgW) {
                    imgW = contW;
                    imgH = imgW / ratio;
                }
                path.data("resized-imgW", imgW);
                path.data("resized-imgH", imgH);
                path.css("background-size", imgW + "px " + imgH + "px");
            });
        }
        $(window).resize(backgroundResize);
        $(window).focus(backgroundResize);
        backgroundResize();

        function parallaxPosition(e) {
            var heightWindow = $(window).height();
            var topWindow = $(window).scrollTop();
            var bottomWindow = topWindow + heightWindow;
            var currentWindow = (topWindow + bottomWindow) / 2;

            $(".parallax").each(function (i) {
                var path = $(this);
                var height = path.height();
                var top = path.offset().top;
                var bottom = top + height;

                if (bottomWindow > top && topWindow < bottom) {
                    var imgH = path.data("resized-imgH");
                    var min = 0;
                    var max = -imgH + heightWindow;
                    var overflowH = height < heightWindow ? imgH - height : imgH - heightWindow;
                    top = top - overflowH;
                    bottom = bottom + overflowH;
                    var value = 0;

                    if ($('.parallax').is(".titlebar")) {
                        value = min + (max - min) * (currentWindow - top) / (bottom - top) * 2;
                    } else {
                        value = min + (max - min) * (currentWindow - top) / (bottom - top);
                    }
                    var orizontalPosition = path.attr("data-oriz-pos");
                    orizontalPosition = orizontalPosition ? orizontalPosition : "50%";
                    $(this).css("background-position", orizontalPosition + " " + value + "px");
                }
            });
        }

        if (!$("html").hasClass("touch")) {
            $(window).resize(parallaxPosition);
            $(window).scroll(parallaxPosition);
            parallaxPosition();
        }

        /*----------------------------------------------------
          TOOLTIP
        ----------------------------------------------------*/
        $('[data-toggle="tooltip"]').tooltip({
           animated: 'fade',
           container: 'body'
        });



        /*----------------------------------------------------
          Contact Form
        ----------------------------------------------------*/
   		$(".wpcf7-submit" ).addClass( "btn btn-main btn-effect" );
   		$(".post-password-form input[type='submit']" ).addClass( "btn btn-main btn-effect" );
		$(".page img.alignleft[width='160']").closest("p").addClass( "klbclear" );

        /*----------------------------------------------------
          ISOTOPE
        ----------------------------------------------------*/
        var isotope = $('.isotope');

        isotope.imagesLoaded( function() {
            // init Isotope after all images have loaded
            isotope.isotope({
                // options
                itemSelector: '.element',
                transitionDuration: '0.8s',
            });
        });


        /*----------------------------------------------------
          Scrolling
        ----------------------------------------------------*/
		$("a.scroll-down").on('click', function(event) {
			if (this.hash !== "") {
			  event.preventDefault();
			  var hash = this.hash;
			  $('html, body').animate({
				scrollTop: $(hash).offset().top
			  }, 800, function(){
				window.location.hash = hash;
			  });
			} // End if
		});

    }); //end of document ready function

})(jQuery);
