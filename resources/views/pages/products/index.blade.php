@extends('layouts.app')

@section('content')

	<div id="products-index-page" class="page">

        @include('components.alert')

        <h1>Produtos</h1>

        @include('pages.products.filters')

        <div class="table-responsive">


            <table class="table table-striped mt-3">

                <thead class="table">
                    <tr>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>Descrição</th>
                        <th>Preço</th>
                        <th>Quantidade no estoque</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($products as $product)

                        <tr>
                            <td>{{ $product->id }}</td>
                            <td>{{ $product->name }}</td>
                            <td>{{ $product->description }}</td>
                            <td>{{ $product->price }}</td>
                            <td>{{ $product->current_stock }}</td>

                            <td>

                                <div class="buttons d-flex">

                                    <a class="btn btn-sm btn-primary me-3 " href="{{ url('/product/'.$product->id .'/editar') }}">Editar produto</a>

                                    @include('components.delete', [
                                        'url' => '/product',
                                        'id' => $product->id,
                                        'text' => 'Remover produto',
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
