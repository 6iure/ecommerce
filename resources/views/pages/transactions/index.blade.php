@extends('layouts.app')

@section('content')

	<div id="transactions-index-page" class="page">

        {{-- TODO transformar esse include em <x> --}}

        @include('components.alert')

        <h1>Transações</h1>

        @include('pages.transactions.filters')

        <x-btn-create :route="route('transactions.create')">Criar transação </x-btn-create>

        @if ($transactions->count() > 0)

            <div class="table-responsive">

                <table class="table table-striped mt-3">

                    <thead class="table">
                        <tr>
                            <th>ID</th>
                            <th>Total</th>
                        </tr>
                    </thead>

                    <tbody>

                        @foreach ($transactions as $transaction)

                            <tr>
                                <td>{{ $transaction->id }}</td>
                                <td>{{ $transaction->total }}</td>

                                <td>
                                    <x-buttons>

                                        <x-btn-edit :route="route('transactions.edit', ['transaction' => $transaction->id])">Editar transação</x-btn-edit>

                                        <x-btn-delete :route="route('transactions.destroy', ['transaction' => $transaction->id])">Deletar transação</x-btn-delete>

                                    </x-buttons>

                                </td>

                            </tr>

                        @endforeach

                    </tbody>
                </table>

                {!! $transactions->appends(Request::except('page'))->links() !!}

            </div>
        @else
            <x-empty-message />
        @endif

    </div>

@endsection
