$(document).ready(function () {
    $(".sorting-product").change(function(){ /* WHEN YOU CHANGE AND SELECT FROM THE SELECT FIELD */
        var sort = $(this).val(); 
        var dataString = "sort="+sort;        
        var checkUrl = window.location.pathname;
        if (checkUrl == '/category') checkUrl = '/category/0'; 
        $.ajax({ 
            type: "POST",
            url: "/ajaxSort" + checkUrl, 
            data: dataString, 
            success: function(result){ 
                $('.lattest-product-area').html(result); 
            },
            error: function(err){
                console.log(err);
            }
        });
    });
});
