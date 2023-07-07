@extends('layouts.app')

@section('content')

	<div id="home-page" class="page">

        @include('components.alert')

        <h1>Home</h1>

        @include('pages.categories.filters')

        <div class="table-responsive">


            <table class="table table-striped mt-3">

                <thead class="table">
                    <tr>
                        <th>Categorias</th>
                        <th>Produtos</th>
                        <th>Imagens de Produtos</th>
                        <th>Transações</th>
                    </tr>
                </thead>

                <tbody>
                    {{-- @foreach ($categories as $category)

                        <tr>
                            <td>{{ $category->id }}</td>
                            <td>{{ $category->name }}</td>

                            <td>

                                <div class="buttons d-flex">

                                    <a class="btn btn-sm btn-primary me-3 " href="{{ url('/category/'.$category->id .'/editar') }}">Editar categoria</a>

                                    @include('components.delete', [
                                        'url' => '/category',
                                        'id' => $category->id,
                                        'text' => 'Remover categoria',
                                    ])

                                </div>

                            </td>

                        </tr>

                    @endforeach --}}

                </tbody>
            </table>

        </div>
    </div>

@endsection
