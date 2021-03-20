<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Services\ProductService;
use App\Models\Product;
use App\Repositories\LanguageRepository;
use App\Repositories\ProductRepository;
use Illuminate\Http\Request;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class ProductController extends Controller
{

    protected $languageRepository;
    protected $productRepository;
    protected $productService;

    public function __construct(LanguageRepository $languageRepository, ProductRepository $productRepository, ProductService $prodcutService)
    {
        $this->languageRepository = $languageRepository;
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
        foreach ($products as $product) {
            echo json_decode($product->name)->en;die;
        }
        return view('admin.products.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $languages = $this->languageRepository->getAllLanguages();
        return view('admin.products.create', ['languages' => $languages]);
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
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }
}
