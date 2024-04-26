@php
    $media = $product->getMedia('product-images');
    $average_rating = $product->average_rating ? $product->average_rating : 0;
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
                        <img class="first-img" src="{{ $media[0]->getUrl() }}" alt="">
                    @endif
                    @if ($media->count() >= 2)
                        <img class="hover-img" src="{{ $media[1]->getUrl() }}" alt="">
                    @endif
                </a>
            </div>
            {{-- You can add quick view or other options here if needed --}}
        </div>
        <div class="btc_shop_indx_img_cont_wrapper">
            <div class="name">
                <a href="{{ route('fr.store.product', $product->slug) }}">
                    {{ $product->name }}
                </a>
            </div>
            <p class="price">
                LKR {{ number_format($product->price, 2) }}
            </p>

            @if ($average_rating)
                <div class="rating">
                    @for ($i = 0; $i < 5; $i++)
                        @if ($i < $average_rating)
                            <i class="fa fa-star"></i>
                        @else
                            <i class="fa fa-star-o"></i>
                        @endif
                    @endfor
                </div>
            @endif

            {{-- Add other product details and buttons here --}}
            <div class="product_btn_wrapper">
                <a href="{{ route('fr.store.product', $product->slug) }}" class="btn">Read more</a>
            </div>
        </div>
    </div>
</div>
