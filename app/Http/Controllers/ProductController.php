<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class ProductController extends Controller {

    private function form($product) {

        $data = [
            'product' => $product,
        ];

        //TODO criar view do form product
        return view('', $data);
    }



    public function index():View {

        $products = Product::all();

        $data = [
            'products' => $products
        ];

        return view('pages.products.index', $data);

    }

    public function create() {

        $product = New Product();

        return $this->form($product);
    }
}
