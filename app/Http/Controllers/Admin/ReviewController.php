<?php

namespace App\Http\Controllers\Admin;

use App\Exports\ReviewsExport;
use App\Http\Controllers\Controller;
use App\Repositories\Product\ProductRepository;
use App\Repositories\Review\ReviewRepository;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Dompdf\Dompdf;
use Dompdf\Options;

class ReviewController extends Controller
{
    public $reviewRepository;
    public $productRepository;

    public function __construct(ReviewRepository $reviewRepository, ProductRepository $productRepository,)
    {
        $this->reviewRepository = $reviewRepository;
        $this->productRepository = $productRepository;
    }

    public function index(Request $request)
    {
        $filters = array_filter($request->all());
        $reviews = $this->reviewRepository->filter($filters, $paginate = 20);
        $reviews->withQueryString();
        $products = $this->productRepository->all()->pluck('name', 'slug')->toArray();
        return view('admin.review.index', ['reviews' => $reviews, 'products' => $products]);
    }

    public function export(Request $request)
    {
        $filters = array_filter($request->all());
        $reviews = $this->reviewRepository->filter($filters);
        $view =  view('admin.review.export', ['reviews' => $reviews])->render();




        $dompdf = new Dompdf();
        $dompdf->loadHtml($view);
        $dompdf->getOptions()->set('defaultFont', 'helvetica');
        $dompdf->setPaper('A4', 'landscape');
        $dompdf->render();

        // Output the generated PDF to Browser
        $dompdf->stream();

        return _to_route('admin.review.index');
    }
}
