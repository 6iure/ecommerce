@extends('layouts.app')

@section('content')

	<div id="register-page" class="page">

        @include('components.errors')

        <form method="post" action="{{ route('register.submit') }}">

            @csrf

            <div class="form-group mb-3">
                <label>Nome</label>
                <input type="text" class="form-control" name="name" value="{{ old('name') }}" />
            </div>

            <div class="form-group mb-3">
                <label>Grupo</label>
                <select name="group_id" class="form-select mb-3">

                    <option value="">Selecione uma opção</option>

                    @foreach ($groups as $group)
                    <option value="{{$group->id}}">{{$group->name}}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group mb-3">
                <label>E-mail</label>
                <input type="email" class="form-control" name="email" value="{{ old('email') }}"  />
            </div>

            <div class="form-group mb-3">
                <label>CPF</label>
                <input type="text" class="form-control" name="cpf" maxlength="11" value="{{ old('cpf') }}" />
            </div>

            <div class="form-group mb-3">
                <label>Senha</label>
                <input type="password" class="form-control" name="password" minlength="6" value="{{ old('password') }}"  />
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>

        </form>

	</div>

@endsection
