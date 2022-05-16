@extends('front.layout.master')

@section('content')
<div class="fs_menu_overlay"></div>

		<!-- Hamburger Menu -->

		<div class="hamburger_menu">
			<div class="hamburger_close"><i class="fa fa-times" aria-hidden="true"></i></div>
			<div class="hamburger_menu_content text-right">
				<ul class="menu_top_nav">
					<li class="menu_item has-children">
						<a href="#">
							usd
							<i class="fa fa-angle-down"></i>
						</a>
						<ul class="menu_selection">
							<li><a href="#">cad</a></li>
							<li><a href="#">aud</a></li>
							<li><a href="#">eur</a></li>
							<li><a href="#">gbp</a></li>
						</ul>
					</li>
					<li class="menu_item has-children">
						<a href="#">
							English
							<i class="fa fa-angle-down"></i>
						</a>
						<ul class="menu_selection">
							<li><a href="#">French</a></li>
							<li><a href="#">Italian</a></li>
							<li><a href="#">German</a></li>
							<li><a href="#">Spanish</a></li>
						</ul>
					</li>
					<li class="menu_item has-children">
						<a href="#">
							My Account
							<i class="fa fa-angle-down"></i>
						</a>
						<ul class="menu_selection">
							<li><a href="#"><i class="fa fa-sign-in" aria-hidden="true"></i>Sign In</a></li>
							<li><a href="#"><i class="fa fa-user-plus" aria-hidden="true"></i>Register</a></li>
						</ul>
					</li>
					<li class="menu_item"><a href="#">home</a></li>
					<li class="menu_item"><a href="#">shop</a></li>
					<li class="menu_item"><a href="#">promotion</a></li>
					<li class="menu_item"><a href="#">pages</a></li>
					<li class="menu_item"><a href="#">blog</a></li>
					<li class="menu_item"><a href="#">contact</a></li>
				</ul>
			</div>
		</div>

		<div class="container single_product_container">
			<!-- <div class="row">
				<div class="col">
					<div class="breadcrumbs d-flex flex-row align-items-center">
						<ul>
							<li><a href="index.html">Home</a></li>
							<li><a href="categories.html"><i class="fa fa-angle-right" aria-hidden="true"></i>Men's</a>
							</li>
							<li class="active"><a href="#"><i class="fa fa-angle-right" aria-hidden="true"></i>Single
									Product</a></li>
						</ul>
					</div>

				</div>
			</div> -->
			<div class="row" style="margin-top: 50px;">
				<div class="col-lg-7">
					<div class="single_product_pics">
						<div class="row">
							<div class="col-lg-3 thumbnails_col order-lg-1 order-2">
								<div class="single_product_thumbnails">
									<ul>
									
										<li class="active"><img src="{{Storage::url($product->image)}}" alt=""
												data-image="images/single_2.jpg"></li>
							
									</ul>
								</div>
							</div>
							<div class="col-lg-9 image_col order-lg-2 order-1">
								<div class="single_product_image">
									<div class="single_product_image_background"
										style="background-image:url({{Storage::url($product->image)}})"></div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-lg-5">
					<div class="product_details">
						<div class="product_details_title">
							<h2>{{$product->name}}</h2>
						</div>
						<!-- <div class="free_delivery d-flex flex-row align-items-center justify-content-center">
							<span class="ti-truck"></span><span>free delivery</span>
						</div> -->
						@if($product->rate == null)
						<?php $price = number_format($product->price,'0',',','.')?>
						<div class="product_price">{{$price}}đ</div>
						@else
						<?php $price =$product->price -($product->price*($product->rate/100)) ?>
						<div class="product_price">{{number_format($price,'0',',','.')}}đ</div>
						@endif
						<ul class="star_rating">
							<li><i class="fa fa-star" aria-hidden="true"></i></li>
							<li><i class="fa fa-star" aria-hidden="true"></i></li>
							<li><i class="fa fa-star" aria-hidden="true"></i></li>
							<li><i class="fa fa-star" aria-hidden="true"></i></li>
							<li><i class="fa fa-star-o" aria-hidden="true"></i></li>
						</ul>
						<div class="quantity d-flex flex-column flex-sm-row align-items-sm-center">
								<p>{{$product->quantity}} sản phẩm có sẵn</p>
							<div class="product_favorite d-flex flex-column align-items-center justify-content-center">
							</div>
							<div class="red_button add_to_cart_button" style="opacity: 1;visibility:visible" ><a href="{{route('home.cart.add',$product->id)}}">Thêm Giỏ Hàng</a></div>

						</div>
					</div>
				</div>
			</div>

		</div>
		<!-- Tabs -->

		<div class="tabs_section_container">

			<div class="container">
				<div class="row">
					<div class="col">
						<div class="tabs_container">
							<ul
								class="tabs d-flex flex-sm-row flex-column align-items-left align-items-md-center justify-content-center">
								<li class="tab active" data-active-tab="tab_3"><span>Reviews</span></li>
								<li class="tab" data-active-tab="tab_1"><span>Description</span></li>
								<li class="tab" data-active-tab="tab_2"><span>Additional Information</span></li>
							</ul>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col">

						<div id="tab_3" class="tab_container">
							<div class="row">

								<!-- User Reviews -->

								<div class="col-lg-6 reviews_col">
									<div class="tab_title reviews_title">
										<h4>Reviews</h4>
									</div>

									<!-- User Review -->

					

									<!-- User Review -->
									@foreach($rates as $rate)
									<div class="user_review_container d-flex flex-column flex-sm-row">
										<div class="user">
											<div class="user_pic"></div>
											<div class="user_rating">
												<ul class="star_rating">
													<li><i class="fa fa-star" aria-hidden="true"></i></li>
													<li><i class="fa fa-star" aria-hidden="true"></i></li>
													<li><i class="fa fa-star" aria-hidden="true"></i></li>
													<li><i class="fa fa-star" aria-hidden="true"></i></li>
													<li><i class="fa fa-star-o" aria-hidden="true"></i></li>
												</ul>
											</div>
										</div>
										<div class="review">
											<div class="review_date">{{$rate->created_at}}</div>
											<div class="user_name">{{$rate->username}}</div>
											<p>{{$rate->rate}}.</p>
										</div>
									</div>
									@endforeach
								</div>

								<!-- Add Review -->

								<div class="col-lg-6 add_review_col">

									<div class="add_review">
										<form id="review_form" method="post" action="{{route('home.product.detail',$product->id)}}">
											@csrf
											<div>
												<h1>Đánh Giá</h1>
												<input id="review_name" class="form_input input_name" type="text"
													name="username" placeholder="Name*" value="{{auth()->user()->name}}" readonly required="required"
													data-error="Name is required.">
												
											</div>
											<div>
												<h1>Your Rating:</h1>
												<ul class="user_star_rating">
													<li><i class="fa fa-star" aria-hidden="true"></i></li>
													<li><i class="fa fa-star" aria-hidden="true"></i></li>
													<li><i class="fa fa-star" aria-hidden="true"></i></li>
													<li><i class="fa fa-star" aria-hidden="true"></i></li>
													<li><i class="fa fa-star-o" aria-hidden="true"></i></li>
												</ul>
												<textarea id="review_message" class="input_review" name="rate"
													placeholder="Your Review" rows="4" required
													data-error="Please, leave us a review."></textarea>
											</div>
											<div class="text-left text-sm-right">
												<button id="review_submit" type="submit"
													class="red_button review_submit_btn trans_300"
													value="Submit">submit</button>
											</div>
										</form>
									</div>

								</div>

							</div>
						</div>

					</div>
				</div>
			</div>

		</div>
@endsection
