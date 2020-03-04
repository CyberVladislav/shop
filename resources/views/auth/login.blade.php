@extends ('layouts.base')
@section('content')

<!-- Start Banner Area -->
<section class="banner-area organic-breadcrumb">
		<div class="container">
			<div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
				<div class="col-first">
					<h1>Login/Register</h1>
					<nav class="d-flex align-items-center">
						<a href="{{ asset('/') }}">Home<span class="lnr lnr-arrow-right"></span></a>
						<a href="{{ asset('login') }}">Login/Register</a>
					</nav>
				</div>
			</div>
		</div>
	</section>
	<!-- End Banner Area -->
<!--================Login Box Area =================-->
	<section class="login_box_area section_gap">
		<div class="container">
    		<div class="row">
			    <div class="col-lg-6">
					<div class="login_box_img">
						<img class="img-fluid" src="img/login.jpg" alt="">
						<div class="hover">
							<h4>New to our website?</h4>
							<p>There are advances being made in science and technology everyday, and a good example of this is the</p>
							<a class="primary-btn" href="{{ route('register') }}">Create an Account</a>
						</div>
					</div>
				</div>  
				<div class="col-lg-6">
               		<div class="login_form_inner">
                		<h3>Log in to enter</h3>
                    	<form class="row login_form" method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}
                        
								<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
								
									<div class="col-md-12 form-group">
										<input id="email" type="email" class="form-control" name="email" placeholder="E-Mail Address" value="{{ old('email') }}" required autofocus>
									
										@if ($errors->has('email'))
											<span class="help-block">
												<strong>{{ $errors->first('email') }}</strong>
											</span>
										@endif
									</div>
								</div>
								
							<div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">

								<div class="col-md-12 form-group">
										<input id="password" type="password" class="form-control" name="password" placeholder="Password" required>
								
									@if ($errors->has('password'))
										<span class="help-block">
											<strong>{{ $errors->first('password') }}</strong>
										</span>
									@endif
								</div>
							</div>
								
							<div class="col-md-12 form-group">
								<div class="creat_account">
										<label>
											<input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Keep me logged in
										</label>
								</div>
							</div>

								<div class="col-md-12 form-group">
									<button type="submit" value="submit" class="primary-btn">
										Login
									</button>

									<a class="btn btn-link" href="{{ route('password.request') }}">
										Forgot Your Password?
									</a>
								</div>
                        	</form>
                	    </div>	
					</div>
            	</div>
        	</div>
    	</div>
	</section>
  <!--================End Login Box Area =================-->
@endsection('content')
