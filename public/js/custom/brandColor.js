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
            var arr = $('input:checkbox:checked').map(function() {
                return ($(this).attr('id'));
            }).get();
            var checkUrl = window.location.pathname;
            if (checkUrl == '/category') checkUrl = '/category/0'; 
            $.ajax({
                type:'POST',
                url:'/ajax' + checkUrl, 
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
