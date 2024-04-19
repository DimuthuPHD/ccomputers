<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', config('app.name'))</title>
    <!-- Place favicon.ico in the root directory -->
    <link rel="icon" type="image/png" sizes="16x16" href="images/favicon.png">
    <!-- font-awesome -->
    <link href="{{asset('css/font-awesome.min.css')}}" rel="stylesheet">
    <link href="{{asset('css/fonts.css')}}" rel="stylesheet">
    <!-- Bootstrap -->
    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('css/o')}}wl.carousel.css" />
    <link rel="stylesheet" href="{{asset('css/owl.th')}}eme.default.css" />
    <!-- Animation Css -->
    <link href="{{asset('css/animate.css')}}" rel="stylesheet">
    <link href="{{asset('css/jquery-ui.min.css')}}" rel="stylesheet">
    <!-- Flaticon Css -->
    <link href="{{asset('css/flaticon.css')}}" rel="stylesheet">
    <!-- Style CSS -->
    <link href="{{asset('css/shop_electranics.css')}}" rel="stylesheet">

    @stack('styles')
</head>

<body>

    <a href="javascript:" id="return-to-top"><i class="fa fa-angle-up"></i></a>
    <!-- header start -->
    <div class="header">
        <div class="header_top">
            <div class="container">

                <!-- End .left_top_links -->
                <div id="right_top_links" class="pull-right">
                    <ul class="list-inline visible-xs">
                        <li class="dropdown">

                                @if (auth()->user('customer') !== null)
                                <a href="{{route('fr.customer.dashboard')}}" title="My Account" class="res_list_link" >
                                    <i class="fa fa-user"></i>
                                </a>
                                @else
                                <a href="{{route('fr.customer.dashboard')}}" title="My Account" class="dropdown-toggle res_list_link" data-toggle="dropdown">
                                    <i class="fa fa-user"></i>
                                </a>
                                @endif
                        </li>
                        <li class="dropdown">
                            <a href="#" title="My Account" class="dropdown-toggle res_list_link" data-toggle="dropdown">
                                <i class="fa fa-shopping-cart"></i>
                            </a>
                            <div class="section2_cart_dropdown dropdown-menu">
                                <div class="dropdown-cart-products">
                                    <div class="product">
                                        <div class="product-details">
                                            <h4 class="product-title">
												<a href="product.html">White lumia 9001 </a>
											</h4>
                                            <span class="cart-product-info">
												<span class="cart-product-qty">1</span> x $99.00
                                            </span>
                                        </div>
                                        <!-- End .product-details -->
                                        <figure class="product-image-container">
                                            <a href="#" class="product-image">
                                                <img src="{{asset('images/shop/electronics/product-1.jpg')}}" alt="product">
                                            </a>
                                            <a href="#" class="btn-remove" title="Remove Product">
                                                <i class="fa fa-close"></i>
                                            </a>
                                        </figure>
                                    </div>
                                    <!-- End .product -->
                                    <div class="product">
                                        <div class="product-details">
                                            <h4 class="product-title">
												<a href="product.html">Play Station 4   </a>
											</h4>
                                            <span class="cart-product-info">
												<span class="cart-product-qty">1</span> x $99.00
                                            </span>
                                        </div>
                                        <!-- End .product-details -->
                                        <figure class="product-image-container">
                                            <a href="#" class="product-image">
                                                <img src="{{asset('images/shop/electronics/product-2.jpg')}}" alt="product">
                                            </a>
                                            <a href="#" class="btn-remove" title="Remove Product">
                                                <i class="fa fa-close"></i>
                                            </a>
                                        </figure>
                                    </div>
                                    <!-- End .product -->
                                </div>
                                <!-- End .cart-product -->
                                <div class="dropdown-cart-total">
                                    <span>Total</span>
                                    <span class="cart-total-price">$198.00</span>
                                </div>
                                <!-- End .dropdown-cart-total -->
                                <div class="dropdown-cart-action">
                                    <button class="btn btn_left">View Cart</button>
                                    <button class="btn">Checkout</button>
                                </div>
                                <!-- End .dropdown-cart-total -->
                            </div>
                        </li>
                    </ul>
                    <ul class="list-inline hidden-xs">
                        <li>
                            <a href="#" title="Wish List (0)">
                                <span>
									<i class="fa fa-heart"></i>
									Wish List (0)
								</span>
                            </a>
                        </li>
                        <li>

                            @if (auth()->user('customer') !== null)
                            <a href="{{route('fr.customer.dashboard')}}" title="My Account">
                                <span>
									<i class="fa fa-user"></i>
									My Account
								</span>
                            </a>
                            @else
                            <a href="{{route('fr.customer.login')}}" title="Login">
                                <span>
									<i class="fa fa-user"></i>
									Login
								</span>
                            </a>
                            <a href="{{route('fr.customer.register')}}" title="Register">
                                <span>
									<i class="fa fa-user-plus"></i>
									Register
								</span>
                            </a>
                            @endif



                            <ul class="dropdown-menu dropdown-menu-right">
                                <li>
                                    <a href="#">
                                        <span>Register</span>
                                        <span>
											<i class="fa fa-unlock-alt"></i>
										</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="login.html">
                                        <span>Login</span>
                                        <span><i class="fa fa-user"></i></span>
                                    </a>
                                </li>
                            </ul>
                        </li>


                    </ul>
                </div>
                <!-- End .right_top_links -->
            </div>
            <!-- End .container -->
        </div>
        <!-- End .header_top -->

        <!-- section-4 logo start-->
        <div class="section4_logo_wrapper">
            <div class="container">
                <div class="row">
                    <div class="col-md-2 col-sm-3 hidden-xs">
                        <div class="logo_wrapper">
                            <a href="{{url('/')}}"><img src="{{asset('images/logo_white.png')}}" alt="logo_img" /></a>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-8 hidden-xs">
                        <x-front-end.top-search></x-front-end.top-search>
                        <div class="logo_wrapper visible-xs">
                            <a href="{{url('/')}}"><img src="{{asset('images/logo_white.png')}}" alt="logo_img" /></a>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-1 hidden-xs">
                        <div class="nav pull-right">
                            <ul class="list-inline">
                                <li>
                                    <div class="header_contact hidden-sm hidden-xs">
                                        <span>Call us now</span>
                                        <a href="#">
                                            <strong>+123 5678 890</strong>
                                        </a>
                                    </div>
                                    <!-- End .header_contact -->
                                </li>
                                <!-- Cart Option -->
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                        <span>
											<i class="fa fa-shopping-cart"></i>
										</span>
                                        <i class="fa fa-angle-down hidden-sm"></i>
                                    </a>
                                    <span class="section2_cart_badge">2</span>
                                    <div class="section2_cart_dropdown dropdown-menu">
                                        <div class="dropdown-cart-products">
                                            <div class="product">
                                                <div class="product-details">
                                                    <h4 class="product-title">
														<a href="product.html">White lumia 9001 </a>
													</h4>
                                                    <span class="cart-product-info">
														<span class="cart-product-qty">1</span> x $99.00
                                                    </span>
                                                </div>
                                                <!-- End .product-details -->
                                                <figure class="product-image-container">
                                                    <a href="#" class="product-image">
                                                        <img src="{{asset('images/shop/electronics/product-1.jpg')}}" alt="product">
                                                    </a>
                                                    <a href="#" class="btn-remove" title="Remove Product">
                                                        <i class="fa fa-close"></i>
                                                    </a>
                                                </figure>
                                            </div>
                                            <!-- End .product -->
                                            <div class="product">
                                                <div class="product-details">
                                                    <h4 class="product-title">
														<a href="product.html">Play Station 4   </a>
													</h4>
                                                    <span class="cart-product-info">
														<span class="cart-product-qty">1</span> x $99.00
                                                    </span>
                                                </div>
                                                <!-- End .product-details -->
                                                <figure class="product-image-container">
                                                    <a href="#" class="product-image">
                                                        <img src="{{asset('images/shop/electronics/product-2.jpg')}}" alt="product">
                                                    </a>
                                                    <a href="#" class="btn-remove" title="Remove Product">
                                                        <i class="fa fa-close"></i>
                                                    </a>
                                                </figure>
                                            </div>
                                            <!-- End .product -->
                                        </div>
                                        <!-- End .cart-product -->
                                        <div class="dropdown-cart-total">
                                            <span>Total</span>
                                            <span class="cart-total-price">$198.00</span>
                                        </div>
                                        <!-- End .dropdown-cart-total -->
                                        <div class="dropdown-cart-action">
                                            <button class="btn btn_left">View Cart</button>
                                            <button class="btn">Checkout</button>
                                        </div>
                                        <!-- End .dropdown-cart-total -->
                                    </div>
                                </li>
                                <!-- /.Cart Option -->
                            </ul>

                        </div>
                    </div>
                    <div class="col-xs-12 visible-xs">
                        <div class="section4_search_box">
                            <input type="text" placeholder="Search here">
                            <button><i class="fa fa-search" aria-hidden="true"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- section-4 logo end-->

		<div class="main_menu_wrapper hidden-xs hidden-sm">
            <nav class="navbar mega-menu navbar-default">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="container">
                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <x-front-end.top-nav></x-front-end.top-nav>
                    <!-- /.navbar-collapse -->
                </div>
            </nav>
        </div>
		<div class="mobail_menu_main visible-xs visible-sm">
            <div class="navbar-header">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-6">
                            <a class="navbar-brand" href="{{url('/')}}"><img src="{{asset('images/logo_white.png')}}" alt=""></a>
                        </div>
                        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-6">
                            <button type="button" class="navbar-toggle collapsed" aria-expanded="false">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <div id="sidebar">
                <a class="sidebar_logo" href="{{url('/')}}"><img src="{{asset('images/logo.png')}}" alt=""></a>
                <div id="toggle_close">&times;</div>
                <div id='cssmenu'>
                    <ul>
						<li><a href='shop_sport.html'>Home</a></li>
                        <li class='has-sub'><a href='#'>Laptop & Computer</a>
							<ul>
								<li>
									<a href="#">
										Apple iMac
									</a>
                                </li>
								<li>
                                   <a href="#">
										Dell Inspiron i3
									</a>
                                </li>
                                <li>
									<a href="#">
										Lenovo - (Pentium Quad Core)
									</a>
                                </li>
                                <li>
                                   <a href="#">
										HP 15 Core i3
									</a>
                                </li>
								<li>
									<a href="#">
										Acer Aspire 3
									</a>
                                </li>
								<li>
                                   <a href="#">
										Lenovo Ideapad 330
									</a>
                                </li>
                            </ul>
                        </li>
						<li class='has-sub'><a href='#'>Cameras</a>
							<ul>
								<li>
                                   <a href="#">
										DSLR
								   </a>
                               </li>
                               <li>
                                    <a href="#">
										Compact &amp; Bridge Cameras
									</a>
                                </li>
                                <li>
                                   <a href="#">
										Sports &amp; Action Cameras
								   </a>
                                </li>
                                <li>
                                   <a href="#">
										Camera Lens
								   </a>
                                </li>
                                <li>
                                   <a href="#">
										Camera Tripods
								   </a>
								</li>
							</ul>
						</li>
						<li class='has-sub'><a href='#'>Smart Phones</a>
							<ul>
								<li>
									<a href="#">All Mobile Phones</a>
								</li>
                                <li>
									<a href="#">Smart Phones</a>
								</li>
								<li>
									<a href="#">Android Mobiles</a>
								</li>
								<li>
									<a href="#">Windows Mobiles</a>
								</li>
								<li>
									<a href="#">Refurbished Mobiles</a>
								</li>
								<li>
									<a href="#">All Mobile Accessories</a>
								</li>
								<li>
									<a href="#">Cases &amp; Coverss</a>
								</li>
							</ul>
						</li>
						<li class='has-sub'><a href='#'>Note Book</a>
							<ul>
								<li>
									<a href="#">All Note Book</a>
								</li>
                                <li>
									<a href="#">Smart Note Books</a>
								</li>
								<li>
									<a href="#">Android Note Books</a>
								</li>
								<li>
									<a href="#">Windows Note Books</a>
								</li>
								<li>
									<a href="#">Refurbished Note Books</a>
								</li>
								<li>
									<a href="#">Note Books Accessories</a>
								</li>
								<li>
									<a href="#">Cases &amp; Coverss</a>
								</li>
							</ul>
						</li>
						<li class='has-sub'><a href='#'>Tablets</a>
							<ul>
								<li>
									<a href="#">All Tablets</a>
								</li>
                                <li>
									<a href="#">Smart Tablets</a>
								</li>
								<li>
									<a href="#">Android Tablets</a>
								</li>
								<li>
									<a href="#">Windows Tablets</a>
								</li>
								<li>
									<a href="#">Refurbished Tablets</a>
								</li>
								<li>
									<a href="#">Tablets Accessories</a>
								</li>
								<li>
									<a href="#">Cases &amp; Coverss</a>
								</li>
							</ul>
						</li>
						<li class='has-sub'><a href='#'> Home Entertainment</a>
							<ul>
								<li>
                                    <a href="#">
										Home Audio Speakers
									</a>
                                </li>
                                <li>
									<a href="#">
										Home Theatres
									</a>
                                </li>
                                <li>
                                    <a href="#">
										Bluetooth Speakers
									</a>
                                </li>
                                <li>
                                   <a href="#">
										 DTH Set Top Box
									</a>
                                </li>
                            </ul>
                        </li>
						<li class='has-sub'><a href='#'>Accessories</a>
							<ul>
								<li>
                                    <a href="#">
										Mobile Cases
									</a>
                                </li>
								<li>
                                    <a href="#">
										Memory Cards
									</a>
                                </li>
                                <li>
									<a href="#">
										Smart Headphones
									</a>
                                </li>
                                <li>
                                    <a href="#">
										Pendrives
									</a>
                                </li>
                                <li>
                                   <a href="#">
										 Laptop Bags
									</a>
                                </li>
                                <li>
                                    <a href="#">
										Laptop Skins &amp; Decals
									</a>
                                </li>
                                <li>
									<a href="#">
										Mouse
									</a>
								</li>
                            </ul>
                        </li>
					</ul>
				</div>
			</div>
		</div>
    </div>
    <!-- header end -->

