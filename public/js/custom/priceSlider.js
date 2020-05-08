$(document).ready(function(){
    //----- Active No ui slider --------//
    var maximum = 0;    
    var checkUrl = window.location.pathname;
    if (checkUrl == '/category') checkUrl = '/category/0'; 
    if (!checkUrl.includes('/category')) return false;
    $.ajax({
        async: false,
        type: "POST",
        url: '/rangePrice' + checkUrl,
        success: function(data){
            maximum = parseInt(data);
        },
        error: function(error){
            console.log(error);
        }
    });
	$(function(){
	    if(document.getElementById("price-range")){
            var nonLinearSlider = document.getElementById('price-range');
            noUiSlider.create(nonLinearSlider, {
                connect: true,
                step: 50,
                behaviour: 'tap',
                start: [ 0, maximum ],
                range: {
                    // Starting at 500, step the value by 500,
                    // until 4000 is reached. From there, step by 1000.
                    'min': [ 0 ],
                    'max': [ maximum ]
                }
            });
            var nodes = [
                document.getElementById('lower-value'), // 0
                document.getElementById('upper-value')  // 1
            ];
            // Display the slider value and how far the handle moved
            // from the left edge of the slider.
            nonLinearSlider.noUiSlider.on('update', function ( values, handle, unencoded, isTap, positions ) {
                nodes[handle].innerHTML = values[handle];
                // var masiv = nonLinearSlider.noUiSlider.get();        
            });
		}
    });	
    $('.js-price-test').on('click', function(){
        var show = $('.show-product').val();
        var sort = $('.sorting-product').val(); 
        var checkedArray = $('input:checkbox:checked').map(function() {
            return ($(this).attr('id'));
        }).get();
        var minPrice = $('#lower-value').text(); 
        var maxPrice = $('#upper-value').text();
        var priceArray = [minPrice, maxPrice];
        var checkUrl = window.location.pathname;
        if (checkUrl == '/category') checkUrl = '/category/0';
        if (!checkUrl.includes('/category')) window.location.replace('/category');
        $.ajax({
            type:'POST',
            url:'/ajax' + checkUrl,
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
