<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Repositories\Category\CategoryRepository;
use App\Repositories\Product\ProductRepository;
use Illuminate\Http\Request;

class CartController extends Controller
{

    public $productRepository;
    public $categoryRepository;

    public function __construct(ProductRepository $productRepository, CategoryRepository $categoryRepository)
    {
        $this->productRepository = $productRepository;
        $this->categoryRepository = $categoryRepository;
    }

    public function index()
    {
        return view('frontend.cart.index');
    }

    public function add(Request $request)
    {

        if (!$request->has('product_id')) {
            return redirect()->back()->with('success', 'Add to cart Error !');
        }

        $product = $this->productRepository->getById($request->product_id);
        $req_quantity = $request->get('quantity', 1);

        if ($product->stock < $req_quantity) {
            return redirect()->back()->with('success', 'No enough stock available');
        }

        $customer = auth('customer')->user();

        $cart_data = [
            'id' => $product->id,
            'name' => $product->name,
            'price' => $product->price,
            'quantity' => $req_quantity,
            'attributes' => [],
            'associatedModel' => $product
        ];

        getCart()->add($cart_data);

        if (auth('customer')->user()) {
            $point = $customer->reviewPoints()->where(['is_used' => false])->first();

            if ($point) {
                $product_price = (float)$product->price;
                $discount = ($product_price / 100) * $point->value;
                $condition_name = 'Review Based Points';
                $discount = new \Darryldecode\Cart\CartCondition(array(
                    'name' => $condition_name,
                    'type' => 'coupon',
                    'target' => 'subtotal',
                    'value' => - ($discount),
                    'order' => 2,
                    'attributes' => [
                        'review_point' => $point->id
                    ]
                ));
                getCart()->removeCartCondition($condition_name);
                getCart()->condition($discount);
            }
        }

        return redirect()->back()->with('success', 'Item added to cart successfully');
    }

    public function remove(Product $product)
    {
        getCart()->clearItemConditions($product->id);
        getCart()->remove($product->id);
        return redirect()->back()->with('success', 'Item removed from the cart successfully');
    }
}
