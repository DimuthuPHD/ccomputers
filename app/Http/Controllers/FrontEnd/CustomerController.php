<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CustomerController extends Controller
{


    public function index() {
        return view('frontend.customer.dashboard');
    }

    public function myOrders() {
        $user = auth('customer')->user();
        return view('frontend.customer.my-orders', ['orders' => $user->orders()->paginate()]);
    }
}
