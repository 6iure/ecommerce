{{-- @extends('layouts.app')

@section('content')

	<div id="productimages-index-page" class="page">

        @include('components.alert')

        <h1>Imagem dos produtos</h1>

        @include('pages.productimages.filters')

        <div class="table-responsive">


            <table class="table table-striped mt-3">

                <thead class="table">
                    <tr>
                        <th>ID</th>
                        <th>Tamanho</th>
                        <th>Largura</th>
                        <th>Altura</th>
                        <th>Mimetype</th>
                        <th>Path</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($product_images as $image)

                        <tr>
                            <td>{{ $image->id }}</td>
                            <td>{{ $image->size }}</td>
                            <td>{{ $image->width }}</td>
                            <td>{{ $image->height }}</td>
                            <td>{{ $image->mimetype }}</td>
                            <td>{{ $image->path }}</td>

                            <td>

                                <div class="buttons d-flex">

                                    <a class="btn btn-sm btn-primary me-3 " href="{{ url('/productimages/'.$image->id .'/editar') }}">Editar imagem do produto</a>

                                    @include('components.delete', [
                                        'url' => '/productimages',
                                        'id' => $image->id,
                                        'text' => 'Remover imagem do produto',
                                    ])

                                </div>

                            </td>

                        </tr>

                    @endforeach

                </tbody>
            </table>

        </div>
    </div>

@endsection
 --}}

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
                    <strong>Whoops!</strong> There were some problems with your input.
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ url('upload/image/store') }}" method="POST" enctype="multipart/form-data">
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
