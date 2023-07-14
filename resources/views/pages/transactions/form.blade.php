@extends('layouts.app')

@section('content')

<div class="page page-form page-transactions">

    @include('components.alert')

    <h1>Formulário de Transações</h1>

    @php

        $method = $transaction->id ? 'PUT' : 'POST';

        $route = $transaction->id ?
            route('transactions.update', $transaction->id) :
            route('transactions.store');

    @endphp

    <form method="post" action="{{ $route }}">

        @csrf

        @method($method)

        <div class="form-group mb-3">

            <label for="">Total</label>

            <input type="integer" name="total" class="form-control" value="{{ old('total', $transaction->total) }}" required>

        </div>

        <x-buttons>

            <a class="btn btn-primary" href="{{ route('transactions.index') }}">Voltar</a>

            <button class="btn btn-primary" type="submit">Enviar</button>

        </x-buttons>

    </form>

</div>

@endsection
