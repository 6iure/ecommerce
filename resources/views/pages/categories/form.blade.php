@extends('layouts.app')

@section('content')

    <div class="page page-categories page-form" >

        @include('components.alert')

       <h1>Formulário de Categorias</h1>
       <h1>{{ $title ?? '' }}</h1>

        <form method="POST" action="{{ url('/categories') }}">

            @csrf

            @method($category->id ? 'PUT' : 'POST')

            <input type="hidden" name ="id" value="{{ $category->id }}">

            {{-- <div class="form-group">
                <label for="">Categorias</label>
                <select name="name" id="" class="form-select" required >
                    <option value="">Selecione uma opção</option>
                    @foreach ($names as $name)
                        <option value="{{ $name->id }}" {{ $name->id == old('name_id', $category->name_id) ? 'selected' : '' }} ></option>
                    @endforeach
                </select>
            </div> --}}

            <a class="btn btn-secondary" href="{{ url('/categories') }}">Voltar</a>

            <button class="btn btn-primary" type="submit">Enviar</button>

        </form>
    </div>
@endsection
