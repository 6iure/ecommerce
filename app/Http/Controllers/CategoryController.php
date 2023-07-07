<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    private function form(Category $category): View {



        $data = [
            'category' => $category,
        ];

        return view('pages.categories.form', $data);

    }


    /**
     * Display a listing of the resource e trazendo os dados para a view.
     *
     * @return View
     */
    public function index(): View
    {
        $categories = Category::all();

        $data = [
            'categories' => $categories,
        ];

        return view('pages.categories.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request) {

        $category = New Category();

        return $this->form($category);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function insert(Request $request) {
        return $this->store($request);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, int $id)
    {
        $category = Category::find($id);

        if ($category) {

            return $this->form($category);
        }
        else {
            return back()-> withErrors('Categoria não encontrada');
        }

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request) {

        $id = $request->id;

        if($id) {

            $category = Category::find($id);

            if($category){

                //Deletar
                $category->delete();

                return back()->with('success', 'A categoria foi deletada');

            }
        }
    }
}
