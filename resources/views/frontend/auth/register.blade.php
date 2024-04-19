@extends('frontend.layouts.master')
@section('content')
<style>
    .login_section {
        height: 100vh;
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
                <h1>Register</h1>
            </div>
            <div class="col-lg-4 col-md-4 col-xs-12 col-sm-6">
                <div class="sub_title_section">
                    <ul class="sub_title">
                        <li> <a href="/"> Home </a> <i class="fa fa-angle-right" aria-hidden="true"></i> </li>
                        <li> Register </li>
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
                <div class="col-md-6 col-md-offset-3">
                    <!-- login_wrapper -->
                    <form action="{{ route('fr.customer.register.submit') }}" method="POST">
                        @csrf
                        <div class="login_wrapper">

                            <div class="formsix-pos">
                                <div class="form-group i-first-name">
                                    <input type="text" name="first_name" class="form-control" required="" id="first_name" placeholder="First Name *" value="{{ old('first_name') }}">
                                    <span class="text-danger">{{ $errors->first('first_name') }}</span>
                                </div>
                            </div>

                            <div class="formsix-e">
                                <div class="form-group i-last-name">
                                    <input type="text" name="last_name" class="form-control" required="" id="last_name" placeholder="Last Name *" value="{{ old('last_name') }}">
                                    <span class="text-danger">{{ $errors->first('last_name') }}</span>
                                </div>
                            </div>

                            <div class="formsix-e">
                                <div class="form-group i-email">
                                    <input type="email" name="email" class="form-control" required="" id="email" placeholder="Email Address *" value="{{ old('email') }}">
                                    <span class="text-danger">{{ $errors->first('email') }}</span>
                                </div>
                            </div>

                            <div class="formsix-e">
                                <div class="form-group i-password">
                                    <input type="password" name="password" class="form-control" required="" id="password" placeholder="Password *">
                                    <span class="text-danger">{{ $errors->first('password') }}</span>
                                </div>
                            </div>

                            <div class="formsix-e">
                                <div class="form-group i-confirm-password">
                                    <input type="password" name="password_confirmation" class="form-control" required="" id="password_confirmation" placeholder="Confirm Password *">
                                </div>
                            </div>

                            <div class="login_btn_wrapper">
                                <button class="btn btn-primary login_btn" type="submit">Register</button>
                            </div>
                            <div class="login_message">
                                <p>Already have an account? <a href="{{ route('fr.customer.login') }}"> Login </a> </p>
                            </div>
                        </div>
                    </form>
                    <!-- /.login_wrapper-->
                </div>
            </div>
        </div>
    </div>
    <!-- /.login_form_wrapper-->
</div>
<!-- /.login_section -->
@endsection
