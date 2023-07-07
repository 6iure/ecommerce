<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class TransactionController extends Controller {

    private function form($transactions) {

        $data = [
            'transactions' => $transactions,
        ];

        //TODO criar view do form transactions
        return view('', $data);
    }

    public function index():View {

        $transactions = Transaction::all();

        $data = [
            'transactions' => $transactions
        ];

        return view('pages.transactions.index', $data);

    }

}
