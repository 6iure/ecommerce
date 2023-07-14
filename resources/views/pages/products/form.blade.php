@extends('layouts.app')

@section('content')

    <div class="page page-products page-form" >

        @include('components.alert')

       <h1>Formulário de Produtos</h1>

       @php

            $method = $product->id ? 'PUT' : 'POST';

            $route = $product->id ?
                route('products.update', $product->id) :
                route('products.store');

       @endphp

        <form method="POST" action="{{ $route }}">

            @csrf

            @method($method)

            <div class="form-group mb-3">

                <label for="">Nome</label>
                <input type="text" name="name" class="form-control" value="{{ old('name', $product->name) }}" maxlength="100" required />

                <label for="">Descriçao</label>
                <input type="text" name="description" class="form-control" value="{{ old('description', $product->description) }}" maxlength="180" required />

                <label for="">Preço</label>
                <input type="number" name="price" class="form-control" value="{{ old('price', $product->price) }}" required />

                <label for="">Quantidade no estoque</label>
                <input type="number" name="current_stock" class="form-control" value="{{ old('current_stock', $product->current_stock) }}" required />

            </div>

            <x-buttons>

                <a class="btn btn-secondary" href="{{ route('products.index') }}">Voltar</a>

                <button class="btn btn-primary" type="submit">Enviar</button>

            </x-buttons>

        </form>
    </div>
@endsection
