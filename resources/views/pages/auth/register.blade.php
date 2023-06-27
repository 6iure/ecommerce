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

            <select class="form-select mb-3" aria-label="Default select example">
                <label>Grupo</label>
                <option value="1">Admin</option>
                <option value="2">Manager</option>
                <option value="3">Customer</option>
            </select>

            <div class="form-group mb-3">
                <label>Group ID</label>
                <input type="text" class="form-control" name="group_id" value="{{ old('group_id') }}"  />
            </div>

            <div class="form-group mb-3">
                <label>E-mail</label>
                <input type="email" class="form-control" name="email" value="{{ old('email') }}"  />
            </div>

            <div class="form-group mb-3">
                <label>CPF</label>
                <input type="text" class="form-control" name="cpf" value="{{ old('cpf') }}" />
            </div>

            <div class="form-group mb-3">
                <label>Senha</label>
                <input type="password" class="form-control" name="password" minlength="6" value="{{ old('password') }}"  />
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>

        </form>

	</div>

@endsection
