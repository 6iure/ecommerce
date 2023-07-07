<?php

namespace App\Http\Controllers;

use App\Models\TransactionProduct;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class TransactionProductController extends Controller
{

    public function index ():View {

        $transaction_products =  TransactionProduct::all();

        $data = [
            'transaction_products' => $transaction_products
        ];

        return view('index');

    }

}
