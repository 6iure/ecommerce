<?php

namespace App\Http\Controllers;

use App\Models\TransactionProduct;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Validator as ValidationValidator;
use Illuminate\View\View;

class TransactionProductController extends Controller
{

    /**
     * Lista todas as transaçoẽs de produtos no form
     *
     * @param Request $request
     * @return View
     */
    public function index(Request $request): View {

        $tProducts = TransactionProduct::search($request)
            ->orderBy('id', 'asc') // TODO usar order by do request
            ->paginate(
                $request->get('limit', 10)
            );

        $data = [
            'tProducts' => $tProducts
        ];

        return view('pages.transaction-products.index', $data);
    }

    /**
     * Exibir formulario para criar nova transação de produto
     *
     * @return View
     */
    public function create(): View {

        $tProducts = new TransactionProduct();

        return $this->form($tProducts);
    }

    /**
     * Criar uma transação de produto
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse {

        $tProducts = new TransactionProduct();

        return $this->storeOrupdate($tProducts, $request);
    }

    /**
     * Mostar form pra editar tProducts
     *
     * @param TransactionProduct $tProducts
     * @return View
     */
    public function edit(TransactionProduct $tProducts): View {

        return $this->form($tProducts);

        // return $this->form($tProducts);
    }


    /**
     * Editar categoria
     *
     * @param TransactionProduct $tProducts
     * @param Request $request
     * @return RedirectResponse
     */
    public function update(TransactionProduct $tProducts, Request $request): RedirectResponse {

        return $this->storeOrUpdate($tProducts, $request);

    }

    /**
     * Deletar t. product
     *
     * @param TransactionProduct $tProducts
     * @return RedirectResponse
     */
    public function destroy(TransactionProduct $tProducts): RedirectResponse {

        $tProducts->delete();

        return redirect()
            ->route('transaction-products.index')
            ->with('success', 'Transação de produto excluída!');
    }

    /**
     * Exibir form para edição ou criação de transação de produto
     *
     * @param TransactionProduct $tProducts
     * @return View
     */
    private function form(TransactionProduct $tProducts): View {

        $data = [
            'tProducts' => $tProducts
        ];

        return view('pages.transaction-products.form', $data);
    }

    /**
     * Criar ou editar uma categoria
     *
     * @param TransactionProduct $tProducts
     * @param Request $request
     * @return RedirectResponse
     */
    private function storeOrUpdate(TransactionProduct $tProducts, Request $request):RedirectResponse {

        $validator = $this->validator($request);

            if($validator->fails()) {

                return redirect()
                    ->back()
                    ->withErrors($validator)
                    ->withInput();
            }

            $this->save($tProducts, $request);

            return redirect()
                ->route('transaction-products.index')
                ->with('success', 'Transação de produto salva!');
    }

    /**
     * Validar criação ou edição de transação de produto
     *
     * @param Request $request
     * @return ValidationValidator
     */
    private function validator(Request $request): ValidationValidator {

        $data = $request->all();

        $rules = [
            'amount' => ['required', 'integer'],
            'price' => ['required', 'integer'],
            'total' => ['required', 'integer'],
        ];

        $validator = Validator::make($data, $rules);

        $validator->after(function($validator) use ($request) {

            //todo

        });

        return $validator;
    }

    /**
     * Salvar t. product
     *
     * @param TransactionProduct $tProducts
     * @param Request $request
     * @return void
     */
    private function save(TransactionProduct $tProducts, Request $request) {

        $tProducts->amount = $request->amount;

        $tProducts->price = $request->price;

        $tProducts->total = $request->total;

        $tProducts->save();
    }
}
