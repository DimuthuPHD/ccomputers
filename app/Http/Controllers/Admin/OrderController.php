<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\OrderUpdate;
use App\Models\Order;
use App\Repositories\Category\OrderRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class OrderController extends Controller
{
    private $orderRepository;

    public function __construct(OrderRepository $orderRepository)
    {
        $this->orderRepository = $orderRepository;
    }

    public function index(){
        $orders = $this->orderRepository->paginate(10);
        return view('admin.order.index', ['orders' => $orders]);
    }

    public function view(Order $order){
        return view('admin.order.edit', ['model' => $order]);
    }


    public function update(Order $order, Request $request){

        $order_data = [];
        $send_email = $order->status !== $request->status;

        $order_data['status'] = $request->has('status') ? $request->status : $order->status;
        $order_data['payment_status'] = $request->has('payment_status') ? $request->payment_status : $order->payment_status;
        $this->orderRepository->updateById($order->id, $order_data);

        if ($request->has('status') && $send_email && isset($order->primaryAddress->email)) {
            Mail::to($order->primaryAddress->email)->send(new OrderUpdate($order));
        }

        return to_route('admin.orders.index')->with(['success' => 'Order updated successfully ! ']);

    }
}
