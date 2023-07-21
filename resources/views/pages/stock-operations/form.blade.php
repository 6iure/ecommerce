@extends('layouts.app')

@section('content')

    <div class="page page-stock-operations page-form">

        @include('components.alert')

        <h1>Formulário de operações de Estoque</h1>

        @php

            $method = $stockOp  ->id ? 'PUT' : 'POST';

            $route = $stockOp->id ?
                route('stock-operations.update', $stockOp->id) :
                route('stock-operations.store');
        @endphp

        <form method="post" action="{{ $route }}">

            @csrf

            @method($method)

            <div class="form-group mb-3">

                <label for="">Id de Operação</label>
                <input type="number" name="operation_id" class="form-control" value="{{ old('operation_id', $stockOp->operation_id) }}" required />

                <label for=>Quantidade</label>
                <input type="number" name="amount" class="form-control" value="{{ old('amount', $stockOp->amount) }}" required />

            </div>

            <x-buttons>

                <a class="btn btn-secondary" href="{{ route('stock-operations.index') }}">Voltar</a>

                <button class="btn btn-primary" type="submit">Enviar</button>

            </x-buttons>

        </form>

    </div>

@endsection
