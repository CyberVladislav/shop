@extends('layouts.base')
@section('content')

    <!-- start banner Area -->
	<section class="banner-area">
		<div class="container">
			<div class="row fullscreen align-items-center justify-content-start">
				<div class="col-lg-12">
					<div class="active-banner-slider owl-carousel">
						<!-- single-slide -->
						@foreach($bannerProducts as $bannerProduct)
						<div class="row single-slide align-items-center d-flex mt-5">
							<div class="col-lg-5 col-md-6">
								<div class="banner-content">
									<h1 class="mt-5">{{$bannerProduct->firstLine}}<br>{{$bannerProduct->secondLine}}</h1>
									<p>{{$bannerProduct->description}}</p>
									<div class="add-bag d-flex align-items-center">
										@if (Auth::check())
											<a class="add-btn add-to-cart" href="##" data-product="{{$bannerProduct->product_id}}" product-count="1" data-toggle="modal" data-target="#productAddUserModal"><span class="lnr lnr-cross"></span></a>
										@else
											<a class="add-btn" href="##" data-toggle="modal" data-target="#productAddGuestModal"><span class="lnr lnr-cross"></span></a>
										@endif
										<span class="add-text text-uppercase">Add to Bag</span>
									</div>
								</div>
							</div>
							<div class="col-lg-7">
								<div class="banner-img">
									<img class="img-fluid" src="{{$bannerProduct->image}}" alt="">
								</div>
							</div>
						</div>
						@endforeach
					<!-- single-slide -->
				</div>
			</div>
		</div>
	</section>
	<!-- End banner Area -->

	<!-- start features Area -->
	<section class="features-area section_gap">
		<div class="container">
			<div class="row features-inner">
				<!-- single features -->
				<div class="col-lg-3 col-md-6 col-sm-6">
					<div class="single-features">
						<div class="f-icon">
							<img src="img/features/f-icon1.png" alt="">
						</div>
						<h6>Free Delivery</h6>
						<p>Free Shipping on all order</p>
					</div>
				</div>
				<!-- single features -->
				<div class="col-lg-3 col-md-6 col-sm-6">
					<div class="single-features">
						<div class="f-icon">
							<img src="img/features/f-icon2.png" alt="">
						</div>
						<h6>Return Policy</h6>
						<p>Free Shipping on all order</p>
					</div>
				</div>
				<!-- single features -->
				<div class="col-lg-3 col-md-6 col-sm-6">
					<div class="single-features">
						<div class="f-icon">
							<img src="img/features/f-icon3.png" alt="">
						</div>
						<h6>24/7 Support</h6>
						<p>Free Shipping on all order</p>
					</div>
				</div>
				<!-- single features -->
				<div class="col-lg-3 col-md-6 col-sm-6">
					<div class="single-features">
						<div class="f-icon">
							<img src="img/features/f-icon4.png" alt="">
						</div>
						<h6>Secure Payment</h6>
						<p>Free Shipping on all order</p>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- end features Area -->

	<!-- Start category Area -->
	<section class="category-area">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-lg-8 col-md-12">
					<div class="row">
						<div class="col-lg-8 col-md-8">
							<div class="single-deal">
								<div class="overlay"></div>
								<img class="img-fluid w-100" src="img/category/c1.jpg" alt="">
								<a href="img/category/c1.jpg" class="img-pop-up" target="_blank">
									<div class="deal-details">
										<h6 class="deal-title">Sneaker for Sports</h6>
									</div>
								</a>
							</div>
						</div>
						<div class="col-lg-4 col-md-4">
							<div class="single-deal">
								<div class="overlay"></div>
								<img class="img-fluid w-100" src="img/category/c2.jpg" alt="">
								<a href="img/category/c2.jpg" class="img-pop-up" target="_blank">
									<div class="deal-details">
										<h6 class="deal-title">Sneaker for Sports</h6>
									</div>
								</a>
							</div>
						</div>
						<div class="col-lg-4 col-md-4">
							<div class="single-deal">
								<div class="overlay"></div>
								<img class="img-fluid w-100" src="img/category/c3.jpg" alt="">
								<a href="img/category/c3.jpg" class="img-pop-up" target="_blank">
									<div class="deal-details">
										<h6 class="deal-title">Product for Couple</h6>
									</div>
								</a>
							</div>
						</div>
						<div class="col-lg-8 col-md-8">
							<div class="single-deal">
								<div class="overlay"></div>
								<img class="img-fluid w-100" src="img/category/c4.jpg" alt="">
								<a href="img/category/c4.jpg" class="img-pop-up" target="_blank">
									<div class="deal-details">
										<h6 class="deal-title">Sneaker for Sports</h6>
									</div>
								</a>
							</div>
						</div>
					</div>
				</div>
				<div class="col-lg-4 col-md-6">
					<div class="single-deal">
						<div class="overlay"></div>
						<img class="img-fluid w-100" src="img/category/c5.jpg" alt="">
						<a href="img/category/c5.jpg" class="img-pop-up" target="_blank">
							<div class="deal-details">
								<h6 class="deal-title">Sneaker for Sports</h6>
							</div>
						</a>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- End category Area -->
	<!-- Start exclusive deal Area -->
	<section class="exclusive-deal-area">
		<div class="container">
			<div class="row justify-content-center align-items-center">
				<div class="col-lg-12 no-padding exclusive-left w-100">
					<div class="row clock_sec clockdiv" id="clockdiv">
						<div class="col-lg-12">
							<h1>Exclusive Hot Deal Ends Soon!</h1>
							<p>Who are in extremely love with eco friendly system.</p>
						</div>
						<div class="col-lg-12">
							<div class="row clock-wrap">
								<div class="col clockinner1 clockinner">
									<h1 class="days">150</h1>
									<span class="smalltext">Days</span>
								</div>
								<div class="col clockinner clockinner1">
									<h1 class="hours">23</h1>
									<span class="smalltext">Hours</span>
								</div>
								<div class="col clockinner clockinner1">
									<h1 class="minutes">47</h1>
									<span class="smalltext">Mins</span>
								</div>
								<div class="col clockinner clockinner1">
									<h1 class="seconds">59</h1>
									<span class="smalltext">Secs</span>
								</div>
							</div>
						</div>
					</div>
					<a href="{{asset ('category') }}" class="primary-btn">Shop Now</a>
				</div>
			</div>
		</div>
	</section>
	<!-- End exclusive deal Area -->
	<!-- Start related-product Area -->
	@if($dealOfWeeks != 'null')
		@include('dealsOfWeek')
	@endif
    <!-- End related-product Area -->
	<!-- User modal product add -->
	<div class="modal fade" id="productAddUserModal" tabindex="-1" role="dialog" aria-labelledby="productAddUserModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content align-items-center">
				<div class="modal-body text-center text-warning h5 ">
					You add the product.<br>Would you like to continue viewing products or go to the shopping cart?.
					<div class="modal-button mt-3">
						<button type="button" class="primary-btn" data-dismiss="modal" aria-label="Close">Continue viewing </button>
						<button type="button" class="primary-btn" onClick="redirectToCart()">Shopping cart</button>
					</div>
				</div>
			</div>
		</div>
	</div>
<!-- End user modal product add -->
<!-- Guest modal product add -->
<div class="modal fade" id="productAddGuestModal" tabindex="-1" role="dialog" aria-labelledby="productAddGuestModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content align-items-center">
				<div class="modal-body text-center text-warning h5 ">
					To add the product you should be autorized.<br>Would you like to continue viewing products or go to login?.
					<div class="modal-button mt-3">
						<button type="button" class="primary-btn" data-dismiss="modal" aria-label="Close">Continue viewing </button>
						<button type="button" class="primary-btn" onClick="redirectToLogin()">Go to login/register</button>
					</div>
				</div>
			</div>
		</div>
	</div>
<!-- End guest modal product add -->
@endsection
