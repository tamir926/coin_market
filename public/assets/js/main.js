$(window).on("load", function() {
    setTimeout(ani1, 800);
    var dheight = $(".shiidel1 .dugui").width();
    $(".shiidel1 .dugui").css('height', dheight);
    var eheight = $(".ecosystem .dugui").width();
    $(".ecosystem .dugui").css('height', eheight);
});


function ani1() {
    $('.bl2').addClass("bl2-in");

    
}



jQuery(document).ready(function($) {
    
      $(".navbar-nav a").click(function(){
        $('.navbar-collapse').toggleClass("show");
      });


    $(".btn1").mouseover(function() {
        $('.btn-img1').addClass("btn1-in");
        $(this).find('.btn-name').addClass("btn-name-in");
    })

    $(".btn1").mouseout(function() {
        $('.btn-img1').removeClass("btn1-in");
        $(this).find('.btn-name').removeClass("btn-name-in");
    })

    $(".btn2").mouseover(function() {
        $(this).addClass("btn2-in");
        $(this).find('.btn-name').addClass("btn-name-in");
    })

    $(".btn2").mouseout(function() {
        $(this).removeClass("btn2-in");
        $(this).find('.btn-name').removeClass("btn-name-in");
    })

    $(".btn3").mouseover(function() {
        $(this).addClass("btn2-in");
        $(this).find('.btn-name').addClass("btn-name-in");
    })

    $(".btn3").mouseout(function() {
        $(this).removeClass("btn2-in");
        $(this).find('.btn-name').removeClass("btn-name-in");
    })

    $('.featured-home').owlCarousel({
        lazyLoad: true,
        margin: 10,
        loop: true,
        dots: true,
        nav: true,
        margin: 0,
        autoplay:true,
        autoplayTimeout:4000,
        autoplayHoverPause:true,
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 1
            },
            960: {
                items: 1
            },
            1200: {
                items: 1
            }
        }
    });

    $('.single-gallery').owlCarousel({
        lazyLoad: true,
        margin: 10,
        loop: true,
        dots: true,
        nav: true,
        margin: 0,
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 1
            },
            960: {
                items: 1
            },
            1200: {
                items: 1
            }
        }
    });

    $('.book-home').owlCarousel({
        lazyLoad: true,
        margin: 10,
        loop: false,
        dots: true,
        nav: true,
        margin: 10,
        autoplayTimeout:5000,
        autoplayHoverPause:true,
        responsive: {
            0: {
                items: 2
            },
            600: {
                items: 3
            },
            960: {
                items: 2
            },
            1200: {
                items: 2
            }
        }
    });
    $('.video-home').owlCarousel({
        lazyLoad: true,
        margin: 10,
        loop: false,
        dots: true,
        nav: true,
        margin: 10,
        autoplayTimeout:5000,
        autoplayHoverPause:true,
        responsive: {
            0: {
                slideBy: 1,
                items: 1
            },
            600: {
                slideBy: 2,
                items: 2
            },
            960: {
                slideBy: 3,
                items: 3
            },
            1200: {
                slideBy: 4,
                items: 4
            }
        }
    });

    $('.news-page').owlCarousel({
        lazyLoad: true,
        margin: 10,
        loop: false,
        dots: true,
        nav: true,
        margin: 10,
        autoplayTimeout:5000,
        autoplayHoverPause:true,
        responsive: {
            0: {
                slideBy: 1,
                items: 1
            },
            600: {
                slideBy: 2,
                items: 2
            },
            960: {
                slideBy: 3,
                items: 3
            },
            1200: {
                slideBy: 4,
                items: 4
            }
        }
    });

    $('.client').owlCarousel({
        lazyLoad: true,
        margin: 10,
        loop: true,
        dots: true,
        nav: false,
        margin: 0,
        autoplay:true,
        autoplayTimeout:2000,
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 2
            },
            992: {
                items: 3
            },
            1200: {
                items: 4
            }
        }
    });

    $('.gallery-news').owlCarousel({
        lazyLoad: true,
        autoHeight:true,
        margin: 10,
        loop: false,
        dots: true,
        nav: true,
        margin: 0,
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 1
            },
            992: {
                items: 1
            },
            1200: {
                items: 1
            }
        }
    });
    
});






