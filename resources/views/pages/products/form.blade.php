@extends('layouts.app')

@section('content')

    <div class="page page-products page-form" >

        @include('components.alert')

       <h1>Formulário de Produtos</h1>
       <h1>{{ $title ?? '' }}</h1>

        <form method="POST" action="{{ url('/products') }}">

            @csrf

            @method($product->id ? 'PUT' : 'POST')

            <input type="hidden" name ="id" value="{{ $product->id }}">

            {{-- <div class="form-group">
                <label for="">Produtos</label>
                <select name="name" id="" class="form-select" required >
                    <option value="">Selecione uma opção</option>
                    @foreach ($names as $name)
                        <option value="{{ $name->id }}" {{ $name->id == old('name_id', $category->name_id) ? 'selected' : '' }} ></option>
                    @endforeach
                </select>
            </div> --}}

            <a class="btn btn-secondary" href="{{ url('/products') }}">Voltar</a>

            <button class="btn btn-primary" type="submit">Enviar</button>

        </form>
    </div>
@endsection
