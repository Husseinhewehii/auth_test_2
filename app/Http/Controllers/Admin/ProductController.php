<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ProductCreateRequest;
use App\Http\Services\ProductService;
use App\Models\Product;
use App\Repositories\ProductRepository;
use Illuminate\Http\Request;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class ProductController extends Controller
{

    protected $languageRepository;
    protected $productRepository;
    protected $productService;

    public function __construct(ProductRepository $productRepository, ProductService $prodcutService)
    {
        $this->productRepository = $productRepository;
        $this->productService = $prodcutService;
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = $this->productRepository->getAllProducts();
        return view('admin.products.index',['products' => $products]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->productService->fillFromRequest($request);
        return redirect(LaravelLocalization::localizeURL(route('admin.products.index')));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($locale, Product $product)
    {
        $product->delete();

        return redirect()->back();
    }
}
