$(document).ready(function () {
    $('.js-register').on('click', function () {
    var name = $('.js-register-name').val();
    var email = $('.js-register-email').val();
    var password = $('.js-register-password').val();
    var password_confirmation = $('.js-register-password-confirm').val();
        $.ajax({
            type: 'POST',
            url: '/register',
            data: "name=" + name + "&email=" + email + "&password=" + password + "&password_confirmation=" + password_confirmation,
            success: function (data) {
                window.location.href = '/';
            },
            error: function (xhr, error) {
                var err = JSON.parse(xhr.responseText);
                var errName = err.errors['name'];
                var errEmail = err.errors['email'];
                var errPassword = err.errors['password'];
                if(typeof(errPassword) != "undefined" && errPassword !== null) {
                    $(".js-register-password").val('');
                    $(".js-register-password-confirm").val('');
                    $("#js-help-error-box").html(errPassword);
                }
                if(typeof(errEmail) != "undefined" && errEmail !== null) {
                    $("#js-help-error-box").html(errEmail);
                }
                if(typeof(errName) != "undefined" && errName !== null) {
                    $("#js-help-error-box").html(errName);
                }                
            }
        });
    });
});
