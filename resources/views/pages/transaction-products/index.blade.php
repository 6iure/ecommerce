@extends('layouts.app')

@section('content')

    <div id="transaction-products-index-page" class="page">

        @include('components.alert')

        <h1>Transações de Produtos</h1>

        @include('pages.transaction-products.filters')

        <x-btn-create :route="route('transaction-products.create')">Criar transação de produto</x-btn-create>

        @if ($tProducts->count() > 0)

            <div class="table-responsive">

                <table class="table table-striped mt-3">

                    <thead class="table">
                        <tr>
                            <th>Quantidade</th>
                            <th>Preço</th>
                            <th>Total</th>
                            <th>Dt. criação</th>
                            <th>Açoẽs</th>
                        </tr>
                    </thead>

                    <tbody>

                        @foreach ($tProducts as $tProduct)

                            <tr>

                                <td>{{ $tProduct->amount }}</td>
                                <td>{{ $tProduct->price }}</td>
                                <td>{{ $tProduct->total }}</td>
                                <td>{{ $tProduct->created_at }}</td>

                                <td>

                                    <x-buttons>

                                        <x-btn-edit :route="route('transaction-products.edit', ['transaction_product' => $tProduct->id])">Editar Transação de Produto </x-btn-edit>

                                        <x-btn-delete :route="route('transaction-products.destroy', ['transaction_product' => $tProduct->id])"> Deletar Transação de Produto </x-btn-delete>

                                    </x-buttons>

                                </td>

                            </tr>

                        @endforeach

                    </tbody>
                </table>

                {!! $tProducts->appends(Request::except('page'))->links() !!}

            </div>

        @else
            <x-empty-message />
        @endif

    </div>

@endsection
