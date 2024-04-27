@extends('frontend.layouts.master')
@section('content')

@push('styles')
<link href="{{asset('css/faq.css')}}" rel="stylesheet">
<style>
    .usefull_link_wrapper{
        height: 100vh;
    }
</style>
@endpush
	<!-- faq_section start -->
    <div class="faq_section">
        <div class="container">
            <div class="row">
				<div class="col-lg-3 col-md-4 col-sm-5 col-xs-12">
					@include('frontend.customer.sidebar')
				</div>
				    <div class="col-lg-9 col-md-8 col-sm-7 col-xs-12">
					<div class="faq_content_wrapper">
						<div class="faq_content_heading">
							<h2>My Orders</h2>
                            <p>Welcome to your personalized order management hub. Here, you can easily keep track of your orders, monitor shipment statuses, and update your account details. Stay informed and organized, with quick access to your complete order history, account settings, and more. Your seamless shopping experience starts here!</p>
                        </div>
					</div>
				</div>

                <div class="col-lg-9 col-md-8 col-sm-7 col-xs-12">
                     <!-- Loop through orders -->
                     @foreach ($orders as $order)
                     <div class="order-block">
                         <div class="order-header">
                             <h3 class="order-name">{{ $order->primaryAddress->first_name }} {{$order->primaryAddress->last_name }}</h3>
                             <span class="order-date">{{ \Carbon\Carbon::parse($order->created_at)->diffForHumans() }}</span>
                         </div>
                         <div class="order-items">
                            <ul>
                                @foreach ($order->items as $item)
                                    <li>{{$item->product->name}} X {{$item->quantity}} {{number_format($item->product->price * $item->quantity)}}</li>
                                @endforeach
                            </ul>
                         </div>
                         <div class="order-details">
                             <p class="order-total">Total: LKR{{ number_format($order->sub_total, 2) }}</p>
                             <p class="order-status">Status: {{ $order->o_status->status }}</p>
                         </div>
                     </div>
                 @endforeach
                </div>
			</div>
		</div>
	</div>
	<!-- faq_section end -->
@endsection
