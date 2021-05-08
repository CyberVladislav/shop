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
							<h4>${{$product->price}}</h4>
							@isset($product->oldPrice)
								<h5 class="l-through">${{$product->oldPrice}}</h5>
							@endisset
						</div>
					</div>
				</div>
			</div>
		@endforeach
	</div>
</section>
				