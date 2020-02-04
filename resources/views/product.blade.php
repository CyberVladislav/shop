@extends ('welcome')
@section('content')

	<!-- Start Banner Area -->
	<section class="banner-area organic-breadcrumb">
		<div class="container">
			<div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
				<div class="col-first">
					<h1>Product Details Page</h1>
					<nav class="d-flex align-items-center">
						<a href="index.html">Home<span class="lnr lnr-arrow-right"></span></a>
						<a href="{{asset('category')}}">Shop<span class="lnr lnr-arrow-right"></span></a>
						<a href="{{asset('product/'.$product->id)}}">{{$product->name}}</a>
					</nav>
				</div>
			</div>
		</div>
	</section>
	<!-- End Banner Area -->

	<!--================Single Product Area =================-->
	<div class="product_image_area">
		<div class="container">
			<div class="row s_product_inner">
				<div class="col-lg-6">
					<!-- <div class="s_Product_carousel">
						<div class="single-prd-item">
							<img class="img-fluid" src="{{$product->image}}" alt="">
						</div>
						<div class="single-prd-item">
							<img class="img-fluid" src="{{$product->image}}" alt="">
						</div>
						<div class="single-prd-item">
							<img class="img-fluid" src="{{$product->image}}" alt="">
						</div>
					</div> -->
				</div>
				<div class="col-lg-5 offset-lg-1">
					<div class="s_product_text">
						<h3>{{$product->name}}</h3>
						<h2>${{$product->price}}</h2>
						<ul class="list">
							<li><a class="active"  href="{{asset('category')}}"><span>Category</span></a> : <a class="active">Household</a></li>
							<li><a><span>Availibility</span> : In Stock</a></li>
						</ul>
						<p>{{$product->description}}</p>
						<div class="product_count">
							<label for="qty">Quantity:</label>
							<input type="text" name="qty" id="sst" maxlength="12" value="1" title="Quantity:" class="input-text qty">
							<button onclick="var result = document.getElementById('sst'); var sst = result.value; if( !isNaN( sst )) result.value++;return false;"
							 class="increase items-count" type="button"><i class="lnr lnr-chevron-up"></i></button>
							<button onclick="var result = document.getElementById('sst'); var sst = result.value; if( !isNaN( sst ) &amp;&amp; sst > 1 ) result.value--;return false;"
							 class="reduced items-count" type="button"><i class="lnr lnr-chevron-down"></i></button>
						</div>
						<div class="card_area d-flex align-items-center">
							<a class="primary-btn add-to-cart" data-product="{{$product->id}}" href="{{asset('##')}}">Add to Cart</a>
							<a class="icon_btn"  href="{{asset('#')}}"><i class="lnr lnr lnr-diamond"></i></a>
							<a class="icon_btn"  href="{{asset('#')}}"><i class="lnr lnr lnr-heart"></i></a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!--================End Single Product Area =================-->

	<!--================Product Description Area =================-->
	<section class="product_description_area">
		<div class="container">
			<ul class="nav nav-tabs" id="myTab" role="tablist">
				<li class="nav-item">
					<a class="nav-link" id="profile-tab" data-toggle="tab" href="{{asset('#profile')}}" role="tab" aria-controls="profile"
					 aria-selected="false">Specification</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" id="contact-tab" data-toggle="tab" href="{{asset('#contact')}}" role="tab" aria-controls="contact"
					 aria-selected="false">Comments</a>
				</li>
				<li class="nav-item">
					<a class="nav-link active" id="review-tab" data-toggle="tab" href="{{asset('#review')}}" role="tab" aria-controls="review"
					 aria-selected="false">Reviews</a>
				</li>
			</ul>
			<div class="tab-content" id="myTabContent">
				<div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
					<div class="table-responsive">
						<table class="table">
							<tbody>
								<tr>
									<td>
										<h5>Made in</h5>
									</td>
									<td>
										<h5>{{$product->madeIn}}</h5>
									</td>
								</tr>
								<tr>
									<td>
										<h5>Color</h5>
									</td>
									<td>
										<h5>{{$product->color}}</h5>
									</td>
								</tr>
								<tr>
									<td>
										<h5>Material</h5>
									</td>
									<td>
										<h5>{{$product->material}}</h5>
									</td>
								</tr>								
							</tbody>
						</table>
					</div>
				</div>
				<div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
					<div class="row">
						<div class="col-lg-6">
							<div class="comment_list">
								@foreach ($parentComment as $parent)
								<div class="review_item">
									<div class="media">
										<div class="d-flex">
											<img src="{{asset('img/product/review-1.png')}}" alt="">
										</div>
										<div class="media-body">
											<h4>{{$parent->user->name}}</h4>
											<h5>12th Feb, 2018 at 05:56 pm</h5>
											<a class="reply_btn"  href="{{asset('#')}}">Reply</a>
										</div>
									</div>
									<p>{{$parent->description}}</p>
								</div>
								@foreach($parent->childComments() as $child)
								<div class="review_item reply">
									<div class="media">
										<div class="d-flex">
											<img src="{{asset('img/product/review-2.png')}}" alt="">
										</div>
										<div class="media-body">
											<h4>{{$child->user->name}}</h4>
											<h5>12th Feb, 2018 at 05:56 pm</h5>
											<a class="reply_btn"  href="{{asset('#')}}">Reply</a>
										</div>
									</div>
									<p>{{$child->description}}</p>
								</div>
								@endforeach
								@endforeach
							</div>
						</div>
						
					</div>
				</div>
				<div class="tab-pane fade show active" id="review" role="tabpanel" aria-labelledby="review-tab">
					<div class="row">
						<div class="col-lg-6">
							<div class="row total_rate">
								<div class="col-6">
									<div class="box_total">
										<h5>Overall</h5>
										<h4>{{$avg}}</h4>
										<h6>({{$count}} Reviews)</h6>
									</div>
								</div>
								<div class="col-6">
									<div class="rating_list">
										<h3>Based on {{$count}} Reviews</h3>
										<ul class="list">
											<li> <i class="fa fa-star color-yellow"></i><i class="fa fa-star color-yellow"></i><i class="fa fa-star color-yellow"></i><i
													 class="fa fa-star color-yellow"></i><i class="fa fa-star color-yellow"></i> {{$five}}</li>
											<li> <i class="fa fa-star color-yellow"></i><i class="fa fa-star color-yellow"></i><i class="fa fa-star color-yellow"></i><i
													 class="fa fa-star color-yellow"></i><i class="fa fa-star"></i> {{$four}}</li>
											<li> <i class="fa fa-star color-yellow"></i><i class="fa fa-star color-yellow"></i><i class="fa fa-star color-yellow"></i><i 
											class="fa fa-star"></i><i class="fa fa-star"></i> {{$three}}</li>
											<li> <i class="fa fa-star color-yellow"></i><i class="fa fa-star color-yellow"></i><i class="fa fa-star"></i><i 
											class="fa fa-star"></i><i class="fa fa-star"></i> {{$two}}</li>
											<li> <i class="fa fa-star color-yellow"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i 
											class="fa fa-star"></i> {{$one}}</li>			
										</ul>
									</div>
								</div>
							</div>

							<div class="tab-pane fade show active" id="contact" role="tabpanel" aria-labelledby="contact-tab">
								<div class="comment_list">
									@foreach ($parentComment as $parent)
									<div class="review_item">
										<div class="media">
											<div class="d-flex">
												<img src="{{asset('img/product/review-1.png')}}" alt="">
											</div>
											<div class="media-body">
												<h4>{{$parent->user->name}}</h4>
												<h5>{{ \Carbon\Carbon::parse($parent->created_at)->format('d/m/Y H:i')}}</h5>												
													@while ($parent->rating-- > 0)
													<i class="fa fa-star"></i>
													@endwhile
											
												<a class="reply_btn"  href="{{asset('#')}}">Reply</a>
											</div>
										</div>
										<p>{{$parent->description}}</p>
									</div>
									@foreach($parent->childComments() as $child)
									<div class="review_item reply">
										<div class="media">
											<div class="d-flex">
												<img src="{{asset('img/product/review-2.png')}}" alt="">
											</div>
											<div class="media-body">
												<h4>{{$child->user->name}}</h4>
												<h5>{{ \Carbon\Carbon::parse($parent->created_at)->format('d/m/Y H:i')}}</h5>
												<a class="reply_btn"  href="{{asset('#')}}">Reply</a>
											</div>
										</div>
										<p>{{$child->description}}</p>
									</div>
									@endforeach
									@endforeach
								</div>
							</div>
						</div>
						<div class="col-lg-6">
							<div class="review_box">
								<h4>Add a Review</h4>
								<p>Your Rating:</p>
								<ul class="list">
									<li><a  href="{{asset('#')}}"><i class="fa fa-star"></i></a></li>
									<li><a  href="{{asset('#')}}"><i class="fa fa-star"></i></a></li>
									<li><a  href="{{asset('#')}}"><i class="fa fa-star"></i></a></li>
									<li><a  href="{{asset('#')}}"><i class="fa fa-star"></i></a></li>
									<li><a  href="{{asset('#')}}"><i class="fa fa-star"></i></a></li>
								</ul>
								<p>Outstanding</p>
								<form class="row contact_form" action="{{asset('addReview')}}" method="post" id="contactForm" novalidate="novalidate">
								{{ csrf_field() }}
									<div class="col-md-12">
										<div class="form-group">
											<textarea class="form-control" name="message" id="message" rows="1" placeholder="Review" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Review'"></textarea></textarea>
										</div>
									</div>
									<div class="col-md-12 text-right">
										<button type="submit" value="submit" class="primary-btn">Submit Now</button>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!--================End Product Description Area =================-->

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
						<div class="col-lg-4 col-md-4 col-sm-6 mb-20">
							<div class="single-related-product d-flex">
								<a  href="{{asset('#')}}"><img src="{{asset('img/r1.jpg')}}" alt=""></a>
								<div class="desc">
									<a  href="{{asset('#')}}" class="title">Black lace Heels</a>
									<div class="price">
										<h6>$189.00</h6>
										<h6 class="l-through">$210.00</h6>
									</div>
								</div>
							</div>
						</div>
						<div class="col-lg-4 col-md-4 col-sm-6 mb-20">
							<div class="single-related-product d-flex">
								<a  href="{{asset('#')}}"><img src="{{asset('img/r2.jpg')}}" alt=""></a>
								<div class="desc">
									<a  href="{{asset('#')}}" class="title">Black lace Heels</a>
									<div class="price">
										<h6>$189.00</h6>
										<h6 class="l-through">$210.00</h6>
									</div>
								</div>
							</div>
						</div>
						<div class="col-lg-4 col-md-4 col-sm-6 mb-20">
							<div class="single-related-product d-flex">
								<a  href="{{asset('#')}}"><img src="{{asset('img/r3.jpg')}}" alt=""></a>
								<div class="desc">
									<a  href="{{asset('#')}}" class="title">Black lace Heels</a>
									<div class="price">
										<h6>$189.00</h6>
										<h6 class="l-through">$210.00</h6>
									</div>
								</div>
							</div>
						</div>
						<div class="col-lg-4 col-md-4 col-sm-6 mb-20">
							<div class="single-related-product d-flex">
								<a  href="{{asset('#')}}"><img src="{{asset('img/r5.jpg')}}" alt=""></a>
								<div class="desc">
									<a  href="{{asset('#')}}" class="title">Black lace Heels</a>
									<div class="price">
										<h6>$189.00</h6>
										<h6 class="l-through">$210.00</h6>
									</div>
								</div>
							</div>
						</div>
						<div class="col-lg-4 col-md-4 col-sm-6 mb-20">
							<div class="single-related-product d-flex">
								<a  href="{{asset('#')}}"><img src="{{asset('img/r6.jpg')}}" alt=""></a>
								<div class="desc">
									<a  href="{{asset('#')}}" class="title">Black lace Heels</a>
									<div class="price">
										<h6>$189.00</h6>
										<h6 class="l-through">$210.00</h6>
									</div>
								</div>
							</div>
						</div>
						<div class="col-lg-4 col-md-4 col-sm-6 mb-20">
							<div class="single-related-product d-flex">
								<a  href="{{asset('#')}}"><img src="{{asset('img/r7.jpg')}}" alt=""></a>
								<div class="desc">
									<a  href="{{asset('#')}}" class="title">Black lace Heels</a>
									<div class="price">
										<h6>$189.00</h6>
										<h6 class="l-through">$210.00</h6>
									</div>
								</div>
							</div>
						</div>
						<div class="col-lg-4 col-md-4 col-sm-6">
							<div class="single-related-product d-flex">
								<a  href="{{asset('#')}}"><img src="{{asset('img/r9.jpg')}}" alt=""></a>
								<div class="desc">
									<a  href="{{asset('#')}}" class="title">Black lace Heels</a>
									<div class="price">
										<h6>$189.00</h6>
										<h6 class="l-through">$210.00</h6>
									</div>
								</div>
							</div>
						</div>
						<div class="col-lg-4 col-md-4 col-sm-6">
							<div class="single-related-product d-flex">
								<a  href="{{asset('#')}}"><img src="{{asset('img/r10.jpg')}}" alt=""></a>
								<div class="desc">
									<a  href="{{asset('#')}}" class="title">Black lace Heels</a>
									<div class="price">
										<h6>$189.00</h6>
										<h6 class="l-through">$210.00</h6>
									</div>
								</div>
							</div>
						</div>
						<div class="col-lg-4 col-md-4 col-sm-6">
							<div class="single-related-product d-flex">
								<a  href="{{asset('#')}}"><img src="{{asset('img/r11.jpg')}}" alt=""></a>
								<div class="desc">
									<a  href="{{asset('#')}}" class="title">Black lace Heels</a>
									<div class="price">
										<h6>$189.00</h6>
										<h6 class="l-through">$210.00</h6>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-lg-3">
					<div class="ctg-right">
						<a  href="{{asset('#')}}" target="_blank">
							<img class="img-fluid d-block mx-auto" src="{{asset('img/category/c5.jpg')}}" alt="">
						</a>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- End related-product Area -->
@endsection('content')
