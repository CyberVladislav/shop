<div class="review_item">
	<div class="media">
		<div class="d-flex">
			<img src="{{asset('img/product/review-1.png')}}" alt="">
		</div>
			<div class="media-body">
   				<h4>{{$parentComment->user->name}}</h4>
				<h5>{{ \Carbon\Carbon::parse($parentComment->created_at)->format('d/m/Y H:i')}}</h5>												
			   	@while ($parentComment->rating-- > 0)
				   	<i class="fa fa-star"></i>
		    	@endwhile
    			<a class="reply_btn"  href="{{asset('#')}}">Reply</a>
   			</div>
	</div>
    <p>{{$parentComment->description}}</p>
</div>
