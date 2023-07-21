@extends('layouts.app')

@section('content')

    <div id="stock-operations-index-page" class="page">

        @include('components.alert')

        <h1>Operações de Estoque</h1>

        @include('pages.stock-operations.filters')

        <x-btn-create :route="('stock-operations/create')">Criar Operação de Estoque</x-btn-create>

        @if ($stockOp->count() > 0)

            <div class="table-responsive">

                <table class="table table-striped mt-3">

                    <thead class="table">
                        <tr>
                            <th>ID de Operação</th>
                            <th>Quantidade</th>
                            <th>Dt. criação</th>
                            <th>Ações</th>
                        </tr>
                    </thead>

                    <tbody>

                        @foreach ( $stockOp as $so )

                            <tr>

                                <td>{{ $so->operation_id }}</td>
                                <td>{{ $so->amount }}</td>
                                <td>{{ $so->created_at }}</td>

                                <td>

                                    <x-buttons>

                                        <x-btn-edit :route="route('stock-operations.edit', ['stock_operation' => $stockOp->id])">Editar operação de estoque</x-btn-edit>

                                        <x-btn-delete :route="route('stock-operations.destroy', ['stock_operation' => $stockOp->id])">Deletar operação de estoque</x-btn-delete>

                                    </x-buttons>

                                </td>

                            </tr>

                        @endforeach

                    </tbody>
                </table>

                {!! $stockOp->appends(Request::except('page'))->links() !!}

            </div>

        @else
            <x-empty-message />
        @endif

    </div>

@endsection
