$(document).ready(function () {
    $('.fa-close').on('click', function () {
        var idProduct = $(this).attr("js-del-product");
        var count = $('#product_'+idProduct).attr("count");
        var price = $('#product_'+idProduct).attr("price-of-product");			
        var productCost = count * price;
        var totalCost = $('.js-subtotal').text().substr(1);
        var result = totalCost - productCost;
        $.ajax({
            type:'POST',
            url:'/deleteProduct',
            data:'idProduct=' +idProduct,
            success: function(data){
                $('.js-tr-del-product-'+idProduct).remove();
                $('.sub-total').text('$'+result);
                if(data.isEmpty == 'empty')	window.location.href = '/';
            }
        })
    });
});
