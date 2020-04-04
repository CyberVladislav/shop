$(document).ready(function () {
    $(".sorting-product").change(function(){ /* WHEN YOU CHANGE AND SELECT FROM THE SELECT FIELD */
        var sort = $(this).val(); 
        var dataString = "sort="+sort; 
        $.ajax({ 
            type: "POST",
            url: "/ajaxSort", 
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
