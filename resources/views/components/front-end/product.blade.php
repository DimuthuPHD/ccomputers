<div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
    <div class="btc_shop_indx_cont_box_wrapper">
        <div class="btc_shop_indx_img_wrapper">
            <ul>
                {{-- <li class="btc_shop_price">new</li> --}}
            </ul>
            <div class="product_img">
                <a href="#">
                    <img class="first-img"
                        src="{{ asset('images/shop/electronics/li_img1.jpg') }}"
                        alt="">
                    <img class="hover-img"
                        src="{{ asset('images/shop/electronics/li_hover_img1.jpg') }}"
                        alt="">
                </a>
            </div>
            {{-- <div class="cc_li_img_text">
                <a href="#" data-toggle="modal"
                    data-target="#product_view" title="Quick View">
                    <i class="fa fa-eye"></i>
                </a>
            </div> --}}
        </div>
        <div class="btc_shop_indx_img_cont_wrapper">
            <div class="name">
                <a href="#">
                    {{$product->name}}
                </a>
            </div>
            <p class="price">
                LKR {{number_format($product->price, 2)}}
            </p>
            <div class="rating">
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star-o"></i>
                <i class="fa fa-star-o"></i>
            </div>
            <div class="product_btn_wrapper">
                <a href="#" class="product_btn add_wishlist"
                    title="Add to Wishlist">
                    <i class="fa fa-heart"></i>
                </a>
                <button class="btn" type="button">
                    Add to Cart
                </button>
                {{-- <a href="#" class="product_btn add_compare"
                    title="Add to Compare">
                    <i class="fa fa-bar-chart"></i>
                </a> --}}
            </div>
        </div>
    </div>
</div>
