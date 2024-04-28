@extends('frontend.layouts.master')
@section('content')
<style>
    .login_section {
	height: 100vh;
}
</style>

@push('styles')
<link href="{{asset('css/login_and_register.css')}}" rel="stylesheet">
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
                            <li> Login </li>
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
						<form action="{{route('fr.customer.login')}}" method="post">
                            @csrf
                            <div class="login_wrapper">

                                <div class="formsix-pos">
                                    <div class="form-group i-email">
                                        <input type="email" name="email" class="form-control" required="" id="email2" placeholder="Email Address *" value="{{old('email')}}">
                                        <span class="text-danger">{{$errors->first('email')}}</span>
                                    </div>
                                </div>
                                <div class="formsix-e">
                                    <div class="form-group i-password">
                                        <input type="password" name="password" class="form-control" required="" id="password2" placeholder="Password *">
                                        <span class="text-danger">{{$errors->first('password')}}</span>
                                    </div>
                                </div>
                                <div class="login_remember_box">
                                    <label class="control control--checkbox">Remember me
                                        <input type="checkbox">
                                        <span class="control__indicator"></span>
                                    </label>
                                    <a href="#" class="forget_password">
                                        Forgot Password
                                    </a>
                                </div>
                                @if (request()->get('redirect_back'))
                                    <input type="hidden" name="redirect_back" value="{{request()->get('redirect_back')}}">
                                @endif
                                <div class="login_btn_wrapper">
                                    <button class="btn btn-primary login_btn" type="submit">Login</button>
                                </div>
                                <div class="login_message">
                                    <p>Don’t have an account ? <a href="{{route('fr.customer.register')}}"> Sign up </a> </p>
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
