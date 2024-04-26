@extends('frontend.layouts.master')
@section('content')
    @push('styles')
        <link rel="stylesheet" href="{{ asset('css/magnific-popup.css') }}" />
        <!-- Product Css -->
        <link href="{{ asset('css/slick.css') }}" rel="stylesheet">
        <link href="{{ asset('css/slick-theme.css') }}" rel="stylesheet">
    @endpush
    <!-- page_header start -->
    <div class="page_header">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-8 col-xs-12 col-sm-6">
                    <h1> Store </h1>
                </div>
                <div class="col-lg-4 col-md-4 col-xs-12 col-sm-6">
                    <div class="sub_title_section">
                        <ul class="sub_title">
                            <li> <a href="/"> Home </a> <i class="fa fa-angle-right" aria-hidden="true"></i> </li>
                            <li> Store <i class="fa fa-angle-right" aria-hidden="true"></i></li>
                            <li> {{ $product->name }} </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- page_header end -->
    <div class="product_single_wrapper">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-4 col-sm-12 col-xs-12">
                    <!-- shop_sidebar start -->
                    <div class="shop_sidebar hidden-sm hidden-xs">
                        <div class="sidebar_widget">
                            <h4>Categories</h4>

                            <div class="shop_sidebar_category">
                                <ul class="shop_sidebar_cate">
                                    @foreach ($categories as $category)
                                        <li>
                                            <div class="shop_sidebar_title">
                                                <i class="{{ $category->icon }}"></i>
                                                <a class="title"
                                                    href="{{ route('fr.store', ['cat' => $category->slug]) }}">
                                                    {{ $category->name }}
                                                    <span>
                                                        <i class="fa fa-angle-right"></i>
                                                    </span>
                                                </a>
                                            </div>
                                            @if ($category->children->isNotEmpty())
                                                <div class="shop_sidebar_submenu">
                                                    <div class="shop_sidebar_submenu_inner">
                                                        <div class="row">
                                                            @foreach ($category->children as $subcategory)
                                                                <div class="col-md-6">
                                                                    <div class="menu_title">
                                                                        <a
                                                                            href="{{ route('fr.store', ['cat' => $subcategory->slug]) }}">
                                                                            {{ $subcategory->name }}
                                                                        </a>
                                                                    </div>
                                                                    <ul>
                                                                        @foreach ($subcategory->children as $subsubcategory)
                                                                            <li>
                                                                                <a
                                                                                    href="{{ route('fr.store', ['cat' => $subcategory->slug]) }}">
                                                                                    {{ $subsubcategory->name }}
                                                                                </a>
                                                                            </li>
                                                                        @endforeach
                                                                    </ul>
                                                                </div>
                                                                <!-- End .col-md-6 -->
                                                            @endforeach
                                                        </div>
                                                    </div>
                                                </div>
                                            @endif
                                        </li>
                                    @endforeach
                                </ul>
                                <!-- /.shop_sidebar_cate end -->
                            </div>
                            <!-- /.shop_sidebar_category end -->
                        </div>
                    </div>
                    <!-- shop_sidebar end -->
                </div>
                <div class="col-lg-9 col-md-8 col-sm-12 col-xs-12">
                    <div class="row">
                        <!-- sidebar_shop_right start -->
                        <div class="sidebar_shop_right">
                            <div class="col-lg-5 col-md-12 col-sm-12 col-xs-12">
                                <div class="video_img_section_wrapper">
                                    <div class="slider-for">

                                        @foreach ($product->getMedia('product-images') as $key => $image)
                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                <img class="magniflier" src="{{ $image->getFullUrl() }}"
                                                    alt="{{ $key }}" />
                                            </div>
                                        @endforeach
                                    </div>
                                    <div class="slider-nav hidden-xs product-draggable">

                                        @foreach ($product->getMedia('product-images') as $key => $image)
                                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                                <img src="{{ $image->getFullUrl() }}" alt="{{ $key }}">
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-7 col-md-12 col-sm-12 col-xs-12">
                                <div class="btc_shop_single_prod_right_section">
                                    <h1>{{ $product->name }}</h1>
                                    <div class="btc_shop_product_price_wrapper">
                                        <div class="btc_shop_product_price">$49.99</div>
                                        <div class="btc_shop_product_rating">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star-half-empty"></i>
                                            <i class="fa fa-star-o"></i>
                                        </div>
                                        <div class="btc_shop_product_availability"><small>{{$product->stock > 0 ? 'In Stock' : 'Out of Stock'}}</small></div>
                                    </div>
                                    <div class="btc_shop_sin_pro_icon_wrapper">
                                        <h5>These edible ruby red roots are smooth and bulbous and have the highest sugar
                                            content than any other vegetable. This is Photoshop's version of Lorem Ipsum.
                                            Proin gravida nibh vel velit auctor aliquet.</h5>


                                    </div>
                                    <div class="cc_ps_cart_btn_wrapper">
                                        <div class="cc_ps_cart_btn">
                                            <span>Quantity</span>
                                            <form action="{{route('fr.cart.add')}}" method="post">
                                                @csrf
                                                <ul>
                                                    <li>
                                                        <div class="cc_ps_quantily_info">
                                                            <div class="select_number">
                                                                <button onclick="changeQty(1); return false;" title="increase"
                                                                    class="increase">
                                                                    <i class="fa fa-angle-up"></i>
                                                                </button>
                                                                <input type="text" name="quantity" value="1"
                                                                    size="2" id="input-quantity" class="form-control">
                                                                <button onclick="changeQty(0); return  false;" title="decrease"
                                                                    class="decrease">
                                                                    <i class="fa fa-angle-down"></i>
                                                                </button>
                                                            </div>
                                                            <input type="hidden" name="product_id" value="{{ $product->id }}">
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <button type="submit" class="btn btn-primary add-to-cart-button">  <i class="fa fa-shopping-cart"></i>
                                                            Add to Cart</button>
                                                    </li>
                                                </ul>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <!-- product_tab_section start -->
                                <div class="product_tab_section">
                                    <div role="tabpanel">
                                        <!-- Nav tabs -->
                                        <ul id="product_tab" class="nav nav-tabs">
                                            <li>
                                                <a href="#product_tab_1" data-toggle="tab">
                                                    Description

                                                </a>
                                            </li>
                                            <li>
                                                <a href="#product_tab_2" data-toggle="tab">
                                                    Specifications
                                                </a>
                                            </li>
                                            <li class="active">
                                                <a href="#product_tab_3" data-toggle="tab">
                                                    Reviews ({{$product->reviews()->count()}})
                                                </a>
                                            </li>
                                        </ul>
                                        <!-- Tab panes -->
                                        <div class="tab-content">
                                            <div class="tab-pane fade" id="product_tab_1">
                                                <div class="tab_content_text">
                                                    <p>Sleek, powerful, and feature-filled - the Redmi Y2 is simply a cut
                                                        above your run-of-the-mill smartphone. Its powerful Qualcomm
                                                        Snapdragon 625 processor and 3 GB of RAM help you use all its
                                                        innovative features without any lag. Click beautiful pictures and
                                                        watch videos on its HD+ Full Screen Display.</p>
                                                    <ul class="tab_list_item">
                                                        <li>3 GB RAM | 32 GB ROM | Expandable Upto 256 GB</li>
                                                        <li>15.21 cm (5.99 inch) HD+ Display</li>
                                                        <li>12MP + 5MP | 16MP Front Camera</li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="tab-pane fade" id="product_tab_2">
                                                <table class="table table-striped table-bordered">
                                                    <tbody>
                                                        <tr>
                                                            <th>In The Box</th>
                                                            <td>Handset, Power adapter, USB Cable, SIM Eject tool, Warranty
                                                                card, User guide, Clear soft case</td>
                                                        </tr>
                                                        <tr>
                                                            <th>Model Number</th>
                                                            <td>MZB6783IN</td>
                                                        </tr>
                                                        <tr>
                                                            <th>Model Name</th>
                                                            <td>Redmi Y2</td>
                                                        </tr>
                                                        <tr>
                                                            <th>Color</th>
                                                            <td>Blue</td>
                                                        </tr>
                                                        <tr>
                                                            <th>Browse Type</th>
                                                            <td>Smartphones</td>
                                                        </tr>
                                                        <tr>
                                                            <th>SIM Type</th>
                                                            <td>Dual Sim</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div class="tab-pane fade in active" id="product_tab_3">
                                                <div class="comment_box_blog">
                                                    @php
                                                        $reviews = $product->reviews()->latest()->paginate(5);
                                                    @endphp

                                                    @foreach ($reviews as $review)
                                                        <x-front-end.review-block :review="$review"></x-front-end.review-block>
                                                    @endforeach

                                                    {{$reviews->links('pagination::simple-bootstrap-5')}}


                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- product_tab_section end -->
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" id="review-form">
                                @if (auth('customer')->user())
                                    <form action="{{route('fr.customer.review.add', $product->slug)}}" method="post">
                                        @csrf
                                        <div class="product_contect_wrapper">
                                            <div class="btc_shop_single_prod_right_section">
                                                <h1>Add a Review</h1>
                                                <p>Your email address will not be published. Required fields are marked *</p>
                                                {{-- <div class="wrap">
                                                    Your Rating:
                                                    <div class="inputs">

                                                        <input type="checkbox" name="" id="1">
                                                        <label for="1">★</label>

                                                        <input type="checkbox" name="" id="2">
                                                        <label for="2">★</label>

                                                        <input type="checkbox" name="" id="3">
                                                        <label for="3">★</label>

                                                        <input type="checkbox" name="" id="4">
                                                        <label for="4">★</label>

                                                        <input type="checkbox" name="" id="5">
                                                        <label for="5">★</label>

                                                    </div>
                                                </div> --}}
                                            </div>
                                            <div class="shop_pdt_form">
                                                <div class="row">
                                                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                                        <input type="text" placeholder="Your Name*" name="name" value="{{old('name')}}"><i class="fa fa-user"></i>
                                                        <span class="text-danger">{{$errors->first('name')}}</span>
                                                    </div>
                                                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                                        <input type="email" placeholder="Your Email*" name="email" value="{{old('email')}}"><i class="fa fa-envelope"></i>
                                                        <span class="text-danger">{{$errors->first('email')}}</span>
                                                    </div>
                                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                        <div class="shop_pdt_textarea">
                                                            <textarea rows="4" placeholder=" Your Review*" name="review_text">{{old('review_text')}}</textarea><i class="fa fa-question-circle"></i>
                                                            <span class="text-danger">{{$errors->first('review_text')}}</span>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                        <div class="shop_btn_wrapper">
                                                            <button class="btn">Submit</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                @else
                                    Please <a href="{{ route('fr.customer.login', ['redirect_back' => request()->path()]) }}">Login</a> to make a Review
                                @endif
                            </div>

                        </div>
                        <!-- sidebar_shop_right end -->
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
@push('scripts')

    <script src="{{ asset('js/slick_electranic.js') }}"></script>
    <script src="{{ asset('js/slick.min.js') }}"></script>
    <script src="{{ asset('js/jquery-ui.min.js') }}"></script>
    <!-- Megnify js -->
    <script src="{{ asset('js/megnify.js') }}"></script>
    <!-- Rating js -->
    <script src="{{ asset('js/rating.js') }}"></script>
@endpush
