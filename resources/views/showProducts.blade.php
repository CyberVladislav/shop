<section class="lattest-product-area pb-40 category-list">
	<div class="row">
		<!-- single product -->
		@foreach($products as $product)
			<div class="col-lg-4 col-md-6">
				<div class="single-product">
					<a href="{{asset('product/'.$product->id)}}"> <?php /* <img class="img-fluid" src = "{{$product->image}}" alt=""></a> */ ?>
					<div class="product-details" >
						<h6><a href="{{asset('product/'.$product->id)}}">{{$product->name}}</a></h6>
						<div class="price">
							<h6>${{$product->price}}</h6>
							<h6 class="l-through">$210.00</h6>
						</div>
						<div class="prd-bottom">
							<a href="" class="social-info">
								<span class="ti-bag"></span>
								<p class="hover-text">add to bag</p>
							</a>
							<a href="" class="social-info">
								<span class="lnr lnr-heart"></span>
								<p class="hover-text">Wishlist</p>
							</a>
							<a href="" class="social-info">
								<span class="lnr lnr-sync"></span>
								<p class="hover-text">compare</p>
							</a>
							<a href="" class="social-info">
								<span class="lnr lnr-move"></span>
								<p class="hover-text">view more</p>
							</a>
						</div>
					</div>
				</div>
			</div>
		@endforeach
	</div>
</section>
				