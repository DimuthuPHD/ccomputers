@extends('frontend.layouts.master')
@section('content')
    @push('styles')
        <link rel="stylesheet" href="{{ asset('css/magnific-popup.css') }}" />
        <!-- Product Css -->
        <link href="{{ asset('css/shop.css') }}" rel="stylesheet">
        <style>
            .cart_product_wrapper {
                height: 100vh;
            }
        </style>
    @endpush
    <!-- page_header start -->
    <div class="page_header">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-8 col-xs-12 col-sm-6">
                    <h1> Shopping Cart </h1>
                </div>
                <div class="col-lg-4 col-md-4 col-xs-12 col-sm-6">
                    <div class="sub_title_section">
                        <ul class="sub_title">
                            <li> <a href="/"> Home </a> <i class="fa fa-angle-right" aria-hidden="true"></i> </li>
                            <li> Shopping Cart <i class="fa fa-angle-right" aria-hidden="true"></i></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- page_header end -->

    <!--cart product wrapper Wrapper Start -->
    <div class="cart_product_wrapper">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="btc_shop_single_prod_right_section shop_product_single_head related_pdt_shop_head">
                        <h1>Your cart Products ({{ getCart()->getTotalQuantity() }})</h1>
                    </div>
                </div>
                <div class="shop_cart_page_wrapper">
                    <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
                        <div class="table-responsive cart-calculations">

                            @if (getCart()->getContent()->count() > 0)
                                <table class="table">

                                    <thead class="cart_table_heading">
                                        <tr>
                                            <th>item</th>

                                            <th>product</th>
                                            <th>&nbsp;</th>
                                            <th> price</th>
                                            <th>Total price</th>
                                            <th>&nbsp;</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @php
                                            $count = 1;
                                        @endphp

                                        @foreach (getCart()->getContent() as $key => $product)
                                            @php
                                                $media = $product->model->getFirstMediaUrl('product-images');
                                            @endphp
                                            <tr>
                                                <td>
                                                    {{$count}}
                                                </td>
                                                <td>
                                                    <div class="table_cart_img">
                                                        <figure>
                                                            <img src="{{$media}}" alt="" />
                                                        </figure>
                                                    </div>
                                                    <div class="table_cart_cntnt">
                                                        <h1>{{ strtoupper($product->name) }}</h1>
                                                    </div>
                                                </td>
                                                <td></td>
                                                <td class="cart_page_price">LKR {{ number_format($product->price, 2) }}</td>
                                                <td class="cart_page_totl">LKR
                                                    {{ number_format($product->price * $product->quantity, 2) }}</td>
                                                <td>
                                                    <a href="{{ route('fr.cart.remove', $product->model->slug) }}"> <i
                                                            class="fa fa-trash"></i></a>
                                                </td>
                                            </tr>
                                            @php
                                            $count ++;
                                        @endphp
                                        @endforeach
                                    </tbody>
                                </table>
                            @else
                                <h1>Your Cart is Empty</h1>
                            @endif

                        </div>

                    </div>

                    <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">

                        <div class="shipping_Wrapper">
                            <div
                                class="btc_shop_single_prod_right_section shop_product_single_head related_pdt_shop_head related_pdt_shop_head_2">
                                <h1>estimate shipping : </h1>
                            </div>

                            <div class="estimate_shiping_Wrapper_cntnt estimate_shiping_Wrapper_repsnse">

                                <table class="table">
                                    <tbody>
                                        <tr>
                                            <th>Sub Total : </th>
                                            <td><span class="price">LKR
                                                    {{ number_format(getCart()->getSubTotal(), 2) }}</span></td>
                                        </tr>
                                        <tr>
                                            <th>Tax 0% :</th>
                                            <td><span class="price">LKR 0.00</span></td>
                                        </tr>
                                        <tr>
                                            <th> Discount:</th>
                                            <td><span class="price">-LKR 0.00</span></td>
                                        </tr>
                                        <tr>
                                            <th class="cart_btn_cntnt"> Sub Total :</th>
                                            <td><span class="cart_btn_cntnt_clr">LKR
                                                    {{ number_format(getCart()->getSubTotal(), 2) }}</span> </td>
                                        </tr>
                                    </tbody>
                                </table>

                                @if (getCart()->getTotalQuantity() > 0)
                                    <div class="shop_btn_wrapper shop_btn_wrapper_shipping">
                                        <ul>
                                            <li><a href="{{route('fr.checkout.index')}}">checkout</a>
                                            </li>
                                        </ul>
                                    </div>
                                @endif
                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- cart product wrapper end -->
@endsection
