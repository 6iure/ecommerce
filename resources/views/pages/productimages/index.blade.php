@extends('layouts.app')

@section('content')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Imagens dos Produtos</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha/css/bootstrap.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h2 style="margin-top: 30px;">Imagens dos produtos</h2>
        <div class="panel-body">
            <div class="col-md-8">
            @if ($message = Session::get('success'))
            <div class="alert alert-success alert-block">
                <button type="button" class="close" data-dismiss="alert">×</button>
                    <strong>{{ $message }}</strong>
            </div>
            <img src="{{asset('images')}}/{{ Session::get('image') }}" width="300" height="300">
            @endif

            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <strong>Ops!</strong> Tem algo de errado com o seu arquivo.
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ url('upload/image') }}" method="POST" enctype="multipart/form-data">
            @csrf

                <div class="row"> <br>

                    <div class="col-md-6">
                        <input type="file" name="image" class="form-control">
                    </div>
                    <div class="col-md-6">
                        <button type="submit" class="btn btn-success">Upload</button>
                    </div>
                </div>
            </form>
            </div>
        </div>
    </div>
</body>
</html>

@endsection
