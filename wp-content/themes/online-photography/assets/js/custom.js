jQuery(document).ready(function($) {

    // Main Navigation
    $('.menu-toggle').click(function() {
        $(this).toggleClass('active');
        $(this).parent().toggleClass('navigation-active');
        $(this).parent().find('.nav-menu').slideToggle();
    });

    $('.dropdown-toggle').click(function() {
        $(this).toggleClass('active');
       $(this).parent().find('.sub-menu').first().slideToggle();
    });

    // Scroll To Top
    var scroll    = $(window).scrollTop();  
    var scrollup  = $('.to-top');  

    $(window).scroll(function() {
        if ($(this).scrollTop() > 1) {
            scrollup.css({bottom:"25px"});
        } 
        else {
            scrollup.css({bottom:"-100px"});
        }
    });

    scrollup.click(function() {
        $('html, body').animate({scrollTop: '0px'}, 800);
        return false;
    });

    // Swiper Slider
    var swiper = new Swiper('.swiper-container', {
        autoHeight: true,
        effect: 'fade',
        grabCursor: true,
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
    });

    // Responsive Menu Accessibility
    if( $(window).width() < 1024 ) {
        $('#site-navigation .nav-menu').find("li").last().bind( 'keydown', function(e) {
            if( e.which === 9 ) {
                e.preventDefault();
                $('.site-header').find('button.menu-toggle').focus();
            }
        });
    }
    else {
        $('#site-navigation .nav-menu li').last().unbind('keydown');
    }

    $(window).resize(function() {
        if( $(window).width() < 1024 ) {
            $('#site-navigation .nav-menu').find("li").last().bind( 'keydown', function(e) {
                if( e.which === 9 ) {
                    e.preventDefault();
                    $('.site-header').find('button.menu-toggle').focus();
                }
            });
        }
        else {
            $('#site-navigation .nav-menu li').last().unbind('keydown');
        }
    });
});