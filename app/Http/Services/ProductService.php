<?php

namespace App\Http\Services;

use App\Models\Product;
use Symfony\Component\HttpFoundation\Request;

class ProductService
{
    protected $uploaderService;

    public function __construct(UploaderService $uploaderService)
    {
        $this->uploaderService = $uploaderService;
    }

    public function fillFromRequest(Request $request, $product = null)
    {
        if (!$product) {
            $product = new Product();
        }

        $product->fill($request->all());
        
        if (!empty($request->file('image'))) {
            // $product->image = $this->uploaderService->upload($request->file('image'), 'Products');
            $product->image = $this->uploaderService->upload($request->file('image'), 'Products')
        }

        $product->save();

        return $product;
    }

    
}
