<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function showDashboardForm(): View {

        return view('pages.categories.dashboard');

    }
}
