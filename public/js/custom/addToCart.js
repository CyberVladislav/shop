$(document).ready(function () {
    $(".add-to-cart").click(function(){
        var productId = $(this).attr('data-product');
        var count = $('.js-singleProduct-count').val();
        var dataString = "productId=" + productId + "&count=" + count;  
        $.ajax({ 
            type: "POST",
            url: "/ajaxCart", 
            data: dataString, 
            success: function(result){
                $('.js-singleProduct-count').val('1');
                $('.js-cart-order').removeClass('d-none');
                $('.js-cart-no-order').addClass('d-none');
            }
        });
    });
});
