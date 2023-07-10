<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Contracts\Validation\Validator as ValidationValidator;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

/**
 * Category Controller
 *
 * @author Victor Noleto <victornoleto@sysout.com.br>
 * @since 10/07/2023
 * @version 1.0.0
 */
class CategoryController extends Controller
{

    /**
     * Lista os registros com base em um filtro que vem da requisição
     *
     * @param Request $request
     * @return View
     */
    public function index(Request $request): View {

        $categories = Category::search($request)
            ->orderBy('id', 'asc') // TODO usar order by do request
            ->paginate(
                $request->get('limit', 10)
            );

        $data = [
            'categories' => $categories
        ];

        return view('pages.categories.index', $data);
    }

    /**
     * Exibir formulário para criar uma nova categoria
     *
     * @return View
     */
    public function create(): View {

        $category = new Category();

        return $this->form($category);
    }

    /**
     * Criar uma categoria
     *
     * @param Request $request
     * @return void
     */
    public function store(Request $request): RedirectResponse {

        $category = new Category();

        return $this->storeOrUpdate($category, $request);
    }

    /**
     * Exibir formulário para editar uma categoria
     *
     * @param Category $category
     * @return View
     */
    public function edit(Category $category): View {

        return $this->form($category);
    }

    /**
     * Editar categoria
     *
     * @param Category $category
     * @param Request $request
     * @return void
     */
    public function update(Category $category, Request $request): RedirectResponse {

        return $this->storeOrUpdate($category, $request);
    }

    /**
     * Remover categoria
     *
     * @param Category $category
     * @return RedirectResponse
     */
    public function destroy(Category $category): RedirectResponse {

        $category->delete();

        return redirect()
            ->route('categories.index')
            ->with('success', 'Categoria excluída com sucesso!');
    }

    /**
     * Exibir formulário para criar ou editar uma categoria
     *
     * @param Category $category
     * @return View
     */
    private function form(Category $category): View {

        // Variáveis que serão utilizadas na view
        $data = [
            'category' => $category
        ];

        return view('pages.categories.form', $data);
    }

    /**
     * Criar ou editar uma categoria
     *
     * @param Category $category
     * @param Request $request
     * @return RedirectResponse
     */
    private function storeOrUpdate(Category $category, Request $request): RedirectResponse {

        $validator = $this->validator($request);

        if ($validator->fails()) {

            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }

        $this->save($category, $request);

        return redirect()
            ->route('categories.index')
            ->with('success', 'Categoria salva com sucesso!');
    }

    /**
     * Criar validator de criação ou edição de categoria
     *
     * @param Request $request
     * @return ValidationValidator
     */
    private function validator(Request $request): ValidationValidator {

        $data = $request->all();

        // https://laravel.com/docs/10.x/validation#available-validation-rules
        $rules = [
            'name' => ['required', 'string', 'max:100'],
        ];

        $validator = Validator::make($data, $rules);

        $validator->after(function($validator) use ($request) {

            // validações mais complexas/menos genéricas

        });

        return $validator;
    }

    /**
     * Salvar (criar/editar) uma categoria
     *
     * @param Category $category
     * @param Request $request
     * @return void
     */
    private function save(Category $category, Request $request): void {

        $category->name = $request->name;

        $category->save();
    }
}
