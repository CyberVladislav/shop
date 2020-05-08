$(document).ready(function () {
    $(".sorting-product").change(function(){ /* WHEN YOU CHANGE AND SELECT FROM THE SELECT FIELD */
        var sort = $(this).val(); 
        var checkedArray = $('input:checkbox:checked').map(function() {
            return ($(this).attr('id'));
        }).get();
        var show = $('.show-product').val();
        var minPrice = $('#lower-value').text(); 
        var maxPrice = $('#upper-value').text();
        var priceArray = [minPrice, maxPrice];
        var checkUrl = window.location.pathname;
        if (checkUrl == '/category') checkUrl = '/category/0'; 
        if (!checkUrl.includes('/category')) window.location.replace('/category');
        $.ajax({ 
            type: "POST",
            url: '/ajax' + checkUrl,
            data: {
                'show': show,
                'sort': sort,
                'priceArray[]': priceArray,
                'checkedArray[]': checkedArray,
            },
            success: function(result){ 
                $('.lattest-product-area').html(result); 
            },
            error: function(err){
                console.log(err);
            }
        });
    });
});
