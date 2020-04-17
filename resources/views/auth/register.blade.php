<div class="panel-default">
    <div class="panel-body">
        <form class="registr_form">
        {{ csrf_field() }}
		    <div class="form-group">
	            <input id="register_name" type="text" class="form-control js-register-name" name="register_name" placeholder="Name" value="{{ old('register_name') }}"  required autofocus>
            </div>
            <div class="form-group">
                <input id="register_email" type="email" class="form-control js-register-email" name="register_email" placeholder="E-Mail Address" value="{{ old('register_email') }}" required>
            </div>
            <div class="form-group">
                <input id="register_password" type="password" class="form-control js-register-password" name="register_password" placeholder="Password" required>
            </div>
            <div class="form-group">
                <input id="register_password-confirm" type="password" class="form-control js-register-password-confirm" name="register_password_confirmation" placeholder="Password confirmation" required>                                                                                       
                <div id="js-help-error-box" style="color: red;text-align: center"></div>								
            </div>
            <div class="form-group" style="text-align:center;">
                <button type="button" class="btn btn-primary js-register" style="text-align:center;border: none;background: linear-gradient(90deg, #ffba00 0%, #ff6c00 100%);">Register</button>
            </div>
        </form>
    </div>
</div>
