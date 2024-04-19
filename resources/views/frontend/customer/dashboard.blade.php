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
							<h2>{{auth()->user('customer')->first_name}}</h2>
							<p>Your personalized hub for managing orders, tracking shipments, and updating account details. Stay informed, organized, and in control of your shopping experience with easy access to order history, account settings, and more.</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- faq_section end -->
@endsection
