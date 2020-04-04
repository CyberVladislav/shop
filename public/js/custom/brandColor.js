$(document).ready(function () {    
    $.ajaxSetup({
        beforeSend: function(xhr, type) {
            if (!type.crossDomain) {
                xhr.setRequestHeader('X-CSRF-Token', $('meta[name="csrf-token"]').attr('content'));
            }
        },	
    });
    $(document).ready(function(){
        $('.test-checkbox').click(function() {
            var arr=$('input:checkbox:checked').map(function() {return ($(this).attr('id'));}).get();
            // if (arr.length == 0) {
            // 	var asd = [];
            // 	arr = asd;
            // };
            $.ajax({
                type:'POST',
                url:'/ajax',
                data:{ 
                    'brandAndColor[]': arr,
                },
                success: function(result){
                    $('.lattest-product-area').html(result); 
                }
            });                                
        });
    });
});