@yield('content')

	<!-- footer start -->

    <!-- footer end -->

    <!-- copyright_wrapper start -->
    <div class="copyright_wrapper">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-8 col-xs-12 col-sm-6">
                    <div class="copyright_content">
                        <p>© Copyright {{date('Y')}} by <a href="{{url('/')}}"> {{config('app.name')}} </a>- all right reserved</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-xs-12 col-sm-6">

                </div>
            </div>
        </div>
    </div>
    <!-- copyright_wrapper end -->

    <div class="modal fade product_view" id="product_view">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                            <div class="video_img_section_wrapper">
                                <div class="cc_ps_top_slider_section">
                                    <div class="owl-carousel owl-theme">
                                        <div class="item" data-hash="zero">

                                            <img class="small img-responsive" src="{{asset('images/shop/electronics/quick_shop_prod_1.jpg')}}" alt="small_img" />

                                        </div>
                                        <div class="item" data-hash="one">

                                            <img class="small img-responsive" src="{{asset('images/shop/electronics/quick_shop_prod_2.jpg')}}" alt="small_img" />

                                        </div>
                                        <div class="item" data-hash="two">

                                            <img class="small img-responsive" src="{{asset('images/shop/electronics/quick_shop_prod_3.jpg')}}" alt="small_img" />
                                        </div>
                                    </div>
                                    <div class="video_nav_img hidden-sm hidden-xs">
                                        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                            <a class="button secondary url owl_nav" href="#zero"><img src="{{asset('images/shop/electronics/quick_shop_prod_1.jpg')}}" class="img-responsive" alt="nav_img"></a>
                                        </div>
                                        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                            <a class="button secondary url owl_nav" href="#one"><img src="{{asset('images/shop/electronics/quick_shop_prod_2.jpg')}}" class="img-responsive" alt="nav_img"></a>
                                        </div>
                                        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                            <a class="button secondary url owl_nav" href="#two"><img src="{{asset('images/shop/electronics/quick_shop_prod_3.jpg')}}" class="img-responsive" alt="nav_img"></a>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <div class="video_nav_img visible-sm visible-xs">
                                                <div class="row">
                                                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                                        <a class="button secondary url owl_nav" href="#zero"><img src="{{asset('images/shop/electronics/quick_shop_prod_1.jpg')}}" class="img-responsive" alt="nav_img"></a>
                                                    </div>
                                                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                                        <a class="button secondary url owl_nav" href="#one"><img src="{{asset('images/shop/electronics/quick_shop_prod_2.jpg')}}" class="img-responsive" alt="nav_img"></a>
                                                    </div>
                                                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                                        <a class="button secondary url owl_nav" href="#two"><img src="{{asset('images/shop/electronics/quick_shop_prod_3.jpg')}}" class="img-responsive" alt="nav_img"></a>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                            <div class="btc_shop_single_prod_right_section">
								<h1>BLACK MINI F1 SAMRT NX</h1>
								<div class="btc_shop_product_price_wrapper">
									<div class="btc_shop_product_price">$49.99</div>
									<div class="btc_shop_product_rating">
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star-half-empty"></i>
										<i class="fa fa-star-o"></i>
									</div>
									<div class="btc_shop_product_availability"><small>In Stock</small></div>
								</div>
								<div class="btc_shop_sin_pro_icon_wrapper">
									<h5>This is Photoshop's version of Lorem Ipsum. Proin gravida nibh vel velit auctor aliquet.</h5>
									<span class="cc_ps_heading">Color</span>
									<ul class="cc_ps_list">
										<li>
											<a href="#" title="Black">
												<img src="{{asset('images/shop/electronics/product_single_3.jpg')}}" alt="">
											</a>
										</li>
										<li class="active">
											<a href="#" title="Blue">
												<img src="{{asset('images/shop/electronics/product_single_3.jpg')}}" alt="">
											</a>
										</li>
										<li>
											<a href="#" title="Gray">
												<img src="{{asset('images/shop/electronics/product_single_3.jpg')}}" alt="">
											</a>
										</li>
									</ul>
									<div class="cc_ps_ram">
										<span class="cc_ps_heading heading2">Storage</span>
										<ul class="cc_ps_list storage">
											<li class="active" >
												<a href="#" title="32 GB">
													32 GB
												</a>
											</li>
											<li>
												<a href="#" title="64 GB">
													64 GB
												</a>
											</li>
										</ul>
									</div>
									<div class="cc_ps_ram">
										<span class="cc_ps_heading">RAM</span>
										<ul class="cc_ps_list storage">
											<li class="active" >
												<a href="#" title="3 GB">
													3 GB
												</a>
											</li>
											<li>
												<a href="#" title="4 GB">
													4 GB
												</a>
											</li>
										</ul>
									</div>
								</div>
								<div class="cc_ps_cart_btn_wrapper">
									<div class="cc_ps_cart_btn">
										<span>Quantity</span>
										<ul>
											<li>
												<div class="cc_ps_quantily_info">
													<div class="select_number">
														<button onclick="changeQty(1); return false;" title="increase" class="increase">
															<i class="fa fa-angle-up"></i>
														</button>
														<input type="text" name="quantity" value="1" size="2" id="input-quantity" class="form-control" />
														<button onclick="changeQty(0); return  false;" title="decrease" class="decrease">
															<i class="fa fa-angle-down"></i>
														</button>
													</div>
													<input type="hidden" name="product_id" />
												</div>
											</li>
											<li>
												<a href="#" title="Add to Cart" class="btn">
													<i class="fa fa-shopping-cart"></i>
													Add to Cart
												</a>
											</li>
											<li>
												<a href="#" class="product_btn" title="Add to Wishlist">
													<i class="fa fa-heart"></i>
												</a>
											</li>
											<li>
												<a href="#" class="product_btn" title="Add to Compare">
													<i class="fa fa-random"></i>
												</a>
											</li>
										</ul>
									</div>
								</div>
							</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->

    <!-- Bootstrap js -->
    <script src="{{asset('js/jquery.min.js')}}"></script>
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
    <script src="{{asset('js/owl.carousel.js')}}"></script>
	<!-- Magnific Popup js -->
	<script src="{{asset('js/jquery.magnific-popup.js')}}"></script>
    <script src="{{asset('js/jquery-ui.min.js')}}"></script>
    <!-- Shop js -->
    <script src="{{asset('js/shop.js')}}"></script>
    <!-- Custom js -->
    <script src="{{asset('js/custom.js')}}"></script>
    <script>
        function changeQty(increase) {
            var qty = parseInt($('.select_number').find("input").val());
            if (!isNaN(qty)) {
                qty = increase ? qty + 1 : (qty > 1 ? qty - 1 : 1);
                $('.select_number').find("input").val(qty);
            } else {
                $('.select_number').find("input").val(1);
            }
        }

        function goToByScroll(id) {
            $('html,body').animate({
                scrollTop: $("#" + id).offset().top
            }, 'slow');
        }
    </script>
</body>


<!-- Mirrored from afuture.webstrot.com/homepage7_electronic.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 03 Mar 2024 16:31:38 GMT -->
</html>
