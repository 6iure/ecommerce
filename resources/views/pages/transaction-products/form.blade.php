@extends('layouts.app')

@section('content')

    <div class="page page-transaction-products page-form">

        @include('components.alert')

        <h1>Formulário de Transações de Produtos</h1>

        @php

            $method = $tProducts->id ? 'PUT' : 'POST';

            $route = $tProducts->id ?
                route('transaction-products.update', $tProducts->id) :
                route('transaction-products.store');

        @endphp

        <form method="post" action="{{ $route }}">

            @csrf

            @method($method)

            <div class="form-group mb-3">

                {{-- @dd($tProducts) --}}
                <label for="">Quantidade</label>
                <input type="number" name="amount" class="form-control" value="{{ old('amount', $tProducts->amount) }}" required />

                <label for="">Preço</label>
                <input type="number" name="price" class="form-control" value="{{ old('price', $tProducts->price) }}" required />

                <label for="">Total</label>
                <input type="number" name="total" class="form-control" value="{{ old('total', $tProducts->total) }}" required />

            </div>

            <x-buttons>

                <a class="btn btn-secondary" href="{{ route('transaction-products.index') }}">Voltar</a>

                <button class="btn btn-primary" type="submit">Enviar</button>

            </x-buttons>

        </form>

    </div>

@endsection
