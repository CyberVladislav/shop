$(document).ready(function () {
    $(".show-product").change(function(){ /* WHEN YOU CHANGE AND SELECT FROM THE SELECT FIELD */
        var show = $(this).val(); 
        var dataString = "show="+show; 
        $.ajax({ 
            type: "POST",
            url: "/ajaxShow", 
            data: dataString, 
            success: function(result){ 
                $('.lattest-product-area').html(result); 
            }
        });
    });
});
