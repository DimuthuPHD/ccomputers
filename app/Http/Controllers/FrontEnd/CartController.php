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

    public function index() {
        return view('frontend.cart.index');
    }

    public function add(Request $request)
    {

        if (!$request->has('product_id')) {
            return redirect()->back()->with('success', 'Add to cart Error !');
        }

        $product = $this->productRepository->getById($request->product_id);

        $cart_data = [
            'id' => $product->id,
            'name' => $product->name,
            'price' => $product->price,
            'quantity' => $request->get('quantity', '1'),
            'attributes' => [],
            'associatedModel' => $product
        ];

        getCart()->add($cart_data);

        return redirect()->back()->with('success', 'Item added to cart successfully');
    }

    public function remove(Product $product)
    {
        getCart()->remove($product->id);
        return redirect()->back()->with('success', 'Item removed from the cart successfully');
    }

}
