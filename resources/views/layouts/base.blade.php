<!DOCTYPE html>

<html lang="zxx" class="no-js">



<head>

	<meta name="csrf-token" content="{{ csrf_token() }}">

	<!-- Mobile Specific Meta -->

	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!-- Favicon-->

	<link rel="shortcut icon" href="{{asset('img/fav.png')}}">

	<!-- Author Meta -->

	<meta name="author" content="CodePixar">

	<!-- Meta Description -->

	<meta name="description" content="">

	<!-- Meta Keyword -->

	<meta name="keywords" content="">

	<!-- meta character set -->

	<meta charset="UTF-8">

	<!-- Site Title -->

	<title>Podberud</title>

	<!--

		CSS

		============================================= -->

		

	<link rel="stylesheet" href="{{asset('css/linearicons.css')}}">

	<link rel="stylesheet" href="{{asset('css/font-awesome.min.css')}}">

	<link rel="stylesheet" href="{{asset('css/themify-icons.css')}}">

	<link rel="stylesheet" href="{{asset('css/bootstrap.css')}}">

	<link rel="stylesheet" href="{{asset('css/owl.carousel.css')}}">

	<link rel="stylesheet" href="{{asset('css/magnific-popup.css')}}">

	<link rel="stylesheet" href="{{asset('css/nice-select.css')}}">

	<link rel="stylesheet" href="{{asset('css/nouislider.min.css')}}">

	<link rel="stylesheet" href="{{asset('css/ion.rangeSlider.css')}}" />

	<link rel="stylesheet" href="{{asset('css/ion.rangeSlider.skinFlat.css')}}" />

	<link rel="stylesheet" href="{{asset('css/main.css')}}">

	<link rel="stylesheet" href="{{asset('css/generalStyles.css')}}">

<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-166283595-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-166283595-1');
</script>


</head>



