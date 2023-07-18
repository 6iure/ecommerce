@extends('layouts.app')

@section('content')

	<div id="products-index-page" class="page">

        @include('components.alert')

        <h1>Produtos</h1>

        @include('pages.products.filters')

        <x-btn-create :route="route('products.create')">Criar Produto</x-btn-create>

        @if ($products->count() > 0)
            <div class="table-responsive">

                <table class="table table-striped mt-3">

                    <thead class="table">
                        <tr>
                            <th>ID</th>
                            <th>Nome</th>
                            <th>Descrição</th>
                            <th>Preço</th>
                            <th>Quantidade no estoque</th>
                            <th>URL da imagem</th>
                            <th>Tipo de arquivo</th>
                            <th>Tamanho da imagem</th>
                            <th>Dt. criação</th>
                            <th>Ações</th>
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
                                <td>{{ $product->image_path }}</td>
                                <td>{{ $product->image_mimetype }}</td>
                                <td>{{ $product->image_size }}</td>
                                <td>{{ $product->created_at }}</td>
                                <td>
                                    <x-buttons>

                                        <x-btn-edit :route="route('products.edit', ['product' => $product->id])">Editar produto</x-btn-edit>

                                        <x-btn-delete :route="route('products.destroy', ['product' => $product->id])">Remover produto</x-btn-delete>

                                    </x-buttons>
                                <td>
                            </tr>

                        @endforeach

                    </tbody>
                </table>

                {!! $products->appends(Request::except('page'))->links() !!}

            </div>

        @else
            <x-empty-message />
        @endif

    </div>

@endsection
