$(function() {
    $(document).on("click", '[data-toggle="lightbox"]', function(event) {
        event.preventDefault();
        $(this).ekkoLightbox({
            alwaysShowClose: true
        });
    });

    // Menghitung karakter deskripsi paket
    $('#planDescription').on('input', function () {
        var currentLength = $(this).val().length
        $('#planDescriptionLength').text(currentLength)
    })
});