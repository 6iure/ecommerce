<?php

namespace App\Http\Controllers;

use App\Models\ProductImage;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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

    public function ImageUpload() {

        return view('index');
    }

    public function ImageUploadStore(Request $request) {

        $request->validate([

            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $imageName = time().'.'.$request->image->extension();

        $request->image->

        $request->image->move(public_path('images'), $imageName);

        return back()
            ->with('Sucesso', 'O upload da imagem foi feito.')
            ->with('image', $imageName);
    }
}
