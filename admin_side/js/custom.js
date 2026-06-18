
$(document).ready(function () {


    $(window).scroll(function () {
        // alert()

        var h = $(window).scrollTop();

        // alert(h)

        if (h > 130) {
            // $('.top_header').addClass('p_header_fix');
            $('.scroll_top').addClass('bottom').removeClass('top');
        }
        else {
            // $('.top_header').removeClass('p_header_fix');
            $('.scroll_top').addClass('top').removeClass('bottom');
        }
    })

    // scroll to top

    $('.scroll_top').click(function () {
        $('body, html').animate({ scrollTop: 0 });
    })


    // loader code

    setTimeout(function () {
        $('.center-body').fadeOut(700)
    }, 1000)


    $('.mob_sub_menu, .mob_main_menu').hide();




    $('.toggle').click(function () {
        $('.mob_main_menu').slideToggle();

        $('.toggle > i').toggleClass('fa-bars , fa-xmark');





    })

    $('.mob_main_menu >  li > a').click(function () {
        $(this).next('.mob_sub_menu').slideToggle();
    })
    $(".slider1").owlCarousel({
        items: 1,
        nav: false,
        autoplay: true,
        autoplayTimeout: 5000,
        animateIn: 'animate__fadeInLeft',
        // animateIn:'animate__fadeInRight',
        autoplayHoverPause: true,
        loop: true,

    });

    new WOW().init();

    var owl = $('.slider1');
    owl.owlCarousel();
    owl.on('changed.owl.carousel', function (event) {
        new WOW().init();
    })
    $('.slider2').owlCarousel({
        items: 1,
        loop: true,
        margin: 20,
        nav: true,
        dots: false,
        navText: ["<i class='fa-solid fa-angle-left'></i>", "<i class='fa-solid fa-angle-right'></i>"],
        animateIn: 'fadeIn'




    })
    $('.slider3').owlCarousel({
        items: 5,
        loop: true,
        margin: 20,
        nav: false,
        dots: false,
        navText: ["<i class='fa-solid fa-angle-left'></i>", "<i class='fa-solid fa-angle-right'></i>"],
        animateIn: 'fadeIn',
        autoplay: true,
        autoplayTimeout: 2000,
        responsiveclass: true,
        responsive: {
            0: {
                items: 1,
            },

            600: {
                items: 3,
            },
            1000: {
                items: 5,
            }
        },
    })

   
    $('.load_more').click(function () {
        $('.moretext').slideToggle();

        var elem = $("#lod_less_btn").text();
        if (elem == "Load Less") {
            //Stuff to do when btn is in the read more state
            $("#lod_less_btn").html("<span>Load More</span>");
            $("#moretext").slideDown();
        } else {
            //Stuff to do when btn is in the read less state
            $("#lod_less_btn").html("<span>Load Less</span>");
            $("#moretext").slideUp();
        }
    });

    $('.form').find('input, textarea').on('keyup blur focus', function (e) {

        var $this = $(this),
            label = $this.prev('label');

        if (e.type === 'keyup') {
            if ($this.val() === '') {
                label.removeClass('active highlight');
            } else {
                label.addClass('active highlight');
            }
        } else if (e.type === 'blur') {
            if ($this.val() === '') {
                label.removeClass('active highlight');
            } else {
                label.removeClass('highlight');
            }
        } else if (e.type === 'focus') {

            if ($this.val() === '') {
                label.removeClass('highlight');
            }
            else if ($this.val() !== '') {
                label.addClass('highlight');
            }
        }

    });

    $('.tab a').on('click', function (e) {

        e.preventDefault();

        $(this).parent().addClass('active');
        $(this).parent().siblings().removeClass('active');

        target = $(this).attr('href');

        $('.tab-content > div').not(target).hide();

        $(target).fadeIn(600);

    });

    // product color chang end-------------------------



   



})
