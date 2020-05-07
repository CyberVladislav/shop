$(document).ready(function(){
    //----- Active No ui slider --------//
    var maximum = 0;    
    var checkUrl = window.location.pathname;
    if (checkUrl == '/category') checkUrl = '/category/0'; 
    $.ajax({
        async: false,
        url: '/rangePrice' + checkUrl,
        success: function(data){
            maximum = parseInt(data);
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
                var arr = nonLinearSlider.noUiSlider.get();
                console.log(arr);
                $.ajax({
                    type:'POST',
                    url:'/ajaxSlider' + checkUrl,
                    data:{ 
                        'varPr[]': arr,
                    },
                    success: function(result){
                        $('.lattest-product-area').html(result); 
                    },
                    error: function(err){
                        console.log(err);
                    }
                });  
                    
            });
		}
	});	
});
