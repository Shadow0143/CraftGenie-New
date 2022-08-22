$(document).ready(function() {
    fixedheader();
    Owlcarousla();
    Owlbanner();
    Owlclientsp();
    Owlblogslide();
});





//Fixed Header
function fixedheader() {
    jQuery(window).scroll(function() {
        if (jQuery(window).scrollTop() > 50) {
            jQuery(".navbar").addClass("fixed");
        } else {
            jQuery(".navbar").removeClass("fixed");
        }
    });
}




function Owlcarousla() {
    $('#owl-demo1').owlCarousel({
        loop: true,
        nav: true,
        dots: false,
        items: 3,
        autoplay: false,
        margin: 15,
        smartSpeed: 1000,
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 2
            },
            1000: {
                items: 3,
                nav: true,
                loop: false
            }
        }
    });

}

function Owlblogslide() {
    $('#blogslide').owlCarousel({
        loop: true,
        nav: true,
        dots: false,
        items: 3,
        autoplay: false,
        margin: 15,
        smartSpeed: 1000,
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 2
            },
            1000: {
                items: 4,
                nav: true,
                loop: false
            }
        }
    });

}

function Owlclientsp() {
    $('#clientsp').owlCarousel({
        loop: true,
        nav: false,
        dots: true,
        items: 3,
        autoplay: false,
        margin: 15,
        smartSpeed: 1000,
        responsive: {
            0: {
                items: 1
            },
            1000: {
                items: 1,
                nav: true,
                loop: false
            }
        }
    });

}

function Owlbanner() {
    $('#banner').owlCarousel({
        loop: true,
        nav: false,
        dots: true,
        items: 3,
        autoplay: true,
        margin: 15,
        smartSpeed: 1000,
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 1
            },
            1000: {
                items: 1
            }
        }
    });

}