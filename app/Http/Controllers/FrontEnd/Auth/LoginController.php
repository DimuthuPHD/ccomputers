<?php

namespace App\Http\Controllers\FrontEnd\Auth;

use App\Http\Controllers\Controller;
use App\Mail\CustomerVerification;
use App\Models\Customer;
use Carbon\Carbon;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;


    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('web')->except('logout');
    }

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected function redirectTo()
    {
        return request()->get('redirect_back', 'customer/dashboard');
    }

    public function showLoginForm()
    {
        return view('frontend.auth.login');
    }

    public function showEmailVerify(Customer $customer)
    {
        return view('frontend.auth.email-verify', ['customer' => $customer]);
    }

    public function submitEmailVerification(Request $request, Customer $customer)
    {
        $request->validate(['verification_code' => 'required|numeric']);

        if ($customer->hasVerifiedEmail()) {
            return redirect()->route('fr.customer.login')->with('success', 'Your email is already verified.');
        }

        if ($customer->otp == $request->verification_code) {
            $customer->markEmailAsVerified();
            $customer->otp = null;
            $customer->otp_sent_count = 0;
            $customer->save();
            return redirect()->route('fr.customer.login')->with('success', 'Your email has been successfully verified.');
        }

        return back()->with('error', 'Invalid OTP. Please try again.');
    }


    protected function guard()
    {
        return Auth::guard('customer');
    }

    protected function authenticated(Request $request, $customer)
    {

        if (!$customer->hasVerifiedEmail()) {
            $this->guard()->logout();
            return $this->sendOtp($customer);
        }

        return redirect()->intended($this->redirectPath());
    }

    public function resendOtp(Customer $customer)
    {
        return $this->sendOtp($customer);
    }

    private function sendOtp($customer)
    {

        if ($customer->hasVerifiedEmail()) {
            return redirect()->route('fr.customer.login')->with('success', 'Your email is already verified.');
        }

        if ($customer->blocked_until && $customer->blocked_until->isFuture()) {
            $remainingTime = $customer->blocked_until->diffForHumans();
            return redirect()->route('fr.home')->with('error', "Your account has been blocked. Please try again after $remainingTime.");
        }

        if ($customer->otp_sent_count >= 3 && $customer->last_otp_at && $customer->last_otp_at->addMinutes(10)->isFuture()) {
            $customer->blocked_until = Carbon::now()->addMinutes(10);
            $customer->save();
            $remainingTime = $customer->blocked_until->diffForHumans();
            return redirect()->route('fr.home')->with('error', "Your account has been blocked. Please try again after $remainingTime.");
        }


        $customer->otp_sent_count++;

        $customer->last_otp_at = Carbon::now();

        $otp = $this->generateOTP();
        $customer->otp = $otp;

        $customer->save();

        Mail::to($customer->email)->send(new CustomerVerification($customer, $otp));

        return redirect()->route('fr.customer.verification', $customer->id)->with('success', 'Verification email has been sent. Please check your email');

    }

    private function generateOTP()
    {
        return mt_rand(100000, 999999);
    }
}
