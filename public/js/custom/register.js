$(document).ready(function () {
    $('.js-register').on('click', function () {
    var name = $('.js-register-name').val();
    var email = $('.js-register-email').val();
    var password = $('.js-register-password').val();
    var password_confirmation = $('.js-register-password-confirm').val();
        if (name == '') $("#js-help-error-box").html("The name field is required.");
        else if (email == '') $("#js-help-error-box").html("The email field is required.");
        else if (password.length < 6) {
            $("#js-help-error-box").html("The password must be at least 6."); 
            $('.js-register-password').val('');
            $('.js-register-password-confirm').val('');
        }
        else if (!(password == password_confirmation)) {
            $("#js-help-error-box").html("The password confirmation does not match.");
            $('.js-register-password').val('');
            $('.js-register-password-confirm').val('');
        }
        else {
            $.ajax({
                type: 'POST',
                url: '/register',
                data: "name=" + name + "&email=" + email + "&password=" + password + "&password_confirmation=" + password_confirmation,
                success: function (data) {
                    window.location.href = '/';
                },
                error: function (error) {
                    $("#js-help-error-box").html(error.responseJSON.errors.email);
                }
            });
        };
    });
});
