<form method="GET" action="{{ url('/transactions') }}">

    <div class="row">

        <div class="col-6">
            <div class="form-group">
                <label for="">Pesquisa</label>
                <input type="search" name="search" class="form-control" value="{{ Request::get('search') }}">
            </div>
        </div>

        <div class="col-3">
                @include('components.limit')
        </div>


        <div class="col-3">

            @include('components.sort', [
                'columns' => [
                    'id' => 'Id',
                ]
            ])

        </div>

    </div>

    <div class="buttons d-flex mt-2">

        <a class="btn btn-sm btn-secondary me-2" href="{{ url('/transacations') }}">Limpar filtros</a>

        <button class="btn btn-sm btn-primary" type="submit">Atualizar</button>

    </div>

</form>
