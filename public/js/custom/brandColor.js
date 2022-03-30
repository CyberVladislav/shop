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
            var checkedArray = $('input:checkbox:checked').map(function() {
                return ($(this).attr('id'));
            }).get();
            var show = $('.show-product').val();
            var sort = $('.sorting-product').val(); 
            var minPrice = $('#lower-value').text(); 
            var maxPrice = $('#upper-value').text();
            var priceArray = [minPrice, maxPrice];
            console.log(priceArray);
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
                }
            });                                
        });
    });
});
