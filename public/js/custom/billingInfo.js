$(document).ready(function () {
    $('.js-billing-btn').on('click', function () {
    var firstName = $('#js-first').val();
    var lastName = $('#js-last').val();
    var phone = $('#js-phone').val();
    var postcode = $('#js-postcode').val();
    var address = $('#js-address').val();
    var city = $('#js-city').val();
    var notes = $('#js-notes').val();
    var arr = {};
    $('.price-choosen-product').each(function(){
        var productCount = parseInt($(this).attr('count'));
        var productId = parseInt($(this).attr('id-of-product'));
        arr[productId] = productCount;
    });
        $.ajax({
            type: 'POST',
            url: '/billing',
            data: {
                'firstName' : firstName, 
                'lastName' : lastName,
                'phone' : phone,
                'postcode' : postcode, 
                'address' : address,
                'city' : city,
                'notes' : notes,
                'arr' : arr,
            },
            success: function (data) {
                if (data.result == 'notExist'){
                    $("#alreadySendModal").modal('show');
                    setTimeout("location.href = '/confirmation';",1200);
                }
                else window.location.href = '/confirmation';
            },
            error: function (error) {
                if (error.responseJSON.errors.city)	$("#js-help-error-cart").html(error.responseJSON.errors.city);
                if (error.responseJSON.errors.address)	$("#js-help-error-cart").html(error.responseJSON.errors.address);
                if (error.responseJSON.errors.postcode)	$("#js-help-error-cart").html(error.responseJSON.errors.postcode);
                if (error.responseJSON.errors.phone)	$("#js-help-error-cart").html(error.responseJSON.errors.phone);
                if (error.responseJSON.errors.lastName)	$("#js-help-error-cart").html(error.responseJSON.errors.lastName);
                if (error.responseJSON.errors.firstName)	$("#js-help-error-cart").html(error.responseJSON.errors.firstName);
            }
        });
    });
});
