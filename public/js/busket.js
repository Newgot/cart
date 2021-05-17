$(document).ready(function() {
    $('.product-btn').click(function(){
        let idProduct = $(this).data('id')
        let url = $(this).data('url')
        execute(idProduct, url)
    })
});

function execute (idProduct, url) {

    $.ajax({
        url: url,
        type: "POST",
        data: {
            idProduct: idProduct,
            qty: 1,
        },
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function() {
            location.reload()
        }
    })
}
