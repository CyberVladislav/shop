@foreach ($parentComment as $parent)
	<div class="review_item" id="{{$parent->id}}" >
		<div>
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
						<a class="reply_btn btn_modal_window" productId="{{$parent->product->id}}" parnId="{{$parent->id}}" href="{{asset('##')}}">Reply</a>
					</div>
			</div>
			<p>{{$parent->description}}</p>
		</div>
		@foreach($parent->childComments() as $child)
			<div class="review_item reply mt-3">
				<div class="media">
					<div class="d-flex">
						<img src="{{asset('img/product/review-2.png')}}" alt="">
					</div>
					<div class="media-body">
						<h4>{{$child->user->name}}</h4>
						<h5>{{ \Carbon\Carbon::parse($child->created_at)->format('d/m/Y H:i')}}</h5>
						<a class="reply_btn btn_modal_window" productId="{{$parent->product->id}}" parnId="{{$parent->id}}" href="{{asset('##')}}">Reply</a>
					</div>
				</div>
				<p>{{$child->description}}</p>
			</div>
		@endforeach
	</div>
@endforeach
