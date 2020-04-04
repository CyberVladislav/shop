$(document).ready(function () {
    $(".add-to-cart").click(function(){
        var productId = $(this).attr('data-product');
        var dataString = "productId="+productId; 
        $.ajax({ 
            type: "POST",
            url: "/ajaxCart", 
            data: dataString, 
            success: function(result){
                if(result.result == 'reload')
                window.location.href = '/login';
            }
        });
    });
});
