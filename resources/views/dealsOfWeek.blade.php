	<!-- Start related-product Area -->
	<section class="related-product-area section_gap_bottom">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-lg-6 text-center">
					<div class="section-title">
						<h1>Deals of the Week</h1>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore
							magna aliqua.</p>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-9">
					<div class="row">
						@foreach($dealOfWeeks as $dealOfWeek)
							<div class="col-lg-4 col-md-4 col-sm-6">
								<div class="single-related-product d-flex">
									<a href="{{asset('product/'.$dealOfWeek->id)}}"><img src="{{$dealOfWeek->image}}" width='70' height='70' alt=""></a>
									<div class="desc">
										<a href="{{asset('product/'.$dealOfWeek->id)}}" class="title">{{$dealOfWeek->name}}</a>
										<div class="price">
											<h6>${{$dealOfWeek->price}}</h6>
											<h6 class="l-through">$210.00</h6>
										</div>
									</div>
								</div>
							</div>
						@endforeach
					</div>
				</div>
				<div class="col-lg-3">
					<div class="ctg-right">
						<a href="#" target="_blank">
							<img class="img-fluid d-block mx-auto" src="img/category/c5.jpg" alt="">
						</a>
					</div>
				</div>
			</div>
		</div>
	</section>
    <!-- End related-product Area -->