<body>



	<!-- Start Header Area -->

	<header class="header_area sticky-header">

		<div class="main_menu">

			<nav class="navbar navbar-expand-lg navbar-light main_box">

				<div class="container">

					<!-- Brand and toggle get grouped for better mobile display -->

					<a class="navbar-brand logo_h" href="{{ asset('/') }}"><img src="{{asset('img/logo.png')}}" alt=""></a>

					<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"

					 aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">

						<span class="icon-bar"></span>

						<span class="icon-bar"></span>

						<span class="icon-bar"></span>

					</button>

					<!-- Collect the nav links, forms, and other content for toggling -->

					<div class="collapse navbar-collapse offset" id="navbarSupportedContent">

						<ul class="nav navbar-nav menu_nav ml-auto">

							<li class="{{ ($url=='/') ? 'nav-item active' : 'nav-item'}}"><a class="nav-link" href="{{ asset('/') }}">Home</a></li>

							<li class="{{ ($url=='/category') || ($url=='/find') ? 'nav-item active' : 'nav-item'}}"><a class="nav-link" href="{{ asset('category') }}">Catalog</a></li>

							<li class="{{ ($url=='/contact') ? 'nav-item active' : 'nav-item'}}"><a class="nav-link" href="{{ asset('contact') }}">Contact</a></li>



							@if (Auth::check())

							<li class="{{ ($url=='/login') ? 'nav-item active' : 'nav-item'}}"><a class="nav-link" href="{{ asset('login') }}">{{Auth::user()->name}}</a></li>

								<li class="nav-item"><a class="nav-link" href="{{ route('logout') }}"

                                            onclick="event.preventDefault();

                                                     document.getElementById('logout-form').submit();">

                                            Logout

                                        </a> </li>



                                        

							@else

								<li class="{{ ($url=='/login') ? 'nav-item active' : 'nav-item'}}"><a class="nav-link" href="{{ asset('login') }}">Login</a></li>

							@endif

							

								

						</ul>

						<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">

                                            {{ csrf_field() }}

                        </form>

						<ul class="nav navbar-nav navbar-right">

							<li class="nav-item">

							@if (Auth::check())

								<a href="{{asset('cart')}}" class="cart js-cart-order {{!$fullCart ? 'd-none' : ''}}"><span class="ti-bag"></span></a>

								<a href="##" class="cart js-cart-no-order {{$fullCart ? 'd-none' : ''}}" data-toggle="modal" data-target="#emptyCartModal" onClick="redirectToCategory()"><span class="ti-bag"></span></a></li>

							@else 

								<a href="##" class="cart" data-toggle="modal" data-target="#guestCartModal"><span class="ti-bag"></span></a></li>

							@endif

							<li class="nav-item ml-0">

								<form class="d-flex" action="{{ URL::to('find') }}" method="POST">

								{{ csrf_field() }}

									<input type="text" name="search" class="form-control js-search-input" id="search_input" placeholder="Search Here" 

										style="height: 35px; margin: 1.5rem 0.5rem 1.5rem 1.5rem;" autocomplete="off">

									<button class="search"><span class="lnr lnr-magnifier"></span></button>

								</form>

								<div class="js-searchResult">

									<div id="searchResult" class="panel panel-default" style="width:266px; position:absolute; display:none; overflow: auto;max-height: 213px;">

										<ul class="ml-2" style="margin-block-start: 1em;margin-block-end: 1em;

										list-style-type: none;" id="searchList">



										</ul>

									</div>

								</div>

							</li>

						</ul>

					</div>

				</div>

			</nav>

		</div>

	</header>

	<!-- End Header Area -->



	@yield('content')

	

	<!-- start footer Area -->

	<footer class="footer-area section_gap">

		<div class="container">

			<div class="row">

				<div class="col-lg-3  col-md-6 col-sm-6">

					<div class="single-footer-widget">

						@isset($aboutUs)

							<h6>About Us</h6>

							<p>

								{{$aboutUs->value}}

							</p>

						@endisset

					</div>

				</div>

				<div class="col-lg-4  col-md-6 col-sm-6">

					<div class="single-footer-widget">

						<h6>Newsletter</h6>

						<p>Stay update with our latest</p>

						<div class="" id="mc_embed_signup">

							<form target="_blank" novalidate="true" action="https://spondonit.us12.list-manage.com/subscribe/post?u=1462626880ade1ac87bd9c93a&amp;id=92a4423d01"

							 method="get" class="form-inline">

								<div class="d-flex flex-row">

									<input class="form-control" name="EMAIL" placeholder="Enter Email" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Email '"

									 required="" type="email">

									<button class="click-btn btn btn-default"><i class="fa fa-long-arrow-right" aria-hidden="true"></i></button>

									<div style="position: absolute; left: -5000px;">

										<input name="b_36c4fd991d266f23781ded980_aefe40901a" tabindex="-1" value="" type="text">

									</div>

								</div>

								<div class="info"></div>

							</form>

						</div>

					</div>

				</div>

				<div class="col-lg-3  col-md-6 col-sm-6">

					<div class="single-footer-widget mail-chimp">

						<h6 class="mb-20">Instragram Feed</h6>

						<ul class="instafeed d-flex flex-wrap">

						@isset($socialPhotos)	

							@foreach ($socialPhotos as $socialPhoto)

								<li><img src="{{$socialPhoto->value}}" height=58px width=58px alt=""></li>

							@endforeach

							@endisset

						</ul>

					</div>

				</div>

				<div class="col-lg-2 col-md-6 col-sm-6">

					<div class="single-footer-widget">

						<h6>Follow Us</h6>

						<p>Let us be social</p>

						<div class="footer-social d-flex align-items-center">

							@isset($instaLink)

								<a href="{{$instaLink->value}}"><i class="fa fa-instagram"></i></a>

							@endisset

							@isset($vkLink)

								<a href="{{$vkLink->value}}"><i class="fa fa-vk"></i></a>

							@endisset

							@isset($facebookLink)

								<a href="{{$facebookLink->value}}"><i class="fa fa-facebook"></i></a>

							@endisset

							@isset($twitterLink)

								<a href="{{$twitterLink->value}}"><i class="fa fa-twitter"></i></a>

							@endisset

						</div>

					</div>

				</div>

			</div>

			<div class="footer-bottom d-flex justify-content-center align-items-center flex-wrap">

				<p class="footer-text m-0"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->

				Copyright &copy;@isset($copyRight){{$copyRight->value}} &mdash; @endisset<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>

				<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->

				</p>

			</div>

		</div>

	</footer>

	<!-- End footer Area -->

	<!-- Modal empty cart -->

	<div class="modal fade" id="emptyCartModal" tabindex="-1" role="dialog" aria-labelledby="emptyCartModalLabel" aria-hidden="true">

		<div class="modal-dialog modal-dialog-centered" role="document">

			<div class="modal-content align-items-center">

				<div class="modal-body text-center text-warning h5 ">

						Your cart is empty.<br>Please, choose & add the product.

				</div>

			</div>

		</div>

	</div>

	<!-- End modal empty cart -->

	<!-- Guest modal cart -->

	<div class="modal fade" id="guestCartModal" tabindex="-1" role="dialog" aria-labelledby="guestCartModalLabel" aria-hidden="true">

		<div class="modal-dialog modal-dialog-centered" role="document">

			<div class="modal-content align-items-center">

				<div class="modal-body text-center text-warning h5">

					To see the cart you should be autorized.<br>Would you like to continue viewing products or go to login?.

					<div class="modal-button mt-3">

						<button type="button" class="primary-btn" data-dismiss="modal" aria-label="Close">Continue viewing </button>

						<button type="button" class="primary-btn" onClick="redirectToLogin()">Go to login/register</button>

					</div>

				</div>

			</div>

		</div>

	</div>

	<!-- End guest modal cart -->

	<script src="{{asset('js/vendor/jquery-2.2.4.min.js')}}"></script>

	<script src="{{asset('https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js')}}" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4"

	 crossorigin="anonymous"></script>

	<script src="{{asset('js/vendor/bootstrap.min.js')}}"></script>

	<script src="{{asset('js/jquery.ajaxchimp.min.js')}}"></script>

	<script src="{{asset('js/jquery.nice-select.min.js')}}"></script>

	<script src="{{asset('js/jquery.sticky.js')}}"></script>

    <script src="{{asset('js/countdown.js')}}"></script>

	<script src="{{asset('js/nouislider.min.js')}}"></script>

	<script src="{{asset('js/jquery.magnific-popup.min.js')}}"></script>

	<script src="{{asset('js/owl.carousel.min.js')}}"></script>

	<!--gmaps Js-->

	<!-- <script src="{{asset('https://maps.googleapis.com/maps/api/js?key=AIzaSyCjCGmQ0Uq4exrzdcL6rvxywDDOvfAu6eE')}}"></script>

	<script src="{{asset('js/gmaps.min.js')}}"></script> -->

	<script src="{{asset('js/main.js')}}"></script>

	<script src="{{asset('js/custom/brandColor.js')}}"></script>

	<script src="{{asset('js/custom/addToCart.js')}}"></script>

	<script src="{{asset('js/custom/billingInfo.js')}}"></script>

	<script src="{{asset('js/custom/cartCostProduct.js')}}"></script>

	<script src="{{asset('js/custom/confirmation.js')}}"></script>

	<script src="{{asset('js/custom/deleteProductCart.js')}}"></script>

	<script src="{{asset('js/custom/leaveReview.js')}}"></script>

	<script src="{{asset('js/custom/priceSlider.js')}}"></script>

	<script src="{{asset('js/custom/register.js')}}"></script>							

	<script src="{{asset('js/custom/replyButton.js')}}"></script>

	<script src="{{asset('js/custom/search.js')}}"></script>

	<script src="{{asset('js/custom/showNumProduct.js')}}"></script>

	<script src="{{asset('js/custom/sorting.js')}}"></script>

	<script>

		function redirectToCategory() {

			setTimeout("location.href = '/category';",1200);

		}

	</script>

	<script>

		function redirectToCart() {

			location.href = '/cart';

		}

	</script>

	<script>

		function redirectToLogin() {

			location.href = '/login';

		}

	</script>

	<script>

	$('#registerModal').on('shown.bs.modal', function() {

		$(this).find('[autofocus]').focus();

	});

	</script>

	<script>

	var url = window.location.pathname;

	var substringArray = url.split("/");

	if (typeof(substringArray[2]) != "undefined" && substringArray[2] !== null){

		$('#js-category-'+substringArray[2]).addClass('active');

	}

	</script>

</body>

</html>

