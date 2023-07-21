<form method="GET" action="{{ route('stock-operations.index') }}" class="mb-3">

    <div class="row">

        <div class="col-6">
            <div class="form-group">
                <label for="">Pesquisa</label>
                <input type="search" name="search" class="form-control" value="{{ Request::get('search') }}">
            </div>
        </div>

        <div class="col-3">
            <x-limit></x-limit>
        </div>

        <div class="col-3">

            @php
                $sortList = [
                    'operation_id' => 'Operation ID',
                    'amount' => 'Quantidade'
                    // 'created_at' => 'Data de criação',
                ];
            @endphp

            <x-sort
                :list="$sortList"
            ></x-sort>

        </div>

    </div>

    <div class="buttons d-flex mt-2">

        <a class="btn btn-sm btn-secondary me-2" href="{{ route('stock-operations.index') }}">Limpar filtros</a>

        <button class="btn btn-sm btn-primary" type="submit">Atualizar</button>

    </div>

</form>
