<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class ProductController extends Controller {

    private function form($product):View {

        $data = [
            'product' => $product,
        ];

        return view('pages.products.form', $data);
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

    public function edit (Request $request, int $id) {

        $product = Product::find($id);

        if ($product) {

            return $this->form($product);
        }
        else {
            return back()->withErrors('Produto não encontrado');
        }
    }

    public function update () {

    }

    public function delete (Request $request) {

        $id = $request->id;

        if ($id) {

            $product = Product::find($id);

            if($product) {

                //Deletar
                $product->delete();

                return back()->with('success', 'O produto foi deletado!');
            } else {

            }
        }
    }
}
