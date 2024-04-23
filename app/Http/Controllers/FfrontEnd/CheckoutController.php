<?php

namespace App\Http\Controllers\FfrontEnd;

use App\Http\Controllers\Controller;
use App\Http\Requests\FrontEnd\OrderRequest;
use App\Mail\OrderConfirmation;
use App\Models\Order;
use App\Repositories\Category\CategoryRepository;
use App\Repositories\Category\OrderRepository;
use App\Repositories\Product\ProductRepository;
use Illuminate\Support\Facades\Mail;

class CheckoutController extends Controller
{


    public $productRepository;
    public $categoryRepository;
    public $orderRepository;

    public function __construct(ProductRepository $productRepository, CategoryRepository $categoryRepository, OrderRepository $orderRepository)
    {
        $this->productRepository = $productRepository;
        $this->categoryRepository = $categoryRepository;
        $this->orderRepository = $orderRepository;
    }


    public function index()
    {
        if(getCart()->getTotalQuantity() <= 0){
            return redirect()->route('fr.cart.index')->with(['success' => 'Your cart is empty.']);
        }
        return view('frontend.checkout.index');
    }

    function submit(OrderRequest $request)
    {

        $logged_in_user = auth('customer')->user();
        $order_items = [];
        $stock_data = [];
        $cart_data = getCart()->getContent();

        $order_data = [
            'user_type' => $logged_in_user ? 'registered' : 'guest',
            'user_id' => $logged_in_user ? $logged_in_user->id : null,
            'payment_method' => 'CASH_ON_DELIVERY',
            'sub_total' => getCart()->getSubTotal(),
            'payment_status' => 'PENDING',
            'status' => 'PENDING'
        ];

        $order = Order::create($order_data);

        if ($order) {
            $primary_addr = [
                'type' => 'primary',
                'order_id' => $request->order_id,
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'email' => $request->email,
                'phone' => $request->phone,
                'address' => $request->address,
                'city' => $request->city,
                'postal_code' => $request->postal_code,
            ];
            $order->primaryAddress()->create($primary_addr);

            if ($request->has('ship_to_different_address')) {
                $secondary_addr = [
                    'type' => 'secondary',
                    'order_id' => $request->order_id,
                    'first_name' => $request->first_name,
                    'last_name' => $request->last_name,
                    'email' => $request->email,
                    'phone' => $request->phone,
                    'address' => $request->address,
                    'city' => $request->city,
                    'postal_code' => $request->postal_code,
                ];

                $order->secondaryAddress()->create($secondary_addr);
            }

            foreach ($cart_data as $key => $product) {
                $order_items[$key]['order_id'] = $order->id;
                $order_items[$key]['product_id'] = $product->id;
                $order_items[$key]['product_price'] = $product->price;
                $order_items[$key]['quantity'] = $product->quantity;

                $stock_data[$product->id] = $product->quantity;
            }

            $this->updateStocks($stock_data);

            foreach ($order_items as $key => $item) {
                $order->items()->create($item);
            }

            Mail::to($primary_addr['email'])->send(new OrderConfirmation($order, $cart_data));

            getCart()->clear();

            return redirect()->route('fr.home')->with('success', 'Order placed successfully');
        }

        abort(404);

    }

    private function updateStocks($stock_data = []){

        foreach ($stock_data as $id => $stock) {
            $product = $this->productRepository->getById($id);

            if($product){
                    $current_stock = $product->stock >= $stock ? $product->stock - $stock : 0;
                    $product->update(['stock' => $current_stock]);
            }
        }

    }
}
