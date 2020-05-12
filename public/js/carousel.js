$(function () {
    $('.book-carousel').slick({
        slidesToShow: 6,
        reponsive: [
            {
                breakpoint: 1200,
                setting: {
                    slidesToShow: 5,
                    slidesToScroll: 5,
                }
            },
            {
                breakpoint: 1008,
                setting: {
                    slidesToShow: 3,
                    slidesToScroll: 3,
                }
            },
            {
                breakpoint: 800,
                setting: {
                    slidesToShow: 2,
                    slidesToScroll: 2
                }
            },
            {
                setting: 'unslick'
            }
        ]
    });

    $(window).on('resize', function() {
        $('.book-carousel').slick('resize');
    });
})