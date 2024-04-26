@extends('frontend.layouts.master')
@section('content')
    <style>
        .login_section {
            height: 100vh;
        }

        .resend-wrapper {
            position: absolute;
            top: 118px;
            left: 145px;
        }

        .text-warning.resent-notice {
            display: block;
            font-size: 11px;
            margin: 7px 0 0 0;
            color: #f0ad4e;
            font-weight: bolder;
        }
    </style>

    @push('styles')
        <link href="{{ asset('css/login_and_register.css') }}" rel="stylesheet">
    @endpush
    <!-- page_header start -->
    <div class="page_header">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-8 col-xs-12 col-sm-6">
                    <h1>Login</h1>
                </div>
                <div class="col-lg-4 col-md-4 col-xs-12 col-sm-6">
                    <div class="sub_title_section">
                        <ul class="sub_title">
                            <li> <a href="/"> Home </a> <i class="fa fa-angle-right" aria-hidden="true"></i> </li>
                            <li> Email Verification </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- page_header end -->

    <!-- login_section -->
    <div class="login_section">
        <div class="login_section_overlay"></div>
        <!-- login_form_wrapper -->
        <div class="login_form_wrapper">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <!-- login_wrapper -->
                        <form action="{{ route('fr.customer.submitEmailVerification', $customer->id) }}" method="post">
                            @csrf
                            <div class="login_wrapper">

                                <div class="formsix-e">
                                    <div class="form-group i-password">
                                        <input type="text" name="verification_code" class="form-control" required=""
                                            id="verification_code" placeholder="verification_code *">
                                        <span class="text-danger">{{ $errors->first('verification_code') }}</span>
                                    </div>
                                </div>

                                @if (request()->get('redirect_back'))
                                    <input type="hidden" name="redirect_back"
                                        value="{{ request()->get('redirect_back') }}">
                                @endif
                                <div class="login_btn_wrapper">
                                    <button class="btn btn-primary login_btn" type="submit">Submit</button>
                                    <span class="text-warning resent-notice">You have more
                                        {{ 3 - $customer->otp_sent_count }} cahnses to resend</span>
                                </div>
                            </div>
                        </form>

                        <div class="resend-wrapper">
                            <form action="{{ route('fr.customer.sendOtp', $customer->id) }}" class="post" method="post">
                                @csrf
                                <div class="login_btn_wrapper">
                                    <button class="btn btn-warning login_btn" type="submit">Resend OTP</button>
                                </div>
                            </form>
                        </div>
                        <!-- /.login_wrapper-->
                    </div>
                </div>
            </div>
        </div>
        <!-- /.login_form_wrapper-->
    </div>
    <!-- /.login_section -->
@endsection
