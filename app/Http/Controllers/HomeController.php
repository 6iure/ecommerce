<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    /**
     * Retorna a view de index do site
     *
     * @return View
     */
    public function index(): View {

        return view('pages.home');
    }
}
