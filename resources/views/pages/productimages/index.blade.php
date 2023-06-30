@extends('layouts.app')

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
