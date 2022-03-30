@extends('layouts.base')
@section('content')

	<!-- Start Banner Area -->
	<section class="banner-area organic-breadcrumb">
		<div class="container">
			<div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
				<div class="col-first">
					<h1>Confirmation</h1>
					<nav class="d-flex align-items-center">
						<a href="{{ asset('/') }}">Home<span class="lnr lnr-arrow-right"></span></a>
						<a href="{{ asset('confirmation') }}">Confirmation</a>
					</nav>
				</div>
			</div>
		</div>
	</section>
	<!-- End Banner Area -->

	<!--================Order Details Area =================-->
	<section class="order_details section_gap">
		<div class="container">
			<h3 class="title_confirmation">Thank you. Your order has been received.</h3>
			<div class="row order_d_inner">
				<div class="col-md-6 d-md-flex justify-content-center">
					<div class="details_item">
						<h4>Billing Address</h4>
						<ul class="list">
							<li><span>Street</span> : {{$orderInfo->address}}</li>
							<li><span>City</span> : {{$orderInfo->city}}</li>
							<li><span>Phone</span> : {{$orderInfo->phone}}</li>
							<li><span>Postcode </span> : {{$orderInfo->postcode}}</li>
						</ul>
					</div>
				</div>
				<div class="col-md-6 d-md-flex justify-content-center mt-5 mt-md-0">
					<div class="details_item">
						<h4>Order Info</h4>
						<ul class="list">
							<li><span>Order number</span> : {{$orderInfo->id}}</li>
							<li><span>Date</span> : {{$orderInfo->date}}</li>
							<li class="js-confir-total-li"><span>Total</span> : USD </li>
							<li><span>Payment method</span> : {{$orderInfo->paymentMethod}}</li>
						</ul>
					</div>
				</div>
			</div>
			<div class="order_details_table">
				<h2>Order Details</h2>
				<div class="table-responsive">
					<table class="table">
						<thead>
							<tr>
								<th scope="col" class="text-dark">Product</th>
								<th scope="col" class="text-dark">Quantity</th>
								<th scope="col" class="text-dark">Total</th>
							</tr>
						</thead>
						<tbody>
							@foreach ($products as $product)
								<tr>
									<td>
										<p>{{$product->brand}} {{$product->name}}</p>
									</td>
									<td>
										<span>x {{$product->confirmationProductsCount()}}</span>
									</td>
									<td>
										<p class="js-confir-subtotal">${{$product->confirmationProductsCost()}}</p>
									</td>
								</tr>	
							@endforeach						
							<tr>
								<td>
									<p>TOTAL</p>
								</td>
								<td>

								</td>
								<td>
									<p class="js-confir-total">${{$orderInfo->totalSum}}</p>
								</td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</section>
	<!--================End Order Details Area =================-->
@endsection('content')