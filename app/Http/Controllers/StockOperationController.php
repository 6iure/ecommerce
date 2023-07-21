<?php

namespace App\Http\Controllers;

use App\Models\StockOperation;
use Illuminate\Contracts\Validation\Validator as ValidationValidator;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\View\View;

/**
 * Stock Operation Controller
 *
 * @author Iure Santiago
 * @since 18/07/23
 * @version 1.0.0
 */
class StockOperationController extends Controller
{

    /**
     * Index
     *
     * @param Request $request
     * @return View
     */
    public function index(Request $request): View {

        $stockOp = StockOperation::search($request)
            ->orderBy('id', 'asc')
            ->paginate(
                $request->get('limit', 10)
            );

        $data = [
            'stockOp' => $stockOp
        ];

        return view('pages.stock-operations.index', $data);
    }

    /**
     * Mostrar form para criar op de estoque
     *
     * @return View
     */
    public function create(): View {

        $stockOp = new StockOperation();

        return $this->form($stockOp);
    }

    /**
     * Armazenação de operações de estoque
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse {

        $stockOp = new StockOperation();

        return $this->storeOrUpdate($stockOp, $request);
    }

    /**
     * Exibir form para edição de stock op
     *
     * @param StockOperation $stockOp
     * @return View
     */
    public function edit(StockOperation $stockOp): View {

        return $this->form($stockOp);
    }

    /**
     * Editar operação de estoque
     *
     * @param StockOperation $stockOp
     * @param Request $request
     * @return RedirectResponse
     */
    public function update(StockOperation $stockOp, Request $request): RedirectResponse {

        return $this->storeOrUpdate($stockOp, $request);
    }

    /**
     * Excluir operação de estoque
     *
     * @param StockOperation $stockOp
     * @return RedirectResponse
     */
    public function destroy(StockOperation $stockOp): RedirectResponse {

        $stockOp->delete();

        return redirect()
            ->route('stock-operations.index')
            ->with('sucess', 'Operação de estoque excluída com sucesso');
    }

    /**
     * Exibir form para criar ou editar operacao de estoque
     *
     * @param StockOperation $stockOp
     * @return View
     */
    private function form(StockOperation $stockOp): View {

        $data = [
            'stockOp' => $stockOp
        ];

        return view('pages.stock-operations.form', $data);
    }

    /**
     * Criar/Atualizar operação de estoque
     *
     * @param StockOperation $stockOp
     * @param Request $request
     * @return RedirectResponse
     */
    private function storeOrUpdate(StockOperation $stockOp, Request $request): RedirectResponse {

        $validator= $this->validator($request);

        if ($validator->fails()) {

            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }

        $this->save($stockOp, $request);

        return redirect()
            ->route('stock-operations.index')
            ->with('success', 'Operação de estoque salva com sucesso');
    }

    /**
     * Validação
     *
     * @param Request $request
     * @return ValidationValidator
     */
    private function validator(Request $request):ValidationValidator {

        $data = $request->all();

        $rules = [
            'operation_id' => ['required', 'integer'],
            'amount' => ['required', 'integer']
        ];

        $validator = Validator::make($data, $rules);

        $validator->after(function($validator) use ($request) {

            //validacoes mais complexas

        });

        return $validator;
    }

    /**
     * Salvar operacao de estoque
     *
     * @param StockOperation $stockOp
     * @param Request $request
     * @return void
     */
    private function save(StockOperation $stockOp, Request $request) {

        $stockOp->operation_id = $request->operation_id;
        $stockOp->amount = $request->amount;

        $stockOp->save();
    }




}
