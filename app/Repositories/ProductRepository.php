<?php

namespace App\Repositories;

use App\Models\Product;
use Symfony\Component\HttpFoundation\Request;

class ProductRepository
{
    /**
     * @param $request
     * @return $this|mixed
     */
    public function getAllProducts()
    {
        $products = Product::all();

        return $products;
    }

}
