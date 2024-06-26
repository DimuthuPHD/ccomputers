<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
    <div class="btc_shop_indx_cont_box_wrapper">
        <div class="btc_shop_indx_img_wrapper">
            @if ($product->getMedia('product-images')->isNotEmpty())
                <img src="{{ $product->getFirstMedia('product-images')->getUrl() }}" alt="shop_img" class="img-responsive" />
            @else
                <img src="images/default_product_image.jpg" alt="default_img" class="img-responsive" />
            @endif
        </div>

        <div class="btc_shop_indx_img_cont_wrapper">
            <h1><a href="{{route('fr.store.product', $product->slug)}}">{{$product->name}}</a></h1>
            <h5>LKR {{number_format($product->price, 2)}}</h5>
        </div>
    </div>
</div>
