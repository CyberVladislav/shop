$(document).ready(function () {
    var timer;
    $('#contactform').on('submit', function (e) {
    e.preventDefault();         
    clearTimeout(timer);
    var idProduct = $(this).attr("productId");
    var allData = $(this).serialize();
        $.ajax({
            type: 'POST',
            url: '/ajaxLeaveReview',
            data: allData + "&idProduct=" + idProduct,
            success: function (data) {
                if (data) {
                    $('#senderror').hide();
                    $('#sendmessage').slideDown(600);
                    timer = setTimeout(function() {
                        $('#sendmessage').slideUp(600);
                    }, 4000);						
                    $('.comment_list').append(data);
                } else {
                    $('#senderror').show();
                }
                $("#contactform")[0].reset();
            },
            error: function () {
                $('#sendmessage').hide();
                $('#senderror').slideDown(600);
                timer = setTimeout(function() {
                    $('#senderror').slideUp(600);
                }, 6000);						
                $("#contactform")[0].reset();
            }
        });
    });
});
