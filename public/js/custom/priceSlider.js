$(document).ready(function(){
    //----- Active No ui slider --------//
	$.ajax({
		url: '/rangePrice'
	}).then(function (result) {
		var maximum = parseInt(result.max);
		$(function(){
		    if(document.getElementById("price-range")){
                var nonLinearSlider = document.getElementById('price-range');
                noUiSlider.create(nonLinearSlider, {
                    connect: true,
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
                        url:'/ajaxSlider',
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
	})
});
