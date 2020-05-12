$(function () {
    $('.toast').toast('show')
    changeNavbarUser() 
    
    if (window.location.pathname === '/')  {
        $(document).scroll(function () {
            changeNavbarUser() 
        })
    }

    function changeNavbarUser() {
        if (window.location.pathname === '/' && !$('.navbar-user').hasClass('navbar-authenticated')) {
            if ($(this).scrollTop() > $('.navbar-user').height()) {
                if ($('.navbar-user').hasClass('bg-transparent')) {
                    $('.navbar-user').removeClass('navbar-dark bg-transparent').addClass('navbar-light bg-white shadow-sm')
                    $('.navbar-user .nav-link:not(.btn-light), .navbar-brand').addClass('text-body')
                    $('.navbar-user .nav-link.btn-light').removeClass('text-body btn-light').addClass('btn-primary text-white')
                }
            } else {
                $('.navbar-user').removeClass('bg-white shadow-sm navbar-light').addClass('navbar-dark bg-transparent')
                $('.navbar-user .nav-link.btn-primary').removeClass('btn-primary text-white').addClass('btn-light text-body')
                $('.navbar-user .nav-link:not(.btn-light), .navbar-brand').removeClass('text-body')
            }
        } else {
            $('.navbar-user').removeClass('navbar-dark bg-transparent').addClass('navbar-light bg-white shadow-sm')
            $('.navbar-user .nav-link:not(.btn-light), .navbar-brand').addClass('text-body')
            $('.navbar-user .nav-link.btn-light').removeClass('text-body btn-light').addClass('btn-primary text-white')
        }
    }
})