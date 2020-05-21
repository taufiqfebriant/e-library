const get_url = document.location
const host = get_url.host === "localhost" ? `/${get_url.pathname.split("/")[1]}` : ""
const base_url = get_url.origin + host
let segments = document.location.pathname.split('/')

$(function () {
    // Ajax headers
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    })

    if ($('.toast .toast-message').is(':not(:empty)')) {
        $('.toast').toast('show')
    }
    
    // Notifikasi member
    $('.dropdown-toggler').parent('.dropdown').on('shown.bs.dropdown', function () {
        $(this).find('.navbar-badge').remove()
        let dropdownMenu = $(this).find('.dropdown-menu')
        if ($(this).find('.spinner-border').length) {
            $.ajax({
                method: 'GET',
                url: `${base_url}/notifications`,
                success: function (response) {
                    dropdownMenu.html(response)
                    $.ajax({
                        method: 'POST',
                        url: `${base_url}/notifications/mark-as-read`
                    })
                }
            })
        }
    })

    $('.add-to-cart').click(function () {
        let pathArray = document.location.pathname.split('/');
        $.ajax({
            context: $(this),
            data: {
                id: pathArray[2]
            },
            method: 'POST',
            url: `${base_url}/cart`,
            success: function (response) {
                $('.toast-body').addClass('bg-success');
                $('.toast-message').text('Berhasil menambahkan buku ke dalam keranjang.');
                $('.toast').toast('show')
                $(this).remove()
                $('.cart-icon-wrapper a').append(`
                    <span class="badge badge-darkslategray navbar-badge">${response.total}</span>
                `)
            }
        })
    })

    $('.navbar-search-toggler').click(function () {
        if ($('.navbar-search').is(':hidden')) {
            $('.navbar-search').slideDown(300)
        } else {
            $('.navbar-search').slideUp(300)
        }
    })

    // Pagination
    $(document).on('click', '.reviews-pagination .pagination a', function (event) {
        event.preventDefault()
        let page = $(this).attr('href').split('page=')[1]
        $.ajax({
            data: {
                book_id: segments[2],
                page
            },
            url: `${base_url}/pagination/reviews`,
            success: function (response) {
                $('.reviews .content').html(response)
            }
        })
    })

    function initStarRating() {
        $('.rating').starRating({
            starSize: 25,
            useFullStars: true,
            disableAfterRate: false,
            callback: function(currentRating) {
                $('.rating').next('#rating').val(currentRating)
            }
        });
    }
})