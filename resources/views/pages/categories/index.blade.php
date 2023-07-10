@extends('layouts.app')

@section('content')

	<div id="categories-index-page" class="page">

        @include('components.alert')

        <h1>Categorias</h1>

        @include('pages.categories.filters')

        <x-btn-create :route="route('categories.create')">Criar categoria</x-btn-create>

        @if ($categories->count() > 0)

            <div class="table-responsive">

                <table class="table table-striped mt-3">

                    <thead class="table">
                        <tr>
                            <th>ID</th>
                            <th>Nome</th>
                            <th>Dt. criação</th>
                            <th>Ações</th>
                        </tr>
                    </thead>

                    <tbody>

                        @foreach ($categories as $category)

                            <tr>

                                <td>{{ $category->id }}</td>
                                <td>{{ $category->name }}</td>
                                <td>{{ $category->created_at }}</td>
                                <td>

                                    <x-buttons>

                                        <x-btn-edit :route="route('categories.edit', ['category' => $category->id])">Editar categoria</x-btn-edit>

                                        <x-btn-delete :route="route('categories.destroy', ['category' => $category->id])">Remover categoria</x-btn-delete>

                                    </x-buttons>

                                </td>

                            </tr>

                        @endforeach

                    </tbody>
                </table>

                {!! $categories->appends(Request::except('page'))->links() !!}

            </div>

        @else
            <x-empty-message />
        @endif

    </div>

@endsection
