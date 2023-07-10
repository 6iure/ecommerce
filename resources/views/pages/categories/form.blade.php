@extends('layouts.app')

@section('content')

<div class="page page-categories page-form" >
	
	@include('components.alert')
	
	<h1>Formulário de Categorias</h1>
	
	@php
		
		$method = $category->id ? 'PUT' : 'POST';
		
		$route = $category->id ?
			route('categories.update', $category->id) :
			route('categories.store');

	@endphp
	
	<form method="post" action="{{ $route }}">
		
		@csrf

		@method($method)
		
		<div class="form-group mb-3">
			
			<label for="">Nome</label>
			
			<input type="text" name="name" class="form-control" value="{{ old('name', $category->name) }}" maxlength="100" required />
			
		</div>
		
		<x-buttons>
			
			<a class="btn btn-secondary" href="{{ route('categories.index') }}">Voltar</a>
			
			<button class="btn btn-primary" type="submit">Enviar</button>
			
		</x-buttons>
		
	</form>
	
</div>

@endsection
