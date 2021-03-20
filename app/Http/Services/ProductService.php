<?php

namespace App\Http\Services;

use App\Models\Product;
use Symfony\Component\HttpFoundation\Request;

class ProductService
{
    public function fillFromRequest(Request $request, $product = null)
    {
        if (!$product) {
            $product = new Product();
        }

        $product->fill($request->all());
        $product->price= 1500;
        $product->save();

        return $product;
    }

    
}
