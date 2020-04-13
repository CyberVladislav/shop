@if(count($products) > 0)
	@foreach($products as $product)
		<li><a style="color: black;" href="{{ url('product/'.$product->id) }}">{{ $product->brand }} {{ $product->name }}</a></li>
	@endforeach
@else
	<li>No Results Found</li>
@endif
