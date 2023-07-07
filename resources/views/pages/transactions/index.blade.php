@extends('layouts.app')

@section('content')

	<div id="transactions-index-page" class="page">

        @include('components.alert')

        <h1>Transações</h1>

        @include('pages.transactions.filters')

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
                            <td>{{ $product->total }}</td>

                            <td>

                                <div class="buttons d-flex">

                                    <a class="btn btn-sm btn-primary me-3 " href="{{ url('/transaction/'.$transaction->id .'/editar') }}">Editar transação</a>

                                    @include('components.delete', [
                                        'url' => '/trnasaction',
                                        'id' => $transaction->id,
                                        'text' => 'Remover transação',
                                    ])

                                </div>

                            </td>

                        </tr>

                    @endforeach

                </tbody>
            </table>

        </div>
    </div>

@endsection
