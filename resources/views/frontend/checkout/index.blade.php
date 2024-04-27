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
    @php
        $user = auth('customer')->user();
    @endphp
    <!-- page_header start -->
    <div class="page_header">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-8 col-xs-12 col-sm-6">
                    <h1> Checkout </h1>
                </div>
                <div class="col-lg-4 col-md-4 col-xs-12 col-sm-6">
                    <div class="sub_title_section">
                        <ul class="sub_title">
                            <li> <a href="/"> Home </a> <i class="fa fa-angle-right" aria-hidden="true"></i> </li>
                            <li> Checkout <i class="fa fa-angle-right" aria-hidden="true"></i></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- page_header end -->
    <!--CheckOut Page-->
    <div class="checkout-page">
        <div class="container">

            @if (!auth('customer')->user())
                <div class="panel-group" id="accordionFourLeft">
                    <div class="panel panel-default panel-checkout panel-checkout-2">
                        <div class="panel-heading checkout_panel_heading">
                            <h4 class="panel-title">
                                <i class="fa fa-user"></i> Returning customer?
                                <a data-toggle=""
                                    href="{{ route('fr.customer.login', ['redirect_back' => request()->path()]) }}">
                                    Click here to login
                                </a>
                            </h4>
                        </div>

                    </div>
                </div>
            @endif
            <form action="{{ route('fr.checkout.submit') }}" method="post">
                @csrf
                <!--Checkout Details-->
                <div class="checkout-form">

                    <div class="row clearfix">


                        <!--Column-->
                        <div class="column col-lg-6 col-md-6 col-sm-12 col-xs-12">
                            <div class="btc_shop_single_prod_right_section related_pdt_shop_head checkout_heading">
                                <h1>BILLING DETAILS </h1>
                            </div>
                            <div class="row clearfix">

                                <!--Form Group-->
                                <div class="form-group col-md-6 col-sm-6 col-xs-12">
                                    <div class="field-label">First Name <sup>*</sup></div>
                                    <input type="text" name="first_name" value="{{ $user?->first_name }}" placeholder="">
                                    <span class="text-danger">{{ $errors->first('first_name') }}</span>
                                </div>

                                <!--Form Group-->
                                <div class="form-group col-md-6 col-sm-6 col-xs-12">
                                    <div class="field-label">Last Name </div>
                                    <input type="text" name="last_name" value="{{ $user?->last_name }}" placeholder="">
                                    <span class="text-danger">{{ $errors->first('last_name') }}</span>
                                </div>


                                <!--Form Group-->
                                <div class="form-group col-md-6 col-sm-6 col-xs-12">
                                    <div class="field-label">Email Address</div>
                                    <input type="text" name="email" value="{{ $user?->email }}" placeholder="">
                                    <span class="text-danger">{{ $errors->first('email') }}</span>
                                </div>

                                <!--Form Group-->
                                <div class="form-group col-md-6 col-sm-6 col-xs-12">
                                    <div class="field-label">Phone</div>
                                    <input type="text" name="phone" value="{{ $user?->phone }}" placeholder="">
                                    <span class="text-danger">{{ $errors->first('phone') }}</span>
                                </div>


                                <!--Form Group-->
                                <div class="form-group col-md-12 col-sm-12 col-xs-12">
                                    <div class="field-label">Address</div>
                                    <textarea name="address">{{ $user?->address }}</textarea>
                                    <span class="text-danger">{{ $errors->first('address') }}</span>
                                </div>

                                <!--Form Group-->
                                <div class="form-group col-md-12 col-sm-12 col-xs-12">
                                    <div class="field-label">Town/City</div>
                                    <input type="text" name="city" value="{{ $user?->city }}" placeholder="">
                                    <span class="text-danger">{{ $errors->first('city') }}</span>
                                </div>

                                <!--Form Group-->
                                <div class="form-group col-md-6 col-sm-6 col-xs-12">
                                    <div class="field-label">Postcode/ ZIP</div>
                                    <input type="text" name="postal_code" value="{{ $user?->postal_code }}"
                                        placeholder="">
                                    <span class="text-danger">{{ $errors->first('postal_code') }}</span>
                                </div>

                            </div>
                        </div>
                        <!--Column-->
                        <div class="column col-md-6 col-sm-12 col-xs-12 checkout_form_2_wrapper">
                            <div class="btc_shop_single_prod_right_section related_pdt_shop_head checkout_heading">
                                <h1>SHIP TO A DIFFERENT ADDRESS? </h1>
                            </div>

                            <div class="row clearfix">
                                <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="check-box">
                                        <input type="checkbox" name="ship_to_different_address" id="ship_to_different_address" {{old('ship_to_different_address') ? 'checked' : null}}> &ensp;
                                        <label for="ship_to_different_address">Ship to a different address</label>
                                    </div>
                                </div>
                                <!--Form Group-->
                                <div class="form-group col-md-6 col-sm-6 col-xs-12">
                                    <div class="field-label">First Name <sup>*</sup></div>
                                    <input type="text" name="different[first_name]"
                                        value="{{ old('different.first_name') }}" placeholder="">
                                    <span class="text-danger">{{ $errors->first('different.first_name') }}</span>
                                </div>

                                <!--Form Group-->
                                <div class="form-group col-md-6 col-sm-6 col-xs-12">
                                    <div class="field-label">Last Name </div>
                                    <input type="text" name="different[last_name]"
                                        value="{{ old('different.last_name') }}" placeholder="">
                                    <span class="text-danger">{{ $errors->first('different.last_name') }}</span>
                                </div>

                                <!--Form Group-->
                                <div class="form-group col-md-6 col-sm-6 col-xs-12">
                                    <div class="field-label">Email Address</div>
                                    <input type="text" name="different[email]"
                                        value="{{ old('different.email') }}" placeholder="">
                                    <span class="text-danger">{{ $errors->first('different.email') }}</span>
                                </div>

                                <!--Form Group-->
                                <div class="form-group col-md-6 col-sm-6 col-xs-12">
                                    <div class="field-label">Phone</div>
                                    <input type="text" name="different[phone]"
                                        value="{{ old('different.phone') }}" placeholder="">
                                    <span class="text-danger">{{ $errors->first('different.phone') }}</span>
                                </div>


                                <!--Form Group-->
                                <div class="form-group col-md-12 col-sm-12 col-xs-12">
                                    <div class="field-label">Address</div>
                                    <textarea name="different[address]">{{ old('different.address') }}</textarea>
                                    <span class="text-danger">{{ $errors->first('different.address') }}</span>
                                </div>

                                <!--Form Group-->
                                <div class="form-group col-md-12 col-sm-12 col-xs-12">
                                    <div class="field-label">Town/City</div>
                                    <input type="text" name="different[city]" value="{{ old('different.city') }}"
                                        placeholder="">
                                    <span class="text-danger">{{ $errors->first('different.city') }}</span>
                                </div>

                                <!--Form Group-->
                                <div class="form-group col-md-6 col-sm-6 col-xs-12">
                                    <div class="field-label">Postcode/ ZIP</div>
                                    <input type="text" name="different[postal_code]"
                                        value="{{ old('different.postal_code') }}" placeholder="">
                                    <span class="text-danger">{{ $errors->first('different.postal_code') }}</span>
                                </div>


                            </div>

                        </div>

                    </div>

                </div>
                <!--End Checkout Details-->

                <!--Order Box-->
                <div class="order-box">
                    <div class="btc_shop_single_prod_right_section related_pdt_shop_head checkout_heading">
                        <h1>your order </h1>
                    </div>
                    <div class="title-box">
                        <div class="col">PRODUCT</div>
                        <div class="col">TOTAL</div>
                    </div>
                    <ul>

                        @foreach (getCart()->getContent() as $key => $product)
                            <li class="clearfix"><strong>{{ strtoupper($product->name) }} {{ $product->quantity }}
                                </strong><span>{{ number_format($product->price * $product->quantity, 2) }}</span></li>
                        @endforeach
                        <li class="clearfix">Sub Total<span>LKR {{ number_format($product->price, 2) }}</span></li>
                        <li class="clearfix">Shipping<span class="free">Free Shipping</span></li>
                        <li class="clearfix">TOTAL<span>$35.00</span></li>
                    </ul>
                </div>
                <!--End Order Box-->

                <!--Payment Box-->
                <div class="payment-box">
                    <div class="upper-box">

                        <!--Payment Options-->
                        <div class="payment-options">
                            <ul>
                                <li>
                                    <div class="radio-option">
                                        <input type="radio" name="payment-group" id="payment-2" disabled>
                                        <label for="payment-2"><strong>Direct Bank Transfer</strong><span
                                                class="small-text">Make your payment directly into our bank account. Please
                                                use
                                                your Order ID as the payment reference. Your order won’t be shipped until
                                                the
                                                funds have cleared in our account.</span></label>
                                    </div>
                                </li>
                                <li>
                                    <div class="radio-option">
                                        <input type="radio" name="payment-group" disabled id="payment-1">
                                        <label for="payment-1"><strong>Check Payments</strong><span
                                                class="small-text">Make
                                                your payment directly into our bank account. Please use your Order ID as the
                                                payment reference. Your order won’t be shipped until the funds have cleared
                                                in
                                                our account.</span></label>
                                    </div>
                                </li>

                                <li>
                                    <div class="radio-option">
                                        <input type="radio" name="payment-group" id="payment-3" checked>
                                        <label for="payment-3"><strong>Cash on Delivery</strong><span
                                                class="small-text">Make
                                                your payment directly into our bank account. Please use your Order ID as the
                                                payment reference. Your order won’t be shipped until the funds have cleared
                                                in
                                                our account.</span></label>
                                    </div>
                                </li>
                                <li>
                                    <div class="radio-option">
                                        <input type="radio" name="payment-group" disabled id="payment-4">
                                        <label for="payment-4"><strong>PayPal</strong><span class="image"><img
                                                    src="images/shop/paypal.jpg" alt="" /></span></label>
                                        <a href="#" class="what-paypall">What is PayPal?</a>
                                    </div>
                                </li>
                            </ul>
                        </div>

                    </div>
                    <div class="lower-box text-right">
                        <div class="shop_btn_wrapper checkout_btn">
                            <ul>
                                <li>
                                    <button type="submit" class="btn">Place order</button>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!--End Payment Box-->
            </form>
        </div>

    </div>
    <!--End CheckOut Page-->
@endsection
