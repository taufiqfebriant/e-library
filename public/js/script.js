$(function () {
    let rating = $('.rating')
    
    $('.toast').toast('show')
    changeNavbarUser() 
    
    if (window.location.pathname === '/')  {
        $(document).scroll(function () {
            changeNavbarUser() 
        })
    }

    function changeNavbarUser() {
        if (window.location.pathname === '/') {
            if ($(this).scrollTop() > $('.navbar-user').height()) {
                if ($('.navbar-user').hasClass('bg-transparent')) {
                    $('.navbar-user').removeClass('bg-transparent').addClass('bg-white shadow-sm')
                    $('.navbar-user .nav-link:not(.btn-light), .navbar-brand').addClass('text-body')
                    $('.navbar-user .nav-link.btn-light').removeClass('text-body btn-light').addClass('btn-primary')
                }
            } else {
                $('.navbar-user').removeClass('bg-white shadow-sm').addClass('bg-transparent')
                $('.navbar-user .nav-link.btn-primary').removeClass('btn-primary').addClass('btn-light text-body')
                $('.navbar-user .nav-link:not(.btn-light), .navbar-brand').removeClass('text-body')
            }
        } else {
            $('.navbar-user').removeClass('bg-transparent').addClass('bg-white shadow-sm')
            $('.navbar-user .nav-link:not(.btn-light), .navbar-brand').addClass('text-body')
            $('.navbar-user .nav-link.btn-light').removeClass('text-body btn-light').addClass('btn-primary')
        }
    }

    rating.starRating({
        starSize: 25,
        useFullStars: true,
        disableAfterRate: false,
        callback: function(currentRating) {
            rating.next('#rating').val(currentRating)
        }
    });
})