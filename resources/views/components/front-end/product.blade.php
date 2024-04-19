@php
    $media = $product->getMedia('product-images');
@endphp

<div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
    <div class="btc_shop_indx_cont_box_wrapper">
        <div class="btc_shop_indx_img_wrapper">
            <ul>
                {{-- Add any badge or label here if needed --}}
            </ul>
            <div class="product_img">
                <a href="#">
                    @if ($media->count() >= 1)
                        <img class="first-img"
                            src="{{ $media[0]->getUrl() }}"
                            alt="">
                    @endif
                    @if ($media->count() >= 2)
                        <img class="hover-img"
                            src="{{ $media[1]->getUrl() }}"
                            alt="">
                    @endif
                </a>
            </div>
            {{-- You can add quick view or other options here if needed --}}
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
            {{-- Add other product details and buttons here --}}
            <div class="product_btn_wrapper">
                <button class="btn" type="button">
                    Add to Cart
                </button>
            </div>
        </div>
    </div>
</div>
