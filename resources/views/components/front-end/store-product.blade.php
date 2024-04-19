<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
    <div class="btc_shop_indx_cont_box_wrapper">
        <div class="btc_shop_indx_img_wrapper">
            <img src="images/shop/li_img1.jpg" alt="shop_img" class="img-responsive" />
            <div class="cc_li_img_overlay">
                <div class="cc_li_img_text">
                    <ul>
                        <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="btc_shop_indx_img_cont_wrapper">

            <h1><a href="#">{{$product->name}}</a></h1>
            <h5>LKR {{number_format($product->price, 2)}}</h5>
        </div>
    </div>
</div>
