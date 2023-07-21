<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Validator as ValidationValidator;
use Illuminate\View\View;

class TransactionController extends Controller {

    public function index(Request $request): View {

        $transactions = Transaction::search($request)
            ->orderBy('id', 'asc')
            ->paginate(
                    $request->get('limit', 10)
            );

    $data = [
        'transactions' => $transactions
    ];

    return view('pages.transactions.index', $data);

    }

    public function create(): View {

        $transaction = new Transaction();

        return $this->form($transaction);

    }

    public function store(Request $request): RedirectResponse {

        $transaction = new Transaction();

        return $this->storeOrUpdate($transaction, $request);

    }

    public function edit(Transaction $transaction): View {

        return $this->form($transaction);

    }

    public function update(Transaction $transaction, Request $request ): RedirectResponse {

        return $this->storeOrUpdate($transaction, $request);

    }

    public function destroy(Transaction $transaction): RedirectResponse {

        $transaction->delete();

        return redirect()
            ->route('transactions.index')
            ->with('success', 'Transação excluída com sucesso!');

    }

    private function form(Transaction $transaction): View {

        $data = [
            'transaction' => $transaction,
        ];

        return view('pages.transactions.form', $data);

    }

    private function storeOrUpdate(Transaction $transaction, Request $request): RedirectResponse {

        $validator = $this->validator($request);

        if ($validator->fails()) {

            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }

        $this->save($transaction, $request);

        return redirect()
            ->route('transactions.index')
            ->with('success', 'Transação salva com suceso');
    }

    private function validator(Request $request): ValidationValidator {

        $data = $request->all();

        $rules = [
            'total' => ['required', 'float'],
        ];

        $validator = Validator::make($data, $rules);

        $validator->after(function($validator) use ($request) {

            //TODO

        });

        return $validator;

    }

    private function save(Transaction $transaction, Request $request) {

        $transaction->total = $request->total;

        $transaction->save();

    }


}
