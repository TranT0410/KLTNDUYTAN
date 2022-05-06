
@extends('front.layout.master')
@section('content')
	<div class="fs_menu_overlay"></div>
	<!-- Slider -->

	<div class="main_slider" style="background-image:url(images/slider_1.jpg)">
		<div class="container fill_height">
			<div class="row align-items-center fill_height">
				<div class="col">
				</div>
			</div>
		</div>
	</div>

	<!-- Banner -->

	<div class="banner">
		<div class="container">
			<div class="row">
				@foreach($categories_random as $category)
				<div class="col-md-4">
					<div class="banner_item align-items-center" style="background-image:url({{Storage::url($category->image)}})">
						<div class="banner_category">
							<a href="{{route('home',$category->id)}}">{{$category->name}}</a>
						</div>
					</div>
				</div>
				@endforeach
			</div>
		</div>
	</div>

	<!-- New Arrivals -->

	<div class="new_arrivals">
		<div class="container">
			<div class="row">
				<div class="col text-center">
					<div class="section_title new_arrivals_title">
						<h2>Danh Mục Sản Phẩm</h2>
					</div>
				</div>
			</div>
			<div class="row align-items-center">
				<div class="col text-center">
					<div class="new_arrivals_sorting">
						<ul class="arrivals_grid_sorting clearfix button-group filters-button-group">
							<a href="{{route('home')}}"><li class="grid_sorting_button button d-flex flex-column justify-content-center align-items-center" data-filter="*">all</li></a>
							@foreach($categories as $row_category)
							<a href="{{route('home',$row_category->id)}}"><li class="grid_sorting_button button d-flex flex-column justify-content-center align-items-center" data-filter=".men">{{$row_category->name}}</li></a>
							@endforeach
						</ul>
					</div>
				</div>
			</div>
			<div class="row">
				
				<div class="col">
					<div class="product-grid" data-isotope='{ "itemSelector": ".product-item", "layoutMode": "fitRows" }'>
						@foreach($products as $product)
						@if($product->rate == null)
						<!-- Product 1 -->
						<div class="product-item men">
								<div class="product product_filter">
									<div class="product_image">
										<a href="{{route('home.product.detail',$product->id)}}"><img src="{{Storage::url($product->image)}}" alt="">										</a>
									</div>
									<div class="favorite"></div>
									<div
										class="product_bubble product_bubble_left product_bubble_green d-flex flex-column align-items-center">
										<span>new</span></div>
									<div class="product_info">
										<h6 class="product_name"><a href="{{route('home.product.detail',$product->id)}}">{{$product->name}}</a></h6>
										<?php $price_product = number_format($product->price)?>
										<div class="product_price">{{$price_product}}đ</div>
									</div>
									<div class="red_button add_to_cart_button"><a href="#">add to cart</a></div>
								</div>
						</div>
						@endif
						@endforeach
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="product_sorting_container product_sorting_container_bottom clearfix">
	<div class="pages d-flex flex-row align-items-center">
		<div class="clearfix pd-30">
			<div class="pull-left">
		{{ $products->links() }}
			</div>
		</div>
	</div>
	<!-- Deal of the week -->

	<div class="deal_ofthe_week">
		<div class="container">
			<div class="row align-items-center">
				<div class="col-lg-6">
					<div class="deal_ofthe_week_img">
						<img src="images/deal_ofthe_week.png" alt="">
					</div>
				</div>
				<div class="col-lg-6 text-right deal_ofthe_week_col">
					<div class="deal_ofthe_week_content d-flex flex-column align-items-center float-right">
						<div class="section_title">
							<h2>Deal Of The Week</h2>
						</div>
						<ul class="timer">
							<li class="d-inline-flex flex-column justify-content-center align-items-center">
								<div id="day" class="timer_num">03</div>
								<div class="timer_unit">Day</div>
							</li>
							<li class="d-inline-flex flex-column justify-content-center align-items-center">
								<div id="hour" class="timer_num">15</div>
								<div class="timer_unit">Hours</div>
							</li>
							<li class="d-inline-flex flex-column justify-content-center align-items-center">
								<div id="minute" class="timer_num">45</div>
								<div class="timer_unit">Mins</div>
							</li>
							<li class="d-inline-flex flex-column justify-content-center align-items-center">
								<div id="second" class="timer_num">23</div>
								<div class="timer_unit">Sec</div>
							</li>
						</ul>
						<div class="red_button deal_ofthe_week_button"><a href="#">shop now</a></div>
					</div>
				</div>
			</div>
		</div>
	</div>

<!-- Best Sellers -->

<div class="best_sellers">
	<div class="container">
		<div class="row">
			<div class="col text-center">
				<div class="section_title new_arrivals_title">
					<h2>Sản Phẩm Khuyến Mãi</h2>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col">
				<div class="product_slider_container">
					<div class="owl-carousel owl-theme product_slider">

						<!-- Slide 1 -->
						@foreach ($products as $row)
						@if($row->rate != null)
						<div class="owl-item product_slider_item">
							<div class="product-item">
								<div class="product discount">
									<a href="{{route('home.product.detail',$row->product_id)}}">
										<div class="product_image">
											<img src="{{Storage::url($row->image)}}" alt="">
										</div>
										</a>
									<div class="favorite favorite_left"></div>
									<div
										class="product_bubble product_bubble_right product_bubble_red d-flex flex-column align-items-center">
										<span>{{$row->rate}}%</span></div>
									<div class="product_info">
										<h6 class="product_name"><a href="{{route('home.product.detail',$row->product_id)}}">{{$row->name}}</a></h6>
										<div class="product_price">{{number_format($row->price - ($row->price*($row->rate)/100),'0',',','.')}}đ<span>{{number_format($row->price,'0',',','.')}}đ</span></div>
									</div>
								</div>
							</div>
						</div>
						@endif
						@endforeach
						<!-- Slide 2 -->

						

					<!-- Slider Navigation -->

					<div
						class="product_slider_nav_left product_slider_nav d-flex align-items-center justify-content-center flex-column">
						<i class="fa fa-chevron-left" aria-hidden="true"></i>
					</div>
					<div
						class="product_slider_nav_right product_slider_nav d-flex align-items-center justify-content-center flex-column">
						<i class="fa fa-chevron-right" aria-hidden="true"></i>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

	<!-- Blogs -->

	<div class="blogs">
		<div class="container">
			<div class="row">
				<div class="col text-center">
					<div class="section_title">
						<h2>Blog Tin Tức</h2>
					</div>
				</div>
			</div>
			<div class="row blogs_container">
				@foreach ($news as $row)
				<div class="col-lg-4 blog_item_col">
					<div class="blog_item">
						<div class="blog_background" style="background-image:url({{asset(Storage::url($row->image))}}"></div>
						<div class="blog_content d-flex flex-column align-items-center justify-content-center text-center">
							<h4 class="blog_title">{{$row->title}}</h4>
							<span class="blog_meta">by {{$row->users->name}} | {{$row->created_at}}</span>
							<a class="blog_more" href="{{route('home.news.detail',$row->id)}}">Read more</a>
						</div>
					</div>
				</div>
				@endforeach
			</div>
		</div>
	</div>
@endsection
