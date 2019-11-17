


/*=============================================================
    Authour URI: www.binarytheme.com
    License: Commons Attribution 3.0

    http://creativecommons.org/licenses/by/3.0/

    100% To use For Personal And Commercial Use.
    IN EXCHANGE JUST GIVE US CREDITS AND TELL YOUR FRIENDS ABOUT US
   
    ========================================================  */

jQuery.noConflict();

(function ($) {
    "use strict";
    var mainApp = {

        main_fun: function () {
           
            /*====================================
              LOAD APPROPRIATE MENU BAR
           ======================================*/
            $(window).bind("load resize", function () {
                if ($(this).width() < 768) {
                    $('div.sidebar-collapse').addClass('collapse')
                } else {
                    $('div.sidebar-collapse').removeClass('collapse')
                }
            });

          
     
        },

        initialization: function () {
            mainApp.main_fun();

        }

    }
    // Initializing ///

    $(document).ready(function () {
        mainApp.main_fun();

        $('.myaccount span').click(function() {
            $(this).toggleClass('active')
        })

        var winHeight = $(window).height();
        var winWidth = $(window).width();
        $('#wrapper').css('min-height', winHeight);

        $(window).resize(function() {
            setTimeout(doneResizing, 500);
        });

        function doneResizing(){
            var winWidth = $(window).width();
            var winHeight = $(window).height();

            $('#wrapper').css('min-height', winHeight);

            $('li.has-submenu').each(function() {
                if (winWidth < 1001) {
                    if ($(this).hasClass('active')) {
                        $(this).removeClass('active')
                    }
                }
            })
            
        }

        $('#main-menu > li').each(function() {
            if ( $(this).children('ul').length > 0 ) {
                $(this).addClass('has-submenu');
            }
        })

        $('li.has-submenu').each(function() {
            if (winWidth < 1001) {
                if ($(this).hasClass('active')) {
                    $(this).removeClass('active')
                }
            }
        })

        $('#main-menu > li').click(function() {
            $(this).addClass('active').siblings('li').removeClass('active');
        })
        
        
    });

}(jQuery));
