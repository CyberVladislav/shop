$(document).ready(function () {
    $(".show-product").change(function(){ /* WHEN YOU CHANGE AND SELECT FROM THE SELECT FIELD */
        var show = $(this).val(); 
        var dataString = "show="+show;
        var checkUrl = window.location.pathname;
            if (checkUrl == '/category') checkUrl = '/category/0'; 
        $.ajax({ 
            type: "POST",
            url: "/ajaxShow" + checkUrl, 
            data: dataString, 
            success: function(result){ 
                $('.lattest-product-area').html(result); 
            }
        });
    });
});
