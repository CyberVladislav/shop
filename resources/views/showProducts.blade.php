<section class="lattest-product-area pb-40 category-list">
	<div class="row">
		<!-- single product -->
		@foreach($products as $product)
			<div class="col-lg-4 col-md-6">
				<div class="single-product">
					<a href="{{asset('product/'.$product->id)}}"><img class="img-fluid" src = "{{$product->image}}" alt=""></a>
					<div class="product-details" >
							<a href="{{asset('product/'.$product->id)}}"><h6>{{$product->brand}}</h6><h5>{{$product->name}}<h5></a>
						<div class="price" style="text-align: center">
							<h6>${{$product->price}}</h6>
							<h6 class="l-through">$210.00</h6>
						</div>
					</div>
				</div>
			</div>
		@endforeach
	</div>
</section>
				