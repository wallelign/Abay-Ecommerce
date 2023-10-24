<div class="wrap-icon-section wishlist">
	<a href="{{route('product.list')}}" class="link-direction">
		<i class="fa fa-heart" aria-hidden="true"></i>
			<div class="left-info">
			@if(Cart::instance('wishlist')->count() > 0)
			<span class="index">{{Cart::instance('wishlist')->count()}}item</span>
			@endif
			<span class="title">@lang('base.Wishlist')</span>
			</div>
	</a>
</div>