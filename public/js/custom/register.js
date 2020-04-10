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
            error: function (error) {
                var statusCode = error.responseText;
                console.log(statusCode);
                if((statusCode.includes('The name field is required') == true) && (statusCode.includes('The email field is required') == true) 
                && (statusCode.includes('The password must be at least 6 characters') == true) && (statusCode.includes('The password confirmation does not match') == true))
                {
                    $("#js-help-name").show().html("The Name field is required.");
                    $("#js-help-email").show().html("The Email field is required.");
                    $("#js-help-password").show().html("The Password must be at least 6 characters. The Password confirmation does not match.");
                    $(".js-register-password").val('');
                    $(".js-register-password-confirm").val('');
                }
                else if ((statusCode.includes('The name field is required') == true) && (statusCode.includes('The email field is required') == true) 
                && (statusCode.includes('The password field is required') == true))
                {
                    $("#js-help-name").show().html("The Name field is required.");
                    $("#js-help-email").show().html("The Email field is required.");
                    $("#js-help-password").show().html("The Password field is required.");
                    $(".js-register-password-confirm").val('');
                }
                else if ((statusCode.includes('The name field is required') == true) && (statusCode.includes('The email must be a valid email address') == true) 
                && (statusCode.includes('The password field is required') == true))
                {	
                    $("#js-help-name").show().html("The Name field is required.");
                    $("#js-help-email").show().html("The email must be a valid email address.");
                    $("#js-help-password").show().html("The Password field is required.");
                    $(".js-register-password-confirm").val('');
                }
                else if((statusCode.includes('The name field is required') == true) && (statusCode.includes('The password must be at least 6 characters') == true) 
                && (statusCode.includes('The password confirmation does not match') == true))
                {
                    $("#js-help-name").show().html("The Name field is required.");
                    $("#js-help-email").hide();
                    $("#js-help-password").show().html("The Password must be at least 6 characters. The Password confirmation does not match.");
                    $(".js-register-password").val('');
                    $(".js-register-password-confirm").val('');
                }
                else if((statusCode.includes('The email has already been taken') == true) && (statusCode.includes('The password must be at least 6 characters') == true) 
                && (statusCode.includes('The password confirmation does not match') == true))
                {
                    $("#js-help-name").hide();
                    $("#js-help-email").show().html("The Email has already been taken.");
                    $("#js-help-password").show().html("The password must be at least 6 characters. sdfsdfsdfsThe Password confirmation does not match.");
                    $(".js-register-password").val('');
                    $(".js-register-password-confirm").val('');
                }
                else if ((statusCode.includes('The email field is required') == true) && (statusCode.includes('The password field is required') == true))
                {
                    $("#js-help-name").hide();
                    $("#js-help-email").show().html("The Email field is required.");
                    $("#js-help-password").show().html("The Password field is required.");
                    $(".js-register-password-confirm").val('');
                }                
                else if((statusCode.includes('The email must be a valid email address') == true) && (statusCode.includes('The password field is required') == true))
                {
                    $("#js-help-name").hide();
                    $("#js-help-email").show().html("The email must be a valid email address.");
                    $("#js-help-password").show().html("The Password field is required.");
                    $(".js-register-password-confirm").val('');
                }
                else if ((statusCode.includes('The email has already been taken') == true) && (statusCode.includes('The password field is required') == true))
                {
                    $("#js-help-name").hide();
                    $("#js-help-email").show().html("The Email has already been taken.");
                    $("#js-help-password").show().html("The Password field is required.");
                    $(".js-register-password-confirm").val('');
                }
                else if((statusCode.includes('The email field is required') == true) && (statusCode.includes('The password confirmation does not match') == true))
                {
                    $("#js-help-name").hide();
                    $("#js-help-email").show().html("The Email field is required.");
                    $("#js-help-password").show().html("The Password confirmation does not match.");
                    $(".js-register-password").val('');
                    $(".js-register-password-confirm").val('');
                }
                else if ((statusCode.includes('The email has already been taken') == true) && (statusCode.includes('The password confirmation does not match') == true))
                {
                    $("#js-help-name").hide();
                    $("#js-help-email").show().html("The Email has already been taken.");                    
                    $("#js-help-password").show().html("The Password confirmation does not match.");
                    $(".js-register-password").val('');
                    $(".js-register-password-confirm").val('');
                }
                else if((statusCode.includes('The email must be a valid email address') == true) && (statusCode.includes('The password confirmation does not match') == true))
                {
                    $("#js-help-name").hide();
                    $("#js-help-email").show().html("The email must be a valid email address.");
                    $("#js-help-password").show().html("The Password confirmation does not match.");
                    $(".js-register-password").val('');
                    $(".js-register-password-confirm").val('');
                }
                else if((statusCode.includes('The password must be at least 6 characters') == true) && (statusCode.includes('The password confirmation does not match') == true))
                {
                    $("#js-help-name").hide();
                    $("#js-help-email").hide();
                    $("#js-help-password").show().html("The Password must be at least 6 characters. The Password confirmation does not match.");
                    $(".js-register-password").val('');
                    $(".js-register-password-confirm").val('');
                }
                else if ((statusCode.includes('The name field is required') == true) && (statusCode.includes('The password field is required') == true))
                {
                    $("#js-help-name").show().html("The Name field is required.");
                    $("#js-help-email").hide();
                    $("#js-help-password").show().html("The Password field is required.");
                    $(".js-register-password").val('');                    
                    $(".js-register-password-confirm").val('');
                }
                else if((statusCode.includes('The password field is required') == true))
                {
                    $("#js-help-name").hide();
                    $("#js-help-email").hide();
                    $("#js-help-password").show().html("The Password field is required.");
                    $(".js-register-password").val('');                    
                    $(".js-register-password-confirm").val('');
                }                                                               
                else if (statusCode.includes('The email has already been taken') == true)
                {
                    $("#js-help-name").hide();
                    $("#js-help-email").show().html("The Email has already been taken.");            
                    $(".js-register-password").val('');
                    $(".js-register-password-confirm").val('');
                }
                else{
                    $("#js-help-name").hide();
                    $("#js-help-email").hide();
                    $("#js-help-password").show().html("The Password confirmation does not match.");
                    $(".js-register-password").val('');                    
                    $(".js-register-password-confirm").val('');
                };
            }
        });
    });
});
