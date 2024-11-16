<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\ProductService;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function __construct(protected ProductService $productService)
    {

    }

    public function index(Request $request)
    {
        if (strlen($request['query']) > 0) {
            return $this->productService->searchProducts($request['query']);
        }

        return $this->productService->getProducts();
    }
}
