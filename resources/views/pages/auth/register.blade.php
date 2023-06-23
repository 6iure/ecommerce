@extends('layouts.app')

@section('content')

	<div id="register-page" class="page">

        @include('components.errors')

        <form method="post" action="{{ route('register.submit') }}">

            @csrf

            <div class="form-group mb-3">
                <label>Nome</label>
                <input type="text" class="form-control" name="name"  />
            </div>

            <div class="form-group mb-3">
                <label>E-mail</label>
                <input type="email" class="form-control" name="email"  />
            </div>

            <div class="form-group mb-3">
                <label>CPF</label>
                <input type="text" class="form-control" name="cpf"  />
            </div>

            <div class="form-group mb-3">
                <label>Senha</label>
                <input type="password" class="form-control" name="password" minlength="6"  />
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>

        </form>

	</div>

@endsection
