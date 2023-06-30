<?php

namespace App\Http\Controllers;

use App\Models\ProductImage;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class ProductImageController extends Controller {

    private function form($product_images) {

        $data = [
            'product_images' => $product_images,
        ];

        //TODO criar view do form product images
        return view('', $data);
    }

    public function index():View {

        $product_images = ProductImage::all();

        $data = [
            'product_images' => $product_images
        ];

        return view('pages.productimages.index', $data);

    }

}
