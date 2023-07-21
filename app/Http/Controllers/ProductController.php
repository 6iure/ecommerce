<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Validator as ValidationValidator;

/**
 * Product controller
 *
 * @author Iure Santiago <iure@sysout.com>
 * @since 10/07/23
 * @version 1.0.0
 *
 */

 class ProductController extends Controller
{
    /**
     * Listar todos os produtos
     *
     * @param Request $request
     * @return View
     */
    public function index(Request $request):View {

        $products = Product::search($request)
            ->orderBy('id', 'asc')
            ->paginate(
                $request->get('limit', 10)
        );

        $data = [
            'products' => $products
        ];

        return view('pages.products.index', $data);
    }

    /**
     * Exibir formulário para criar um novo produto
     *
     * @return void
     */
    public function create(): View {

        $product = new Product();

        return $this->form($product);
    }

    /**
     * Criar produto
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse {

        $product = new Product();

        return $this->storeOrUpdate($product, $request);
    }

    /**
     * Exibir form pra editar produto
     *
     * @param Product $product
     * @return View
     */
    public function edit(Product $product):View {

        return $this->form($product);
    }

    /**
     * Editar produto
     *
     * @param Product $product
     * @param Request $request
     * @return RedirectResponse
     */
    public function update(Product $product, Request $request): RedirectResponse {

        return $this->storeOrUpdate($product, $request);

    }

    /**
     * Deletar um produto
     *
     * @param Product $product
     * @return RedirectResponse
     */
    public function destroy(Product $product): RedirectResponse {

        $product->delete();

        return redirect()
            ->route('products.index')
            ->with('success', 'Produto deletado com sucesso');
    }

    /**
     * Exibir formulario para criar/editar produto
     *
     * @param Product $product
     * @return View
     */
    private function form(Product $product):View {

        //Variaveis que serao utilizadas na view
        $data = [
            'product' => $product
        ];

        return view('pages.products.form', $data);
    }

    /**
     * Criar ou editar um produto
     *
     * @param Product $product
     * @param Request $request
     * @return RedirectResponse
     */
    private function storeOrUpdate(Product $product, Request $request): RedirectResponse {

        $validator = $this->validator($request);

        if ($validator->fails()) {

            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }

        $this->save($product, $request);

        return redirect()
            ->route('products.index')
            ->with('success', 'Produto salvo com sucesso!');
    }

    /**
     * Criar validator de criação/ediçao de produto
     *
     * @param Request $request
     * @return ValidationValidator
     */
    private function validator(Request $request):ValidationValidator {

        $data = $request->all();

        $rules = [
            'name' => ['required', 'string', 'max:100'],
            'description' => ['required', 'string', 'max:180'],
            'price' => ['required', 'integer'],
            'current_stock' => ['required', 'integer'],
            'file' => ['required', 'file', 'image', 'min:1', 'max:500']
        ];

        $validator = Validator::make($data, $rules);

        $validator->after(function($validator) use($request) {

            //TODO validacoes mais complexas

        });

        return $validator;
    }

    /**
     * Salvar um produto
     *
     * @param Product $product
     * @param Request $request
     * @return void
     */
    private function save(Product $product, Request $request) {

        list($imagePath, $imageMimetype, $imageSize) = $this->saveFile($request->file);

        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->current_stock = $request->current_stock;
        $product->image_path = $imagePath;
        $product->image_mimetype = $imageMimetype;
        $product->image_size = $imageSize;
        $product->save();
    }

    private function saveFile(UploadedFile $file): array {

        $path = 'products';

        $extension = $file->getClientOriginalExtension();

        $name = uniqid() . '.' . $extension;

        Storage::putFileAs($path, $file, $name);

        return [
            $path . '/' . $name,
            $file->getClientMimeType(),
            intval($file->getSize() / 1024)
        ];
    }
}
